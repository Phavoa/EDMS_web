<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $table = 'folders';

    protected $fillable = [
        'name',
        'user_id',
        'department_id',
        'parent_id'
    ];


    protected function department(){

        return $this->belongsTo(Department::class);

    }

    protected function user(){

        return $this->belongsTo(User::class);

    }



    public function parent(){
        return $this->belongsTo(Folder::class,'parent_id');

    }


    public function children(){
        return $this->hasMany(Folder::class,'parent_id');

    }

    public function documents(){
        return $this->hasMany(Document::class);


    }
}
