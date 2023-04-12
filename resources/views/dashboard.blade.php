@extends('admin.layouts.index')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            {{-- <li class="breadcrumb-item"><a href="{{route ('admin')}}">Home</a></li> --}}
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

<section class="content">
@include('sweetalert::alert')

      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
    
          <!-- ./col -->

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $data }}</h3>

                <p>Penonton Terdaftar</p>
              </div>
              <div class="icon">
                <i class="ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $sudah }}</h3>

                <p>Penonton Sudah Masuk</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>



          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $belum }}</h3>

                <p>Penonton Belum Masuk</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
      
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
@endsection
