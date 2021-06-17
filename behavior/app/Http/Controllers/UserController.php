<?php

namespace App\Http\Controllers;

use App\Address;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $user = User::find($id);

        echo "<h1>Dados do Usuário</h1><br>";
        echo "Nome do usuário: {$user->name}<br>";
        echo "E-mail: {$user->email}<br>";

        $userAddress = $user->addressDelivery()->get()->first();
        
        if ($userAddress){
            echo "<h1>Endereço de Entrega</h1><br>";
            echo "Endereço: {$userAddress->address}, {$userAddress->number}<br>";
            echo "Complemento: {$userAddress->complement} CEP: {$userAddress->zipcode}<br>";
            echo "Cidade/Estado: {$userAddress->city}/{$userAddress->state}<br>";
        }

        $addressTest = new Address([
            'address' => 'Rua dos Bobos 111',
            'number' => '0',
            'complement' => 'Apto 123',
            'zipcode' => '88000-000',
            'city' => 'Floripa',
            'state' => 'SC'
        ]);

        $address = new Address();
        $address->address = 'Rua dos Bobos 222';
        $address->number = '123';
        $address->complement = 'Casa 2';
        $address->zipcode = '87000-000';
        $address->city = 'Florianópolis';
        $address->state = 'Santa Catarina';

        //$user->addressDelivery()->save($address);

        //$user->addressDelivery()->saveMany([$addressTest, $address]);

        // $user->addressDelivery()->create([ //modelo n valida na tratativa de dados
        //     'address' => 'Rua dos Bobos 111',
        //     'number' => '0',
        //     'complement' => 'Apto 123',
        //     'zipcode' => '88000-000',
        //     'city' => 'Floripa',
        //     'state' => 'SC'
        // ]);

        // $user->addressDelivery()->createMany([[
        //     'address' => 'Rua dos Bobos 333',
        //     'number' => '0',
        //     'complement' => 'Apto 123',
        //     'zipcode' => '88000-000',
        //     'city' => 'Floripa',
        //     'state' => 'SC'
        // ], [
        //     'address' => 'Rua dos Bobos 444',
        //     'number' => '0',
        //     'complement' => 'Apto 123',
        //     'zipcode' => '88000-000',
        //     'city' => 'Floripa',
        //     'state' => 'SC'
        // ]]);

        // $users = User::with('addressDelivery')->get(); //nao usar em loop ou pra renderizar mts dados numa unica pagina
        // dd($users);

        $posts = $user->posts()->orderBy('id', 'DESC')->take(2)->get();
        if($posts){
            echo "<h1>Artigos</h1><br>";

            foreach($posts as $post){
                echo "#{$post->id} Título: {$post->title}<br>";
                echo "Subtítulo: {$post->subtitle}<br>";
                echo "Conteúdo: {$post->description}<br><hr>";
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
