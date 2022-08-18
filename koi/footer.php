</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer bg-gradient text-center">
  <strong>Copyright &copy; 2022 <a href="https://agusprayogi02.github.io" class="text-primary">Agus Prayogi</a></strong>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= baseURL('plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= baseURL('plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= baseURL('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?= baseURL('plugins/chart.js/Chart.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?= baseURL('plugins/sparklines/sparkline.js') ?>"></script>
<!-- JQVMap -->
<script src="<?= baseURL('plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
<script src="<?= baseURL('plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= baseURL('plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?= baseURL('plugins/moment/moment.min.js') ?>"></script>
<script src="<?= baseURL('plugins/daterangepicker/daterangepicker.js') ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= baseURL('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.') ?>js"></script>
<!-- Summernote -->
<script src="<?= baseURL('plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?= baseURL('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= baseURL('dist/js/adminlte.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= baseURL('dist/js/demo.js') ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= baseURL('dist/js/pages/dashboard.js') ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?= baseURL('plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= baseURL('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= baseURL('plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= baseURL('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= baseURL('plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= baseURL('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= baseURL('plugins/jszip/jszip.min.js') ?>"></script>
<script src="<?= baseURL('plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script src="<?= baseURL('plugins/pdfmake/vfs_fonts.js') ?>"></script>
<script src="<?= baseURL('plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= baseURL('plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?= baseURL('plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
<!-- Page specific script -->
<script>
  $(function() {
    $("#table_koi").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
    }).buttons().container().appendTo('#table_koi_wrapper .col-md-6:eq(0)');
  });
</script>
</body>

</html>