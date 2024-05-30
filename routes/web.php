<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminFolderController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\UserFoldersController;
use App\Http\Controllers\FolderlevelsController;


use App\Http\Controllers\UploadmangerController;
use App\Http\Controllers\DocumentsUserController;
use App\Http\Controllers\SecondLevelFolderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/user/dashboard', function () {
    return view('User.dashboard');
})->middleware(['auth', 'verified'])->name('User.dashboard');



// admin department view
Route::resource('admin/departments',DepartmentsController::class);

// admin department view
Route::resource('admin/documents',AdminFolderController::class);

// // User department view
// Route::resource('user/documents',DocumentsUserController::class);




Route::get('/upload', [App\Http\Controllers\UploadmangerController::class, 'index'])->name('showuploaddoc_second_level');
Route::post('/uploadoc_second_level', [App\Http\Controllers\UploadmangerController::class, 'store']);


Route::get('/upload', [App\Http\Controllers\ThirdLevelUploadManagerController::class, 'index'])->name('showuploaddoc');
Route::post('/uploadoc_third_level', [App\Http\Controllers\ThirdLevelUploadManagerController::class, 'store']);
// Route::post('/folders/{folder_id}/upload', [App\Http\Controllers\UploadmangerController::class, 'upload'])->name('upload');

//Tega uncomment please

// Route::get('/user/document', [App\Http\Controllers\DocumentsUserController::class, 'index']);
// Route::get('/user/documents/{name}', [App\Http\Controllers\DocumentsUserController::class, 'show']);
// Route::get('/user/documents/{name}', [App\Http\Controllers\FoldersController::class, 'index']);
// Route::get('/user/secondlevel/{name}', [App\Http\Controllers\FoldersController::class, 'show']);



Route::get('/download/{name_doc}', [App\Http\Controllers\DocumentsUserController::class, 'downloadFile']);


Route::get('/view/{name_doc}', [App\Http\Controllers\DocumentsUserController::class, 'viewFile']);




///Folder Section!!!
Route::post('/user/folder/create', [App\Http\Controllers\UserFoldersController::class, 'store']);



//Route::get('/{department}/uploaddocument', [App\Http\Controllers\FirstLevelFolderController::class, 'uploaddocument']);




// Route::resource('/user/documents/{name}',UserDocLevelController::class);



// Route::resource('user/folders',UserFoldersController::class);





Route::resource('user/secondlevelfolder',SecondLevelFolderController::class);



// roles
Route::resource('admin/roles',RolesController::class);

// admin users
Route::resource('admin/users',UsersController::class);

//permissions
Route::resource('permissions',PermissionsController::class);

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

//Tega


Route::get('/user/document', [DocumentsUserController::class, 'index'])->name('user.documents.index');

Route::get('/user/document/{folder}', [DocumentsUserController::class, 'show'])->name('user.documents.show');
Route::post('/user/document', [DocumentsUserController::class, 'store'])->name('user.documents.store');
Route::post('/user/document/{folder}/files', [DocumentsUserController::class, 'storeFile'])->name('user.documents.storeFile');
Route::post('/user/document/{folder}/folders', [DocumentsUserController::class, 'storeFolder'])->name('user.documents.storeFolder');

Route::put('/user/document/{folder}', [DocumentsUserController::class, 'update'])->name('user.documents.update');


Route::delete('/user/document/{folder}', [DocumentsUserController::class, 'destroy'])->name('folders.destroy');





// Route::get('/user/document/create', [DocumentsUserController::class, 'create'])->name('user.documents.create');
require __DIR__.'/adminauth.php';
