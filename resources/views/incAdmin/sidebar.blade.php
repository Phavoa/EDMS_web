<div class="card">
  <ul class="collection">
    
  
    <li class="collection-item avatar">
      <a href="/admin/users" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Users"><i class="material-icons circle green">person</i></a>
    </li>
    
    <li class="collection-item avatar">
      <a href="/admin/departments" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Departments"><i class="material-icons circle red darken-1">group</i></a>
    </li>

    <li class="collection-item avatar">
      <a href="/admin/documents" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Documents"><i class="material-icons circle blue darken-1">folder</i></a>
    </li>
    <li class="collection-item avatar">
      <a href="/admin/roles" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Roles &amp; Permissions"><i class="material-icons circle cyan darken-1">assignment_ind</i></a>
    </li>
    
     
    
  </ul>
</div>
<!-- ======================================================================= -->
<ul id="slide-out" class="side-nav">
  <li><div class="user-view">
    <div class="background">
      <img src="/storage/images/ytu.jpg" width="100%">
    </div>
  </div></li>
  <li><a href="/shared"><i class="material-icons">share</i>Share</a></li>
  <li><a href="/documents"><i class="material-icons">folder</i>Documents</a></li>
  <li><a href="/categories"><i class="material-icons">class</i>Categories</a></li>
  @hasanyrole('Root|Admin')
  <li><a href="/users"><i class="material-icons">person</i>Users</a></li>
  @hasrole('Root')
  <li><a href="/departments"><i class="material-icons">group</i>Departments</a></li>
  <li><div class="divider"></div></li>
  <li><a href="/roles"><i class="material-icons">assignment_ind</i>Roles &amp; Permissions</a></li>
  <li><a href="/backup"><i class="material-icons">backup</i>Backup Manager</a></li>
  <li><a href="/logs"><i class="material-icons">view_list</i>Logs</a></li>
  @endhasrole
  @endhasanyrole
  @hasanyrole('Admin|User')
  <li>
    <a href="/mydocuments"><i class="material-icons">folder_shared</i>My Documents</a>
  </li>
  @endhasanyrole
</ul>
