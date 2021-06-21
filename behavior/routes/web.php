<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/log', function (){
    //Log::channel()->info('teste');
    //Log::stack(['stack', 'daily'])->info('teste');
    Log::stack(['daily'])->error('teste');
});

Route::get('/session', function(){

    //Session::

    //session('', '')->;

    session([
        'course' => 'LaraDev'
    ]);

    session()->put('name', 'Gustavo Web');

    //echo session('name');
    //echo session('student', 'Anônimo');
    // echo session('student', function(){
    //     /// qualquer regra
    //     session()->put('student', 'Gustavo Web');
    //     return session('student');
    // });

    // echo session()->get('name', function(){

    // });

    //session()->push('time', 'Gustavo Web');//adiciona nova posição a mais

    // $student = session()->pull('student');//adiciona e remove

    // echo $student;

    // session()->forget('name');//esquece, exclui

    //session()->flush();//exclui tudo

    // if(session()->has('course')){ // ve se existe ou null
    //     echo "O curso selecionado foi: " . session()->get('course');
    // }

    // if(session()->exists('student')){ // ve se existe só
    //     echo "Esse índice existe!";
    // } else {
    //     echo "Esse índice não existe!";
    // }

    session()->flash('message', 'O artigo foi publicado com sucesso!');
    session()->reflash();

    var_dump(dd(session()->all()));
});