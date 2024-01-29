@include('client.component.head')
@include('client.component.header')
@include('client.component.sidebar')
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Create Discount</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Discount</li>
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
                <h3 class="card-title">Create Discount</h3>
              </div>
              <!-- /.card-header -->
              <div class="card shadow-none">
                <!-- /.card-header -->
                <div class="card-body">
                  <p class="text-muted small">The field labels marked with * are required input fields.</p>
                  <form action="{{route('save-discount')}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                      <div class="col-12 col-md-6 col-lg-3 form-group">
                        <label for="name">Name *</label>
                        <input type="text" name="name" id="name" class="form-control" requiree>
                      </div>
                      <div class="col-12 col-md-6 col-lg-3 form-group">
                        <label for="dplan">Discount Plan *</label>
                        <select name="plan" id="plan" class="form-control" required >
                          <option value="dis" class="d-none" selected disabled>-- Select Plan --</option>
                          <option value="vip1">VIP Plan 1</option>
                          <option value="vip2">VIP Plan 2</option>
                        </select>
                      </div>
                      <div class="col-12 col-md-6 col-lg-3 form-group">
                        <label for="productApp">Applicable For *</label>
                        <select name="applicable" id="applicable" class="form-control products" onchange="showspecProd()" required>
                          <option value="all">All Products</option>
                          <option value="spec">Specified Products</option>
                        </select>
                      </div>
                      <div class="col-12 col-md-6 col-lg-3 form-group" required >
                        <label for="status">Status *</label>
                        <div class="row p-2">
                          <div class="col-6">
                            <input type="radio" name="status" id="s1" value="Active"> 
                          </div>
                          <div class="col-6">
                            <input type="radio" name="status" id="s2" value="Disabled"> 
                          </div>
                        </div>
                      </div>
                      <div class="col-12 form-group " id="specProd" style="display: none;">
                        <label for="name">Select Product *</label>
                        <input type="text" name="selectProd" id="selectProd" class="form-control" placeholder="Type product code seperated by comma">
                        <table class="table table-striped mt-3 d-block d-md-table overflow-auto">
                          <thead class="table-active">
                            <th class="text-center"><i class="fa fa-navicon"></i></th>
                            <th>Name</th>
                            <th>Code</th>
                            <th class="text-center"><i class="fa fa-trash-alt"></i></th>
                          </thead>
                          <tbody>
                            <td class="text-center">1</td>
                            <td>Dimak</td>
                            <td>1glesghuhgs</td>
                            <td class="text-center"><button class="w-md-25 btn btn-danger"><i class="fa fa-trash-alt"></i></button></td>
                          </tbody>
                        </table>
                      </div>

                      <div class="col-12 col-md-6 col-lg-4 form-group">
                        <label for="validFrom">Valid From *</label>
                        <input type="date" name="valid_from" id="valid_from" class="form-control" required>
                      </div>
                      <div class="col-12 col-md-6 col-lg-4 form-group">
                        <label for="validTill">Valid Till *</label>
                        <input type="date" name="valid_till" id="valid_till" class="form-control" required>
                      </div>
                      <div class="col-12 col-md-6 col-lg-4 form-group">
                        <label for="disType">Discount Type *</label>
                        <select name="type" id="type" class="form-control" required>
                          <option value="percentage" selected>Percentage (%)</option>
                          <option value="spec">Specified Products</option>
                        </select>
                      </div>
                      <div class="col-12 col-md-6 col-lg-4 form-group">
                        <label for="value">Value *</label>
                        <input type="number" name="value" id="value" class="form-control" required>
                      </div>
                      <div class="col-12 col-md-6 col-lg-4 form-group">
                        <label for="min_qty">Minimum Quantity *</label>
                        <input type="number" name="min_qty" id="min_qty" class="form-control" required>
                      </div>
                      <div class="col-12 col-md-6 col-lg-4 form-group">
                        <label for="max_qty">Maximum Quantity *</label>
                        <input type="number" name="max_qty" id="max_qty" class="form-control" required>
                      </div>
                      <div class="col-12 col-md-6 col-lg-4 form-group">
                        <label for="day">Valid on the following days </label>
                        <div class="row">
                          <div class="col-12"><input type="checkbox" name="monday" id="mon">&emsp;Monday</div>
                          <div class="col-12"><input type="checkbox" name="tuesday" id="tue">&emsp;Tuesday</div>
                          <div class="col-12"><input type="checkbox" name="wednesday" id="wed">&emsp;Wednesday</div>
                          <div class="col-12"><input type="checkbox" name="thursday" id="thu">&emsp;Thursday</div>
                          <div class="col-12"><input type="checkbox" name="friday" id="fri">&emsp;Friday</div>
                          <div class="col-12"><input type="checkbox" name="saturday" id="sat">&emsp;Saturday</div>
                          <div class="col-12"><input type="checkbox" name="sunday" id="sun">&emsp;Sunday</div>
                        </div>
                      </div>
                    </div>
                
                </div>
                <!-- /.card-body -->
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-12">
                    <button class="btn btn-primary px-3 py-2">Submit</button>
                  </div>
                </div>
              </div>
                </form>
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
  function showspecProd(){
    let sp = document.getElementsByClassName('products');
    let specialProd = document.querySelector('#specProd');
    if(sp[0].value == 'spec'){
      specialProd.style.display = "block";
    }
    else{
      specialProd.style.display = "none";
    }
  }
</script>
@include('client.component.footer')