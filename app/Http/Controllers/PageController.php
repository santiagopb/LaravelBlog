<?php

namespace Cronti\Http\Controllers;

use Illuminate\Http\Request;
use Cronti\Http\Requests;
use Cronti\Post;
use Cronti\Menu;
use Auth;
use Session;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:Administrador,Colaborador');
    }

    /**
     * @param input $texto a transformar
     * Funcion para crear un Slug valido
     * @return $texto transformado
     */
    private function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
          return 'n-a';
        }

        return $text;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Post::where('type', 'page')->orderBy('created_at', 'desc')->paginate(10);
        return view('page.index')->withPages($pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('page.create');
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
          'title' => 'required|max:255'
        ));

        //Guardar la informacion
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $this->slugify($request->title);
        //Si existe otro slug igual le coloco tantos '-2' al final como sean necesarios
        while(Post::where('slug', $post->slug)->first()){
          $post->slug = $post->slug . '-2';
        }
        $post->body = $request->body;
        $post->user_id = Auth::user()->id;
        //$post->category_id = $request->category_id;
        $post->type = $request->type;
        $post->save();
        // Si no hay etiquetas pasamos un array vacio
        if (!isset($request->tags)) { $request->tags=array();}
        $post->tags()->sync($request->tags, false);

        // Redirigir a otro lugar
        Session::flash('message','El Post fue guardado.');
        return redirect()->route('page.edit', $post->id);
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
        $post = Post::find($id);
        return view('page.edit')->withPost($post);
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
        $post = Post::find($id);

        // Si el slug no cambia
        if ($request->slug == $post->slug){
            $this->validate($request, array(
              'title' => 'required|max:255'
            ));
        }else {
            $this->validate($request, array(
              'title' => 'required|max:255',
              'slug' => 'required|alpha_dash|min:3|max:255|unique:posts,slug'
            ));
        }

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;
        //$post->category_id = $request->category_id;
        $post->save();
        // Si no hay etiquetas pasamos un array vacio
        if (!isset($request->tags)) { $request->tags=array();}
        $post->tags()->sync($request->tags, true);

        Session::flash('message', 'Post actualizado con exito.');

        return redirect()->route('page.edit', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();

        Session::flash('message', 'El post fue eliminado con exito.');
        return redirect()->route('page.index');
    }


}
