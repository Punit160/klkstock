@include('client.component.tablehead')
@include('client.component.header')
@include('client.component.sidebar')
<div class="mainBox m-0 py-0">
    <!-- Add Department -->
    <div class="card innerBox mode1  p-0">
        <div class="card-body">
            <h5 class="card-title w-100">Add Department<span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
            <hr>
            <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input fields.</h6>
            <form action="{{route('save-department')}}" method="POST" enctype='multipart/form-data'>
                @csrf
                <div class="row">
                    <div class="col-12  form-group">
                        <label for="name">Name *</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-12 text-left">
                        <button class="btn btn-primary  ">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="card innerBox mode2  p-0">
        <div class="card-body">
            <h5 class="card-title w-100"><span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
            <hr>
            <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input
                fields.</h6>
            <form action="#">
                <div class="row">
                    <div class="col-12  form-group">
                        <label for="catName">Name *</label>
                        <input type="text" class="form-control" name="catName" id="catName">
                    </div>
                    <div class="col-12 text-left">
                        <button class="btn btn-primary  ">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- update Department-->
    <div class="card innerBox mode3  p-0">
        <div class="card-body">
            <h5 class="card-title w-100">Update Department <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
            <hr>
            <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input
                fields.</h6>
            <form action="{{route('update-department')}}" method="POST" enctype='multipart/form-data'>
                @csrf <div class="row">
                    <div class="col-12  form-group">
                        <label for="name">Name *</label>
                        <input type="hidden"  name="department_id" id="department_id"> 
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="col-12 text-left">
                        <button class="btn btn-primary  ">Submit</button>
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
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Department</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card shadow-none">
                            <div class="card-header">
                                <button class="btn btn-info" onclick="openMode1()"><i class="fa fa-add"></i>&emsp;Add
                                    Department</button>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Sr No</th>
                                            <th class="text-center">Department</th>
                                            <th class="text-center">Creaated By</th>

                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @php $count = 1; @endphp
                                        @foreach($department as $departments)
                                        <tr class="border-top border-bottom">
                                            <td class="text-center">{{$count}}</td>
                                            <td class="text-center">{{$departments->name}}</td>
                                            <td class="text-center">{{$departments->created_by}}</td>

                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-outline-info">Action</button>
                                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                        <button value="{{$departments->id}}" class="dropdown-item edit_btn" onclick="openMode3()"><i class="fa fa-edit"></i>Edit</button>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="{{  route('delete-department', ['id' => $departments->id]) }}" onclick="return confirm('Are you sure you want to delete this task?') "><span><i class="fa fa-fw fa-trash"></i></span> Delete</a>
                                                    </div>
                                                </div>
                                            </td>


                                            @php $count++; @endphp
                                        </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>

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
            var department_id = $(this).val();
            console.log(department_id);
            $.ajax({
                type: "GET",
                url: "/department/edit-department/" + department_id,
                success: function(response) {
                    console.log(response);
                    $("#department_id").val(response.id);
                    $("#name").val(response.name);
                }
            })

        });
    });
</script>
@include('client.component.tablefooter')