@extends('admin.layouts.index')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Report</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route ('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Report</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<section class="content">
        <div class="container-fluid">
            @include('sweetalert::alert')

            <div class="row">
                <div class="col-10">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Report</h3>
                            <div class="float-right">
                                <!-- <a href="{{ route ('prrp') }}" class="_blank">
                                    <button class="btn btn-primary btn-sm" id="add"><i class="fa fa-plus-circle"></i>
                                    Cetak Laporan
                                    </button>
                                </a> -->
                            </div>
                        </div>
                        <!-- /.card-header -->


                        </div>
                        <div class="card-body">

                        
                        <div class="card-footer">
                          {{-- @foreach ($data as $no => $v) --}}
                          
                    <a href="{{ route('sudah')}}"><button type class="btn btn-primary float-right" data-toggle="tooltip" data-placement="bottom" title="cetak">Penonton Masuk</button></a>
                    <a href="{{ route('belum')}}"><button type class="btn btn-danger float-right" data-toggle="tooltip" data-placement="bottom" title="cetak">Penonton Belum Masuk</button></a>
                          <!-- <a href="" class="btn btn-danger float-right"
                             style="margin-right: 10px">Cancel</a> -->
                        </div>
                        {{-- @endforeach --}}
                        
                      
                

                    <!-- /.card-body -->
                </div>

                        </div>

                        <!-- /.card-body -->
                    </div>

                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.row -->
    </section>


    @endsection


