@include('client.component.tablehead')
@include('client.component.header')
@include('client.component.sidebar')

<div class="mainBox m-0 py-0">

  <!-- Add Customer Group -->
  <div class="card innerBox mode1  p-0">
    <div class="card-body">
      <h5 class="card-title w-100">Add Customer Group<span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
      <hr>
      <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input
        fields.</h6>
      <form action="{{route('save-customerGroup')}}" method="POST" enctype='multipart/form-data'>
        @csrf
        <div class="row">
          <div class="col-12 form-group">
            <label for="custName">Name *</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="col-12 form-group">
            <label for="wareContact">Percentage(%) * <i class="fa fa-question-circle" title="If you want to sell your product at default price, then the percentage value must be zero."></i></label>
            <input type="phone" class="form-control" name="percentage">
          </div>
          <div class="text-left">
            <button class="btn btn-primary ml-1 ">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Import Customer Group -->
  <div class="card innerBox mode2  p-0">
    <div class="card-body">
      <h5 class="card-title w-100">Import Customer Group <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
      <hr>
      <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input
        fields.</h6>
      <p class="card-text text-muted">The correct column order is (name*, percentage*) and you must
        follow this.</p>
      <form action="{{route('import-customerGroup')}}" method="POST" enctype='multipart/form-data'>
        @csrf <div class="row">
          <div class="col-12 col-sm-6 form-group">
            <label for="CSV">Upload CSV File *</label>
            <input type="file" class="form-control" name="Customer" id="Customer">
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

  <!-- update Customer Group -->
  <div class="card innerBox mode3  p-0">
    <div class="card-body">
      <h5 class="card-title w-100">Update Customer Group <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
      <hr>
      <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input
        fields.</h6>
      <p class="card-text text-muted">The correct column order is (name*, parent_category) and you must
        follow this.</p>
      <form action="{{route('update-customerGroup')}}" method="POST" enctype='multipart/form-data'>
        @csrf <div class="row">
          <div class="col-12 form-group">
            <label for="custName">Name *</label>
            <input type="hidden" name="cid" id="cid">
            <input type="text" class="form-control" name="name" id="name">
          </div>
          <div class="col-12 form-group">
            <label for="wareContact">Percentage(%) * <i class="fa fa-question-circle" title="If you want to sell your product at default price, then the percentage value must be zero."></i></label>
            <input type="phone" class="form-control" name="percentage" id="percentage">
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
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <!-- <h1>Customer Group</h1> -->
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Customer Group</li>
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
          <div class="card" style="border-top: 4px solid #0c1476; border-bottom: 4px solid #0c1476;">
            <div class="card-header">
              <h3 class="card-title">Customer Group</h3>
            </div>
            <!-- /.card-header -->
            <div class="card shadow-none">
              <div class="card-header d-flex flex-column flex-sm-row">
                <button class="btn btn-info" onclick="openMode1()"><i class="fa fa-add"></i>&emsp;Add Customer Group</button>
                <button class="btn btn-primary mt-3 ml-0 mt-sm-0 ml-sm-3" onclick="openMode2()"><i class="fa fa-file"></i>&emsp;Import Customer Group</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="text-center">Sr No</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Percentage</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    @php $count = 1; @endphp
                    @foreach($Customer as $Customers)
                    <tr class="border-top border-bottom">
                      <td class="text-center">{{$count}}</td>
                      <td class="text-center">{{$Customers->name}}</td>
                      <td class="text-center">{{$Customers->percentage}}</td>

                     

                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-outline-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right" role="menu">
                            <button value="{{$Customers->id}}" class="dropdown-item edit_btn" onclick="openMode3()"><i class="fa fa-edit"></i>Edit</button>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{  route('delete-customerGroup', ['id' => $Customers->id]) }}" onclick="return confirm('Are you sure you want to delete this task?') "><span><i class="fa fa-fw fa-trash"></i></span> Delete</a>
                          </div>
                        </div>
                      </td>


                      @php $count++; @endphp
                    </tr>
                    @endforeach

                  </tbody>
                  <tfoot>
                    <tr>
                    <th class="text-center">Sr No</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Percentage</th>
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
<!-- /.content-wrapper -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  $(document).ready(function() {
    $(document).on('click', '.edit_btn', function() {
      var group_id = $(this).val();
      console.log(group_id);
      $.ajax({
        type: "GET",
        url: "/customerGroup/edit-customerGroup/" + group_id,
        success: function(response) {
          console.log(response);
          $("#cid").val(response.id);
          $("#name").val(response.name);
          $("#percentage").val(response.percentage);
        }
      })

    });
  });
</script>
@include('client.component.tablefooter')