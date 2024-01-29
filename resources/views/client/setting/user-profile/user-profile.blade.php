@include('client.component.tablehead')
@include('client.component.header')
@include('client.component.sidebar')

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
            <div class="row justify-content-center">
                <div class="col-lg-6  mb-4 col-md-12 col-sm-12  ">
                    <div class="card cardleft " style="border-top: 4px solid #0c1476; border-bottom: 4px solid #0c1476;">
                        <div class="card-header w-100">
                            <h3 class="card-title">Update User Profile</h3>
                        </div>
                        <div class="card-body p-4">
                            <h6 class="card-subtitle mb-2 text-muted small">The field labels marked with * are
                                required input
                                fields.</h6>
                            <form action="{{route('update-profile')}}" method="POST" enctype='multipart/form-data'>
                                @csrf <div class="form-row">
                                    <div class="form-group col-12">
                                        <label for="inputName">Name *</label>
                                        <input type="hidden"  name="pid" value="{{$user->id}}">
                                        <input type="text" class="form-control"  name="name"id="name" placeholder="Enter name" value="{{$user->name}}">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="inputPhone">Email *</label>
                                        <input type="email" class="form-control"  name="email"id="email" placeholder="Enter Email" value="{{$user->email}}">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="inputPhone">Phone Number *</label>
                                        <input type="phone" class="form-control"  name="phone"id="phone" placeholder="Enter phone number" value="{{$user->phone}}">
                                    </div>
                                    <!-- <div class="form-group col-12">
                                        <label for="inputPhone">Company Name </label>
                                        <input type="phone" class="form-control" id="" placeholder="Enter Company Name">
                                    </div> -->
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6  mb-4 col-md-12 col-sm-12 pl-lg-2">
                    <div class="card cardRight  " style="border-top: 4px solid #0c1476; border-bottom: 4px solid #0c1476; max-height: fit-content;">
                        <div class="card-header w-100">
                            <h3 class="card-title">Change Password</h3>
                        </div>
                        <div class="card-bod p-4">
                        <form action="{{route('change-password')}}" method="POST" enctype='multipart/form-data'>
                                @csrf                                 <div class="form-row">
                                    <div class="form-group col-12">
                                        <label for="CurrentPassword">Current Password *</label>
                                        <input type="text" class="form-control" name="CurrentPassword"id="CurrentPassword" placeholder="Enter Current Password">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="NewPassword">New Password *</label>
                                        <input type="text" class="form-control"  name="NewPassword"id="NewPassword" placeholder="Enter New Password">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="ConfirmPassword">Confirm Password *</label>
                                        <input type="text" class="form-control" name="ConfirmPassword"  id="ConfirmPassword" placeholder="Enter Confirms Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary ml-2">Submit</button>
                                </div>

                            </form>
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
            var role_id = $(this).val();
            console.log(role_id);
            $.ajax({
                type: "GET",
                url: "/role-permission/edit-role/" + role_id,
                success: function(response) {
                    console.log(response);
                    $("#role_id").val(response.id);
                    $("#name").val(response.name);
                    $("#description").val(response.description);
                }
            })

        });
    });
</script>

@include('client.component.tablefooter')