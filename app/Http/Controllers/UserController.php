<?php

namespace Cronti\Http\Controllers;

use Illuminate\Http\Request;
use Cronti\Http\Requests;

use Session;
use Image;
use File;
use Auth;
use Cronti\User;
use Cronti\Role;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        $roles = Role::all();
        return view ('user.index')->withUsers($users)->withRoles($roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view ('user.create')->withRoles($roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Validar la informacion
      $this->validate($request, array(
        'name' => 'required|max:255',
        'email' => 'required|min:6|max:255|unique:users,email',
        'password' => 'required|min:6'
      ));

      //Guardar la informacion
      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      if($request->hasFile('avatar')){
          $avatar = $request->file('avatar');
          $filename = time() . '.' . $avatar->getClientOriginalExtension();
          Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename) );
          $user->avatar = $filename;
      }
      $user->save();
      if ($request->roles){
          foreach($request->roles as $role){
              $user->roles()->attach(Role::where('name', $role)->first());
          }
      }

      // Redirigir a otro lugar
      Session::flash('message','El usuario fue creado.');
      return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('user.edit')->withUser($user)->withRoles($roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if($request->password == $user->password){
            $this->validate($request, [
              'name' => 'required|max:255',
              //'email' => 'required|min:3|max:255|unique:users,email'
            ]);
        } else {
            $this->validate($request, [
              'name' => 'required|max:255',
              //'email' => 'required|min:6|max:255|unique:users,email',
              //'password' => 'required|min:6'
            ]);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        if($request->hasFile('avatar')){
            //Eliminar la imagen anterior si no es default.jpg
            // ----Por hacer
            if ($user->avatar!='default.jpg'){
              //dd(public_path('/uploads/avatars/' . $user->avatar));
                File::delete(public_path('/uploads/avatars/' . $user->avatar));
            }
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename) );
            $user->avatar = $filename;
        }
        $user->save();

        $user->roles()->detach();
        if($request->roles){
            foreach($request->roles as $role){
                $user->roles()->attach(Role::where('name', $role)->first());
            }
        }

        Session::flash('message', 'Usuario modificado!');
        return redirect()->route('user.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::find($id);
      $user->delete();

      Session::flash('message', 'Usuario eliminado');
      return redirect()->route('user.index');
    }


    public function profile () {
        return view ('auth.profile', array('user'=>Auth::user()));
    }

    public function update_avatar(Request $request) {
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename) );

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return view('auth.profile', array('user'=>Auth::user()));
    }
}
