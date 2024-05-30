@extends('adminlayouts.app')

@section('content')
<div class="row">
  <div class="section">
    <div class="col m1 hide-on-med-and-down">
      @include('incAdmin.sidebar')
    </div>
    <div class="col m11 s12">
      <div class="row">
        <h3 class="flow-text"><i class="material-icons">group</i> Departments
          <button data-target="modal1" class="btn waves-effect waves-light modal-trigger right">Add New</button>
        </h3>
        <div class="divider"></div>
      </div>
      <div class="card z-depth-2">
        <div class="card-content">
          <table class="responsive-table bordered centered highlight">
            <thead>
              <tr>
                  <th>Name</th>
                  <th>Actions</th>
                  <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @if(count($departments) > 0)
                @foreach($departments as  $deptName)
                  <tr>
                    <td>{{$deptName->departmentname }}</td>
                    <td>
                      <!-- UPDATE using link -->
                      <form action="{{url('/departments/detroy')}}" method="DELETE" enctype="multipart/form-data">
                        @csrf
                       <a href="/departments/{{$deptName->id }}/edit" class="center"><i class="material-icons">mode_edit</i></a>
                     </form>
                    </td>
                    <td>
                      <!-- DELETE using link -->
                      <form action="{{url('/departments/detroy')}}" method="DELETE" enctype="multipart/form-data">
                        @csrf
                          <a href="" class="right data-delete" data-form="departments-{{ $deptName->id }}"><i class="material-icons">delete</i></a>
                      </form>
                    </td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="3"><h5 class="teal-text">No Department has been added</h5></td>
                </tr>
              @endif
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
    <h4>Add Department</h4>
    <div class="divider"></div>
    <div class="row">

    <form action="{{url('admin/departments')}}" method="POST" enctype="multipart/form-data">
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
