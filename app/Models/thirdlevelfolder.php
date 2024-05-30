<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thirdlevelfolder extends Model
{
    use HasFactory;


        
    protected $table = 'thirdlevelfolder';

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
}
