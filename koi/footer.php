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

<script src="<?= baseURL('plugins/select2/js/select2.full.min.js'); ?>"></script>

<!-- bs-custom-file-input -->
<script src="<?= baseURL('plugins/bs-custom-file-input/bs-custom-file-input.min.js'); ?>"></script>
<script src="<?= baseURL('plugins/sweetalert2/sweetalert2.min.js'); ?>"></script>

<script>
  $(async () => {
    var Toast = Swal.mixin({
      showConfirmButton: false,
      timer: 2000,
      timerProgressBar: true
    });
    var Alert = Swal.mixin({
      confirmButtonClass: 'btn btn-primary mr-5',
      cancelButtonClass: 'btn btn-danger',
      showCancelButton: true,
      showConfirmButton: true,
      buttonsStyling: false,
    });
    <?php if (isset($error)) { ?>
      Toast.fire({
        icon: 'error',
        title: '<?= $error ?>',
        text: $(this).data('message')
      });
    <?php } else if (isset($success)) { ?>
      await Toast.fire({
        icon: 'success',
        title: '<?= $success ?>',
        text: $(this).data('message')
      });
      location.replace('<?= $url ?>');
    <?php } ?>

    $('.beli-bro').click(async () => {
      var code = $('.beli-bro').data('code');
      var data = atob(code).split('?=?');
      var {
        value
      } = await Alert.fire({
        input: 'number',
        icon: 'question',
        titleText: "Beli " + data[1] + " berapa bro?",
      });
      if (value) {
        $.ajax({
          url: '<?= baseURL('api.php?func=beli') ?>',
          type: 'POST',
          data: {
            code: code,
            value: value
          },
          success: async (rest) => {
            rest = $.parseJSON(rest);
            if (rest[0]) {
              await Toast.fire({
                icon: 'success',
                title: rest[1],
                text: $(this).data('message')
              });
              location.reload();
            } else {
              Toast.fire({
                icon: 'error',
                title: rest[1],
                text: $(this).data('message')
              });
            }
          },
          error: function(err) {
            Toast.fire({
              icon: 'error',
              title: err,
              text: $(this).data('message')
            });
          }
        });
      }
    });
    $('.modify-user').click(async () => {
      var code = $('.modify-user').data('code');
      var data = atob(code).split('?=?');
      var {
        isConfirmed
      } = await Alert.fire({
        title: 'Anda yakin ingin mengaktifkan user ' + data[1] + ' ini?',
        icon: 'warning',
        text: $(this).data('message')
      });
      if (isConfirmed) {
        $.ajax({
          url: "<?= baseURL('api.php?func=modifyUser'); ?>",
          type: "POST",
          data: {
            code: code,
            status: true,
          },
          success: async (rest) => {
            rest = $.parseJSON(rest);
            // console.log(rest);
            if (rest[0]) {
              await Toast.fire({
                icon: 'success',
                title: rest[1],
                text: $(this).data('message')
              });
              location.reload();
            } else {
              Toast.fire({
                icon: 'error',
                title: rest[1],
                text: $(this).data('message')
              });
            }
          },
          error: async (err) => {
            Toast.fire({
              icon: 'error',
              title: err,
              text: $(this).data('message')
            });
          }
        });
      }
    });
    $('.delete-koi').click(async (e) => {
      var code = $('.delete-koi').data('koi');
      var data = atob(code).split('?=?');
      var {
        isConfirmed
      } = await Alert.fire({
        title: 'Anda yakin ingin menghapus data ikan ' + data[1] + ' ?',
        icon: 'warning',
        text: $(this).data('message')
      });
      if (isConfirmed) {
        $.ajax({
          url: "<?= baseURL('api.php?func=delete'); ?>",
          type: "POST",
          data: {
            code: code,
            delete: true,
          },
          success: async (rest) => {
            rest = $.parseJSON(rest);
            if (rest[0]) {
              await Toast.fire({
                icon: 'success',
                title: rest[1],
                text: $(this).data('message')
              });
              location.reload();
            } else {
              Toast.fire({
                icon: 'error',
                title: rest[1],
                text: $(this).data('message')
              });
            }
          },
          error: async (err) => {
            await Toast.fire({
              icon: 'error',
              title: err,
              text: $(this).data('message')
            });
          }
        });
      }
    });
  });
</script>

<!-- AdminLTE App -->
<script src="<?= baseURL('dist/js/adminlte.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= baseURL('dist/js/demo.js') ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= baseURL('dist/js/pages/dashboard.js') ?>"></script>
<script>
  $(function() {
    $('.select2').select2();
    bsCustomFileInput.init();
  });
  $(function() {
    $("#table_koi").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
    }).buttons().container().appendTo('#table_koi_wrapper .col-md-6:eq(0)');
  });
</script>
<!-- Page specific script -->
</body>

</html>