@include('client.component.tablehead')
@include('client.component.header')
@include('client.component.sidebar')
         <!-- Expense Category -->
         <div class="mainBox m-0 py-0">

            <!-- Add Expense -->
            <div class="card innerBox mode1 mx-4 mx-sm-auto p-0">
                    <div class="card-body">
                      <h5 class="card-title w-100">Add Expense <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
                      <hr>
                      <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input fields.</h6>
                      <form method="post" action="{{route('save-expense')}}">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-6 form-group">
                                <label for="Date">Date</label>
                                <input type="date" class="form-control" name="date">
                            </div>
                            <div class="col-12 col-sm-6 form-group">
                                <label for="expensecat">Expense Category *</label>
                                <select name="category_id" class="form-control">
                                    <option value="dis" selected disabled>-- Select Category --</option>
                                    @foreach($category as $categories)
                                    <option value="{{$categories->id}}">{{$categories->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 form-group">
                                <label for="warehouse">Warehouse *</label>
                                <select name="warehouse_id"  class="form-control">
                                    <option value="dis" selected disabled>-- Select Warehouse --</option>
                                    @foreach($warehouse as $warehouses)
                                    <option value="{{$warehouses->id}}">{{$warehouses->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 form-group">
                                <label for="amnt">Amount *</label>
                                <input type="number" class="form-control" name="amount" id="amnt" placeholder="Enter Amount">
                            </div>
                            <div class="col-12 form-group">
                                <label for="note">Remarks</label>
                                <textarea name="remarks" id="note" class="form-control" cols="30" rows="3"></textarea>
                            </div>
                            <div class="col-12 ">
                                <button class="btn btn-primary w-md-25">Submit</button>
                            </div>
                        </div>
                      </form>
                    </div>
            </div>

            <!-- Update Expense -->
            <div class="card innerBox mode2 mx-4 mx-sm-auto p-0">
                    <div class="card-body">
                      <h5 class="card-title w-100">Update Expense <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
                      <hr>
                      <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input fields.</h6>
                      <form action="{{route('update-expense')}}" method="POST" enctype="multipart/form-data">
                   @csrf
                   @method('put')
                  <input type="hidden" class="form-control" id="expense_id" name="expense_id"  required>
                        <div class="row">
                            <div class="col-12 form-group">
                                <label for="ref">Reference</label>
                                <input type="text" class="form-control" id="refrence_no" disabled>
                            </div>
                            <div class="col-12 col-sm-6 form-group">
                                <label for="Date">Date</label>
                                <input type="date" class="form-control" name="date" id="date">
                            </div>
                            <div class="col-12 col-sm-6 form-group">
                                <label for="expensecat">Expense Category *</label>
                                <select name="category_id" id="category_id" class="form-control">
                                <option value="dis" selected disabled>-- Select Category --</option>
                                    @foreach($category as $categories)
                                    <option value="{{$categories->id}}">{{$categories->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 form-group">
                                <label for="warehouse">Warehouse *</label>
                                <select name="warehouse_id" id="warehouse_id" class="form-control">
                                <option value="dis" selected disabled>-- Select Warehouse --</option>
                                    @foreach($warehouse as $warehouses)
                                    <option value="{{$warehouses->id}}">{{$warehouses->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 form-group">
                                <label for="amnt">Amount *</label>
                                <input type="number" class="form-control" name="amount" id="amount">
                            </div>
                            <div class="col-12 form-group">
                                <label for="note">Remarks</label>
                                <textarea name="remarks" id="remarks" class="form-control" cols="30" rows="3"></textarea>
                            </div>
                            <div class="col-12 ">
                                <button class="btn btn-primary w-md-25">Submit</button>
                            </div>
                        </div>
                      </form>
                    </div>
            </div>
        </div>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <section class="content-header">
                <div class="container-fluid bg-white rounded p-0 mt-0">
                    <!-- <hr class="p-0"> -->
                    <div class=" mb-4 pt-1 pb-2" style="background-color: #f4f6f9;">
                        <h3 class="font-weight-bold py-2 text-center">Expense List</h3>
                    </div>
                    <!-- <hr class="pb-2"> -->
                        <form action="#" class="row rounded bg-white pb-4 mx-2">
                            <div class="col-12 col-sm-5 form-group row m-auto">
                                <label for="date" class="font-weight-bold col-12 col-sm-5 text-left text-sm-right m-auto">Choose Your Date:</label>
                                <!-- <input type="text" class="form-control col-12 col-sm-7"> -->
                                <input type="text" class="daterangepicker-field form-control col-12 col-sm-7" name="daterange" value="2022-11-01 To 2023-11-06" required="">
                            </div>
                            <div class="col-12 col-sm-5 pt-3 pt-sm-0 form-group row m-auto">
                                <label for="date" class="font-weight-bold col-12 col-sm-5 text-left text-sm-right m-auto">Choose Warehouse:</label>
                                <!-- <input type="text" class="form-control col-12 col-sm-7"> -->
                                <select name="warehouse" class="form-control col-12 col-sm-7">
                                    <option value="dis" disabled selected>All Warehouse</option>
                                    <option value="w1">Warehouse1</option>
                                    <option value="w2">Warehouse2</option>
                                    <option value="w3">Warehouse3</option>
                                </select>
                            </div>  
                            <div class="col-12 col-sm-2 mt-3 mt-sm-0 text-center">
                                <button class="btn btn-primary px-4 m-auto">Filter</button>
                            </div>
                        </form>
                </div>
            </section>

            <div class="container-fluid d-flex flex-column flex-md-row">
                <button class="btn btn-info mx-2 my-4 btn-add-expenses" onclick="openMode1()"
                    ><i class="dripicons-plus fa"></i><span class="fa mx-1">&#xf067</span>
                    Add Expense</button>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- <div class="card-header">
                    <h3 class="card-title">View Client</h3>
                  </div> -->
                                <!-- /.card-header -->
                                <div class="card shadow-none">
                                    <!-- <div class="card-header">
                                        <h3 class="card-title">
                                            DataTable with default features
                                        </h3>
                                    </div> -->
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped d-block d-md-table" style="overflow-x: scroll;">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Reference No.</th>
                                                    <th>Warehouse</th>
                                                    <th>Category</th>
                                                    <th>Amount</th>
                                                    <th>Remarks</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($expense as $expenses)
                                                <tr>
                                                    <td>{{$expenses->date}}</td>
                                                    <td>{{$expenses->refrence_no}}</td>
                                                    @php $ware = DB::table('warehouses')->where('id', $expenses->warehouse_id)->select('name')->first();  @endphp
                                                    <td>{{$ware->name}}</td>
                                                    @php $expensecategory = DB::table('expensecategories')->where('id', $expenses->category_id)->select('name')->first();  @endphp
                                                    <td>{{$expensecategory->name}}</td>
                                                    <td>{{$expenses->amount}}</td>
                                                    <td>{{$expenses->remarks}}</td>
                                                    <td>
                                                      <div class="btn-group">
                                                        <button type="button" class="btn btn-outline-info">Action</button>
                                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                                          <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                        <button value="{{$expenses->id}}" class="dropdown-item edit_btn" onclick="openMode2()"><i
                                                            class="fa fa-edit"></i>Edit</button>
                                                          <div class="dropdown-divider"></div>
                                                          <a class="dropdown-item" href="{{asset('expense/delete-expense/'. $expenses->id)}}"><span><i class="fa fa-fw fa-trash"></i></span> Delete</a>
                                                        </div>
                                                      </div>
                                                    </td>
                                                </tr>
                                              @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                    <th>Date</th>
                                                    <th>Reference No.</th>
                                                    <th>Warehouse</th>
                                                    <th>Category</th>
                                                    <th>Amount</th>
                                                    <th>Remarks</th>
                                                    <th>Action</th>
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
  $(document).ready(function () {
    $(document).on('click', '.edit_btn', function () {
      var exp_id = $(this).val();
      $.ajax({
        type: "GET",
        url: "/expense/edit-expense/" + exp_id,
        success: function (response) {
          console.log(response);
          $("#expense_id").val(response.id);
          $("#date").val(response.date);
          $("#refrence_no").val(response.refrence_no);
          $("#warehouse_id").val(response.warehouse_id);
          $("#category_id").val(response.category_id);
          $("#amount").val(response.amount);
          $("#remarks").val(response.remarks);
        }
      })

    });
  });
</script>

@include('client.component.tablefooter')