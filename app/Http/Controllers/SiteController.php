<?php

namespace Cronti\Http\Controllers;

use Illuminate\Http\Request;
use Cronti\Http\Requests;
use Auth;
use Cronti\Post;
use Cronti\Menu;

class SiteController extends Controller
{
    public function getSingle($slug) {
        $post = Post::where('slug', '=', $slug)->first();
        return view('post.single')->withPost($post);
    }

    /**
     * Abre la pagina de Blog
     */
    public function blog()
    {
        $posts = Post::where('type', 'post')->orderBy('created_at','desc')->get();
        $menu = Menu::orderBy('position', 'asc')->get();
        return view('page.blog')->withPosts($posts)->withMenu($menu);
    }

    public function page($slug)
    {
        $post = Post::where('slug', $slug)->first();
        if (!isset( $post )){
          return view('errors.503');
        }
        $menu = Menu::orderBy('position', 'asc')->get();
        return view('page.single')->withPost($post)->withMenu($menu);
    }


    public function dashboard()
    {
        return view('page.dashboard');
    }

    public function typelogin()
    {
      if(Auth::user()){
        if ( Auth::user()->hasRole('Administrador') ){
          return view('page.dashboard');
        }

        if ( Auth::user()->hasRole('Colaborador') ){
          return view('page.dashboard');
        }

        if ( Auth::user()->hasRole('Cliente') ){
          return view('page.dashboard');
        }

        if ( Auth::user()->hasRole('Suscriptor') ){
          return view('page.dashboard');
        }
      } else {
        return view('errors.401');
      }
    }
}
