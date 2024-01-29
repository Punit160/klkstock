@include('client.component.head')
@include('client.component.header')
@include('client.component.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add brand</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add brand</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="card px-4">
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
                <form action="{{route('update-brand')}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="row bg-white rounded pb-4">
                        <div class="col-12 text-muted my-4 mt-4">
                            <h5 class="font-weight-bold">Add brand Form</h5>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 form-group">
                            <input type="hidden" name="wid" value="{{$brand->id}}">
                            <label for="contact" title="* field are required to be filled.">Name *</label>
                            <input type="text" class="form-control" name="title" placeholder=" title *" value="{{$brand->title}}" required>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 form-group">
                            <label for="contact" title="* field are required to be filled.">Logo*</label>
                            <input type="file" name="logo" id="logo" class="form-control" value="{{$brand->logo}}" style=" text-align: center; ">
                        </div>

                       


                        <button class="btn btn-primary m-auto px-4">Submit</button>

                    </div>
                </form>
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('client.component.footer')