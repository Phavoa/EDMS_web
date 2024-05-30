@extends('adminlayouts.app')

@section('content')
<style>
  .card-content2 {
    padding: 10px 7px;
  }
  /* --- for right click menu --- */
  *,
  *::before,
  *::after {
    box-sizing: border-box;
  }
  .task i {
    color: orange;
    font-size: 35px;
  }
  /* context-menu */
  .context-menu {
    padding: 0 5px;
    margin: 0;
    background: #f7f7f7;
    font-size: 15px;
    display: none;
    position: absolute;
    z-index: 10;
    box-shadow: 0 4px 5px 0 rgba(0,0,0,0.14), 0 1px 10px 0 rgba(0,0,0,0.12), 0 2px 4px -1px rgba(0,0,0,0.3);
  }
  .context-menu--active {
    display: block;
  }
  .context-menu_items {
    margin: 0;
  }
  .context-menu_item {
    border-bottom: 1px solid #ddd;
    padding: 12px 30px;
  }
  .context-menu_item:last-child {
    border-bottom: none;
  }
  .context-menu_item:hover {
    background: #fff;
  }
  .context-menu_item i {
    margin: 0;
    padding: 0;
  }
  .context-menu_item p {
    display: inline;
    margin-left: 10px;
  }
  .unshow {
    display: none;
  }
</style>
<div class="row">
  <div class="section">
    <div class="col m1 hide-on-med-and-down">
      @include('User.incUser.sidebar')
    </div>
    <div class="col m11 s12">
      <div class="row">
        <h3 class="flow-text"><i class="material-icons">folder</i> Documents
        <button class="btn red waves-effect waves-light right tooltipped delete_all" data-url="{{ url('documentsDeleteMulti') }}" data-position="left" data-delay="50" data-tooltip="Delete Selected Documents"><i class="material-icons">delete</i></button>
        @can('upload')
          <a href="/documents/create" class="btn waves-effect waves-light right tooltipped" data-position="left" data-delay="50" data-tooltip="Upload New Document"><i class="material-icons">file_upload</i></a>
        @endcan
        </h3>
        <div class="divider"></div>
      </div>
      <div class="card z-depth-2">
        <div class="card-content">
       
          {{$document_view->name}}

          <iframe src="uploads/{{$name}}"></iframe>
       
          
        </div>
      </div>
    </div>
  </div>
</div>
<!-- right click menu -->
<div id="context-menu" class="context-menu">
  <ul class="context-menu_items">
    <li class="context-menu_item">
     
    </li>
    <li class="context-menu_item">
      <a href="{{url('/download',$folder->name)}}" class="context-menu_link" data-action="Download">
        <i class="material-icons">file_download</i><p>Download</p>
      </a>
    </li>
    <!-- <li class="context-menu_item">
      <a href="documents/15/edit" class="context-menu_link" data-action="Edit">
        <i class="material-icons">edit</i><p>Edit</p>
      </a>
    </li> -->
    <li class="context-menu_item">
      <a href="#" class="context-menu_link" data-action="Delete">
        <i class="material-icons">delete</i><p>Delete</p>
      </a>
    </li>
  </ul>
</div>



<!-- Modal -->
<!-- Modal Structure -->
<div id="modal1" class="modal">
  <div class="modal-content">
    <h4>Add Folder</h4>
    <div class="divider"></div>
    <div class="row">

    <form action="{{url('/user/documents/')}}" method="POST" enctype="multipart/form-data">
    @csrf
    
     <div class="mb-4">
       <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" type="text" placeholder="Enter Role Name">
     </div>

     
     


     <div class="flex items-center justify-between">
     <button type="submit" class="btn btn-success">Create</button>
       
    </div>
     </form>
    </div>
  </div>
</div>





<div id="modal2" class="modal">
  <div class="modal-content">
    <h4>Upload Document</h4>
    <div class="divider"></div>
    <div class="row">

    <form action="{{route('uploaddoc')}}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div>
  
  <input class="form-control form-control-lg"   name="docupload"   id="formFileLg" type="file">
</div>

       
     <div class="flex items-center justify-between">
     <button type="submit"     style="margin-top: 50px; border-radius:4px;"  class=" mt-5 btn btn-successs">Upload</button>
       
    </div>
     </form>
    </div>
  </div>
</div>






<!-- <div id="modal3" class="modal">
  <div class="modal-content">
   <h4>Upload D ocument</h4>
    <div class="divider"></div>
    <div class="row">
   
    
     </form>
    </div>
  </div>
</div> -->
@endsection
