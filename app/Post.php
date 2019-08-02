<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Table name
    protected $table = 'posts';
    //Primary key
    public $primaryKey = 'id';
    //Timetamps
    public $timestamps = true;

    //one to one relacja. Jeden post moze byc tylko od 1 osoby
    public function user(){
        return $this->belongsTo('App\User');
    }
}
