<div class="header-hal">
    <h1>PILIH ANGGOTA</h1>
    <hr>
</div>

<div class="form">
    <form method="post" action="?view=peminjaman2">
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Id Anggota</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Id Anggota" id="id_anggota" onchange="cariNama()" name="id_anggota">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nama Anggota</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Nama Anggota" id="nama_anggota" name="nama_anggota" disabled>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Selanjutnya</button>

    </form>
</div>


<script type="text/javascript">

function cariNama() {
  var id_anggota = document.getElementById("id_anggota").value;
  $.ajax({
            url: 'models/ajax.php?proses=namaAnggota',
            data:{id : id_anggota },
            success: function (data) {
            obj = JSON.parse(data);
            // console.log(obj);
            $('#nama_anggota').val(obj.namaAnggota);
            }
        });
}

</script>
