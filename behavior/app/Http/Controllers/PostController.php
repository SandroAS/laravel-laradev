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
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        echo "#{$post->id} Título: {$post->title}<br>";
        echo "Subtítulo: {$post->subtitle}<br>";
        echo "Conteúdo: {$post->description}<br><hr>";

        $postAuthor = $post->author()->get()->first();

        if($postAuthor){
            echo "<h1>Dados do Usuário</h1><br>";
            echo "Nome do usuário: {$postAuthor->name}<br>";
            echo "E-mail: {$postAuthor->email}<br>";
        }

        $postCategories = $post->categories()->orderBy('id', 'ASC')->get();
        
        if($postCategories){
            echo "<h1>Categorias</h1><br>";

            foreach($postCategories as $category){
                echo "Categoria: #{$category->id} {$category->name}<br>";
            }
        }

        //$post->categories()->attach([4]); //adiciona
        //$post->categories()->detach([4]); //remove
        //$post->categories()->sync([5, 10]); //remove td e adiciona
        //$post->categories()->syncWithoutDetaching([5, 6, 7]); //adiciona sem repetir

        // $post->comments()->create([
        //     'content' => 'Teste de comentário 123'
        // ]);

        $comments = $post->comments()->get();

        if($comments){
            echo "<h1>Comentários</h1><br>";

            foreach($comments as $comment){
                echo "Comentário: #{$comment->id} {$comment->content}<br>";
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
