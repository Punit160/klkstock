@include('client.component.tablehead')
@include('client.component.header')
@include('client.component.sidebar')

<!-- Add Brand -->
<!-- <div class="mainBox m-0 py-0">
    <div class="card innerBox accnt p-0">
        <div class="card-body">
            <h5 class="card-title w-100">Add Brand <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
            <hr>
            <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input fields.</h6>
            <form action="{{route('save-brand')}}" method="POST" enctype='multipart/form-data'>
                @csrf
                <div class="row">
                    <div class="col-12 form-group">
                        <label for="title">Title *</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="col-12 form-group">
                        <label for="rate">Image *</label>
                        <input type="file" accept="image/*" name="logo" class="form-control">
                    </div>
                    <div class="col-12 col-sm-3">
                        <button class="btn btn-primary w-100">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card innerBox mode2 p-0">

        <div class="card-body">
            <h5 class="card-title w-100">Import Brand <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
            <hr>
            <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input fields.</h6>
            <p class="card-subtitle mb-2 text-muted mt-3">The correct column order is (title*, image [file name]) and you must follow this.</p>
            <p class="card-subtitle mb-2 text-muted mt-3">To display Image it must be stored in public/images/brand directory.</p>
            <form action="{{route('import-brand')}}" method="POST" enctype='multipart/form-data'>
                @csrf
                <div class="row  mt-4">
                    <div class="col-6 form-group">
                        <label for="cName">Upload CSV File * *</label>
                        <input type="file" class="form-control" name="brand"  required>
                    </div>
                    <div class="col-6 form-group">
                        <label for="code">Sample File</label>
                        <button class="btn btn-info w-100"><i class="fa fa-download"></i>Download</button>
                    </div>
                    <div class="col-12 col-sm-3">
                        <button class="btn btn-primary w-100">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card innerBox mode3 accnt p-0">
        <div class="card-body">
            <h5 class="card-title w-100">Update Brand <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
            <hr>
            <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input fields.</h6>
            <form action="{{route('update-brand')}}" method="POST" enctype='multipart/form-data'>
                @csrf <div class="row">
                    <div class="col-12 form-group">
                        <input type="hidden"  name="brand_id" id="brand_id">
                        <label for="title">Title *</label>
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div>
                    <div class="col-12 form-group">
                        <label for="rate">Logo*</label>
                        <input type="file" accept="image/*" name="logo" id="logo" class="form-control" >
                        <span id="logo" ></span>
                    </div>
                    <div class="col-12 col-sm-3">
                        <button class="btn btn-primary w-100">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
                        <!-- <div class="col-sm-6">
                            <h1>Update User Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Update User Profile</li>
                            </ol>
                        </div> -->
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-lg-12  mb-4 col-md-12 col-sm-12  ">
                            <div class="card cardleft "
                                style="border-top: 4px solid #0c1476; border-bottom: 4px solid #0c1476;">
                                <div class="card-header w-100">
                                    <h3 class="card-title">General Setting</h3>
                                </div>
                                <div class="card-body p-4">
                                    <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are
                                        required input fields.</h6>
                                    <form action="{{route('save-general')}}" method="POST"  class="mt-4" enctype='multipart/form-data'>
                    @csrf
                                        <div class=" form-row p-2">
                                            <div class="form-group col-lg-4  col-sm-12">
                                                <label for="systemTitle">System Title *</label>
                                                <input type="text" class="form-control" name="sys_title">
                                            </div>
                                            <div class="form-group col-lg-4  col-sm-12">
                                                <label for="systemLogo">System Logo *</label>
                                                <input type="file" class="form-control" name="sys_logo">
                                            </div>
                                            <div class="form-group col-lg-4 col-sm-12 pl-4">
                                                <label>&nbsp;</label>
                                                <div class="row">
                                                    <input type="checkbox" name="rtl"  value="1">
                                                    <label for="systemTitle" class="mt-2"  >&emsp;RTL Layout</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-4  col-sm-12">
                                                <label for="CompanyName">Company Name </label>
                                                <input type="text" class="form-control" id="CompanyName" name="company_name">
                                            </div>
                                            <div class="form-group col-lg-4 col-sm-12">
                                                <label for="vat">VAT Registration Number </label>
                                                <input type="text" class="form-control" id="vat"  name="vat_no">
                                            </div>
                                            <div class="form-group col-lg-4  col-sm-12">
                                                <label for="time">Time Zone </label>
                                                <select class="form-control"  name="time_zone">
                                                    <option>GMT+5:30</option>
                                                    <option>GMT+5:30</option>
                                                    <option>GMT+5:30</option>
                                                    <option>GMT+5:30</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-4 col-sm-12">
                                                <label for="Currency">Currency *</label>
                                                <select class="form-control"  name="currency">
                                                    <option>rupee</option>
                                                    <option>yan</option>
                                                    <option>Pond</option>
                                                    <option>Dollar</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-4 col-sm-12">
                                                <label for="vat">Current Position * </label>
                                                <div class="row pl-2 mt-2">

                                                    <div class="form-check col-4">
                                                        <input type="radio" class="form-check-input" id="suffixRadio1"
                                                            name="current_pstn"  value="Suffix">
                                                        <label class="form-check-label"
                                                            for="suffixRadio1">Suffix</label>
                                                    </div>
                                                    <div class="form-check col-4">
                                                        <input type="radio" class="form-check-input" id="suffixRadio2"
                                                            name="current_pstn" value="Prefix">
                                                        <label class="form-check-label"
                                                            for="suffixRadio2">Prefix</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group col-lg-4 col-sm-12">
                                                <label for="digit">Digits after deciaml point * </label>
                                                <input type="number" class="form-control" id="digit"  name="after_decimal">
                                            </div>
                                            <div class="form-group col-lg-4 col-sm-12">
                                                <label for="vat">Sale and Quotation without stock * </label>
                                                <div class="row pl-2 mt-2">

                                                    <div class="form-check col-2">
                                                        <input type="radio" class="form-check-input" id="suffixRadio1"
                                                            name="without_stock">
                                                        <label class="form-check-label" for="suffixRadio1">Yes</label>
                                                    </div>
                                                    <div class="form-check col-3">
                                                        <input type="radio" class="form-check-input" id="suffixRadio2"
                                                            name="without_stock">
                                                        <label class="form-check-label" for="suffixRadio2">No</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group col-lg-4  col-sm-12">
                                                <label for="time">Staff Access * </label>
                                                <select class="form-control" name="staff_access">
                                                    <option>Own Records</option>
                                                    <option>All Records</option>

                                                </select>
                                            </div>
                                            <div class="form-group col-lg-4  col-sm-12">
                                                <label for="time">Invoice Format *</label>
                                                <select class="form-control" name="invoice_formet">
                                                    <option>Indian GST</option>
                                                    <option>Standard</option>

                                                </select>
                                            </div>
                                            <div class="form-group col-lg-4  col-sm-12">
                                                <label for="time">Date Format *</label>
                                                <select class="form-control" name="date_formet">
                                                    <option>dd-mm-yy</option>
                                                    <option>mm-dd-yy</option>

                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary ">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </section>
        </div>
<!-- /.content-wrapper -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.edit_btn', function() {
            var brand_id = $(this).val();
            console.log(brand_id);
            $.ajax({
                type: "GET",
                url: "/brand/edit-brand/" + brand_id,
                success: function(response) {
                    console.log(response);
                    $("#brand_id").val(response.id);
                    $("#title").val(response.title);
                    $("#logo").val(response.logo);
                             }
            })

        });
    });
</script>
@include('client.component.tablefooter')