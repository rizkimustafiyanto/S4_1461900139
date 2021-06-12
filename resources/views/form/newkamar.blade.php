<!DOCTYPE html>
<html lang="en">
<head>
    @include('part/head')
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
    @include('part/proses/opening')

  <!-- Navbar -->
    @include('part/navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('part/side')
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
              <li class="breadcrumb-item active">Create Kamar</li>
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
                <h3 class="card-title">Create Data Kamar<small> Validation Input</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('kamar.store')}}">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputid_pasien1">ID Pasien</label>
                    <input type="text" name="id_pasien" class="form-control" id="exampleInputid_pasien1" placeholder="Masukkan id_pasien anda">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputid_dokter1">ID Dokter</label>
                    <input type="Text" name="id_dokter" class="form-control" id="exampleInputid_dokter1" placeholder="Masukkan id_dokter anda">
                  </div>
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">Setuju untuk menambah</label>
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
    @include('part/foot')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src={{asset("administrator/plugins/jquery/jquery.min.js")}}></script>
<!-- Bootstrap -->
<script src={{asset("administrator/plugins/bootstrap/js/bootstrap.bundle.min.js")}}></script>
<!-- overlayScrollbars -->
<script src={{asset("administrator/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}></script>
<!-- AdminLTE App -->
<script src={{asset("administrator/dist/js/adminlte.js")}}></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src={{asset("administrator/plugins/jquery-mousewheel/jquery.mousewheel.js")}}></script>
<script src={{asset("administrator/plugins/raphael/raphael.min.js")}}></script>
<script src={{asset("administrator/plugins/jquery-mapael/jquery.mapael.min.js")}}></script>
<script src={{asset("administrator/plugins/jquery-mapael/maps/usa_states.min.js")}}></script>
<!-- ChartJS -->
<script src={{asset("administrator/plugins/chart.js/Chart.min.js")}}></script>

<!-- AdminLTE for demo purposes -->
<script src={{asset("administrator/dist/js/demo.js")}}></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src={{asset("administrator/dist/js/pages/dashboard2.js")}}></script>
<script>
  $(function () {
    $.validator.setDefaults({
      submitHandler: function () {
        alert( "Form successful submitted!" );
      }
    });
    $('#quickForm').validate({
      rules: {
        id_pasien: {
          required: true
        },
        id_dokter: {
          required: true,
          minlength: 3
        },
        terms: {
          required: true
        },
      },
      messages: {
        id_pasien: {
          required: "Tolong masukkan id_pasien"
        },
        id_dokter: {
          required: "Tolong isi anda id_dokter apa",
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
</html>