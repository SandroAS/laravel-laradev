<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";//Seleciona a tabela que vai relacionar
    protected $primaryKey = "id";

    public $timestamps = true;
    //public const CREATED_AT = "creation_date";
    //public const UPDATED_AT = "last_update";
    
    protected $fillable = ['title', 'subtitle', 'description'];
    protected $guarded = [];
}
