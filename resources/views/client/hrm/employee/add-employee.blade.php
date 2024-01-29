@include('client.component.head')
@include('client.component.header')
@include('client.component.sidebar')
<!-- Content Wrapper. Contains page content -->
<style>
    .hidden {
        display: none;
    }
</style>


    <!-- update Employee-->



    <!-- Content Wrapper. Contains page content -->
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
                                <h3>Add Employee</h3>
                            </div>
                            <section class="card-body p-4">
                                <div>
                                    <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with *
                                        are required input
                                        fields.</h6>
                                </div>
                                <form action="{{route('save-employee')}}" method="POST" enctype='multipart/form-data' class="form-row mt-3">
                                    @csrf
                                    <div class="col-lg-6 col-md-12  form-group">
                                        <label for="name">Name *</label>
                                        <input type="text" placeholder="Enter Name" id="employeeName" name="name" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 col-md-12 form-group">
                                        <label for="Department">Department *</label>
                                        <select class="form-control" id="employeeDepartment" name="dept" required>
                                            @foreach($department as $departments)
                                            <option value="{{$departments->name}}" >{{$departments->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-lg-6 col-md-12 form-group">
                                        <label for="email">Email *</label>
                                        <input type="email" placeholder="" id="employeeEmail" name="email" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 col-md-12 form-group">
                                        <label for="contact">Phone Number *</label>
                                        <input type="number" placeholder="Enter Phone Number" id="contact" class="form-control" name="contact" required>
                                    </div>

                                    <div class="col-lg-6 col-md-12 form-group">
                                        <label for="Role">Gender</label>
                                        <select class="form-control" id="employeeRole" name="gender">
                                        <option disabled>Choose...</option>
											<option value="M">Male</option>
											<option value="F">Female</option>
											<option value="O">Others</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 col-md-12 form-group ">
                                        <label for="Password">Date Of Joining *</label>
                                        <input type="date" placeholder="Enter Joining Date" id="employeeJoiningDate" name="doj" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 col-md-12 form-group">
                                        <label for="Address">Address *</label>
                                        <input type="text" placeholder="Enter Name" id="employeeAddress" class="form-control" name="address" required>
                                    </div>
                                    <div class="col-lg-6 col-md-12 form-group">
                                        <label for="City">City *</label>
                                        <input type="text" placeholder="Enter City" id="employeeCity" class="form-control" name="city" required>
                                    </div>
                                    <div class="col-lg-6 col-md-12 form-group">
                                        <label for="Country">Country *</label>
                                        <input type="text" placeholder="Enter Country" id="employeeCountry" class="form-control" name="country" required>
                                    </div>
                                    <div class="col-lg-6 col-md-12 form-group">
                                        <label for="Staff">Staff ID *</label>
                                        <input type="text" placeholder="Enter Staff ID" id="employeeStaffID" class="form-control" name="staff_id" >
                                    </div>
                                    <div class=" col-md-12 form-group">
                                        <label for="Role">Status</label>
                                        <select class="form-control" name="status">
                                        <option disabled>Choose...</option>
											<option value="1">Active</option>
											<option value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-12 col-md-12 form-group mt-2 mb-2">
                                        <button class="btn btn-primary  ">Submit</button>
                                    </div>
    

                                </form>
                            </section>
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
    @include('client.component.footer')