<?php

namespace App\Http\Controllers;

use App\Support\Seo;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home()
    {
        $head = $this->seo->render(
            env('APP_NAME') . ' - UpInside Treinamentos',//Título
            'Eleita a melhor escola de desenvolvimento, programação e marketing digital em mais de 17 países pela Latin Quality American Institute!',//Descrição
            url('/'),//Url
            asset('images/img_bg_1.jpg'),//Image
        );
        return view('front.home', [
            'head' => $head
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
        $head = $this->seo->render(
            env('APP_NAME') . ' - blog',//Título
            'Um treinamento completo do zero ao developer para você aprender e se espercializar no Laravel e abrir as portas de um mercado repleto de oportunidades!',//Descrição
            route('blog'),//Url
            asset('images/img_bg_1.jpg'),//Image
        );
        return view('front.blog', [
            'head' => $head
        ]);
    }

    public function article()
    {
        return view('front.article');
    }

    public function contact()
    {
        return view('front.contact');
    }
}
