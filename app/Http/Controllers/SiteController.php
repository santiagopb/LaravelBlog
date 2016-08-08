<?php

namespace Cronti\Http\Controllers;

use Illuminate\Http\Request;
use Cronti\Http\Requests;
use Auth;
use Cronti\Post;
use Cronti\Menu;
use Cronti\Product;
use Cronti\Cart;
use Session;

class SiteController extends Controller
{
    public function getSingle($slug) {
        $post = Post::where('slug', '=', $slug)->first();
        if (!isset( $post )){
            return view('errors.503');
        }
        return view('post.single')->withPost($post);
    }

    /**
     * Abre la pagina de Blog
     */
    public function blog()
    {
        $posts = Post::where('type', 'post')->orderBy('created_at','desc')->get();
        $menu = Menu::orderBy('position', 'asc')->get();
        return view('site.blog')->withPosts($posts)->withMenu($menu);
    }


    public function addtocart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function showcart()
    {
        if (!Session::has('cart')){
          return view ('site.showcart');
        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        return view ('site.showcart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }


    public function page($slug)
    {
        if ($slug == 'site'){ return view('layouts.site'); }
        if ($slug == 'sales'){ return view('layouts.sales'); }

        if ($slug =='shop'){
          $products = Product::where('public', true)->get();
          return view('site.shop')->withProducts($products);
        }

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
          return redirect()->back();
        }

        if ( Auth::user()->hasRole('Suscriptor') ){
          return redirect()->back();
        }
      } else {
        return view('errors.401');
      }
    }
}
