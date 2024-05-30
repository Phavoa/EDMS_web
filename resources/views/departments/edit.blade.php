@extends('adminlayouts.app')

@section('content')
<div class="row">
  <div class="section">
    <div class="col m1 hide-on-med-and-down">
      @include('inc.sidebar')
    </div>
    <div class="col m11 s12">
      <div class="row">
        <h3 class="flow-text"><i class="material-icons">mode_edit</i> Edit Department
          <button data-target="modal1" class="btn waves-effect waves-light modal-trigger right">Add New</button>
        </h3>
        <div class="divider"></div>
      </div>
     <form action="{{url('/departments/update'.$dept->id)}}" method='PATCH' enctype="multipart/form-data">
      @csrf
      <div class="card z-depth-2">
        <div class="card-content">
          <div class="row">
            <div class="col m6 input-field">
             
              <form action="{{url('/departments/update'.$dept->id)}}" method='PATCH' enctype="multipart/form-data">
                @csrf
                
                <div class="mb-4">
                 <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="departmentname" type="text" placeholder="Enter Updated Department Name">
                   </div>
      
              
            </div>      
          </div>
          <div class="row">
          <div class="flex items-center justify-between">
            <button type="submit" class="btn btn-success">Update Dapartment</button>
       
            </div>
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal -->
<!-- Modal Structure -->
<div id="modal1" class="modal">
  <div class="modal-content">
    <h4>Add Department</h4>
    <div class="divider"></div>
    <div class="row">
     
    <form action="{{url('/departments/edit'.$dept->id)}}" method="UPDATE" enctype="multipart/form-data">
    @csrf
    
     <div class="mb-4">
       <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="departmentname" type="text" placeholder="Enter Department Name">
     </div>
      


     <div class="flex items-center justify-between">
     <button type="submit" class="btn btn-success">Create</button>
       
    </div>
     </form>
    </div>
  </div>
</div>
@endsection
