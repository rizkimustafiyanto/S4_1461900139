<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('part/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
    <?php echo $__env->make('part/proses/opening', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- Navbar -->
    <?php echo $__env->make('part/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    <?php echo $__env->make('part/side', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Validation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Pasien</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Data Pasien<small> Validation Input</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php if($errors->any()): ?>
              <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li><?php echo e($error); ?></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
              </div>
              <?php endif; ?>
              <form id="quickForm" method="POST" action="<?php echo e(route('pasien.update',$pasien->id)); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputnama1">Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo e($pasien->nama); ?>" placeholder="Masukkan nama pasien">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputalamat1">Alamat</label>
                    <input type="Text" name="alamat" class="form-control" value="<?php echo e($pasien->alamat); ?>" placeholder="Masukkan alamat pasien">
                  </div>
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">Setuju untuk mengubah</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 <!-- Main content -->

  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
    <?php echo $__env->make('part/foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src=<?php echo e(asset("administrator/plugins/jquery/jquery.min.js")); ?>></script>
<!-- Bootstrap -->
<script src=<?php echo e(asset("administrator/plugins/bootstrap/js/bootstrap.bundle.min.js")); ?>></script>
<!-- overlayScrollbars -->
<script src=<?php echo e(asset("administrator/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")); ?>></script>
<!-- AdminLTE App -->
<script src=<?php echo e(asset("administrator/dist/js/adminlte.js")); ?>></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src=<?php echo e(asset("administrator/plugins/jquery-mousewheel/jquery.mousewheel.js")); ?>></script>
<script src=<?php echo e(asset("administrator/plugins/raphael/raphael.min.js")); ?>></script>
<script src=<?php echo e(asset("administrator/plugins/jquery-mapael/jquery.mapael.min.js")); ?>></script>
<script src=<?php echo e(asset("administrator/plugins/jquery-mapael/maps/usa_states.min.js")); ?>></script>
<!-- ChartJS -->
<script src=<?php echo e(asset("administrator/plugins/chart.js/Chart.min.js")); ?>></script>

<!-- AdminLTE for demo purposes -->
<script src=<?php echo e(asset("administrator/dist/js/demo.js")); ?>></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src=<?php echo e(asset("administrator/dist/js/pages/dashboard2.js")); ?>></script>
<script>
  $(function () {
    $.validator.setDefaults({
      submitHandler: function () {
        alert( "Form successful submitted!" );
      }
    });
    $('#quickForm').validate({
      rules: {
        nama: {
          required: true
        },
  Alamatlamat: {
          required: true,
          minlength: 3
        },
        terms: {
          required: true
        },
      },
      messages: {
        nama: {
          required: "Tolong masukkan nama"
        },
  Alamatlamat: {
          required: "Tolong isi anAlamatat apa",
          minlength: "Masukkan pelajaran paling sedikit 3"
        },
        terms: "Tolong centang apabila yakin ingin menambah"
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
  </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\Praktikum\Ke04\praktikum4\aktivitas4\resources\views/edita/editpasien.blade.php ENDPATH**/ ?>