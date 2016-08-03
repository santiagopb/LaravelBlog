<?php

namespace Cronti\Http\Controllers;

use Illuminate\Http\Request;
use Cronti\Http\Requests;
use Cronti\Post;
use Cronti\Menu;
use Session;

class MenuController extends Controller
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
      $posts = Post::where('type', 'post')->get();
      $pages = Post::where('type', 'page')->get();
      $menus = Menu::paginate(10);
      return view ('menu.index')->withPosts($posts)->withPages($pages)->withMenus($menus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!isset($request->post)){
          $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|max:255'
          ]);

          $cant = Menu::all()->count();

          $menu = new Menu;
          $menu->name = $request->name;
          $menu->slug = $request->slug;
          $menu->position = $cant+1;
          $menu->save();
        } else {
          foreach ($request->post as $id) {
            $post = Post::find($id);
            $cant = Menu::all()->count();

            $menu = new Menu;
            $menu->name = $post->title;
            $menu->slug = $post->slug;
            $menu->position = $cant+1;
            $menu->save();
          }
        }

        Session::flash('message', 'Menu guardado');
        return redirect()->route('menu.index');
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
        $menu = Menu::find($id);
        return view('menu.edit')->withMenu($menu);
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
        $menu = Menu::find($id);
        $this->validate($request, [
          'name' => 'required|max:255',
          'slug' => 'required|max:255',
          'position' => 'required|numeric'
        ]);

        $menu->name = $request->name;
        $menu->slug = $request->slug;
        $menu->position = $request->position;
        $menu->save();

        Session::flash('message', 'Menu actualizado');
        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();

        Session::flash('message', 'Menu borrado');
        return redirect()->route('menu.index');
    }
}
