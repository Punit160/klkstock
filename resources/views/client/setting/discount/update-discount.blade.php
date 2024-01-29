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
          <!-- <h1>Update Discount</h1> -->
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Update Discount</li>
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
              <h3 class="card-title">Update Discount</h3>
            </div>
            <!-- /.card-header -->
            <div class="card shadow-none">
              <!-- /.card-header -->
              <div class="card-body">
                <p class="text-muted small">The field labels marked with * are required input fields.</p>
                <form action="{{route('update-discount')}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                  <div class="row">
                    <div class="col-12 col-md-6 col-lg-3 form-group">
                      <label for="name">Name *</label>
                      <input type="hidden" name="Discount_id" id="Discount_id" value="{{$Discount->id}}">
                      <input type="text" name="name" id="name" class="form-control" value="{{$Discount->name}}">
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-group">
                      <label for="dplan">Discount Plan *</label>
                      <select name="plan" id="plan" class="form-control">
                        <option value="" class="d-none" selected disabled>-- Select Plan --</option>
                        <option value="vip1" <?php echo ($Discount->plan === 'vip1') ? 'selected' : ''; ?>>VIP Plan 1</option>
                        <option value="vip2" <?php echo ($Discount->plan === 'vip2') ? 'selected' : ''; ?>>VIP Plan 2</option>
                      </select>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-group">
                      <label for="productApp">Applicable For *</label>
                      <select name="applicable" id="applicable" class="form-control products" onchange="showspecProd()">
                        <option value="all" <?php echo ($Discount->applicable === 'all') ? 'selected' : ''; ?>>All Products</option>
                        <option value="spec" <?php echo ($Discount->applicable === 'spec') ? 'selected' : ''; ?>>Specified Products</option>
                      </select>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 form-group">
    <label for="status">Status *</label>
    <div class="row p-2">
        <div class="col-6">
            <input type="radio" name="status" id="s1" value="Active" <?php echo ($Discount->status === 'Active') ? 'checked' : ''; ?>>
            <label for="s1">Active</label>
        </div>
        <div class="col-6">
            <input type="radio" name="status" id="s2" value="Disabled" <?php echo ($Discount->status === 'Disabled') ? 'checked' : ''; ?>>
            <label for="s2">Disabled</label>
        </div>
    </div>
</div>

                    <div class="col-12 form-group " id="specProd" style="display: none;">
                      <label for="name">Select Product *</label>
                      <input type="text" name="selectProd" id="selectProd" class="form-control" placeholder="Type product code seperated by comma">
                      <table class="table table-striped mt-3 d-block d-md-table" style="overflow-x: scroll;">
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
                      <input type="date" name="valid_from" id="valid_from" class="form-control" value="{{$Discount->valid_from}}">
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 form-group">
                      <label for="validTill">Valid Till *</label>
                      <input type="date" name="valid_till" id="valid_till" class="form-control" value="{{$Discount->valid_till}}">
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 form-group">
                      <label for="disType">Discount Type *</label>
                      <select name="type" id="type" class="form-control">
                        <option value="" selected>Select</option>
                        <option value="percentage" selected>Percentage (%)</option>
                        <option value="spec">Specified Products</option>
                      </select>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 form-group">
                      <label for="value">Value *</label>
                      <input type="number" name="value" id="value" class="form-control" value="{{$Discount->value}}">
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 form-group">
                      <label for="minQuant">Minimum Quantity *</label>
                      <input type="number" name="min_qty" id="min_qty" class="form-control" value="{{$Discount->min_qty}}">
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 form-group">
                      <label for="maxQuant">Maximum Quantity *</label>
                      <input type="number" name="max_qty" id="max_qty" class="form-control" value="{{$Discount->max_qty}}">
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 form-group">
                      <label for="maxQuant">Valid on the following days </label>
                      <div class="row">
                        <div class="col-12"><input type="checkbox" name="monday" id="mon" value="1" <?php echo ($Discount->monday === '1') ? 'checked' : ''; ?>>&emsp;Monday</div>
                        <div class="col-12"><input type="checkbox" name="tuesday" id="tue" value="1" <?php echo ($Discount->tuesday === '1') ? 'checked' : ''; ?>>&emsp;Tuesday</div>
                        <div class="col-12"><input type="checkbox" name="wednesday" id="wed" value="1" <?php echo ($Discount->wednesday === '1') ? 'checked' : ''; ?>>&emsp;Wednesday</div>
                        <div class="col-12"><input type="checkbox" name="thursday" id="thu" value="1" <?php echo ($Discount->thursday === '1') ? 'checked' : ''; ?>>&emsp;Thursday</div>
                        <div class="col-12"><input type="checkbox" name="friday" id="fri" value="1" <?php echo ($Discount->friday === '1') ? 'checked' : ''; ?>>&emsp;Friday</div>
                        <div class="col-12"><input type="checkbox" name="saturday" id="sat" value="1" <?php echo ($Discount->saturday === '1') ? 'checked' : ''; ?>>&emsp;Saturday</div>
                        <div class="col-12"><input type="checkbox" name="sunday" id="sun" value="1" <?php echo ($Discount->sunday === '1') ? 'checked' : ''; ?>>&emsp;Sunday</div>
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