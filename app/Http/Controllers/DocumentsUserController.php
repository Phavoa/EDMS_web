<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Folder;
use Illuminate\Http\Request;

class DocumentsUserController extends Controller
{
    public function index(Request $request)
    {
        $user_department_id = Auth::user()->department_id;
        $folders = Folder::where('department_id', $user_department_id)->whereNull('parent_id')->get();
        $parent_id = $request->query('parent_id');

        return view('User.documents.index', compact('folders', 'parent_id'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:folders,id',
        ]);

        Folder::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
            'department_id' => Auth::user()->department_id,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('user.documents.index')->with('success', 'Folder created successfully.');
    }

    public function show(Folder $folder)
{
    $folder->load('children', 'documents');
    return view('User.documents.show', compact('folder'));
}


    public function storeFolder(Request $request, Folder $folder)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Folder::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
            'department_id' => Auth::user()->department_id,
            'parent_id' => $folder->id,
        ]);

        return redirect()->route('user.documents.show', $folder->id)->with('success', 'Subfolder created successfully.');
    }

    public function storeFile(Request $request, Folder $folder)
    {
        $request->validate([
            'file' => 'required|file',
        ]);

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $path = $file->storeAs('documents', $fileName);
        $cleanPath = preg_replace('/^documents\//', '', $path);

        Document::create([
            'user_id' => Auth::id(),
            'department_id' => Auth::user()->department_id,
            'folder_id' => $folder->id,
            'name_doc' => $file->getClientOriginalName(),
            'path' => $cleanPath,
            'mimetype' => $file->getClientMimeType(),
            'filesize' => $file->getSize(),
        ]);

        return redirect()->route('user.documents.show', $folder->id)->with('success', 'File uploaded successfully.');
    }

    public function update(Request $request, Folder $folder)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:folders,id',
        ]);

        $folder->update($request->all());

        return redirect()->back()->with('success', 'Folder updated successfully.');
    }


    public function destroy(Folder $folder)
{
    $parentId = $folder->parent_id;
    $folder->delete();

    // if ($parentId === null) {
    //     return redirect()->route('user.documents.index')->with('success', 'Folder deleted successfully.');
    // } else {
    //     return redirect()->route('user.documents.show', $parentId)->with('success', 'Folder deleted successfully.');
    // }
    return redirect()->back()->with('success', 'Folder deleted successfully.');
}


    public function downloadFile(Request $request , $name_doc)
    {
        $fullPath = storage_path('app/'.'/documents'.'/' .$name_doc);

        return response()->download($fullPath);
     }


     public function viewFile(Request $request, $name_doc)
     {
        return response()->file(storage_path('app\\'.'documents'.'\\'.$name_doc), [
            'Content-Type' => 'application/pdf',
        ]);
      }


}
