@include('client.component.tablehead')
@include('client.component.header')
@include('client.component.sidebar')


<div class="mainBox m-0 py-0">

    <!-- Add Holiday -->
    <div class="card innerBox mode1  p-0">
        <div class="card-body">
            <h5 class="card-title w-100">Add Holiday<span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
            <hr>
            <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input
                fields.</h6>
            <form action="{{route('save-holiday')}}" method="POST" enctype='multipart/form-data'>
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6 form-group">
                        <label for="from">From *</label>
                        <input type="date" class="form-control" name="from">
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <label for="to">To *</label>
                        <input type="date" class="form-control" name="to">
                    </div>

                    <div class="col-12  form-group">
                        <label for="note">Note *</label>
                        <textarea class="form-control" rows="3" name="note"></textarea>
                    </div>
                    <div class="col-12 text-left">
                        <button class="btn btn-primary ">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card innerBox mode2  p-0">
        <div class="card-body">
            <h5 class="card-title w-100">Add Holiday<span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
            <hr>
            <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input
                fields.</h6>
            <form action="#">
                <div class="row">
                    <div class="col-12 col-md-6 form-group">
                        <label for="from">From *</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <label for="to">To *</label>
                        <input type="date" class="form-control">
                    </div>

                    <div class="col-12  form-group">
                        <label for="note">Note *</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <div class="col-12 text-left">
                        <button class="btn btn-primary ">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Update Holiday  -->
    <div class="card innerBox mode3  p-0">
        <div class="card-body">
            <h5 class="card-title w-100">Update Holiday <span class="float-right" style="cursor:pointer;" onclick="closeMe()"><i class="fa fa-close"></i></span></h5><br>
            <hr>
            <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are required input
                fields.</h6>

            <form action="{{route('update-holiday')}}" method="POST" enctype='multipart/form-data'>
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6 form-group">
                        <label for="catName">From *</label>
                        <input type="hidden" name="holiday_id" id="holiday_id">
                        <input type="date" class="form-control" name="from" id="from">
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <label for="catName">To *</label>
                        <input type="date" class="form-control" name="to" id="to">
                    </div>

                    <div class="col-12  form-group">
                        <label for="parent">Note *</label>
                        <textarea class="form-control" rows="3" name="note" id="note"></textarea>
                    </div>
                    <div class="col-12 text-left">
                        <button class="btn btn-primary ">Submit</button>
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
                    <!-- <h1>Holiday</h1> -->
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">View Holiday</li>
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
                            <h3 class="card-title">Holiday</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card shadow-none">
                            <div class="card-header">
                                <button class="btn btn-info" onclick="openMode1()"><i class="fa fa-add"></i>&emsp;Add
                                    Holiday</button>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr No</th>
                                            <th>Date</th>
                                            <th>Created By</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @php $count = 1; @endphp
                                        @foreach($holiday as $holidays)
                                        <tr class="border-top border-bottom">
                                            <td class="text-center">{{$count}}</td>
                                            <td class="text-center">{{$holidays->date}}</td>
                                            <td class="text-center">{{$holidays->created_by}}</td>
                                            <td class="text-center">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $holidays->from)->format('d-m-Y') }}</td>
                                            <td class="text-center"> {{ \Carbon\Carbon::createFromFormat('Y-m-d', $holidays->to)->format('d-m-Y') }}</td>
                                            <td class="text-center">{{$holidays->note}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-outline-info">Action</button>
                                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                        <button value="{{$holidays->id}}" class="dropdown-item edit_btn" onclick="openMode3()"><i class="fa fa-edit"></i>Edit</button>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="{{  route('delete-holiday', ['id' => $holidays->id]) }}" onclick="return confirm('Are you sure you want to delete this task?') "><span><i class="fa fa-fw fa-trash"></i></span> Delete</a>
                                                    </div>
                                                </div>
                                            </td>


                                            @php $count++; @endphp
                                        </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>

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
            var holiday_id = $(this).val();
            console.log(holiday_id);
            $.ajax({
                type: "GET",
                url: "/holiday/edit-holiday/" + holiday_id,
                success: function(response) {
                    console.log(response);
                    $("#holiday_id").val(response.id);
                    $("#from").val(response.from);
                    $("#to").val(response.to);
                    $("#note").val(response.note);

                }
            })

        });
    });
</script>
@include('client.component.tablefooter')