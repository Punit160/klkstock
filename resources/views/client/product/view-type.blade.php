@include('client.component.tablehead')
@include('client.component.header')
@include('client.component.sidebar')
<!-- Content Wrapper. Contains page content -->

<div class="mainBox m-0 py-0">

  <!-- Add type -->
  <div class="card innerBox mode1  p-0">
    <div class="card-body">
      <h5 class="card-title w-100">Add Product Type<span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i
            class="fa fa-close"></i></span></h5><br>
      <hr>
      <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input
        fields.</h6>
      <form action="{{route('save-product-type')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-12 col-md-12 form-group">
            <label for="catName">Name *</label>
            <input type="text" class="form-control" name="name" id="catName">
          </div>
          <div class="col-12 text-left">
            <button class="btn btn-primary ml-1 ">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Import type -->
  <div class="card innerBox mode2  p-0">
    <div class="card-body">
      <h5 class="card-title w-100">Import type<span class="float-right" style="cursor:pointer;"
          onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
      <hr>
      <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input
        fields.</h6>
      <p class="card-text text-muted">The correct column order is (name*) and you must
        follow this.</p>
        <form action="{{route('import-product-type')}}"  method="post" enctype="multipart/form-data">
            @csrf
        <div class="row">
          <div class="col-12 col-sm-6 form-group">
            <label for="CSV">Upload CSV File *</label>
            <input type="file" class="form-control" name="file" accept=".csv, .xlsx, .xls" required>
          </div>
          <div class="col-12 col-sm-6 form-group">
            <label for="CSV">Sample File *</label>
            <a href="{{asset('excel/product_type.csv')}}" class="btn btn-info w-100"><i class="fa fa-download"></i> Download</a>
          </div>
          <div class="col-12 col-sm-3">
            <button class="btn btn-primary w-100">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- update type -->
  <div class="card innerBox mode3  p-0">
    <div class="card-body">
      <h5 class="card-title w-100">Update type <span class="float-right" style="cursor:pointer;"
          onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
      <hr>
      <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input
        fields.</h6>
      <p class="card-text text-muted">The correct column order is (name*, parent_type) and you must
        follow this.</p>
        <form action="{{route('update-product-type')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="hidden" class="form-control" id="type_id" name="type_id"  required>
        <div class="row">
          <div class="col-12 col-md-12 form-group">
            <label for="catName">Name *</label>
            <input type="text" class="form-control" name="name" id="name">
          </div>
          <div class="col-12 text-left">
            <button class="btn btn-primary ml-1 ">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <!-- <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>type</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View type</li>
            </ol>
          </div>
        </div>
      </div> -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Product Type</h3>
            </div>
            <!-- /.card-header -->
            <div class="card shadow-none">
              <div class="card-header d-flex flex-column flex-sm-row">
                <button class="btn btn-info" onclick="openMode1()"><i class="fa fa-add"></i>&emsp;Add type</button>
                <button class="btn btn-primary mt-3 mt-sm-0 ml-0 ml-sm-3" onclick="openMode2()"><i
                    class="fa fa-file"></i>&emsp;Import type</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Sr No.</th>
                      <th>Type</th>
                      <th>Number of Product</th>
                      <th>Stock Quantity</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $counter = 1;
                    @endphp
                    @foreach($type as $types)
                    <tr>
                      <td>{{$counter}}</td>
                      <td>{{$types->name}}</td>
                      <td>{{$types->no_product}}</td>
                      <td>{{$types->stock_qty}}</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-outline-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle dropdown-icon"
                            data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right" role="menu">
                            <button value="{{$types->id}}" class="dropdown-item edit_btn" onclick="openMode3()"><i
                                class="fa fa-edit"></i>Edit</button>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"
                              href="{{asset('product/delete-type/'. $types->id)}}"><span><i
                                  class="fa fa-fw fa-trash"></i></span> Delete</a>
                          </div>
                        </div>
                      </td>
                      @php
                      $counter++;
                      @endphp
                      @endforeach

                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Sr No.</th>
                      <th>Type</th>
                      <th>Number of Product</th>
                      <th>Stock Quantity</th>
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
      var type_id = $(this).val();

      $.ajax({
        type: "GET",
        url: "/product/edit-type/" + type_id,
        success: function (response) {
          console.log(response);
          $("#type_id").val(response.id);
          $("#name").val(response.name);
        }
      })

    });
  });
</script>

<!-- /.content-wrapper -->
@include('client.component.tablefooter')