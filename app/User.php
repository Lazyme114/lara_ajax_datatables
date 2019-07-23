<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    private static $instance;

    public static function getInstance()
    {
        if (!isset(self::$instance))
            self::$instance = new User();
        return self::$instance;
    }

    public function manageUsersListByLimit($offset, $limit, $column, $direction , $searchValue, $extraSearch)
    {
        if ($searchValue == '') {
            return User::whereRaw($extraSearch)
                ->skip($offset)->take($limit)
                ->orderBy($column, $direction)
                ->get()
                ->toArray();

        } else {
            return User::whereRaw($extraSearch)
                ->skip($offset)->take($limit)
                ->where(function ($query) use ($searchValue) {
                    $query->where('id', 'like', '%' . $searchValue . '%')
                        ->orWhere('name', 'like', '%' . $searchValue . '%')
                        ->orWhere('email', 'like', '%' . $searchValue . '%');
                })
                ->orderBy($column, $direction)
                ->toArray();
        }
    }

    public function fetchUserListCount($searchValue, $extraSearch)
    {
        if ($searchValue != '')
            return User::whereRaw($extraSearch)
                ->where(function ($query) use ($searchValue) {
                    $query->where('id', 'like', '%' . $searchValue . '%')
                        ->orWhere('name', 'like', '%' . $searchValue . '%')
                        ->orWhere('email', 'like', '%' . $searchValue . '%');
                })
                ->count();
        else
            return User::whereRaw($extraSearch)
                ->count();
    }
}
