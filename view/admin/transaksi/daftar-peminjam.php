<script type="text/javascript">
    $(document).ready( function () {
      $('#table').DataTable();
    } );
</script>


<div class="header-hal">
    <h1>DAFTAR PEMINJAM</h1>
    <hr>
</div>
<div class="daftar-table">
    <table class="table table-striped text-center" id="table" class="display">
      <thead>
      <tr>
        <th>No</th>
        <th>Id Anggota</th>
        <th>Nama</th>
        <th>Kode Buku</th>
        <th>Judul BUku</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Denda</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $data = $objAdmin->showPeminjaman();
      $no = 1;
      // $b = $data->fetch_array();
      while ($a = $data->fetch_array()) {
        if (strtotime(date('Y-m-d')) > strtotime($a['tgl_kembali']) ) {
          // $tgl_skarang = date('d');
          // // echo -$tgl_skarang;
          // $tgl_kembali = $a['tgl_kembali'];
          // $day = substr($tgl_kembali,8,2);
          // // $tgl1 = "2013-01-23";// pendefinisian tanggal awal
          // $tgl2 = date('d', strtotime(-$tgl_skarang.' days', strtotime($tgl_kembali))); //operasi penjumlahan tanggal sebanyak 6 hari
          // // $tgl2 = date('Y-m-d', strtotime('-5 days', strtotime($tgl_kembali))); //operasi penjumlahan tanggal sebanyak 6 hari
          // echo $tgl2; //print tanggal

          $tgl_skarang = date('d');
          $tgl_kembali = $a['tgl_kembali'];
          $day = substr($tgl_kembali,8,2);
          $jlh_denda = (int)$tgl_skarang - (int)$day;
          $hargaDenda = abs($jlh_denda) * 5000;
          $denda = "Rp. ".number_format($hargaDenda, 0, ".", ".");
          // echo $jlh_denda;
          // die('denda');
        }else {
          // die('tidak');
          $denda = "Tidak Denda";
        }
      ?>
      <tr>
        <td><?= $no; ?></td>
        <td><?= $a['id_anggota']; ?></td>
        <td><?= $a['nama_anggota']; ?></td>
        <td><?= $a['kd_buku']; ?></td>
        <td><?= $a['jdl_buku']; ?></td>
        <td><?= $a['tgl_pinjam']; ?></td>
        <td><?= $a['tgl_kembali']; ?></td>
        <td><?= $denda ?></td>

        <td>
          <a href="?view=pengembalian&no=<?= $a['no_pinjaman'] ?>" class="btn btn-sm btn-success">Dikembalikan</a>

        </td>
      </tr>
      <?php
      $no++;
      }
      ?>
    </tbody>
    </table>
</div>
