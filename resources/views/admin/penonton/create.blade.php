@extends('admin.layouts.index')

@push('cssScript')
    @include('layouts.css-form')
@endpush

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Member</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route ('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Member</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                  @include('sweetalert::alert')

                    <!-- Horizontal Form -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form Input Member</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="myForm" class="form-horizontal" method="POST" action="{{ route('store_mitra')}}"
                              enctype="multipart/form-data">
                              {{csrf_field()}}

                            @include('admin.mitra.form')

                            <div class="card-footer">
                                {{-- <button type="submit" class="btn btn-primary float-right">Save</button> --}}
                                <button type="submit" class=" btn btn-primary float-right">Save</button>
                            <a href="{{ route ('show_mitra')}}" class="btn btn-danger float-right"
                                   style="margin-right: 10px">Cancel</a>
                            </div>

                        </form>

                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('jsScript')
    @include('layouts.js.js-form')
@endpush
