<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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

    protected $guarded = [];

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Group', 'group_user', 'user_id', 'group_id');
    }

    public function groupUserDate($user_obj, $role)
    {
        foreach($user_obj->groups as $group_val) {
            $group = $group_val->group;
        }

        if($role == 'admin') {
            $user_arr_date = [
                'name'     => $user_obj->name,
                'img'      => $user_obj->img,
                'birthday' => $user_obj->birthday,
                'phone'    => unserialize($user_obj->phone),
                'E-mail'   => $user_obj->email,
            ];
        } else {
            $user_arr_date = [
                'name'     => $user_obj->name,
                'img'      => $user_obj->img,
                'birthday' => $user_obj->birthday,
                'phone'    => unserialize($user_obj->phone),
                'E-mail'   => $user_obj->email,
                'group'    => $group
            ];
        }

        return $user_arr_date;
    }

}
