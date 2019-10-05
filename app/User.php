<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail; // potwierdzenie maila
use App\Notifications\VerifyEmail; // spersonalizowany mail w celu aktywacji


// class User extends Authenicatable implements MustVerifyEmail
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // user moze miec wiele postow
    public function posts(){
        return $this->hasMany('App\Post');
        // $this->hasMany(Post::class)
    }

    public function roles(){
        // user_role to nazwa tabeli create_user_roles migration
        return $this->belongsToMany('App\Roles', 'user_role', 'users_id', 'roles_id');
    }

    // skad ten parametr $roles?
    public function hasAnyRole($roles) {
        if(is_array($roles)){
            foreach($roles as $role)
                if($this->hasRole($role)){
                    return true;
            }
        } else {
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }

    public function hasRole($role) {
        if($this->roles()->where('name', $role)->first()){
            return true;
        }
    }

    // w celu personalizacji mojego maila nadpisujemy funkcje
    //sendEmailVerificationNotification() i podaje szablon Notification,
    // tutaj jest to VerifyEmail
    public function sendEmailVerificationNotification(){
        $this->notify(new VerifyEmail);
    }

}
