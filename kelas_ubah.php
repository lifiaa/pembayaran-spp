<?php
$id = $_GET['id'];
if(isset($_POST['nama_kelas'])) {

    $nama_kelas = $_POST['nama_kelas'];
    $kompetensi_keahlian = $_POST['kompetensi_keahlian'];

    $query = mysqli_query($koneksi, "UPDATE kelas SET nama_kelas='$nama_kelas', kompetensi_keahlian='$kompetensi_keahlian' WHERE id_kelas=$id");

    if($query) {
        echo '<script>alert("Ubah data berhasil")</script>';
    }else{

        echo '<script>alert("Ubah data gagal")</script>';
    }
}
$query = mysqli_query($koneksi, "SELECT*FROM kelas WHERE id_kelas=$id");
$data = mysqli_fetch_array($query);

?>

<h1 class="h3 mb-3">Ubah Data Kelas</h1>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
                <a href="?page=kelas" class="btn btn-success">Kembali</a>
                <hr>

                <form method="post">
                    <table class="table">
                        <tr>
                            <td width="200">Nama Kelas</td>
                            <td width="1">:</td>
                            <td><input class="form-control" type="text" name="nama_kelas" value="<?php echo $data['nama_kelas']; ?>"></td>
                        </tr>
                        <tr>
                            <td width="200">Kompetensi Keahlian</td>
                            <td width="1">:</td>
                            <td><input class="form-control" type="text" value="<?php echo $data['kompetensi_keahlian']; ?>" name="kompetensi_keahlian"></td>
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