<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
{{-- @include('sweetalert::alert') --}}

{{-- @include('user.header') --}}
@include('user.css')





@extends('user.master')
 

@section('judul_halaman', 'home')
 
 

@section('konten')


     @csrf

     
     <form id="myForm" class="form-horizontal" method="POST" action="{{ route('store.penonton')}}"
     enctype="multipart/form-data">
     {{csrf_field()}}
     
     <div class="container register-form">
    

                 <div class="form">
                     <div class="note">
                         <p>Registrasi Tiket Konser || Harap Foto Id Tiket</p>
                     </div>
     
                     <div class="form-content">
                                <div class="form-group">
                                    <label>ID Tiket</label>
                                    <input type="text" class="form-control" name="id_tiket" value="  {!! $nomor !!}" readonly>
                                  </div>

                            

                             <div class="form-group">
                                <label for="">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="{{ isset($data->nama) ? $data->nama : null  }}" maxlength="20" required>
                                </div>

                             </div>

                            
                                   <div class="form-group">
                                   <label for="">Alamat </label>
                                       <input type="text" class="form-control" name="alamat" value="{{ isset($data->alamat) ? $data->alamat : null  }}" maxlength="20" required>
                                   </div>

                                   <div class="form-group">
                                    <label for="">No Hp </label>
                                        <input type="text" class="form-control" name="no_hp" value="{{ isset($data->no_hp) ? $data->no_hp : null  }}" maxlength="20" required>
                                    </div>



                             

                           
                      
     
                         </div>





<br>

                         <button type="submit" class="btn-dark" data-toggle="tooltip" data-placement="bottom" title="Daftar">Daftar</button>
                         <a href="/" class="btn-danger">Cancel</a>
     
                     </div>
                 </div>
             </div>
             <br>
             <br>
             <br>
     <!-- product section end -->
   

     @endsection






