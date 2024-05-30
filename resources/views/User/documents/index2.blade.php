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
        <!-- <button class="btn red waves-effect waves-light right tooltipped delete_all" data-url="{{ url('documentsDeleteMulti') }}" data-position="left" data-delay="50" data-tooltip="Delete Selected Documents"><i class="material-icons">delete</i></button> -->
        @can('upload')
          <a href="/documents/create" class="btn waves-effect waves-light right tooltipped" data-position="left" data-delay="50" data-tooltip="Upload New Document"><i class="material-icons">file_upload</i></a>
        @endcan
        </h3>
        <div class="divider"></div>
      </div>
      <div class="card z-depth-2">
        <div class="card-content">
          <!-- Switch -->
          <div class="switch" style="margin-bottom: 2em;">
          <button data-target="modal2" class="btn waves-effect waves-light modal-trigger right">Upload Document</button>
            <label>
              Grid View
              <input type="checkbox">
              <span class="lever"></span>
              Table View
            </label>
            <button data-target="modal1" class="btn waves-effect waves-light modal-trigger right">Create Folder</button>
          </div>
          <!-- FOLDER View -->
          <div id="folderView">
            <div class="row">
              <form action="/sort" method="post" id="sort-form">
                {{ csrf_field() }}
                 
              </form>
              <form action="/search" method="post" id="search-form">
                {{ csrf_field() }}
                <div class="input-field col m4 s12 right">
                  <i class="material-icons prefix">search</i>
                  <input type="text" name="search" id="search" placeholder="Search Here ...">
                  <label for="search"></label>
                </div>
              </form>
            </div>
            <br>
            <div class="row">
              @if(count($second_level_folder) > 0)
                @foreach($second_level_folder as $folder)
                <div class="col m2 s6" id="tr_{{$folder->id}}">
                  <div class="card hoverable indigo lighten-5 task" data-id="{{ $folder->id }}">
                    <input type="checkbox" class="filled-in sub_chk" id="chk_{{$folder->id}}" data-id="{{$folder->id}}">
                    <label for="chk_{{$folder->id}}"></label>
                    <a href="/user/secondlevel/{{$folder->name}}">
                      <div class="card-content2 center">

                      <img
                        
                        src="{{ asset('folders/folder.svg') }}"

                        alt="folder"
                        />

                        <h6>{{$folder->name }}</h6> 
                   
                      <!-- <a href="{{url('/download',$folder->name)}}" class="context-menu_link" data-action="Download">
                        <i class="material-icons">file_download</i><p>Download</p>
                      </a> -->

                    
                      <!-- <i class="fa-solid fa-file"></i>
                        <h6>{{$folder->name }}</h6> -->
                         
                      </div>
                    </a>
                  </div>
                </div>

                
                <!-- ----------------------------File view----------------------------------------------- -->
              
                         

<!----------------------------------------------------------end---------------------->




                @endforeach
              @else
                <h5 class="teal-text">No Document has been uploaded</h5>
              @endif






                <!------------------- Upload Document Section ---------------------------->






              @if(count($secondleveluploaddoc) > 0)
                @foreach($secondleveluploaddoc as $folder)
                <div class="col m2 s6" id="tr_{{$folder->id}}">
                  <div class="card hoverable indigo lighten-5 task" data-id="{{ $folder->id }}">
                    <input type="checkbox" class="filled-in sub_chk" id="chk_{{$folder->id}}" data-id="{{$folder->id}}">
                    <label for="chk_{{$folder->id}}"></label>
                    <a href="/user/documents/{{$folder->name}}">
                      <div class="card-content2 center">
                   
                       <div class="col-3">
                          <a href="{{url('/download',$folder->name)}}" class="context-menu_link" data-action="Download">
                            <i class="material-icons">file_download</i><p>Download</p>
                          </a>
                       </div>

                       <div class="col-6">
                       <a href="{{url('/view',$folder->name)}}" class="context-menu_link" data-action="View"> 
                       <i class="material-icons" style="font-size:36px">remove_red_eye</i><p>View</p>
                      </a>
                       </div>




                    
                     <i class="fa-solid fa-file"></i>
                        <h6>{{$folder->name }}</h6>
                         
                      </div>
                    </a>
                  </div>
                </div>

                
                <!-- ----------------------------File view----------------------------------------------- -->
              
                         

<!----------------------------------------------------------end---------------------->




                @endforeach
              @else
                <h5 class="teal-text">No Document has been uploaded</h5>
              @endif

                 

               
   <div id="modal2" class="modal">
        <div class="modal-content">
          <h4>Upload Document</h4>
          <div class="divider"></div>
          <div class="row">

          <form action="{{url('/uploadoc_second_level')}}" method="post" enctype="multipart/form-data">
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
               


            </div>
          </div>














          <!-- TABLE View -->
          <div id="tableView" class="unshow">
            <div class="row">
              <table class="bordered centered highlight responsive-table" id="myDataTable">
                <thead>
                  <tr>
                      <th></th>
                      <th>File Name</th>
                      <th>Owner</th>
                      <th>Department</th>
                      <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                  
                  @if(count($second_level_folder) > 0)
                      @foreach($second_level_folder as $folder)
                      <tr id="tr_{{$folder->id}}">
                        <td>
                          <input type="checkbox" id="chk_{{ $folder->id }}" class="sub_chk" data-id="{{$folder->id}}">
                          <label for="chk_{{$folder->id }}"></label>
                        </td>
                        <td>{{$folder->name}}</td>
                        <td> {{$folder->user->fname}} {{$folder->user->lname}}</td>
                        <td>{{$folder->department->departmentname}}</td>  
                        <td>{{$folder->created_at}}</td>  
                         
                        
                        </td>
                      </tr>

                     
                      @endforeach
                    @else
                      <tr>
                        <td colspan="6"><h5 class="teal-text">No Document has been uploaded</h5></td>
                      </tr>
                    @endif
                    
                  </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- right click menu -->




<!-- Modal -->
<!-- Modal Structure -->
<div id="modal1" class="modal">
  <div class="modal-content">
    <h4>Add Folder</h4>
    <div class="divider"></div>
    <div class="row">

   

    <form action="{{url('user/secondlevelfolder')}}" method="POST" enctype="multipart/form-data">
    @csrf
    
     <div class="mb-4">
       <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" type="text" placeholder="Enter Folder Name">
     </div>

     <div class="flex items-center justify-between">
     <button type="submit" class="btn btn-success">Create</button>
       
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
