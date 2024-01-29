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
                            <h3 class="card-title">Update Supplier</h3>

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
                       <form action="" method="post"  enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <!-- /.card-header -->
                        <div class="card-body">
                            <p class="italic"><small>The field labels marked with * are required input fields.</small></p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name  *</label>
                                        <input type="text" class="form-control" name="name"
                                          value="{{$supplier->name}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputFile">Image</label>
                                    <input type="file" name="image" class="form-control" id="exampleInputFile">
                                    <p class="help-block"><small><i>Upload supplier Logo</i></small></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Company Name  *</label>
                                        <input type="text" class="form-control" name="company_name"
                                        value="{{$supplier->company_name}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address  *</label>
                                        <input type="email" class="form-control" name="email"
                                        value="{{$supplier->email}}" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Phone Number  *</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text" class="form-control"
                                                 data-mask name="phone" value="{{$supplier->phone}}"
                                                required />
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">VAT Number </label>
                                        <input type="text" class="form-control" name="vat_number"
                                        value="{{$supplier->vat_number}}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">GST Number </label>
                                        <input type="text" class="form-control" name="gst_number"
                                        value="{{$supplier->gst_number}}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Address *</label>
                                        <input type="text" class="form-control" name="address"
                                        value="{{$supplier->address}}" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">City *</label>
                                        <input type="text" class="form-control" name="city"
                                        value="{{$supplier->city}}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">State </label>
                                        <input type="text" class="form-control" name="state"
                                        value="{{$supplier->state}}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Country </label>
                                        <input type="text" class="form-control" name="country"
                                        value="{{$supplier->country}}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Postal Code </label>
                                        <input type="text" class="form-control" name="postal_code"
                                        value="{{$supplier->postal_code}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status  *</label>
                                        <select class="form-control select2" name="status" style="width: 100%;" required>
                                            <option disabled>Choose...</option>
                                            <option  {{ $supplier->status === '1' ? 'selected' : '' }} value="1">Active</option>
                                            <option {{ $supplier->status === '0' ? 'selected' : '' }} value="0">Inactive</option>
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