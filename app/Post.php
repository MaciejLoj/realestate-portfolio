<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Nazwa tabeli w bazie
    protected $table = 'posts';
    // Primary key
    public $primaryKey = 'id';
    // Timetamps
    public $timestamps = true;

    /* własności, które będą mogły zostać przekazane do nowej instancji
    tworzonej dzieki komendzie Post::create */
    protected $fillable = [
        'title',
        'body',
        'location',
        'street',
        'number_of_rooms',
        'area_sqm',
        'price',
        'market_type',
        'house_or_flat',
        'user_id',
        'cover_image',
    ];

    // Relacja one-to-one
    public function user(){
        return $this->belongsTo('App\User');
    }


}
