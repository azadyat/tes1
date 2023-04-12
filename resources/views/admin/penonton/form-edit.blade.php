
    @csrf

<div class="card-body" style="max-width: 540px;">

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



