@include('client.component.tablehead')
@include('client.component.header')
@include('client.component.sidebar')
<!-- Content Wrapper. Contains page content -->


<!-- Content Wrapper. Contains page content -->
<div class="mainBox m-0 py-0">
  <div class="card innerBox accnt p-0">
    <div class="card-body">
      <h5 class="card-title w-100">Add Tax <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
      <hr>
      <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input fields.</h6>
      <form action="{{route('save-tax')}}" method="POST" enctype='multipart/form-data'>
        @csrf
        <div class="row">
          <div class="col-12 col-sm-6 form-group">
            <label for="taxName">Tax Name *</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="col-12 col-sm-6 form-group">
            <label for="rate">Rate(%) *</label>
            <input type="number" name="rate" class="form-control">
          </div>
          <div class="col-12 col-sm-3">
            <button class="btn btn-primary w-100">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="card innerBox mode2 accnt p-0">
    <div class="card-body">
      <h5 class="card-title w-100">Import Tax <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
      <hr>
      <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input fields.</h6>
      <p class="card-subtitle mb-2 text-muted mt-3">The correct column order is (name*, rate*) and you must follow this.</p>
      <form action="{{route('import-tax')}}" method="POST" enctype='multipart/form-data'>
        @csrf <div class="row mt-3">
          <div class="col-12 col-sm-6 form-group">
            <label for="csv">Upload CSV File *</label>
            <input type="file" class="form-control" name="tax" id="tax">
          </div>
          <div class="col-12 col-sm-6 form-group">
            <label for="sample">Sample File *</label>
            <button class="btn btn-info  w-100"><i class="fa fa-download"></i>&emsp;Download</button>
          </div>
          <div class="col-12 col-sm-3 mt-3">
            <button class="btn btn-primary w-100">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="card innerBox mode3 accnt p-0">
    <div class="card-body">
      <h5 class="card-title w-100">Edit Tax <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
      <hr>
      <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input fields.</h6>
      <p class="card-subtitle mb-2 text-muted mt-3">The correct column order is (name, rate) and you must follow this.</p>
      <form action="{{route('update-tax')}}" method="POST" enctype='multipart/form-data'>
        @csrf <div class="row">
          <div class="col-12 col-sm-6 form-group">
            <label for="name">Tax Name *</label>
            <input type="hidden" name="tax_id" id="tax_id">
            <input type="text" class="form-control" name="name" id="name">
          </div>
          <div class="col-12 col-sm-6 form-group">
            <label for="rate">Rate(%) *</label>
            <input type="number" name="rate" id="rate" class="form-control">
          </div>
          <div class="col-12 col-sm-3">
            <button class="btn btn-primary w-100">Submit</button>
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
          <h1>Tax</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tax</li>
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
          <div class="card">
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
              <h3 class="card-title">Tax</h3>
            </div>
            <!-- /.card-header -->
            <div class="card shadow-none">
              <div class="card-header d-flex flex-column flex-sm-row">
                <button class="btn btn-info" onclick="openMode1()"><i class="fa fa-plus"></i>&emsp;Add Tax</button>
                <button class="btn btn-primary ml-0 ml-sm-3 mt-3 mt-sm-0" onclick="openMode2()"><i class="fa fa-file"></i>&emsp;Import Tax</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Sr NO</th>
                      <th> Tax Name</th>
                      <th>Tax Rate(%)</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $count = 1; @endphp
                    @foreach($tax as $taxs)
                    <tr class="border-top border-bottom">
                      <td class="text-center">{{$count}}</td>
                      <td class="text-center">{{$taxs->name}}</td>
                      <td class="text-center">{{$taxs->rate}}</td>
                      <td class="text-center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-outline-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right" role="menu">
                            <button value="{{$taxs->id}}" class="dropdown-item edit_btn" onclick="openMode3()"><i class="fa fa-edit"></i>Edit</button>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('delete-tax', ['id' => $taxs->id]) }}" onclick="return confirm('Are you sure you want to delete this task?') "><span><i class="fa fa-fw fa-trash"></i></span> Delete</a>
                          </div>
                        </div>
                      </td>

                      @php $count++; @endphp
                    </tr>
                    @endforeach

                  </tbody>


                  <tfoot>
                    <tr>
                      <th>Sr NO</th>
                      <th>Name</th>
                      <th>Rate(%)</th>
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
  $(document).ready(function() {
    $(document).on('click', '.edit_btn', function() {
      var tax_id = $(this).val();
      console.log(tax_id);
      $.ajax({
        type: "GET",
        url: "/tax/edit-tax/" + tax_id,
        success: function(response) {
          console.log(response);
          $("#tax_id").val(response.id);
          $("#name").val(response.name);
          $("#rate").val(response.rate);
        }
      })

    });
  });
</script>
@include('client.component.tablefooter')