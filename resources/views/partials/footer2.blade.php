

        

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |
   
    <div class="float-right d-none d-sm-inline-block">
      
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset("plugins/jquery/jquery.min.js")}}"></script>
<script src="{{asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>
<script src="{{asset("dist/js/adminlte.js")}}"></script>
<script src="{{asset("plugins/jquery-mousewheel/jquery.mousewheel.js")}}"></script>
<script src="{{asset("plugins/raphael/raphael.min.js")}}"></script>
<script src="{{asset("plugins/jquery-mapael/jquery.mapael.min.js")}}"></script>
<script src="{{asset("plugins/jquery-mapael/maps/usa_states.min.js")}}"></script>
<script src="{{asset("plugins/chart.js/Chart.min.js")}}"></script>
<script src="{{asset("dist/js/demo.js")}}"></script>
<script src="{{asset("dist/js/pages/dashboard2.js")}}"></script>


<script src="{{asset("plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
<script src="{{asset("plugins/datatables-buttons/js/dataTables.buttons.min.js")}}"></script>
<script src="{{asset("plugins/datatables-buttons/js/buttons.bootstrap4.min.js")}}"></script>
<script src="{{asset("plugins/jszip/jszip.min.js")}}"></script>
<script src="{{asset("plugins/pdfmake/pdfmake.min.js")}}"></script>
<script src="{{asset("plugins/pdfmake/vfs_fonts.js")}}"></script>
<script src="{{asset("plugins/datatables-buttons/js/buttons.html5.min.js")}}"></script>
<script src="{{asset("plugins/datatables-buttons/js/buttons.print.min.js")}}"></script>
<script src="{{asset("plugins/datatables-buttons/js/buttons.colVis.min.js")}}"></script>
<script src="{{asset("dist/js/adminlte.min.js")}}"></script>



<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  @if(session('success'))
    $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Toast Title',
        body: '{{ session('success') }}',
        autohide: true,
        delay: 5000
    });
  @endif
</script>
</body>
</html>
