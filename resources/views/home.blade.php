<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Top Navigation</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="../../index3.html" class="navbar-brand">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Galeri</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Upload</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="" data-toggle="modal" data-target="#modal-logout">Logout</a>
            {{-- <a href="{{ url('/logout') }}" onclick="return confirm('Yakin ingin Keluar?');" class="nav-link">Logout</a> --}}
          </li>
          
        </ul>

        <!-- SEARCH FORM -->
      </div>

      
  </nav>
  <!-- /.navbar -->

  {{-- modal logout --}}
      <div class="modal fade" id="modal-logout">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-center">Peringatan Logout</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Yakin ingin keluar?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a href="{{ url('/logout') }}" class="btn btn-danger">Logout</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
  {{-- modal logout end --}}

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    
    <div class="content">
      <div class="container">
        <!-- Timelime example  -->
        <div class="row">
          @foreach ($galeri as $galeri)
          <div class="col-md-12 mt-3">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-green">{{ $galeri->tanggal }}</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fa fa-camera bg-purple"></i>
                <div class="timeline-item">
                  {{-- <span class="time"><i class="fas fa-clock"></i> 2 days ago</span> --}}
                  <h2 class="timeline-header">{{ $galeri->judul }}</h2>
                  <div class="timeline-body">
                      <p>
                        {{ $galeri->deskripsi }}
                      </p>
                    {{-- <img src="{{ asset('img/'.$galeri->foto) }}" alt=""> --}}
                    <div class="col-sm-2">
                      <a data-toggle="modal" data-target="#modal-preview{{ $galeri->id }}" data-footer="<h2>hdjshdsjdhsj</h2>">
                        <img src="{{ asset('img/'.$galeri->foto) }}" class="img-fluid mb-2"/>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <div>
                <i class="fa fa-comments bg-purple"></i>
                <div class="timeline-item">
                  <div class="timeline-footer">
                    <a data-toggle="modal" data-target="#modal-update{{ $galeri->id }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="" data-toggle="modal" data-target="#modal-hapus{{ $galeri->id }}" class="btn btn-danger btn-sm">Hapus</a>
                  </div>
                </div>
              </div>
              <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>
            </div>

            {{-- update --}}
            <div class="modal fade" id="modal-update{{ $galeri->id }}">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Upload Foto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="{{ route('galeri.update',$galeri->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
          
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="">Judul</label>
                        <input type="text" name="judul" class="form-control" id="" value="{{ $galeri->judul }}">
                      </div>
                      <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3">{{ $galeri->deskripsi }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" class="form-control" name="foto">
                        <img src="{{ asset('img/'.$galeri->foto) }}" class="img-fluid mb-2 mt-4"/>
                      </div>
                    </div>
          
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
          
                  </form>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            {{-- update end --}}

            {{-- delete --}}
            <div class="modal fade" id="modal-hapus{{ $galeri->id }}">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title text-center">Peringatan Hapus</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Yakin ingin Hapus?</p>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="{{ route('galeri.show',$galeri->id) }}" class="btn btn-danger">Hapus</a>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            {{-- delete end --}}

            {{-- preview foto --}}
              <div class="modal fade" id="modal-preview{{ $galeri->id }}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Preview Foto</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                      <div class="modal-body">

                        <a href="{{ asset('img/'.$galeri->foto) }}" target="_blank">
                          <img src="{{ asset('img/'.$galeri->foto) }}" class="img-fluid mb-2"/>
                        </a>
            
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
            {{-- preview foto end --}}

          </div>

          
          
          @endforeach
          <!-- /.col -->
        </div>
      </div>
      <!-- /.timeline -->
      </div>
    </div>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Upload Foto</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('POST')

          <div class="modal-body">
            <div class="form-group">
              <label for="">Judul</label>
              <input type="text" name="judul" class="form-control" id="" placeholder="masukkan judul">
            </div>
            <div class="form-group">
              <label for="">Deskripsi</label>
              <textarea name="deskripsi" class="form-control" rows="3" placeholder="masukkan deskripsi"></textarea>
            </div>
            <div class="form-group">
              <label for="">Foto</label>
              <input type="file" class="form-control" name="foto">
            </div>
          </div>

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Upload</button>
          </div>

        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
{{-- <script src="{{ asset('plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script> --}}
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('dist/js/demo.js') }}"></script> --}}
</body>
</html>
