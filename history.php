<h1 class="h3 mb-3">Data Pembayaran - Rp. 200.000 (2024)</h1>


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
                <?php
                if(isset($_SESSION['user']['level'])){
                    ?>
                <a href="?page=pembayaran" class="btn btn-success">+ Tambah Data</a>
                <?php
            }
            ?>    
                <a href="laporan.php" target="_blank" class="btn btn-primary"> Generate Laporan</a>
                <hr>
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Petugas</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <!-- <th>Kelas</th> -->
                        <th>Tanggal Bayar</th>
                        <th>Bulan Dibayar</th>
                        <th>Tahun Dibayar</th>
                        <!-- <th>SPP</th> -->
                        <th>Jumlah Bayar</th>

                <?php
                if(isset($_SESSION['user']['level'])){
                    $where = "";
                    ?>    
                        <th>Aksi</th>
                        <?php
                    }else{
                        $where = " WHERE pembayaran.nisn=" . $_SESSION['user']['nisn'];
                    }
                    ?>
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
                            
                            <td><?php echo number_format($data['jumlah_bayar']); ?></td>

                    <?php
                    if(isset($_SESSION['user']['level'])){
                        ?>
                            <td>
                                <a href="?page=pembayaran_hapus&id=<?php echo $data['id_pembayaran']; ?>" class="btn btn-danger">Hapus</a>
                            </td>
                            <?php
                        }
                        ?>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                </table>
			</div>
		</div>
	</div>
</div>