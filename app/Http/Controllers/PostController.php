<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    public function index(){
        // $allposts = [
        //     ['id' => 1 , 'title'=> 'alexandria' , 'posted_by' => 'ali', 'created_at' => '2020-04-02'],
        //     ['id' => 2 , 'title'=> 'cairo' , 'posted_by' => 'mohamed', 'created_at' => '2020-05-11'],
        //     ['id' => 3 , 'title'=> 'monofia' , 'posted_by' => 'ahmed', 'created_at' => '2025-11-02'],
        //     ['id' => 4 , 'title'=> 'mansoura' , 'posted_by' => 'adel', 'created_at' => '2120-03-12']
        // ];

        $postsfromDB = Post::all();

        // return view('index',['posts'=> $postsfromDB]);
        return view('posts/index')->with('posts',$postsfromDB);

    }

    public function show($id){
        // $post = Post::where('id',$id);
        $post = Post::findOrFail($id);
        return View('posts/show')->with('post',$post);
    }

    public function create(){
        return View('posts/create');
    }

    public function store(){
        $post = new post;
        $post->title = request()->input('title');
        $post->description = request()->input('description');
        $post->save();
        return redirect(route('posts.index'));
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        return View('posts/edit')->with('post',$post);
    }

    public function update($id){
        $post = Post::findOrFail($id);
        $post->title = request()->title;
        $post->description = request()->description;
        $post->save();
        return redirect(route('posts.index'));
    }

    public function delete($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect(route('posts.index'));
    }

}
