<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        return view('index',[
            'posts'=> Post::all(),
            'recentPosts' => Post::orderBy('created_at','desc')->take(3)->get(),
            'firstTwoPosts' => Post::orderBy('created_at','desc')->take(2)->get(),
            'firstRecentPosts' => Post::orderBy('created_at','desc')->skip(2)->take(3)->get(),
            'PostAfterRecent' => Post::orderBy('created_at','desc')->skip(5)->first(),
            'PostsAfterRecent1' => Post::orderBy('created_at','desc')->skip(6)->take(2)->get(),
            'PostsAfterRecent2' => Post::orderBy('created_at','desc')->skip(8)->take(2)->get(),
            'PostsAfterRecent3' => Post::orderBy('created_at','desc')->skip(10)->take(2)->get(),
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'mostReadPosts'=> Post::orderBy('views','desc')->take(4)->get(),
            'mostRead'=> Post::orderBy('views','desc')->take(5)->get(),
            'featuredPosts'=> Post::orderBy('views','desc')->skip(5)->take(2)->get(),
        ]);
    }

    public function category($id){
        $category = Category::find($id);
        return view('category',[
            'Category' => $category,
            'categories' => Category::all(),
            'recentPosts' => Post::orderBy('created_at','desc')->take(3)->get(),
            'mostReadPosts'=> Post::orderBy('views','desc')->take(4)->get(),
            'tags' => Tag::all(),
            'PostNumber1' => $category->posts()->orderBy('created_at','desc')->first(),
            'secondPosts' => $category->posts()->orderBy('created_at','desc')->skip(1)->take(2)->get(),
            'Posts' => $category->posts()->orderBy('created_at','desc')->skip(3)->take(4)->get(),
        ]);
    }

    public function post($id){
        $post = Post::find($id);
        $post->increment('views');
        return view('post')->with('post',$post)->
                            with('categories',Category::all())
                            ->with('tags',Tag::all())
                            ->with('mostReadPosts',Post::orderBy('views','desc')->take(4)->get())
                            ->with('relatedPosts',$post->category->posts()->orderBy('created_at','desc')->take(2)->get())
                            ->with('recentPosts',Post::orderBy('created_at','desc')->take(3)->get());
    }

    public function tag($id){
        $Tag = Tag::find($id);
        return view('tag',[
            'Tag' => $Tag,
            'categories' => Category::all(),
            'recentPosts' => Post::orderBy('created_at','desc')->take(3)->get(),
            'mostReadPosts'=> Post::orderBy('views','desc')->take(4)->get(),
            'tags' => Tag::all(),
            'Posts' => $Tag->posts,
        ]);
    }

    public function contact(){
        $informations = [
            'phone' => '01099758332',
            'email' => 'ahmedadly132@gmail.com',
            'address' => 'El-Emam Elshaf3y, Cairo, Egypt'
        ];
        return view('contact')->with('categories',Category::all())
                                ->with('info',$informations);
    }
}
