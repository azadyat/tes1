@extends('admin.layouts.index')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>


@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Penononton</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route ('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Penonton</li>
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
                            <h3 class="card-title">PENONTON</h3>
                       
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th width="10px">No</th>
                                    <th>ID TIKET</th>
                                    <th>NAMA</th>
                                    <th>AlAMAT</th>
                                    <th>NO HANDPHONE</th>
                                    <th>STATUS PENONTON</th>
                                    

                                    <th width="50px">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $no => $v)
                                    <tr>
                                    <td widtd="10px">{{++$no}}</td>
                                    <td widtd="10px">{{ $v->id_tiket}}</td>
                                    <td widtd="10px">{{ $v->nama}}</td>
                                    <td>{{ $v->alamat}}</td>
                                    <td>{{ $v->no_hp}}</td>
                               
                                    <td>
                                        @if ($v->status == 0 )
                                        Belum Masuk
                                        @else 
                                        sudah masuk
                                    @endif
                                    </td>
                                   
                                 

                                    <td width="13%">

                                    <a href="{{ route('edit_penonton',$v->id)}}">
                                    <button class="btn btn-info btn-xs" id="add" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                        <i class="fa fa-edit"></i>

                                        
                                    </button>
                                </a> <a onclick="return confirm('anda yakin ingin menghapus {{$v->nama}}?')" href="{{route('delete_penonton',$v->id)}}" data-toggle="tooltip" data-placement="bottom" title="Hapus" class="delete-confirm">
                                    <button class="btn btn-danger btn-xs" id="add">
                                        <i class="fa fa-trash"></i>

                                        
                                    </button>
                                </a>

                            </button></a> <a
                            onclick="return confirm('Penonton Atas Nama : {{$v->nama}} Telah Masuk ??') "
                            href="{{ route('masuk',$v->id)}}" class="delete-confirm" target="blank" data-toggle="tooltip" data-placement="bottom" title="Masuk ">
                            <button class="btn btn-dark btn-xs" id="add">
                                <i class="fa fa-door-open"></i>
                            </button> 
                                        </td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                        <div class="card-body">


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

<script>
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
    @endsection


