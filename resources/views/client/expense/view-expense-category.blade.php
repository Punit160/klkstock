@include('client.component.tablehead')
@include('client.component.header')
@include('client.component.sidebar')
<!-- Content Wrapper. Contains page content -->
         <!-- Expense Category -->
         <div class="mainBox m-0 py-0">

            <!-- Add Expense Category -->
            <div class="card innerBox mode1 mx-4 mx-sm-auto p-0">
                    <div class="card-body">
                      <h5 class="card-title w-100">Add Expense Category <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
                      <hr>
                      <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input fields.</h6>
                      <form action="{{route('save-expense-category')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" name="name" placeholder="Type expense category name">
                            </div>
                            <div class="col-12 ">
                                <button class="btn btn-primary w-md-25">Submit</button>
                            </div>
                        </div>
                      </form>
                    </div>
            </div>

            <!-- Import Expense Category -->
            <div class="card innerBox mode2 mx-4 mx-sm-auto p-0">
                    <div class="card-body">
                      <h5 class="card-title w-100">Import Expense Category <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
                      <hr>
                      <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input fields.</h6>
                      <p class="text-muted">The correct column order is (category name*) and you must follow this.</p>
                      <form action="{{route('import-expense-category')}}"  method="post" enctype="multipart/form-data">
                          @csrf
                        <div class="row">
                        <div class="col-12 col-sm-6 form-group">
            <label for="CSV">Upload CSV File *</label>
            <input type="file" class="form-control" name="file" accept=".csv, .xlsx, .xls" required>
          </div>
                            <div class="col-12 col-sm-6 form-group">
                                <label for="sample">Sample File</label>
                                <a href="{{asset('excel/expensecategory.csv')}}" class="btn btn-info w-100"><i class="fa fa-download"></i> Download</a>
                            </div>
                            <div class="col-12 ">
                                <button class="btn btn-primary w-md-25">Submit</button>
                            </div>
                        </div>
                      </form>
                    </div>
            </div>

            <!-- Update Expense Category -->
            <div class="card innerBox mode1 mx-4 mx-sm-auto p-0">
                <div class="card-body">
                  <h5 class="card-title w-100">Update Expense Category <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
                  <hr>
                  <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input fields.</h6>
                  <form action="{{route('update-expense-category')}}" method="POST" enctype="multipart/form-data">
                   @csrf
                   @method('put')
                  <input type="hidden" class="form-control" id="category_id" name="category_id"  required>
                    <div class="row">
                        <div class="col-12 form-group">
                            <label for="name">Name *</label>
                            <input type="text" class="form-control" name="name" id="name">
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
            <div class="row"></div>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mt-5">
                                <div class="card-header" style="background-color: #f7f7f7;">
                                    <h3 class="card-title">Expense Category</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card shadow-none">
                                    <div class="card-header">
                                        <div class="container-fluid d-flex flex-column flex-md-row">
                                            <button class="btn btn-info mx-2 my-2 btn-add-expenses" onclick="openMode1()"
                                                ><i class="dripicons-plus fa"></i><span class="fa mx-1">&#xf067</span>
                                                Add Expense Category</button>
                                                <button class="btn btn-primary mx-2 my-2 btn-add-expenses" onclick="openMode2()"
                                                ><i class="fa fa-file"></i>&emsp;
                                                Import Expense Category</button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped d-block d-md-table" style="overflow-x: scroll;">
                                            <thead>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php  $count = 1;  ?>
                                            @foreach($category as $categories)
                                                <tr>
                                                    <td>{{$count}}</td>
                                                    <td>{{$categories->name}}</td>
                                                    <td>
                                                    <div class="btn-group">
                                                      <button type="button" class="btn btn-outline-info">Action</button>
                                                      <button type="button" class="btn btn-info dropdown-toggle dropdown-icon"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                      </button>
                                                      <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                        <button value="{{$categories->id}}" class="dropdown-item edit_btn" onclick="openMode3()"><i
                                                            class="fa fa-edit"></i>Edit</button>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item"
                                                          href="{{asset('expense/delete-category/'. $categories->id)}}"><span><i
                                                              class="fa fa-fw fa-trash"></i></span> Delete</a>
                                                      </div>
                                                    </div>
                                                  </td>
                                                </tr>
                                                <?php  $count++;  ?>
                                            @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                    <th>Sr No.</th>
                                                    <th>Name</th>
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
      var cat_id = $(this).val();

      $.ajax({
        type: "GET",
        url: "/expense/edit-category/" + cat_id,
        success: function (response) {
          console.log(response);
          $("#category_id").val(response.id);
          $("#name").val(response.name);
        }
      })

    });
  });
</script>

        @include('client.component.tablefooter')