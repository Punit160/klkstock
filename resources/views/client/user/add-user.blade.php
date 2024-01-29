@include('client.component.head')
@include('client.component.header')
@include('client.component.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!-- <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add User</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add User</li>
                            </ol>
                        </div>
                    </div>
                </div> -->
            </section>

            <!-- Main content -->
            <section class="content-header pt-3">
                <div class="container-fluid">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default" style="border-top: 4px solid #0c1476; border-bottom: 4px solid #0c1476;">
                        <div class="card-header bg-light">
                            <h3 class="card-title">Add User</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
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
                       <form action="{{route('save-user')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <!-- /.card-header -->
                        <div class="card-body">
                            <p class="italic"><small>The field labels marked with * are required input fields.</small></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name  *</label>
                                        <input type="text" class="form-control" name="name"
                                          placeholder="Enter User Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address  *</label>
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Enter email" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number  *</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text" class="form-control"
                                                 data-mask name="phone"
                                                required />
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Role  *</label>
                                        <select class="form-control select2" name="role" style="width: 100%;" required>
                                            <option disabled>Choose...</option>
											<option value="2">Admin</option>
											<option value="3">Manager</option>
											<option value="4">Staff</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender  *</label>
                                        <select class="form-control select2" name="gender" style="width: 100%;" required>
                                            <option disabled>Choose...</option>
											<option value="M">Male</option>
											<option value="F">Female</option>
											<option value="O">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date of Joining  *</label>
                      
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                          </div>
                                          <input type="date" class="form-control" name="doj" data-inputmask-alias="datetime" value="{{date('m/d/Y')}}"
                                         data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                        </div>
                                        <!-- /.input group -->
                                      </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Password  *</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Confirm Password  *</label>
                                        <input type="password" class="form-control"  name="password_confirmation"  placeholder="Confirm Password" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status  *</label>
                                        <select class="form-control select2" name="status" style="width: 100%;" required>
                                            <option disabled>Choose...</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer bg-light"> 
                            <button type="submit" class="btn btn-info">Submit</button>
                            <button type="reset" class="btn btn-default float-right">Cancel</button>
                          </div>

                          </form>
                          <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
@include('client.component.footer')