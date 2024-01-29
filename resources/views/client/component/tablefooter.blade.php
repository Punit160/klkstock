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


<!-- Font Awesome -->
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}" ></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}" ></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}" ></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}" ></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}" ></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}" ></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}" ></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}" ></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}" ></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}" ></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}" ></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}" ></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}" ></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}" ></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}" ></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}" ></script>

<script src="{{asset('my/my-popup.js')}}"></script>

<script src="{{asset('dist/js/pop-up.js')}}"></script>
<!-- Page specific script -->

<!-- Date Range Picekr -->
<script type="text/javascript" src="{{asset('date/moment.js')}}"></script>
<script type="text/javascript" src="{{asset('date/daterangepicker.js')}}"></script>


<script type="text/javascript">
        $(document).ready(function() {
          $('input[name="daterange"]').daterangepicker();
        });

        $(function () {
            $("#example1")
                .DataTable({
                    responsive: true,
                    lengthChange: false,
                    autoWidth: false,
                    buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                })
                .buttons()
                .container()
                .appendTo("#example1_wrapper .col-md-6:eq(0)");
            $("#example2").DataTable({
                paging: true,
                lengthChange: false,
                searching: false,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true,
            });
        });
    </script>
</body>
</html>
