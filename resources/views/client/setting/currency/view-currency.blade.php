@include('client.component.tablehead')
@include('client.component.header')
@include('client.component.sidebar')

<div class="mainBox m-0 py-0">


    <div class="card innerBox mx-4 mode1 mx-sm-auto p-0">

        <div class="card-body">
            <h5 class="card-title w-100">Add Currency <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
            <hr>
            <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input fields.
            </h6>
            <form action="{{route('save-currency')}}" method="POST" enctype='multipart/form-data'>
                @csrf
                <div class="row">
                    <div class="col-12 form-group">
                        <label for="name">Name *</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-12 form-group">
                        <label for="currency_code">Code *</label>
                        <input type="text" class="form-control" name="currency_code">
                    </div>
                    <div class="col-12 form-group">
                        <label for="exchange_rate">Exchange Rate * <i class="fa fa-circle-question" title="If this is your default currency, the exchange rate must be 1."></i></label>
                        <input type="text" name="exchange_rate" class="form-control">
                    </div>
                    <div class="col-12 col-sm-3">
                        <button class="btn btn-primary w-100">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card innerBox mx-4 mode2 mx-sm-auto p-0">

        <div class="card-body">
            <h5 class="card-title w-100">Import Currency <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
            <hr>
            <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input fields.
            </h6>
            <form action="#" method="POST" enctype='multipart/form-data'>
                @csrf
                <div class="row">
                    <div class="col-12 form-group">
                        <label for="name">Name *</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-12 form-group">
                        <label for="currency_code">Code *</label>
                        <input type="text" class="form-control" name="currency_code">
                    </div>
                    <div class="col-12 form-group">
                        <label for="exchange_rate">Exchange Rate * <i class="fa fa-circle-question" title="If this is your default currency, the exchange rate must be 1."></i></label>
                        <input type="text" name="exchange_rate" class="form-control">
                    </div>
                    <div class="col-12 col-sm-3">
                        <button class="btn btn-primary w-100">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card innerBox mx-4 mode3 mx-sm-auto p-0">

        <div class="card-body">
            <h5 class="card-title w-100">Update Currency <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
            <hr>
            <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input fields.
            </h6>
            <form action="{{route('update-currency')}}" method="POST" enctype='multipart/form-data'>
                @csrf
                <div class="row">
                    <div class="col-12 form-group">
                        <input type="hidden" name="currency_id" id="currency_id">
                        <label for="name">Name *</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="col-12 form-group">
                        <label for="currency_code">Code *</label>
                        <input type="text" class="form-control" name="currency_code" id="currency_code">
                    </div>
                    <div class="col-12 form-group">
                        <label for="exchange_rate">Exchange Rate * <i class="fa fa-circle-question" title="If this is your default currency, the exchange rate must be 1."></i></label>
                        <input type="text" name="exchange_rate" id="exchange_rate" class="form-control">
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
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1>Currency</h1> -->
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Currency</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    
            <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">View Currency</h3>
                        </div>
                    <div class="card shadow-none">
                            <div class="card-header d-flex flex-column flex-sm-row ">
                                <button class="btn btn-info" onclick="openMode1()"><i class="fa fa-plus"></i>&emsp;Add Currency</button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            Sr. No.
                                        </th>
                                        <th>Currency Name</th>

                                        <th>
                                            Currency Code
                                        </th>
                                        <th>
                                            Exchange Rate
                                        </th>
                                        <th>
                                            Date
                                        </th>

                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="text-center">
                                    @php $count = 1; @endphp
                                    @foreach($currency as $currencys)
                                    <tr class="border-top border-bottom">
                                        <td class="text-center">{{$count}}</td>
                                        <td class="text-center">{{$currencys->name}}</td>
                                        <td class="text-center">{{$currencys->currency_code}}</td>
                                        <td class="text-center">{{$currencys->exchange_rate}}</td>
                                        <td class="text-center">{{$currencys->date}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-outline-info">Action</button>
                                                <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                    <button value="{{$currencys->id}}" class="dropdown-item edit_btn" onclick="openMode3()"><i class="fa fa-edit"></i>Edit</button>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="{{  route('delete-currency', ['id' => $currencys->id]) }}" onclick="return confirm('Are you sure you want to delete this task?') "><span><i class="fa fa-fw fa-trash"></i></span> Delete</a>
                                                </div>
                                            </div>
                                        </td>


                                        @php $count++; @endphp
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>
                                            Sr. No.
                                        </th>
                                        <th>Currency Name</th>

                                        <th>
                                            Currency Code
                                        </th>
                                        <th>
                                            Exchange Rate
                                        </th>
                                        <th>
                                            Date
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </tfoot>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card-body -->

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
            var currency_id = $(this).val();
            // console.log(currency_id);
            $.ajax({
                type: "GET",
                url: "/currency/edit-currency/" + currency_id,
                success: function(response) {
                    console.log(response);
                    $("#currency_id").val(response.id);
                    $("#name").val(response.name);
                    $("#exchange_rate").val(response.exchange_rate);
                    $("#currency_code").val(response.currency_code);

                }
            })

        });
    });
</script>
@include('client.component.tablefooter')