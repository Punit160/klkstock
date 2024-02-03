<footer class="main-footer text-center">
  <strong>Copyright &copy; 2014-2021 <a href="#">ETS Networks</a>.</strong>
  All rights reserved.
</footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>

    <script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <!-- InputMask -->
    <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('plugins/inputmask/jquery.inputmask.min.js')}}"></script>
    <!-- date-range-picker -->
    <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- bootstrap color picker -->
    <script src="{{asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <!-- BS-Stepper -->
    <script src="{{asset('plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
    <!-- dropzonejs -->
    <script src="{{asset('plugins/dropzone/min/dropzone.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->

    <!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>


    <script src="{{asset('dist/js/demo.js')}}"></script>
   
    <!-- Page specific script -->

    <script>
        $(function () {
          bsCustomFileInput.init();
        });
        </script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function (event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            })

            $("input[data-bootstrap-switch]").each(function () {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })

    </script>

  <script type="text/javascript">

    
    $(function () {
        // Summernote
        $('#summernote').summernote()
    
      })

    var i = 0;

    $("#add").click(function () {
        console.log("hi");
        ++i;

        $("#dynamicTable").append('<tr><td><select name="types[]" id="type_' + i + '_name"  class="form-control type_name type_name' + i + '"  data-index="' + ($('.type_name').length + 1) + '"><option value="">-- Choose Warehouse --</option> @foreach ($type as $types)<option value="{{ $types->id}}"> {{ $types->name }}</option>@endforeach</select></td><td><input type="number" id="qty' + i + '" name="qty[]" class="form-control" /></td><td><button type="button" class="pull-right btn btn-danger rounded-circle remove-tr"><i class="fa fa-trash"></i></button></td></tr>');
    });
    
    function addrowswarehouses(){
        $("#dynamicTable").append('<tr><td><select name="types[]" id="type_' + i + '_name"  class="form-control type_name type_name' + i + '"  data-index="' + ($('.type_name').length + 1) + '"><option value="">-- Choose Warehouse --</option> @foreach ($type as $types)<option value="{{ $types->id}}"> {{ $types->name }}</option>@endforeach</select></td><td><input type="number" id="qty' + i + '" name="qty[]" class="form-control" /></td><td><button type="button" class="pull-right btn btn-danger rounded-circle remove-tr"><i class="fa fa-trash"></i></button></td></tr>');
    }

    $(document).on('click', '.remove-tr', function () {
        console.log("lolu");
        $(this).parents('tr').remove();
    });

</script>

<script type="text/javascript">

var i = 0;

$("#add").click(function () {

    ++i;

    $("#dynamicPurchase").append('<tr><td><select name="types[]" id="type_' + i + '_name"  class="form-control type_name type_name' + i + '"  data-index="' + ($('.type_name').length + 1) + '"><option value="">-- Choose Type --</option> @foreach ($type as $types)<option value="{{ $types->id}}"> {{ $types->name }}</option>@endforeach</select></td><td> <select name="product" id="product_' + i + '_name"  class="form-control product_name product_name' + i + '" data-index="' + ($('.product_name').length + 1) + '"><option value="">-- Choose Product --</option></select></td><td><input type="text" id="quantity' + i + '" name="quantities[]" class="form-control"  /></td><td><input type="number" id="price' + i + '" name="prices[]" class="form-control" /></td><td><input type="number" id="tax' + i + '" name="taxes[]" class="form-control" /></td><td><input type="number" id="subtotal' + i + '" name="subtotals[]" class="form-control" /></td> <td><button type="button" class="pull-right btn btn-danger rounded-circle remove-tr"><i class="fa fa-trash"></i></button></td> </tr>');
});

$(document).on('click', '.remove-tr', function () {
    $(this).parents('tr').remove();
});

</script>


    
<script>
  
   $(document).on('change', '.product_type', function() {
  var index = $(this).data('index');
  var productType = $(this).val();
  var productSelect = $('select.product_name[data-index="' + index + '"]');
  $.ajaxSetup({
    headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
  });
  if (productType) {
    $.ajax({
      url: "{{url('/fetch-product-data')}}",
      type: "POST",
      data: {
        'product_type':productType
      },
      success: function (res) { // Fixed variable name from 'result' to 'res'
        productSelect.html('<option value="">Select Product</option>');
        $.each(res.products, function(key, value) {
          productSelect.append('<option value="' + value.product_name + '">' + value.product_name + '</option>');
        });
      }
    });
  }
});

</script>
</body>

</html>