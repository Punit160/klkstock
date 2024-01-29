@include('client.component.tablehead')
@include('client.component.header')
@include('client.component.sidebar')
<!-- Content Wrapper. Contains page content -->
<div class="mainBox m-0 py-0">

  <!-- Add Warehouse -->
  <div class="card innerBox mode1  p-0">
    <div class="card-body">
      <h5 class="card-title w-100">Add Warehouse <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
      <hr>
      <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input
        fields.</h6>
      <form action="{{route('save-warehouse')}}" method="POST" enctype='multipart/form-data'>
        @csrf
        <div class="row">
          <div class="col-12 col-sm-6 form-group">
            <label for="wareName">Name *</label>
            <input type="text" class="form-control" name="name" required>
          </div>
          <div class="col-12 col-sm-6 form-group">
            <label for="wareContact">Phone Number *</label>
            <input type="phone" class="form-control" name="contact"  required >
          </div>
          <div class="col-12 form-group">
            <label for="wereEmail">Email *</label>
            <input type="email" class="form-control" name="email"  required >
          </div>
          <div class="col-12 form-group">
            <label for="address">Address * </label>
            <textarea rows="4" class="form-control" name="address" required ></textarea>
          </div>
          <div class="text-left">
            <button class="btn btn-primary ml-1 ">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Import Warehouse -->
  <div class="card innerBox mode2  p-0">
    <div class="card-body">
      <h5 class="card-title w-100">Import Warehouse <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
      <hr>
      <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input
        fields.</h6>
      <p class="card-text text-muted">The correct column order is (name*, parent_category) and you must
        follow this.</p>
      <form action="{{route('import-warehouse')}}" method="POST" enctype='multipart/form-data'>
        @csrf
        <div class="row">
          <div class="col-12 col-sm-6 form-group">
            <label for="CSV">Upload CSV File *</label>
            <input type="file" class="form-control" name="warehouse" id="warehouse">
          </div>
          <div class="col-12 col-sm-6 form-group">
            <label for="CSV">Sample File *</label>
            <button class="btn btn-info w-100"><i class="fa fa-download"></i> Download</button>
          </div>
          <div class="col-12 col-sm-3">
            <button class="btn btn-primary w-100">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>

   <!-- Update Warehouse -->
   <div class="card innerBox mode2  p-0">
    <div class="card-body">
      <h5 class="card-title w-100">Update Warehouse <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
      <hr>
      <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input
        fields.</h6>
      <form action="{{route('update-warehouse')}}" method="POST" enctype='multipart/form-data'>
        @csrf
        <div class="row">
          <div class="col-12 col-sm-6 form-group">
            <label for="name">Name *</label>
            <input type="hidden" name="warehouse_id" id="warehouse_id">
            <input type="text" class="form-control" name="name" id="name" >
          </div>
          <div class="col-12 col-sm-6 form-group">
            <label for="contact">Phone Number *</label>
            <input type="phone" class="form-control" name="phone" id="phone">
          </div>
          <div class="col-12 form-group">
            <label for="email">Email *</label>
            <input type="email" class="form-control" name="email" id="email">
          </div>
          <div class="col-12 form-group">
            <label for="address">Address * </label>
            <textarea rows="4" class="form-control" name="address" id="address"></textarea>
          </div>
          <div class="text-left">
            <button class="btn btn-primary ml-1 ">Submit</button>
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
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <!-- <h1>View Warehouse</h1> -->
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">View Warehouse</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card ">
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
              <h3 class="card-title">View Warehouse List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card shadow-none">
              <div class="card-header d-flex flex-column flex-sm-row ">
                <button class="btn btn-info" onclick="openMode1()"><i class="fa fa-plus"></i>&emsp;Add
                  Warehouse</button>
                <button class="btn btn-primary ml-0 ml-sm-3 mt-3 mt-sm-0" onclick="openMode2()"><i class="fa fa-file"></i>&emsp;Import
                  Warehouse</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="text-center">S.No.</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Phone</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Address</th>
                      <th class="text-center">No of Product</th>
                      <th class="text-center">Stock Qty</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    @php $count = 1; @endphp
                    @foreach($warehouse as $warehouses)
                    <tr class="border-top border-bottom">
                      <td class="text-center">{{$count}}</td>
                      <td class="text-center">{{$warehouses->name}}</td>
                      <td class="text-center">{{$warehouses->phone}}</td>
                      <td class="text-center">{{$warehouses->email}}</td>
                      <td class="text-center">{{$warehouses->address}}</td>
                      <td class="text-center">{{$warehouses->no_product}}</td>
                      <td class="text-center">{{$warehouses->stock_quantity}}</td>

                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-outline-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right" role="menu">
                          <button value="{{$warehouses->id}}" class="dropdown-item edit_btn" onclick="openMode3()"><i class="fa fa-edit"></i>Edit</button>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{  route('delete-warehouse', ['id' => $warehouses->id]) }}" onclick="return confirm('Are you sure you want to delete this task?') "><span><i class="fa fa-fw fa-trash"></i></span> Delete</a>
                          </div>
                        </div>
                      </td>


                      @php $count++; @endphp
                    </tr>
                    @endforeach

                  </tbody>

                  <tfoot>
                    <tr>
                      <th class="text-center">S.No.</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Contact No</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Address</th>
                      <th class="text-center">No of Product</th>
                      <th class="text-center">Stock Qty</th>
                      <th class="text-center">Action</th>


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
  $(document).ready(function() {
    $(document).on('click', '.edit_btn', function() {
      var warehouse_id = $(this).val();
       console.log(warehouse_id);
      $.ajax({
        type: "GET",
        url: "/warehouse/edit-warehouse/" + warehouse_id,
        success: function(response) {
          console.log(response);
          $("#warehouse_id").val(response.id);
          $("#name").val(response.name);
          $("#email").val(response.email);
          $("#phone").val(response.phone);
          $("#address").val(response.address);


        }
      })

    });
  });
</script>
@include('client.component.tablefooter')