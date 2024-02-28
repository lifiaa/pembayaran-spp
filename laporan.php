<?php
session_start();
    include "koneksi.php";
    if(isset($_SESSION['user']['level'])){
        $where = "";                  
        }else{
            $where = " WHERE pembayaran.nisn=" . $_SESSION['user']['nisn'];
        }
        ?>

<table border="3" width="100%" cellpadding="5" cellspacing="0">
    <tr>
        <th colspan="9">
            <h2 style="margin:0;">Laporan Pembayaran SPP Tahun 2024</h2>
        </th>
    </tr>
    <tr>
        <th>No</th>
        <th>Petugas</th>
        <th>NISN</th>
        <th>Nama Siswa</th>
        <th>Tanggal Bayar</th>
        <th>Bulan Dibayar</th>
        <th>Tahun Dibayar</th>
        <th>SPP</th>
        <th>Jumlah Bayar</th>
    </tr>
    <?php
    $i = 1;
    $query = mysqli_query($koneksi, "SELECT*FROM pembayaran left join petugas on petugas.id_petugas = pembayaran.id_petugas left join siswa on siswa.nisn = pembayaran.nisn left join spp on spp.id_spp = pembayaran.id_spp $where");
    while ($data = mysqli_fetch_array($query)) {
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $data['nama_petugas']; ?></td>
        <td><?php echo $data['nisn']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['tgl_bayar']; ?></td>
        <td><?php echo $data['bulan_dibayar']; ?></td>
        <td><?php echo $data['tahun_dibayar']; ?></td>
        <td><?php echo number_format($data['nominal']); ?></td>
        <td><?php echo number_format($data['jumlah_bayar']); ?></td>
    </tr>
    <?php
    $i++;
    }
    ?>
</table>
<script type="text/javascript">
    window.print();
</script>
			