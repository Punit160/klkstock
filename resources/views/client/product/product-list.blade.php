@include('client.component.tablehead')
@include('client.component.header')
@include('client.component.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="mainBox m-0 py-0">

    
    <!-- Import Expense Category -->
    <div class="card innerBox mode1 mx-4 mx-sm-auto p-0">
      <div class="card-body">
        <h5 class="card-title w-100">Import Expense Category <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
        <hr>
        <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input fields.</h6>
        <h6 class="card-subtitle mb-2 text-muted mt-2">The correct column order is (image, name*, code*, type*, brand, category*, unit_code*, cost*, price*, product_details, variant_name, item_code, additional_price) and you must follow this.</p>
        <h6 class="card-subtitle mb-2 text-muted mt-2">To display Image it must be stored in public/images/product directory. Image name must be same as product name</h6>
          <form action="#">
          <div class="row mt-2">
              <div class="col-12 col-sm-6 form-group">
                  <label for="csv">Upload CSV File *</label>
                  <input type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" class="form-control" name="csv" id="csv" required>
              </div>
              <div class="col-12 col-sm-6 form-group">
                  <label for="sample">Sample File</label>
                  <button class="btn btn-info w-100"><i class="fa fa-download"></i>&emsp;Download</button>
                </div>
                <div class="col-12 ">
                    <button class="btn btn-primary w-md-25">Submit</button>
                </div>
            </div>
          </form>
        </div>
      </div>

    <!-- Product Details -->
    <div class="card innerBox mode2 p-0">
        <div class="card-body">
            <h5 class="card-title w-100">Product Details &emsp;<button class="btn btn-default" onclick="printMe()"><i class="fa fa-print"></i></button><span class="float-right" style="cursor:pointer;"
                    onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
            <hr>
            <div class="row" id="printo">
              <table style="width: 100%;">
                <thead>
                  <tr>
                    <td colspan="2" style="text-align: center;">Product Details</td>
                  </tr>
                </thead>
                <tbody>
                  <tr style="padding: 1rem;">
                    <td rowspan="13" style="width: 50%;"><img src="../image.png" alt="product image" width="100%" height="350"></td>
                    <td style="width: 50%;padding-left: 1rem"><strong>Type : </strong> standard</td>
                  </tr>
                  <tr>
                    <td style="padding-left: 1rem;"><strong>Name : </strong> Alpha</td>
                  </tr>
                  <tr>
                    <td style="padding-left: 1rem;"><strong>Code : </strong> 13145646</td>
                  </tr>
                  <tr>
                    <td style="padding-left: 1rem;"><strong>Brand : </strong> N/A</td>
                  </tr>
                  <tr>
                    <td style="padding-left: 1rem;"><strong>Category : </strong> food</td>
                  </tr>
                  <tr>
                    <td style="padding-left: 1rem;"><strong>Quantity : </strong> 12</td>
                  </tr>
                  <tr>
                    <td style="padding-left: 1rem;"><strong>Unit : </strong> kilogram</td>
                  </tr>
                  <tr>
                    <td style="padding-left: 1rem;"><strong>Cost : </strong> 12</td>
                  </tr>
                  <tr>
                    <td style="padding-left: 1rem;"><strong>Price : </strong> 25</td>
                  </tr>
                  <tr>
                    <td style="padding-left: 1rem;"><strong>Tax : </strong> N/A</td>
                  </tr>
                  <tr>
                    <td style="padding-left: 1rem;"><strong>Alert Quantity : </strong></td>
                  </tr>
                  <tr>
                    <td style="padding-left: 1rem;"><strong>Product Details : </strong></td>
                  </tr>
                </tbody>
              </table>

              <div class="col-12 mt-4 ">
                <h6 class="font-weight-bold">Warehouse Quantity</h6>
                <table class="table table-striped d-block d-md-table" style="overflow-x: scroll; width: 100%;border: 1px solid #ececec; margin-top: 20px; border-collapse: collapse;">
                  <thead style="background-color: #DFE0E1;">
                    <tr>
                      <th>Warehouse</th>
                      <th>Batch No</th>
                      <th>Expired Date</th>
                      <th>Quantity</th>
                      <th>IMEI or Serial Numbers</th>
                    </tr>
                  </thead>
                  <tbody style="text-align: center;">
                    <tr>
                      <td>Warehouse 1</td>
                      <td>453453</td>
                      <td>02-12-23</td>
                      <td>31</td>
                      <td>N/A</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
</div>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 mt-5">
            <div class="card" style="border-top: 4px solid #0c1476; border-bottom: 4px solid #0c1476;">
              <div class="card-header" style="background-color: #f7f7f7;">
                <h3 class="card-title">Product List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card shadow-none">
                <div class="card-header d-flex flex-column flex-sm-row ">
                    <a class="btn btn-info" href="{{route('add-product')}}"><i
                            class="fa fa-plus"></i>&emsp;Add Product</a>
                    <button class="btn btn-primary ml-0 ml-sm-3 mt-3 mt-sm-0"
                        onclick="openMode1()"><i class="fa fa-file"></i>&emsp;Import
                        Product</button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Cost</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($product as $products)
                    <tr>
                      <td><img width="50px" src="{{asset('uploads/image/'. $products->image)}}" alt="product"></td>
                      <td>{{$products->name}}</td>
                      <td>{{$products->product_code}}</td>
                      <td>{{$products->brand}}</td>
                      <td>{{$products->category}}</td>
                      <td>{{$products->type}}</td>
                      @php  $qty = DB::table('product_warehouse')->where('product_id',$products->id)->sum('quantity'); @endphp
                      <td>{{$qty}}</td>
                      <td>{{$products->product_unit}}</td>
                      <td>{{$products->price}}</td>
                      <td>{{$products->cost}}</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-outline-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right" role="menu">
                            <a class="dropdown-item" href="#" onclick="openMode2()"><span><i class="fa fa-fw fa-eye"></i></span> View</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="./update-product.html"><span><i class="fa fa-fw fa-edit"></i></span> Edit</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="./product-history.html"><span><i class="fa fa-fw fa-th-list"></i></span> Product History</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="./print-barcode.html"><span><i class="fa fa-fw fa-print"></i></span> Print Barcode</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><span><i class="fa fa-fw fa-trash"></i></span> Delete</a>
                          </div>
                      </div>
                    </td>
                    </tr>
                   @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                      <th>Image</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Type</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Cost</th>
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
  <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  function printMe(){
    var prtContent = document.getElementById("printo");
    var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
    WinPrint.document.write(prtContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
  }
</script>

  @include('client.component.tablefooter')