<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class secondleveluploaddoc extends Model
{
    use HasFactory;




    protected $table = 'secondleveluploaddoc';
   
    	
    protected $fillable = [
        'name',
        'user_id',
        'department_id',
        'file',
        'filesize',
        'mimetype',
        'exe'
     ];


     public function user(){

        return $this->belongsTo(User::class);

    }

}
