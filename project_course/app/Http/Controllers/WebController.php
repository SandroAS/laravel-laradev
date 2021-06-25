<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home()
    {
        $posts = Post::orderBy('created_at', 'DESC')->limit(3)->get();
        $head = $this->seo->render(
            env('APP_NAME') . ' - UpInside Treinamentos',//Título
            'Eleita a melhor escola de desenvolvimento, programação e marketing digital em mais de 17 países pela Latin Quality American Institute!',//Descrição
            url('/'),//Url
            asset('images/img_bg_1.jpg'),//Image
        );
        return view('front.home', [
            'head' => $head,
            'posts' => $posts,
        ]);
    }

    public function course()
    {
        $head = $this->seo->render(
            env('APP_NAME') . ' - Sobre o curso',//Título
            'Um treinamento completo do zero ao developer para você aprender e se espercializar no Laravel e abrir as portas de um mercado repleto de oportunidades!',//Descrição
            route('course'),//Url
            asset('images/img_bg_1.jpg'),//Image
        );
        return view('front.course', [
            'head' => $head
        ]);
    }

    public function blog()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        $head = $this->seo->render(
            env('APP_NAME') . ' - Sobre o blog',//Título
            'Descrição do Blog',//Descrição
            route('blog'),//Url
            asset('images/img_bg_1.jpg'),//Image
        );
        return view('front.blog', [
            'head' => $head,
            'posts' => $posts,
        ]);
    }

    public function article($uri)
    {
        $post = Post::where('uri', $uri)->first();
        $head = $this->seo->render(
            env('APP_NAME') . ' - ' . $post->title,//Título
            $post->subtitle,//Descrição
            route('article', $post->uri),//Url
            \Illuminate\Support\Facades\Storage::url(\App\Support\Cropper::thumb($post->cover, 1200, 628)),//Image
        );

        return view('front.article', [
            'head' => $head,
            'post' => $post,
        ]);
    }

    public function contact()
    {
        return view('front.contact');
    }
}
