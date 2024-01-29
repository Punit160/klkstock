@include('our.component.tablehead')
@include('our.component.header')
@include('our.component.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                <div class="col-sm-6">
                      <h1>User List</h1>
                   </div>
                        <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Client/Company List</li>
                </ol>
              </div>
                    </div>
                </div>
            </section>


            <div class="container-fluid">
                <a href="{{route('add-our-client')}}" class="btn btn-info mx-2 mb-4 btn-add-expenses" 
                    ><i class="dripicons-plus fa"></i><span class="fa mx-1">&#xf067</span>
                    Add Client</a>
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
                                <label for="date" class="font-weight-bold col-12 text-sm-right  col-sm-4 m-auto"> <b>Choose Your Date:</b> </label>
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
                  <th>Sr. No.</th>
                  <th>Order Id</th>
                  <th>Company</th>
                  <th>Package Detail</th>
                  <th>Contact Details</th>
                  <th>Address</th>
                  <th>Status</th>
                  <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php
                $counter = 1;
                @endphp
                @foreach($client as $clients)
                  <tr>
                  <td>{{$counter}}</td>
                  <td>{{$clients->order_id}}</td>
                  <td>{{$clients->company_id}} ({{$clients->company_name}})</td>
                  <td>{{$clients->doj}} / {{$clients->package}} MONTH </td>
                  <td>{{$clients->email}}/ <br> {{$clients->phone}}/{{$clients->alternate_phone}}</td>
                  <td>{{$clients->address}}</td>
                  @if($clients->status == '1')
                  <td><span class="label label-success">Active</span></td>
                  @else
                  <td><span class="label label-important">Plan Expired</span></td>
                  @endif
                    <td>
                    <div class="btn-group">
                    <button type="button" class="btn btn-outline-info">Action</button>
                    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a class="dropdown-item" href="{{asset('our/user/update-client/'. $clients->id)}}"><span><i class="fa fa-fw fa-edit"></i></span> Edit</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{asset('our/user/delete-client/'. $clients->id)}}"><span><i class="fa fa-fw fa-trash"></i></span> Delete</a>
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
                  <th>Sr. No.</th>
                  <th>Company</th>
                  <th>Package Detail</th>
                  <th>GST Number</th>
                  <th>Contact Details</th>
                  <th>Address</th>
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
@include('our.component.tablefooter')