<?php
if(isset($_POST['nama'])) {

    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $id_kelas = $_POST['id_kelas'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $password = md5($_POST['password']);

    $query = mysqli_query($koneksi, "INSERT INTO siswa(nisn,nis,nama,id_kelas,alamat,no_telp,password) values('$nisn','$nis','$nama','$id_kelas','$alamat','$no_telp','$password')");

    if($query) {
        echo '<script>alert("Tambah data berhasil")</script>';
    }else{

        echo '<script>alert("Tambah data gagal")</script>';
    }
}

?>

<h1 class="h3 mb-3">Tambah Data Siswa</h1>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
                <a href="?page=siswa" class="btn btn-primary">Kembali</a>
                <hr>

                <form method="post">
                    <table class="table">
                        <tr>
                            <td width="200">NISN</td>
                            <td width="1">:</td>
                            <td><input class="form-control" type="number" name="nisn"></td>
                        </tr>
                        <tr>
                            <td width="200">NIS</td>
                            <td width="1">:</td>
                            <td><input class="form-control" type="number" name="nis"></td>
                        </tr>
                        <tr>
                            <td width="200">Nama Siswa</td>
                            <td width="1">:</td>
                            <td><input class="form-control" type="text" name="nama"></td>
                        </tr>
                        <tr>
                            <td width="200">Kelas</td>
                            <td width="1">:</td>
                            <td>
                                <select class="form-control" name="id_kelas">
                                    <?php
                                        $kel = mysqli_query($koneksi,"SELECT*FROM kelas");
                                        while ($kelas = mysqli_fetch_array($kel)) {
                                    ?>
                                    <option value="<?php echo $kelas['id_kelas']; ?>"><?php echo $kelas['nama_kelas']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="200">Alamat</td>
                            <td width="1">:</td>
                            <td><input class="form-control" type="text" name="alamat"></td>
                        </tr>
                        <tr>
                            <td width="200">No. Telepon</td>
                            <td width="1">:</td>
                            <td><input class="form-control" type="text" name="no_telp"></td>
                        </tr>
                        <tr>
                            <td width="200">Password</td>
                            <td width="1">:</td>
                            <td><input class="form-control" type="password" name="password"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><button class="btn btn-success" type="submit">Simpan</button></td>
                        </tr>
                    </table>
                </form>
			</div>
		</div>
	</div>
</div>