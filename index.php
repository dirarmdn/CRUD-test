<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat CRUD Dengan PHP Dan MySQL - Menampilkan data dari database</title>
</head>
<body>
    <div class="judul">
        <h1>Membuat CRUD Dengan PHP Dan MySQL</h1>
        <h2>Menampilkan data dari database</h2>
        <h3>#praktekdhira</h3>
</div>
<br/>

<?php
if(isset($_GET['pesan'])) {
    $pesan = $_GET['pesan'];
    if($pesan == "input") {
        echo "Data berhasil diinput.";
    }else if($pesan == "update"){
        echo "Data berhasil diupdate.";
    }else if($pesan == "hapus"){
        echo "Data berhasil dihapus.";
    }
    ?>
    <br/>
    <a class="tombol" href="input.php">+ Tambah Data Baru</a>

    <h3>Data user</h3>
    <table border="1" class="table">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Pekerjaan</th>
            <th>Opsi</th>
</tr>
<?php
include "koneksi.php";
$query_mysql = mysql_query("SELECT * FROM user") or die(mysql_error());
$nomor = 1;
while($data = mysql_fetch_array($query_mysql)) {
    ?>
    <tr>
    <td><?php echo $nomor++; ?></td>
			<td><?php echo $data['nama']; ?></td>
			<td><?php echo $data['alamat']; ?></td>
			<td><?php echo $data['pekerjaan']; ?></td>
			<td>
				<a class="edit" href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> |
				<a class="hapus" href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a>					
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>