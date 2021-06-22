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

//use App\Jobs\welcomeLaraDev as JobsWelcomeLaraDev;

use App\Http\Middleware\checkParam;
use App\Mail\welcomeLaraDev;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/log', function (){
    //Log::channel()->info('teste');
    //Log::stack(['stack', 'daily'])->info('teste');
    Log::stack(['daily'])->info('teste');
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

    //session()->flash('message', 'O artigo foi publicado com sucesso!');
    //session()->reflash();

    var_dump(session()->all());
});

Route::get('/email', function(){

    $user = new stdClass();
    $user->name = "Gustavo Web";
    $user->email = "sandroantoniosouza98@gmail.com";

    $order = new stdClass();
    $order->type = "billet";//tipo boleto
    $order->due_at = "2021-01-10";
    $order->value = 697;

    //Mail::send(new welcomeLaraDev($user, $order));
    //return new welcomeLaraDev($user, $order);
});

Route::get('/email-queue', function(){

    $user = new stdClass();
    $user->name = "Gustavo Web";
    $user->email = "sandroantoniosouza98@gmail.com";

    $order = new stdClass();
    $order->type = "billet";//tipo boleto
    $order->due_at = "2021-01-10";
    $order->value = 697;

    //Mail::send(new welcomeLaraDev($user, $order));
    //return new welcomeLaraDev($user, $order);

    //\App\Jobs\welcomeLaraDev::dispatch($user, $order)->delay(now()->addSeconds(15));
});

Route::get('/files', function(){

    $files = Storage::files('');
    $allFiles = Storage::allFiles('');

    //Storage::makeDirectory('public/students');

    $directories = Storage::directories('');
    $allDirectories = Storage::allDirectories('');

    //Storage::makeDirectory('public/course');

    //Storage::deleteDirectory('public/students');

    //Storage::disk('public')->put('upinside.txt', 'O melhor curso do mercado é aqui!');
    //Storage::put('upinside-treinamentos.txt', 'O melhor curso do mercado é aqui!');//local dentro de app

    //echo Storage::get('upinside-treinamentos.txt');
    //return Storage::download('upinside-treinamentos.txt');

    // if(Storage::exists('upinside-treinamentos.txt')){
    //     echo "O arquivo existe!";
    // } else {
    //     echo "O arquivo não existe!";
    // }

    //echo Storage::size('upinside-treinamentos.txt');
    //echo Storage::lastModified('upinside-treinamentos.txt');

    //Storage::prepend('upinside-treinamentos.txt', 'UpInside Treinamentos');
    //Storage::append('upinside-treinamentos.txt', 'UpInside Treinamentos');

    //Storage::copy('upinside-treinamentos.txt', 'public/upinside-treinamentos.txt');
    //Storage::move('upinside-treinamentos.txt', 'public/upinside-treinamentos.txt');
    //Storage::delete('upinside-treinamentos.txt', 'public/upinside-treinamentos.txt');

    //var_dump($files, $allFiles, $directories, $allDirectories);
});

Route::resource('/imoveis', 'PropertyController');

//Route::get('teste-middleware', 'PropertyController@middle')->middleware(checkParam::class);
Route::get('teste-middleware', 'PropertyController@middle')->middleware('testemiddleware:admin,paid');