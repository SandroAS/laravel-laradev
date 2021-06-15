<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $posts = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->orderBy('title','desc')->take(2)->get();
//        foreach($posts as $post){
//            echo "<h1>{$post->title}</h1>";
//            echo "<h2>{$post->subtitle}</h2>";
//            echo "<p>{$post->descriptions}</p>";
//            echo "<hr>";
//        }

//        $post = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->first();
//        $post = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->firstOrFail();

//        echo "<h1>{$post->title}</h1>";
//        echo "<h2>{$post->subtitle}</h2>";
//        echo "<p>{$post->descriptions}</p>";
//        echo "<hr>";

//        $post = Post::find(1);
//        echo "<h1>{$post->title}</h1>";
//        echo "<h2>{$post->subtitle}</h2>";
//        echo "<p>{$post->descriptions}</p>";
//        echo "<hr>";

//        $post = Post::findOrFail(99);
//        echo "<h1>{$post->title}</h1>";
//        echo "<h2>{$post->subtitle}</h2>";
//        echo "<p>{$post->descriptions}</p>";
//        echo "<hr>";

//          $posts = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->max('title');
          //count()//max('title')//min - sum - avg// todos voltam um unico registro
          
//        foreach($posts as $post){
//            echo "<h1>{$post->title}</h1>";
//            echo "<h2>{$post->subtitle}</h2>";
//            echo "<p>{$post->descriptions}</p>";
//            echo "<hr>";
//        }

        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Object -> Prop -> Save
//        $post = new Post;
//        $post->title = $request->title;
//        $post->subtitle = $request->subtitle;
//        $post->description = $request->description;
//        $post->save();

        /*Post::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description
        ]);*/

        // devolve o primeiro registro no banco dentro do solicitado
        // Post::firstOrNew([CONDIÇÃO],[SETAR OS CAMPOS]);
        // $post = Post::firstOrNew([
        //     'title' => 'teste2',
        //     'description' => 'teste3'
        // ],[
        //     'subtitle' => 'teste2',
        // ]);
        // $post->save();
        // var_dump($post);

        $post = Post::firstOrCreate([
            'title' => 'teste4',
            'description' => 'teste4'
        ],[
            'subtitle' => 'teste4',
        ]);
        
        var_dump(dd($post));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
