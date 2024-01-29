@include('client.component.tablehead')
@include('client.component.header')
@include('client.component.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                <div class="col-sm-6">
                      <h1>Supplier List</h1>
                   </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Supplier List</li>
                </ol>
              </div>
                    </div>
                </div>
            </section>

            <div class="container-fluid">
                <a href="{{route('add-supplier')}}" class="btn btn-info mx-2 mb-4 btn-add-expenses" 
                    ><i class="dripicons-plus fa"></i><span class="fa mx-1">&#xf067</span>
                    Add supplier</a>
                <!-- <button class="btn btn-primary" data-toggle="modal" onclick="importExpenses()"
                    data-target="#importExpenseCategory"><i class="dripicons-copy"></i><span class="fas mx-1">&#xf56f</span> Import
                    Expense
                    Category</button> -->  
            </div>

            <!-- Main content -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                    <!-- <hr class="p-0">
                    <h3 class="font-weight-bold py-1 text-center">User List</h3>
                    <hr class="pb-2"> -->
                                    <form action="#" class="row py-2">
                            <div class="col-12 col-sm-5 form-group row m-auto">
                                <label for="date" class="font-weight-bold col-12 text-sm-right  col-sm-4 m-auto"><b>Choose Your Date:</b> </label>
                                <input type="text" class="daterangepicker-field form-control col-12 col-sm-8" name="daterange" value="2022-11-01 To 2023-11-06" required="">
                            </div>
                            <div class="col-12 col-sm-5 pt-3 pt-sm-0 form-group row m-auto">
                                <label for="date" class="font-weight-bold col-12 col-sm-4 text-sm-right  m-auto"><b>Choose Status:</b></label>
                                <select name="warehouse" id="warehouse" class="form-control col-12 col-sm-8">
                                    <option value="dis" disabled selected>All Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>  
                            <div class="col-12 col-sm-2 mt-3 mt-sm-0 text-center">
                                <button class="btn btn-primary px-4 m-auto">Filter</button>
                            </div>
                        </form>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr No.</th>
                    <th>Name</th>
                    <th>image</th>
                    <th>Contact Detail</th>
                    <th>Company Detail</th>
                    <th>VAT/GST</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php
            $counter = 1;
                @endphp
                @foreach($supplier as $suppliers)
                  <tr>
                    <td>{{$counter}}</td>
                    <td>{{$suppliers->name}}</td>
                    <td><img width="50px" src="{{asset('uploads/image/'. $suppliers->image)}}" alt="supplier_logo"></td>
                    <td>{{$suppliers->email}} / {{$suppliers->phone}}</td>
                    <td> {{$suppliers->company_name}}  ({{$suppliers->address}} {{$suppliers->city}} <br> {{$suppliers->state}} <br> {{$suppliers->country}} - {{$suppliers->postal_code}} )</td>
                    <td>{{$suppliers->vat_number}} / {{$suppliers->gst_number}}</td>
                    <td> @if($suppliers->status == '1')
                                            <span class="badge bg-green">Active</span>
                                            @else
                                            <span class="badge bg-red">Inactive</span>
                                            @endif
                                        </td>
                    <td>
                    <div class="btn-group">
                    <button type="button" class="btn btn-outline-info">Action</button>
                    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a class="dropdown-item" href="{{asset('supplier/update-supplier/'. $suppliers->id)}}"><span><i class="fa fa-fw fa-edit"></i></span> Edit</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{asset('supplier/delete-supplier/'. $suppliers->id)}}"><span><i class="fa fa-fw fa-trash"></i></span> Delete</a>
                    </div>
                  </div>
                    </td>
                  </tr>
                  @php
                $counter++;
            @endphp
                @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Sr No.</th>
                    <th>Name</th>
                    <th>image</th>
                    <th>Contact Detail</th>
                    <th>Company Detail</th>
                    <th>VAT/GST</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                  </table>
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
@include('client.component.tablefooter')