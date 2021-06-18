<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        // $users = DB::table('users')
        //             ->select('users.id', 'users.name', 'users.status')
        //             ->where('users.status', '=', '1')
        //             ->orderBy('name','ASC')//DESC e ASC
        //             //->oldest('name')//ASC
        //             //->latest('name')//DESC
        //             //->inRandomOrder()
        //             ->limit(10)
        //             ->offset(10)
        //             ->get();

        // foreach($users as $user){
        //     echo "#{$user->id} Nome: {$user->name} {$user->status}<br>";
        // }

        // $users = DB::table('users')
        //             ->selectRaw('users.id, users.name, CASE WHEN users.status = 1 THEN "ATIVO" ELSE "INATIVO" END status_description')
        //             ->whereRaw('(SELECT COUNT(1) FROM addresses a WHERE a.user = users.id) > 2')
        //             ->whereRaw('users.status = 1')
        //             ->orderBy('updated_at - created_at', 'ASC')
        //             ->get();

        // $users = DB::select(DB::raw('SELECT users.id, users.name, 
        //                 CASE WHEN users.status = 1 
        //                     THEN "ATIVO"
        //                     ELSE "INATIVO" 
        //                 END status_description 
        //                 FROM users 
        //                 WHERE (SELECT COUNT(1) FROM addresses a WHERE a.user = users.id) > 2 
        //                     AND users.status = :userStatus
        //                 ORDER BY updated_at - created_at ASC'), ['userStatus' => '1']
        //             );
        // foreach($users as $user){
        //     echo "#{$user->id} Nome: {$user->name} {$user->status_description}<br>";
        // }

        DB::table('users')->where('id','<', '500')->chunkById(100, function($users){
            foreach($users as $user){
                echo "#{$user->id} Nome: {$user->name} {$user->status}<br>";
            }
            
            echo "Encerrou um ciclo!<br><br>";
        });
    }
}
