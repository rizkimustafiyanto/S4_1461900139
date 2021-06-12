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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Kamar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kamar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Kamar</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Nama Dokter</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                <?php $no=1; ?>
                @foreach ($kamar as $kmr)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$kmr->namap}}</td>
                  <td>{{$kmr->namad}}</td>
                  <td>
                    <form action="{{route('kamar.destroy',$kmr->id)}}" method="POST">
 
                      <a class="btn btn-info btn-sm" href="{{route('kamar.show',$kmr->id)}}">Show</a>
   
                      <a class="btn btn-primary btn-sm" href="{{ route('kamar.edit',$kmr->id) }}">Edit</a>
   
                      @csrf
                      @method('DELETE')
   
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                  </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th colspan="3" style="text-align: center">Tombol tambah data</th>
                <th>
                  <a href="{{route('kamar.create')}}" class="btn btn-sm btn-info">Tambah</a>
                  <a href="{{url('exportkamar')}}" class="btn btn-sm btn-info">File XLS</a>
                </th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->
    <!-- /.content -->
  </div>
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
</body>
</html>