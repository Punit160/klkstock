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
                            <h1>Add Purchase</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add Purchase</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Add Purchase</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <p class="italic"><small>The field labels marked with * are required input fields.</small>
                            </p>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" class="form-control date-input"
                                                data-target="#reservationdate">
                                            <div class="input-group-append" data-target="#reservationdate"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="customFile">Attach Document</label>

                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Warehouse *</label>
                                        <select class="form-control select2" name="type" style="width: 100%;" required>
                                        <option value="">Choose...</option>
                                        @foreach ($warehouse as $warehouses)
                                       <option value="{{$warehouses->name}}">{{$warehouses->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Supplier *</label>
                                        <select class="form-control select2" name="category" style="width: 100%;"
                                            required>
                                            <option disabled>Choose...</option>
                                            @foreach ($supplier as $suppliers)
                                            <option value="{{$suppliers->id}}">{{$suppliers->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Purchase Status</label>
                                        <select class="form-control select2" name="brand" style="width: 100%;" required>
                                            <option disabled>Choose...</option>
                                            <option value="pending">Pending</option>
                                            <option value="recieved">Recieved</option>
                                            <option value="partial">Partial</option>
                                            <option value="ordered">Ordered</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Order Tax *</label>
                                        <select class="form-control select2" name="type" style="width: 100%;" required>
                                            <option Value = "">No Tax</option>
                                            @foreach($tax as $taxes)
                                            <option value="{{$taxes->name}}">{{$taxes->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                        

                                <div class="col-md-12">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Terms & Conditions</label>
                                        <textarea id="summernote" style="display: none;">Place &lt;em&gt;some&lt;/em&gt; &lt;u&gt;text&lt;/u&gt; &lt;strong&gt;here&lt;/strong&gt;
                                        </textarea>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="card ">
                                        <div class="card-header card-grey">
                                            <h3 class="card-title">Order List *</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body card-footer">
                                            <table class="table table-bordered" id="dynamicPurchase">
                                                <thead>
                                                    <tr>
                                                        <td>Product Type</td>
                                                        <td>Name</td>
                                                        <td>Quantity</td>
                                                        <td>Price</td>
                                                        <td>Tax</td>
                                                        <td>SubTotal</td>
                                                        <td>Action</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><select name="types[]" id="type_0_name"
                                                                class="form-control type type0" data-index="0">
                                                                <option value="">-- Choose Type --</option>
                                                                @foreach($type as $types)
									                         <option value="{{$types->name}}">{{$types->name}}</option>
									                            @endforeach
                                                            </select></td>
                                                        <td> <select name="product" id="product_0_name"
                                                                class="form-control product_name product_name0"
                                                                data-index="0"><option value="">-- Choose Product --</option></select> 
                                                             </td>
                                                        <td><input type="text" id="quantity0'" name="quantities[]"
                                                                class="form-control" /></td>
                                                        <td><input type="number" id="price0" name="prices[]"
                                                                class="form-control" /></td>
                                                        <td><input type="number" id="tax0" name="taxes[]"
                                                                class="form-control" /></td>
                                                        <td><input type="number" id="subtotal0" name="subtotals[]"
                                                                class="form-control" /></td>
                                                        <td><button type="button"
                                                                class="pull-right btn btn-danger rounded-circle remove-tr"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                    <button name="add" id="add" class="btn btn-info rounded-circle pull-left"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Discount *</label>
                                        <input type="number" class="form-control" name="discount"
                                            id="exampleInputEmail1" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Shipping Cost *</label>
                                        <input type="number" class="form-control" name="product_price"
                                            id="exampleInputEmail1" required>
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
                    <!-- /.card -->

                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->



@include('client.component.page-footer')