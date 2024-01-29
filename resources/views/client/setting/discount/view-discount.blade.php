@include('client.component.tablehead')
@include('client.component.header')
@include('client.component.sidebar')

<div class="mainBox m-0 py-0">
  <div class="card innerBox accnt p-0">
    <div class="card-body">
      <h5 class="card-title w-100">Create Discount Plan <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
      <hr>
      <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input fields.</h6>
      <form action="#">
        <div class="row">
          <div class="col-12 col-sm-6 form-group">
            <label for="name">Name *</label>
            <input type="text" class="form-control" name="name" id="name">
          </div>
          <div class="col-12 col-sm-6 form-group">
            <label for="customer">Customer *</label>
            <input type="text" class="form-control" name="customer" id="customer">
          </div>
          <div class="col-12 form-group">
            <label for="status">Status</label>
            <div class="row">
              <div class="col-6 form-group">
                <input type="radio" name="status" id="s1"> Active
              </div>
              <div class="col-6 form-group">
                <input type="radio" name="status" id="s2"> Disabled
              </div>
            </div>
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
      <h5 class="card-title w-100">Update Discount Plan <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
      <hr>
      <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input fields.</h6>
      <form action="#">
        <div class="row">
          <div class="col-12 col-sm-6 form-group">
            <label for="name">Name *</label>
            <input type="text" class="form-control" name="name" id="name">
          </div>
          <div class="col-12 col-sm-6 form-group">
            <label for="customer">Customer *</label>
            <input type="text" class="form-control" name="customer" id="customer">
          </div>
          <div class="col-12 form-group">
            <label for="status">Status</label>
            <div class="row">
              <div class="col-6 form-group">
                <input type="radio" name="status" id="s1"> Active
              </div>
              <div class="col-6 form-group">
                <input type="radio" name="status" id="s2"> Disabled
              </div>
            </div>
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
          <h1>Discount</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Discount</li>
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
              <h3 class="card-title">Discount</h3>
            </div>
            <!-- /.card-header -->
            <div class="card shadow-none">
              <div class="card-header">
                <a class="btn btn-info" href="{{route('add-discount')}}"><i class="fa fa-plus"></i>&emsp;Create Discount</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Name</th>
                      <th>Value</th>
                      <th>Discount Plan</th>
                      <th>Validity</th>
                      <th>Days</th>
                      <th>Products</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    @php $count = 1; @endphp
                    @foreach($Discount as $Discounts)
                    <tr class="border-top border-bottom">
                      <td class="text-center">{{$count}}</td>
                      <td class="text-center">{{$Discounts->name}}</td>
                      <td class="text-center">{{$Discounts->value}}</td>
                      <td class="text-center">{{$Discounts->plan}}</td>
                      <td class="text-center">{{$Discounts->valid_from}}/{{$Discounts->valid_till}}</td>
                      <td class="text-center">{{$Discounts->min_qty}}</td>
                      <td class="text-center">{{$Discounts->type}}</td>
                      <td class="text-center">{{$Discounts->status}}</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-outline-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right" role="menu">
                          <a class="dropdown-item" href="{{  route('edit-discount', ['id' => $Discounts->id]) }}"><span><i class="fa fa-fw fa-edit"></i></span> Edit</a>

                            <!-- <button value="{{$Discounts->id}}" class="dropdown-item edit_btn"><i class="fa fa-edit"></i>Edit</button> -->
                            <div class="dropdown-divider"></div>
                          </div>
                        </div>
                      </td>


                      @php $count++; @endphp
                    </tr>
                    @endforeach

                  </tbody>
                  <tfoot>
                    <tr>
                      <th></th>
                      <th>Name</th>
                      <th>Value</th>
                      <th>Discount Plan</th>
                      <th>Validity</th>
                      <th>Days</th>
                      <th>Products</th>
                      <th>Status</th>
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

@include('client.component.tablefooter')