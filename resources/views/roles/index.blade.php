@extends('adminlayouts.app')

@section('content')
<div class="row">
  <div class="section">
    <div class="col m1 hide-on-med-and-down">
      @include('incAdmin.sidebar')
    </div>
    <div class="col m11 s12">
      <div class="row">
        <h3 class="flow-text"><i class="material-icons">assignment_ind</i>  User Roles </h3>
        <!-- <h3 class="flow-text"><i class="material-icons">assignment_ind</i> Roles &amp; Permissions</h3> -->
        <div class="divider"></div>
      </div>
      <div class="row">
        <div class="col m8 s12">
           
          <!-- ====================== -->
          <div class="row">
            
            <div class="col m7 s12">
              <div class="card z-depth-2 hoverable">
                <div class="card-content">
                <h5 class="indigo-text">Roles</h5>
                <!-- <button data-target="modal1" class="btn waves-effect waves-light modal-trigger right">Add Role</button> -->
                 </h3>
                  <table class="striped">
                    <thead>
                      <tr>
                          <th>ID.</th>
                          <th>Role</th>
                      </tr>
                    </thead>

                    <tbody>
                    @if(count($roles) > 0)
                      @foreach($roles as $key => $role)
                      <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $role->name }}</td>
                      </tr>
                      @endforeach
                    @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ===================================================== -->
        <!-- <div class="col m4 s12">
          <div class="card z-depth-2 hoverable">
            <div class="card-content">
            <h5 class="indigo-text">Permissions</h5>
            <button data-target="modal2" class="btn waves-effect waves-light modal-trigger right">Add Permission</button>
              <table class="striped">
                <thead>
                  <tr>
                      <th>ID.</th>
                      <th>Permission</th>
                  </tr>
                </thead>

                <tbody>
                <tbody>
                    @if(count($p) > 0)
                      @foreach($p as $key => $role)
                      <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $role->name }}</td>
                      </tr>
                      @endforeach
                    @endif
                </tbody>
              </table>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<!-- Modal Structure -->
<div id="modal1" class="modal">
  <div class="modal-content">
    <h4>Add Role</h4>
    <div class="divider"></div>
    <div class="row">

    <form action="{{url('admin/roles')}}" method="POST" enctype="multipart/form-data">
    @csrf
    
     <div class="mb-4">
       <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="rolename" type="text" placeholder="Enter Role Name">
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
    <h4>Add Permission</h4>
    <div class="divider"></div>
    <div class="row">

    <form action="{{url('permissions')}}" method="POST" enctype="multipart/form-data">
    @csrf
    
     <div class="mb-4">
       <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="permissionname" type="text" placeholder="Enter Role Name">
     </div>
      


     <div class="flex items-center justify-between">
     <button type="submit" class="btn btn-success">Create</button>
       
    </div>
     </form>
    </div>
  </div>
</div>
@endsection
