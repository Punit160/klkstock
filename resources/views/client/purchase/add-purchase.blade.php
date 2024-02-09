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
                <form action="{{route('save-purchase')}}" method="POST"  class="mt-4" enctype='multipart/form-data'>
                             @csrf
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
                                                data-target="#reservationdate" name="date">
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
                                            <input type="file" class="custom-file-input" id="customFile" name="document">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Warehouse *</label>
                                        <select class="form-control select2" name="warehouse" style="width: 100%;" name="warehouse" required>
                                        <option value="">Choose...</option>
                                        @foreach ($warehouse as $warehouses)
                                       <option value="{{$warehouses->name}}">{{$warehouses->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Supplier *</label>
                                        <select class="form-control select2" name="supplier" style="width: 100%;"
                                            required>
                                            <option disabled>Choose...</option>
                                            @foreach ($supplier as $suppliers)
                                            <option value="{{$suppliers->id}}">{{$suppliers->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Purchase Status</label>
                                        <select class="form-control select2" name="purch_status" style="width: 100%;" name="purch_status" required>
                                            <option disabled>Choose...</option>
                                            <option value="pending">Pending</option>
                                            <option value="recieved">Recieved</option>
                                            <option value="partial">Partial</option>
                                            <option value="ordered">Ordered</option>
                                        </select>
                                    </div>
                                </div>

                        

                                <div class="col-md-12">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Terms & Conditions</label>
                                        <textarea id="summernote" style="display: none;"  name="tc">Place &lt;em&gt;some&lt;/em&gt; &lt;u&gt;text&lt;/u&gt; &lt;strong&gt;here&lt;/strong&gt;
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
                                            <table class="table table-bordered d-block d-md-table" style="overflow-x: scroll;" id="dynamicPurchase">
                                                <thead>
                                                    <tr>
                                                        <td>Product Type</td>
                                                        <td>Name</td>
                                                        <td>Quantity</td>
                                                        <td>Price</td>
                                                        <td>Tax (per piece)</td>
                                                        <td>SubTotal</td>
                                                        <td>Action</td>
                                                    </tr>
                                                </thead>
                                                <tbody id="orderListTable">
                                                    <tr>
                                                        <td><select name="types[]" id="type_0_name"
                                                                class="form-control product_type type product_type0" data-index="0">
                                                                <option value="0">-- Choose Item --</option> 
                                                                @foreach($type as $types)
                                                                <option value="{{ $types->name}}">{{$types->name}}</option>
                                                                @endforeach
                                                            </select></td>
                                                        <td> <select name="products[]" id="product_0_name"
                                                                class="form-control product_name product_name0"
                                                                data-index="0"><option value="0">-- Choose Product --</option></select></td>
                                                        <td><input type="number" id="quantity0'" name="quantities[]"
                                                                class="form-control" onkeyup="changeSubTotal(this)" data-index="0" > 
                                                        </td>
                                                        <td><input type="text" id="price0" name="prices[]"
                                                                class="form-control" data-index="0"  readonly/></td>
                                                        <td><input type="text" id="tax0" name="taxes[]"
                                                                class="form-control" data-index="0" onkeyup="changeSubTotal(this)" 
                                                        readonly></td>
                                                        <td><input type="number" id="subtotal0" name="subtotals[]"
                                                                class="form-control" data-index="0" readonly/></td>
                                                        <td><button type="button" class="pull-right btn btn-danger rounded-circle" 
                                                        onclick="emptyTr(this)"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td class="font-weight-bold" colspan="2">TOTAL</td>
                                                        <td class="font-weight-bold"><span id="totalQty">0</span></td>
                                                        <td class="font-weight-bold"><span id="totalPrice">0.00</span></td>
                                                        <td class="font-weight-bold"><span id="totalTax">0.00</span></td>
                                                        <td class="font-weight-bold" colspan="2"><span id="subTotal">0.00</span></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                    <button type="button" name="add" id="add" class="btn btn-info rounded-circle pull-left"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Order Tax *</label>
                                        <select name="ord_tax" id="taxPercent"  class="form-control" required>
                                            <option value="0" selected>No Tax</option>
                                            @foreach($tax as $taxes)
                                            <option value="{{$taxes->rate}}">{{$taxes->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Discount *</label>
                                        <input type="number" class="form-control" name="disct"
                                        id="discountApplied" min="0" value="0" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Shipping Cost *</label>
                                        <input type="number" class="form-control" name="ship_cst"
                                        id="shippingApplied" min="0" value="0" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <p class="font-weight-bold">Products : <span class="font-weight-normal" id="totalProds"></span></p>
                                                    <p class="font-weight-bold mb-0">Sub Total : <span class="font-weight-normal" id="subTotal2"></span></p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <p class="font-weight-bold">Order Tax : <span class="font-weight-normal" id="actualTax"></span></p>
                                                    <p class="font-weight-bold mb-0">Order Discount : <span class="font-weight-normal" id="actualDiscount"></span></p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <p class="font-weight-bold">Shipping Cost : <span class="font-weight-normal" id="shipping"></span></p>
                                                    <p class="font-weight-bold mb-0">Grand Total : <span class="font-weight-normal" id="grandTotal"></span></p>
                                                    <input type="hidden" class="custom-file-input" id="gtotal"  name="total">
                                                </div>
                                            </div>
                                        </div>
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
                 </form>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

        <script type="text/javascript">
    var i = 0;

$("#add").click(function () {
    var index = $('.product_type').length + 1; 

    $("#dynamicPurchase").append('<tr><td><select name="types[]" id="type_' + index + '_name" class="form-control product_type type product_type' + index + '" data-index="' + index + '"><option value="">-- Choose Type --</option> @foreach ($type as $types)<option value="{{ $types->name}}"> {{ $types->name }}</option>@endforeach</select></td><td> <select name="products[]" id="product_' + index + '_name" class="form-control product_name product_name' + index + '" data-index="' + index + '"></select></td><td><input type="number" id="quantity' + index + '" name="quantities[]" class="form-control" data-index="' + index + '" onkeyup="changeSubTotal(this)" /></td><td><input type="text" id="price' + index + '" name="prices[]" data-index="' + index + '" class="form-control" value="1" readonly /></td><td><input type="text" id="tax' + index + '" name="taxes[]" class="form-control" onkeyup="changeSubTotal(this)" data-index="' + index + '" readonly /></td><td><input type="number" id="subtotal' + index + '" name="subtotals[]" class="form-control" data-index="' + index + '" readonly /></td><td><button type="button" class="pull-right btn btn-danger rounded-circle remove-tr"><i class="fa fa-trash"></i></button></td></tr>');
    
    initialSubTotal();
});


    $(document).on('click', '.remove-tr', function () {
        $(this).parents('tr').remove();
        initialSubTotal();
    });

    function emptyTr(input){
        for(i=0;i<6;i++){
            if(i>1){
                input.parentElement.parentElement.children[i].children[0].value = 0;
            }
            else{
                input.parentElement.parentElement.children[i].children[0].value = '0';
            }
        }
        initialSubTotal();
    }

    function changeSubTotal(input){
        let qty = parseInt(input.parentElement.parentElement.children[2].children[0].value);
        let price = parseFloat(input.parentElement.parentElement.children[3].children[0].value);
        let tax = parseFloat(input.parentElement.parentElement.children[4].children[0].value);
        let subtotal = parseFloat((qty*price)+(qty*tax)).toFixed(2);
        input.parentElement.parentElement.children[5].children[0].value = subtotal;
        updateQty();
    }


    function initialSubTotal(){
        let rowsLength = document.getElementById('orderListTable').rows.length;
        let box = document.getElementById('orderListTable');
        let total = 0;
        for(i=0;i<rowsLength;i++)
        {
            let qty = parseInt(box.children[i].children[2].children[0].value);
            let price = parseFloat(box.children[i].children[3].children[0].value);
            let tax = parseFloat(box.children[i].children[4].children[0].value);
            let subtotal = parseFloat((qty*price)+(qty*tax)).toFixed(2);
            box.children[i].children[5].children[0].value = subtotal;
        }
        updateQty();
        grandTotal();
    }
    initialSubTotal();


    function updateQty(){
        let rowsLength = document.getElementById('orderListTable').rows.length;
        let box = document.getElementById('orderListTable');
        let total = 0;
        for(i=0;i<rowsLength;i++)
        {
            let qty = parseInt(box.children[i].children[2].children[0].value);
            total += qty;
        }

        document.getElementById('totalQty').innerText = total;
        updatePrice();
    }

    function updatePrice(){
        let rowsLength = document.getElementById('orderListTable').rows.length;
        let box = document.getElementById('orderListTable');
        let total = 0;
        for(i=0;i<rowsLength;i++)
        {
            let price = parseFloat(box.children[i].children[3].children[0].value);
            total += price;
        }
        document.getElementById('totalPrice').innerText = parseFloat(total).toFixed(2);
        updateTax();
    }

    function updateTax(){
        let rowsLength = document.getElementById('orderListTable').rows.length;
        let box = document.getElementById('orderListTable');
        let total = 0;
        for(i=0;i<rowsLength;i++)
        {
            let tax = parseFloat(box.children[i].children[4].children[0].value);
            total += tax;
        }
        document.getElementById('totalTax').innerText = parseFloat(total).toFixed(2);
        updateSubTotal();
        grandTotal();
    }
    function updateSubTotal(){
        let rowsLength = document.getElementById('orderListTable').rows.length;
        let box = document.getElementById('orderListTable');
        let total = 0;
        for(i=0;i<rowsLength;i++)
        {
            let subTota = parseFloat(box.children[i].children[5].children[0].value);
            total += subTota;
        }
        document.getElementById('subTotal').innerText = parseFloat(total).toFixed(2);
    }

    
    document.getElementById('taxPercent').addEventListener('change', function(){
        grandTotal();
    });
    document.getElementById('discountApplied').addEventListener('keyup', function(){
        grandTotal();
    });
    document.getElementById('shippingApplied').addEventListener('keyup', function(){
        grandTotal();
    });
    function grandTotal(){
        let totalQuant = parseInt(document.getElementById('totalQty').innerText);
        let actualTotal = parseFloat(document.getElementById('subTotal').innerText);
        let taxpercentage = parseFloat(document.getElementById('taxPercent').value);
        let discountapplied = parseFloat(document.getElementById('discountApplied').value);
        let shippingapplied = parseFloat(document.getElementById('shippingApplied').value);
        let grandTotal = actualTotal + ((actualTotal*taxpercentage)/100) - discountapplied + shippingapplied;
        let newTax  = (actualTotal*taxpercentage/100);
        let rowsLength = document.getElementById('orderListTable').rows.length;

        // placing containers
        document.getElementById('totalProds').innerText = `${rowsLength}(${totalQuant})`;
        document.getElementById('subTotal2').innerText = parseFloat(actualTotal).toFixed(2);
        document.getElementById('actualTax').innerText = parseFloat(newTax).toFixed(2);
        document.getElementById('actualDiscount').innerText = parseFloat(discountapplied).toFixed(2);
        document.getElementById('shipping').innerText = parseFloat(shippingapplied).toFixed(2);
        document.getElementById('grandTotal').innerText = parseFloat(grandTotal).toFixed(2);
        document.getElementById('gtotal').value = parseFloat(grandTotal).toFixed(2);
    }

    updateQty();
</script>


@include('client.component.page-footer')