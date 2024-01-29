@include('our.component.head')
@include('our.component.header')
@include('our.component.sidebar')
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
                    <h3 class="card-title">Add Company/Client</h3>

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
                <form action="{{route('save-our-client')}}" method="post">
                    @csrf
                    <!-- /.card-header -->
                    <div class="card-body">
                        <p class="italic"><small>The field labels marked with * are required input fields.</small></p>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company Status *</label>
                                    <select class="form-control select2" name="status" style="width: 100%;" required>
                                        <option disabled>Choose...</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Package *</label>
                                    <select class="form-control select2" name="package" style="width: 100%;" required>
                                    <option disabled>Choose...</option>
									<option value="3">3 Months</option>
									<option value="6">6 Months</option>
									<option value="12">12 Months</option>
                                    <option value="1">1 Month</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Company Name  *</label>
                                        <input type="text" class="form-control" name="company_name"
                                          placeholder="Enter Company Name" required>
                                    </div>
                                </div>
                            
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Company Prefix  *</label>
                                        <input type="text" class="form-control" name="company_prefix"
                                          placeholder="Enter Company Name" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">GST No </label>
                                        <input type="text" class="form-control" placeholder="Enter GST Number" name="gst_number" required>
                                    </div>
                                </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company Email *</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phone Number *</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone" required />
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Alternate Phone Number *</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Enter Alternate Phone Number" name="alternate_phone" required />
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date of Joining *</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" class="form-control" name="doj" 
                                        required />
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sale Id *</label>
                                    <input type="text" class="form-control" name="sale_id" placeholder="Enter Sale Id"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Payment Mode *</label>
                                    <select class="form-control select2" name="payment_detail" style="width: 100%;" required>
                                    <option disabled>Choose...</option>
									<option value="cash">Cash</option>
									<option value="upi">UPI</option>
									<option value="bank-transfer">Bank Transfer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Price *</label>
                                    <input type="number" class="form-control" name="price" placeholder="Enter Price"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Referal Id *</label>
                                    <input type="text" class="form-control" name="referal_code" placeholder="Enter Referal Id"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company Address *</label>
                                    <textarea  class="form-control" placeholder="Enter Company Address" name="address"
												required></textarea>
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
@include('our.component.footer')