@include('client.component.tablehead')
@include('client.component.header')
@include('client.component.sidebar')
<!-- Content Wrapper. Contains page content -->
<div class="mainBox m-0 py-0">

<!-- Add Unit -->
<div class="card innerBox mode1 mx-4 mx-sm-auto p-0">
    <div class="card-body">
        <h5 class="card-title w-100">Add Unit <span class="float-right" style="cursor:pointer;"
                onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
        <hr>
        <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input
            fields.</h6>
        <form action="{{route('save-unit')}}" method="POST">
            @csrf
            <div class="row">
            <div class="col-12 col-sm-6  form-group">
                    <label for="wareName">Code *</label>
                    <input type="text" class="form-control" name="unit_code" id="wareName" required>
                </div>
                <div class="col-12 col-sm-6  form-group">
                    <label for="wareContact">Name *</label>
                    <input type="text" class="form-control" name="unit_name" id="wareContact" required>
                </div>
                <div class="col-12  form-group">
                    <label for="wereEmail">Base Unit </label>
                    <select class="form-control select2 " onchange="showOps()"  name="base_unit" style="width: 100%;">
                    <option value="" >Choose...</option>
                    @foreach($unit as $units)
                    <option value="{{$units->unit_code}}">{{$units->unit_name}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="col-12 col-sm-6  form-group specOps">
                    <label for="wereEmail">Operator </label>
                    <input type="text" class="form-control" name="operator" id="wereEmail">
                </div>

                <div class="col-12 col-sm-6  form-group specOps">
                    <label for="wereEmail">Operation Value </label>
                    <input type="text" class="form-control" name="operation_value" id="wereEmail">
                </div>

                <div class="text-left">
                    <button class="btn btn-primary ml-1 ">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Import Warehouse -->
<div class="card innerBox mode2 mx-4 mx-sm-auto p-0">
    <div class="card-body">
        <h5 class="card-title w-100">Import Units <span class="float-right" style="cursor:pointer;"
                onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
        <hr>
        <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input
            fields.</h6>
        <p class="card-text text-muted">The correct column order is (unit_name*, unit_code*, base_unit [unit code], operator, operation_value) and you must follow this.</p>
        <form action="{{route('import-unit')}}"  method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-sm-6 form-group">
                    <label for="CSV">Upload CSV File *</label>
                    <input type="file" class="form-control" name="file" accept=".csv, .xlsx, .xls" required>
                </div>
                <div class="col-12 col-sm-6 form-group">
                    <label for="CSV">Sample File *</label>
                    <a href="{{asset('excel/Unit.xlsx')}}" class="btn btn-info w-100"><i class="fa fa-download"></i> Download</a>
                </div>
                <div class="col-12 col-sm-3">
                    <button class="btn btn-primary w-100">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card innerBox mode3 mx-4 mx-sm-auto p-0">
                <div class="card-body">
                    <h5 class="card-title w-100">Edit Unit <span class="float-right" style="cursor:pointer;"
                            onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
                    <hr>
                    <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input
                        fields.</h6>
                       <form action="{{route('update-unit')}}" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" class="form-control" id="unit_id" name="unit_id"  required>
                        <div class="row">
                            <div class="col-12 col-sm-6  form-group">
                                <label for="wareName">Code *</label>
                                <input type="text" class="form-control" id="unit_code" name="unit_code"  required>
                            </div>
                            <div class="col-12 col-sm-6  form-group">
                                <label for="wareContact">Name *</label>
                                <input type="text" class="form-control" id="unit_name" name="unit_name" required>
                            </div>
                            <div class="col-12  form-group ">
                                <label for="wereEmail">Base Unit </label>
                                <select class="form-control select2" id="base_unit" name="base_unit" style="width: 100%;">
                                    <option disabled>Choose...</option>
                                    @foreach($unit as $units)
                                    <option value="{{$units->unit_code}}">{{$units->unit_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-sm-6  form-group">
                                <label for="wereEmail">Operator </label>
                                <input type="text" id="operator" class="form-control" name="operator">
                            </div>

                            <div class="col-12 col-sm-6 form-group">
                                <label for="wereEmail">Operation Value </label>
                                <input type="text" id="operation_value" class="form-control" name="operation_value">
                            </div>

                            <div class="col-12 text-left">
                                <button class="btn btn-primary ml-1 ">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</div>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
         <!--  add Expense category-->
        <!-- Import Expense Category -->
    <section class="content-header">
    <!-- <div class="container-fluid ">
                                        <button class="btn btn-info" onclick="openMode1()"><i
                                                class="fa fa-plus"></i>&emsp;Add
                                            Unit</button>
                                        <button class="btn btn-primary ml-0 ml-sm-3 mt-3 mt-sm-0"
                                            onclick="openMode2()"><i class="fa fa-file"></i>&emsp;Import
                                            Unit</button>
    </div> -->
    </section>

    <!-- Main content -->

        <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Unit List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card shadow-none">
                <div class="card-header p-0">
                  <div class="d-flex flex-column flex-sm-row px-4 pt-3">
                  <button class="btn btn-info" onclick="openMode1()"><i
                                                class="fa fa-plus"></i>&emsp;Add
                                            Unit</button>
                                        <button class="btn btn-primary ml-0 ml-sm-3 mt-3 mt-sm-0"
                                            onclick="openMode2()"><i class="fa fa-file"></i>&emsp;Import
                                            Unit</button>
                  </div>
                  <hr>
                    <form action="#" class="row pb-3">
                    <div class="col-12 col-sm-5 form-group row m-auto">
                        <label for="date" class="font-weight-bold col-12 text-sm-right  col-sm-4 m-auto">
                            <b>Choose Your Date:</b> </label>
                        <input type="text" class="daterangepicker-field form-control col-12 col-sm-8"
                            name="daterange" value="2022-11-01 To 2023-11-06" required="">
                    </div>
                    <div class="col-12 col-sm-5 pt-3 pt-sm-0 form-group row m-auto">
                        <label for="date"
                            class="font-weight-bold col-12 col-sm-4 text-sm-right  m-auto"><b>Choose
                                Status:</b></label>
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
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Base Unit</th>
                                        <th>Operator</th>
                                        <th>Operation Value</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $counter = 1;
                                    @endphp
                                    @foreach($unit as $units)
                                    <tr>
                                        <td>{{$counter}}</td>
                                        <td>{{$units->unit_code}}</td>
                                        <td>{{$units->unit_name}}</td>
                                        <td>{{$units->base_unit}}</td>
                                        <td>{{$units->operator}}</td>
                                        <td>{{$units->operation_value}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-outline-info">Action</button>
                                                <button type="button" class="btn btn-info dropdown-toggle dropdown-icon"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                <button value="{{$units->id}}" class="dropdown-item edit_btn" onclick="openMode3()" ><i class="fa fa-edit"></i>Edit</button>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item"
                                                        href="{{asset('unit/delete-unit/'. $units->id)}}"><span><i
                                                                class="fa fa-fw fa-trash"></i></span> Delete</a>
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
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Base Unit</th>
                                        <th>Operator</th>
                                        <th>Operation Value</th>
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function(){
    $(document).on('click', '.edit_btn', function(){
        var unit_id = $(this).val();
        
        $.ajax({
            type: "GET",
            url: "/unit/edit-unit/"+unit_id,
            success: function(response){
                console.log(response);
                $("#unit_id").val(response.id);
                $("#unit_code").val(response.unit_code);
                $("#unit_name").val(response.unit_name);
                $("#base_unit").val(response.base_unit);
                $("#operator").val(response.operator);
                $("#operation_value").val(response.operation_value);
            }
        })
        
    });
});
</script>

<!-- /.content-wrapper -->
@include('client.component.tablefooter')