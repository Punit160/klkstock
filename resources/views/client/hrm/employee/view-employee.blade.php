@include('client.component.tablehead')
@include('client.component.header')
@include('client.component.sidebar')


<div class="mainBox m-0 py-0">


    <!-- Update Employee -->
    <div class="card innerBox mode1  p-0">
        <div class="card-body">
            <h5 class="card-title w-100">Update Employee <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
            <hr>
            <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input
                fields.</h6>

            <form action="{{route('update-employee')}}" method="POST" enctype='multipart/form-data'>
                @csrf
                <div class="row">
                    <div class="col-md-12 col-lg-6  form-group">
                        <label for="catName">Name *</label>
                        <input type="hidden" name="employee_id" id="employee_id">

                        <input type="text" class="form-control" name="name" id="name">
                    </div>

                    <div class="col-md-12 col-lg-6  form-group">
                        <label for="catName">Department *</label>
                        <select class="form-control" name="dept" id="dept">
                        @foreach($department as $departments)
                        <option value="{{$departments->name}}" >{{$departments->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 col-lg-6  form-group">
                        <label for="catName">Email *</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="col-md-12 col-lg-6  form-group">
                        <label for="catName">Phone Number *</label>
                        <input type="phone" class="form-control" name="contact" id="contact">
                    </div>

                    <!-- <div class="col-lg-6 col-md-12 form-group">
                        <label for="Role">Gender</label>
                        <select class="form-control" id="gender" name="gender">
                            <option disabled>Choose...</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                            <option value="O">Others</option>
                        </select>
                    </div> -->

                    <div class="col-lg-6 col-md-12 form-group ">
                        <label for="Password">Date Of Joining *</label>
                        <input type="date" placeholder="Enter Joining Date" id="doj" name="doj" class="form-control">
                    </div>
                    <div class="col-md-12 col-lg-6  form-group">
                        <label for="catName">Address</label> *</label>
                        <input type="text" class="form-control" name="address" id="address">
                    </div>
                    <div class="col-md-12 col-lg-6  form-group">
                        <label for="catName">City</label> *</label>
                        <input type="text" class="form-control" name="city" id="city">
                    </div>
                    <div class="col-md-12 col-lg-6  form-group">
                        <label for="country">Country</label> *</label>
                        <input type="text" class="form-control" name="country" id="country">
                    </div>
                    <div class=" col-md-12 form-group">
                    <label for="Role">Status</label>
                    <select class="form-control" name="status" id="status">
                    <option disabled>Choose...</option>
					<option value="1">Active</option>
					<option value="0">Inactive</option>
                    </select>
                    </div>
                    <div class="col-12 text-left">
                        <button class="btn btn-primary  ">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
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
                            <h3 class="card-title">Employee</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card shadow-none">
                            <div class="card-header">
                                <button class="btn btn-info"><a href="{{route('add-employee')}} " style="color: white;"><i class="fa fa-add"></i>&emsp;Add
                                        Employee</a></button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr No</th>
                                            <th>Name/Employee Id/
                                                Department</th>
                                            <th>Email/Phone Number</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @php $count = 1; @endphp
                                        @foreach($employee as $employees)
                                        <tr class="border-top border-bottom">
                                            <td class="text-center">{{$count}}</td>
                                            <td class="text-center">{{$employees->name}} / {{$employees->emp_id}} /  {{$employees->dept}}</td>
                                            <td class="text-center">{{$employees->email}} / {{$employees->contact}}
                                            <td class="text-center">{{$employees->address}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-outline-info">Action</button>
                                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                        <button value="{{$employees->id}}" class="dropdown-item edit_btn" onclick="openMode1()"><i class="fa fa-edit"></i>Edit</button>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="{{  route('delete-employee', ['id' => $employees->id]) }}" onclick="return confirm('Are you sure you want to delete this employee?') "><span><i class="fa fa-fw fa-trash"></i></span> Delete</a>
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
            var employee_id = $(this).val();
            console.log(employee_id);
            $.ajax({
                type: "GET",
                url: "/employee/edit-employee/" + employee_id,
                success: function(response) {
                    console.log(response);
                    $("#employee_id").val(response.id);
                    $("#name").val(response.name);
                    $("#dept").val(response.dept);
                    $("#email").val(response.email);
                    $("#contact").val(response.contact);
                    $("#doj").val(response.doj);
                    $("#address").val(response.address); 
                    $("#gender").val(response.gender); 
                    $("#country").val(response.country); 
                    $("#city").val(response.city);
                    $("#status").val(response.status);
                }
            })

        });
    });
</script>
@include('client.component.tablefooter')