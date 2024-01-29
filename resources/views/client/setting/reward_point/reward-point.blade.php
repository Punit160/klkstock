@include('client.component.tablehead')
@include('client.component.header')
@include('client.component.sidebar')

<div class="content-wrapper" style="min-height: fit-content !important;">

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row"></div>
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default mt-5"  style="border-top: 4px solid #0c1476; border-bottom: 4px solid #0c1476;">
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
                <h3 class="card-title">Reward Point</h3>

                <div class="card-tools">
                    <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button> -->
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <p class="italic"><small>The field labels marked with * are required input fields.</small></p>
                <form action="{{route('save-reward-point')}}" method="POST" enctype='multipart/form-data'>
                    @csrf                 
                       <div class="row">

                       <input type="hidden" class="form-control" name="id" value="{{$rewardpoint->id}}">
                       <input type="hidden" class="form-control" name="company_id" value="{{$rewardpoint->company_id}}">

                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="soldamnt">Sold amount per point * <i class="fa fa-question-circle"
                                    title="This means how much point customer will get according to sold amount. For example, if you put 100 then for every 100 dollar spent customer will get one point as reward."></i></label>
                                <input type="number" class="form-control" name="sold_amt_per_point" value="{{$rewardpoint->sold_amt_per_point}}"
                                    id="sold_amt_per_point" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="minsoldamnt">Minumum sold amount to get point * <i class="fa fa-question-circle" 
                                    title="For example, if you put 100 then customer will only get pointafter spending 100 dollar or more."></i></label>
                                <input type="number" class="form-control" name="get_point_amt" id="get_point_amt"  value="{{$rewardpoint->get_point_amt}}"
                                    required />
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="expiry">Point Expiry Duration *</label>
                                <input type="number" class="form-control" name="expiry_point" id="expiry_point" value="{{$rewardpoint->expiry_point}}"
                                    required />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="durationType">Duration Type *</label>
                                <select name="duration_type" id="duration_type" class="form-control">
                                    <option {{$rewardpoint->duration_type === 'years' ? 'selected': '' }} value="years">Years</option>
                                    <option  {{$rewardpoint->duration_type === 'month' ? 'selected': '' }} value="month">Month</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status  *</label>
                                <select class="form-control select2" name="status" style="width: 100%;" required>
                                    <option {{$rewardpoint->status === '1' ? 'selected': '' }} value="1">Active Reward Point</option>
                                    <option {{$rewardpoint->status === '0' ? 'selected': '' }} value="0">Inactive Reward Point</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
              
                <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                <button type="reset" class="btn btn-default float-right">Cancel</button>
              </div>
              <!-- /.card-footer -->
        </div>
        </form>
        <!-- /.card -->

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