<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function forceDelete($post)
    {
        Post::onlyTrashed()->where(['id' => $post])->forceDelete();
        return redirect()->route('posts.trashed');
    }

    public function restore($post){
        $post = Post::onlyTrashed()->where(['id' => $post])->first();
        if($post->trashed()){
            $post->restore();//vem do App\Post
        }
        return redirect()->route('posts.trashed');
    }

    public function trashed(){
        $posts = Post::onlyTrashed()->get();
        return view('posts.trashed', ['posts' => $posts]);
    }

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
        //$posts = Post::withTrashed()->get(); // retorna todos mais os q tao na lixeira
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
       $post = new Post;
       $post->title = $request->title;
       $post->subtitle = $request->subtitle;
       $post->description = $request->description;
       $post->save();

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

        // $post = Post::firstOrCreate([
        //     'title' => 'teste4',
        //     'description' => 'teste4'
        // ],[
        //     'subtitle' => 'teste4',
        // ]);
        
        return redirect()->route('posts.index');

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
        //['variavel q tem q usar na view']
        return view('posts.edit', ['post' => $post]);
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
        //$post = new Post;
        $post = Post::find($post->id);
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->description = $request->description;
        $post->save();

        // $post = Post::updateOrCreate([
        //     'title' => 'teste5'
        // ],[
        //     'subtitle' => 'teste6',
        //     'description' => 'teste6',
        // ]);

        //edita um coletivo -- update([CAMPO => EDIÇÃO])
        //Post::where('created_at', '>=', date('Y-m-d H:i:s'))->update(['description' => 'teste']);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //Post::find($post->id)->delete();
        //Post::destroy([2, 3]);
        Post::destroy($post->id);
        //Post::where('created_at', '>=', date('Y-m-d H:i:s'))->delete();
        return redirect()->route('posts.index');
    }
}
