<?php

namespace App\Models;
use Spatie\Permission\Models\Role;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
     
    
    
    
    
    
    
    
     protected $fillable = [
        'fname',
        'lname',
        'gender_id',
        'email',
        'password',
        'department_id',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function gender(){

        return $this->belongsTo(Gender::class);

    }

    public function role(){

        return $this->belongsTo(Role::class);

    }


    public function folder(){

        return $this->hasMany(Folder::class);

    }
}
