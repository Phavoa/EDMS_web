<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class secondlevelfolder extends Model
{
    use HasFactory;



      
    protected $table = 'secondlevelfolder';

    protected $fillable = [
        'name',
        'user_id',
        'department_id'
        
    ];

    public function department(){

        return $this->belongsTo(Department::class);

    }

    public function user(){

        return $this->belongsTo(User::class);

    }


    
    public function firstlevel(){

        return $this->hasMany(Folder::class);

    }



}
