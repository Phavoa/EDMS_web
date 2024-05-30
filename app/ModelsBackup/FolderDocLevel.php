<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FolderDocLevel extends Model
{
    use HasFactory;
    protected $table = '_folder_doc_levels';
   
    protected $fillable = [
        'foldername',
        'type',
        'folder_id',
        'user_id',
        'department_id',
     ];
}
