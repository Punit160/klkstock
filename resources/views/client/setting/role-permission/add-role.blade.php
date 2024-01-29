@include('client.component.tablehead')
@include('client.component.header')
@include('client.component.sidebar')

<!-- Add Brand -->
<!-- Add Roles -->
<div class="mainBox m-0 py-0">
  <div class="card innerBox  mode1 accnt p-0">
    <div class="card-body">
      <h5 class="card-title w-100">Add Role <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
      <hr>
      <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input fields.</h6>
      <form action="{{route('save-role')}}" method="POST" enctype='multipart/form-data'>
        @csrf
        <div class="row">
          <div class="col-12 form-group">
            <label for="name">Name *</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="col-12 form-group">
            <label for="description">Description *</label>
            <textarea name="description" cols="30" rows="5s" class="form-control"></textarea>
          </div>
          <div class="col-12 col-sm-3">
            <button class="btn btn-primary w-100">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>


  <div class="card innerBox  mode2 accnt p-0">
    <div class="card-body">
      <h5 class="card-title w-100"> <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
      <hr>
      <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input fields.</h6>
      <form action="#">
        @csrf
        <div class="row">
          <div class="col-12 form-group">
            <label for="name">Name *</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="col-12 form-group">
            <label for="description">Description *</label>
            <textarea name="discription" cols="30" rows="5s" class="form-control"></textarea>
          </div>
          <div class="col-12 col-sm-3">
            <button class="btn btn-primary w-100">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="card innerBox mode3 accnt p-0">
    <div class="card-body">
      <h5 class="card-title w-100">Edit Role <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
      <hr>
      <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input fields.</h6>
      <form action="{{route('update-role')}}" method="POST" enctype='multipart/form-data'>
        @csrf
        <div class="row">
          <div class="col-12 form-group">
            <label for="name">Name *</label>
            <input type="hidden" name="role_id" id="role_id">
            <input type="text" class="form-control" name="name" id="name">
          </div>
          <div class="col-12 form-group">
            <label for="description">Description *</label>
            <textarea name="description" id="description" cols="30" rows="5s" class="form-control"></textarea>
          </div>
          <div class="col-12 col-sm-3">
            <button class="btn btn-primary w-100">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Roles</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add Roles</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card" style="border-top: 4px solid #0c1476; border-bottom: 4px solid #0c1476;">
            <div class="card-header">
            @if(session()->has('status'))
              <div class="alert my-3 p-3 alert-success">
                {{session('status')}}
              </div>
              @endif
              @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
            @endforeach
            @endif
              <h3 class="card-title">Roles</h3>
            </div>
            <!-- /.card-header -->
            <div class="card shadow-none">
              <div class="card-header">
                <button class="btn btn-info" onclick="openMode1()"><i class="fa fa-plus"></i>&emsp;Add Roles</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                    <th class="text-center">Sr No</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Description</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $count = 1; @endphp
                    @foreach($role as $roles)
                    <tr class="border-top border-bottom">
                      <td class="text-center">{{$count}}</td>
                      <td class="text-center">{{$roles->name}}</td>
                      <td class="text-center">{{$roles->description}}</td>
                      <td class="text-center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-outline-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right" role="menu">
                            <button value="{{$roles->id}}" class="dropdown-item edit_btn" onclick="openMode3()"><i class="fa fa-edit"></i>Edit</button>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('change-permission', ['id' => $roles->id]) }}" ><span><i class="fa fa-fw fa-trash"></i></span> Change Permission</a>
                          </div>
                        </div>
                      </td>

                      @php $count++; @endphp
                    </tr>
                    @endforeach

                  </tbody>
                  <tfoot>
                    <tr>
                      <th class="text-center">Sr No</th>
                      <th class="text-center">Name</th>
                      <th class="text-center"> Description</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  $(document).ready(function() {
    $(document).on('click', '.edit_btn', function() {
      var role_id = $(this).val();
      console.log(role_id);
      $.ajax({
        type: "GET",
        url: "/role-permission/edit-role/" + role_id,
        success: function(response) {
          console.log(response);
          $("#role_id").val(response.id);
          $("#name").val(response.name);
          $("#description").val(response.description);
        }
      })

    });
  });
</script>
@include('client.component.tablefooter')