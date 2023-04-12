@csrf

<div class="card-body" style="max-width: 540px;">

<!-- Stack the columns on mobile by making one full-width and the other half-width -->
<div class="row">
  <div class="col-12 col-md-8"> <label>Nama Member</label>
    <input type="text" class="form-control" name="nama_mitra" value="{{ isset($data->nama_mitra) ? $data->nama_mitra : null  }}" required maxlength="20">
</div>
  <div class="col-6 col-md-4">    <label>Username</label>
    <input type="text" class="form-control" name="usernamelog" value="{{ isset($data->usernamelog) ? $data->usernamelog : null  }}" >
</div>
</div>

<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
<div class="row">
  <div class="col-6 col-md-4"> <label>Password</label>
    <input type="password" class="form-control" name="password" value="{{ isset($data->password) ? $data->password : null  }}" >
</div>
  <div class="col-6 col-md-4">  <label>Alamat</label>
    <input type="text" class="form-control" name="alamat" value="{{ isset($data->alamat) ? $data->alamat : null  }}" required maxlength="20">
</div>
  <div class="col-6 col-md-4">  <label>No Hp</label>
    <input type="text" class="form-control" name="no_hp" value="{{ isset($data->no_hp) ? $data->no_hp : null  }}" required maxlength="13">
</div>
</div>

<!-- Columns are always 50% wide, on mobile and desktop -->
<div class="row">
  <div class="col-6"><label>Foto Profil</label>
    <label for=""><font color="red">Nama File:{{ isset($data->gambar_bengkel) ? $data->gambar_bengkel : null  }}</font></label>
    <input type="file" class="form-control" name="gambar_bengkel" values="" >
</div>
  <div class="col-6"> <label>Id Member</label>
    <input type="text" class="form-control" name="username" value="{{$nomor}}" readonly>
</div>
</div>


<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
<div class="row">
  <div class="col-6 col-md-4"> <label>No Whatsapp</label>
    <input type="tel" onkeypress="return onlyNumberKey(event)" class="form-control" name="wa" value="{{ isset($data->wa) ? $data->wa : null  }}" required maxlength="13">  </div>
  <div class="col-6 col-md-4">   <label>Nama Facebook</label>
    <input type="text" class="form-control" name="fb" value="{{ isset($data->fb) ? $data->fb : null  }}" >
</div>
  <div class="col-6 col-md-4">  <label>Nama Youtube</label>
    <input type="text" class="form-control" name="yt" value="{{ isset($data->yt) ? $data->yt : null  }}" >
</div>




  <div class="col-6 col-md-4">
    <label>Nama Tiktok</label>
          <input type="text" class="form-control" name="tt" value="{{ isset($data->tt) ? $data->tt : null  }}" >
  
  </div>
  <div class="col-6 col-md-4">   
    <label>Nama Shoppe</label>
    <input type="text" class="form-control" name="sp" value="{{ isset($data->sp) ? $data->sp : null  }}" >

</div>
  <div class="col-6 col-md-4">  
    <label>Nama Instagram</label>
    <input type="text" class="form-control" name="ig" value="{{ isset($data->ig) ? $data->ig : null  }}" >

</div>

</div>



<script>
  function onlyNumberKey(evt) {
        
      // Only ASCII character in that range allowed
      var ASCIICode = (evt.which) ? evt.which : evt.keyCode
      if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
          return false;
      return true;
  }
</script>