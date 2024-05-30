@extends('adminlayouts.app')

@section('content')
<div class="row">
  <div class="section">
    <div class="col m1 hide-on-med-and-down">
      @include('incAdmin.sidebar')
    </div>
    <div class="col m11 s12">
      <div class="row">
        <h3 class="flow-text"><i class="material-icons">person</i> Users
          <button data-target="modal1" class="btn modal-trigger right">Add New</button>
        </h3>
        <div class="divider"></div>
      </div>
      <div class="card z-depth-2">
        <div class="card-content">
          <table class="bordered centered highlight" id="myDataTable">
            <thead>
              <tr>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Gender</th>
                  <th>Role</th>
                  <th>Department</th>
                  <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            @if(count($users) > 0)
                @foreach($users as $user)
                  @if(!$user->hasRole('Root'))
                  <tr>
                    <td>{{ $user->fname }}</td>
                    <td>{{ $user->lname }}</td>
                    <td>{{ $user->gender->gendername}}</td>
                    <td>{{ $user->role->name}}</td>
                    <td>{{ $user->department->departmentname}}</td>
                    <td>
                      <!-- DELETE using link -->

                      <form action="{{url('/admin/users')}}" method="DELETE" enctype="multipart/form-data">
                     
                      <a href="#" class="left"><i class="material-icons">visibility</i></a>
                      <a href="/users/{{ $user->id }}/edit" class="center"><i class="material-icons">mode_edit</i></a>
                      <a href="" class="right data-delete" data-form="users-{{ $user->id }}"><i class="material-icons">delete</i></a>
                      </form>
                    </td>
                  </tr>
                  @endif
                @endforeach
              @else
                <tr>
                  <td colspan="4"><h5 class="teal-text">No User has been added</h5></td>
                </tr>
              @endif
            </tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<!-- Modal Structure -->
<div id="modal1" class="modal">
 
  <div class="modal-content">
    <h4>Add User</h4>
    <div class="divider"></div>
      <div class="row">

      <form action="{{url('/admin/users')}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="col m6 s12 input-field">
           
              <input type="text" class="form-control" id="exampleInputEmail1" name="fname" placeholder="Enter Firstname">
          </div>

          <div class="col m6 s12 input-field">
             
              <input type="text" class="form-control" id="exampleInputEmail1" name="lname" placeholder="Enter Lastname">
          </div>

          <div class="col m6 s12 input-field"> 
              <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter Email">
          </div>
          <div class="col m6 s12 input-field">
          <select class="form-select" name="gender_id" aria-label="Default select example">
              <option selected>Select Gender</option>
              @foreach ($genders as $gender)
              <option value="{{ $gender->id }}">{{ $gender->gendername }}</option>
              @endforeach
               
              
          </select>
          </div>

          <div class="col m6 s12 input-field">
          <select class="form-select"  name="department_id"  aria-label="Default select example">
              <option selected>Select Department</option>
              @foreach ($departments as $department)
              <option value="{{ $department->id }}">{{ $department->departmentname }}</option>
              @endforeach
          </select>
          </div>

          <div class="col m6 s12 input-field">
            <select class="form-select" name="role_id" aria-label="Default select example">
                <option selected>Select Role</option>
                @foreach ($roles as $role)
                 <option value="{{ $role->id }}">{{ $role->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="col m6 s12 input-field">
              
              <input type="password" class="form-control"  name="password" id="password" aria-describedby="emailHelp" placeholder="Enter Password">
          </div>

          <div class="col m6 s12 input-field">
            
              <input type="password" class="form-control"  name="password_confirmation" id="password" aria-describedby="emailHelp" placeholder="Comfirm Passord">
          </div>
         
          <div class="flex items-center justify-between">
     <button type="submit" class="btn btn-success">Create</button>
       
    </div>
      </form>
      </div>
    </div>
  <div class="modal-footer">
   
  </div>
  
</div>
@endsection
