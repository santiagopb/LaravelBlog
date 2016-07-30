<?php

namespace Cronti\Http\Controllers;

use Illuminate\Http\Request;
use Cronti\Http\Requests;
use Cronti\Category;
use Auth;
use Session;

class CategoryController extends Controller
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
        $categories = Category::paginate(10);
        return view ('category.index')->withCategories($categories);
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
      // Validar la informacion
      $this->validate($request, array(
        'name' => 'required|max:255',
        'slug' => 'required|alpha_dash|min:3|max:255|unique:categories,slug'
      ));

      //Guardar la informacion
      $category = new Category;
      $category->name = $request->name;
      $category->slug = $request->slug;
      $category->description = $request->description;
      $category->save();

      // Redirigir a otro lugar
      Session::flash('message','La categoria fue guardada.');
      return redirect()->route('category.index');
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
        $category = Category::find($id);
        return view('category.edit')->withCategory($category);
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
        $category = Category::find($id);

        if($request->slug == $category->slug){
            $this->validate($request, [
              'name' => 'required|max:255'
            ]);
        } else {
            $this->validate($request, [
              'name' => 'required|max:255',
              'slug' => 'required|alpha_dash|min:3|max:255|unique:categories,slug'
            ]);
        }



        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->save();

        Session::flash('message', 'Categoria modificada!');
        $categories = Category::paginate(10);
        return view ('category.index')->withCategories($categories);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $category = Category::find($id);
      //$category->delete();

      Session::flash('message', 'Categoria eliminada');
      $categories = Category::paginate(10);
      return view ('category.index')->withCategories($categories);
    }
}
