<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;



    protected $table = 'documents';


    protected $fillable = [
        'user_id',
        'department_id',
        'folder_id',
        'name_doc',
        'path',
        'filesize',
        'mimetype',

     ];


     public function user(){

        return $this->belongsTo(User::class);

    }

    public function folder(){

        return $this->belongsTo(Folder::class);

    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
