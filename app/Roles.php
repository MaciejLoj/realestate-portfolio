<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    public function users(){
        return $this->belongsToMany('App\User', 'user_role','roles_id','users_id');
        }
}
