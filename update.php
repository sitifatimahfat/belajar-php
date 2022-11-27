<?php
// 1. Buat koneksi dengan MySQL
$con = mysqli_connect("localhost","root","","fakultas");

// 2. Cek koneksi dengan MySQL
if(mysqli_connect_errno()){
    echo "Koneksi gagal". mysqli_connect_errno();
}else{
    echo "Koneksi berhasil";
}

// 3. Membaca data dari table mysql.
$query = "SELECT * FROM mahasiswa WHERE id=2";

// 4. tampilkan data, dengan menjalankan sql query 
$result = mysqli_query($con,$query);
$mahasiswa = [];
if ($result){
    // tampilkan data satu per satu 
    while($row = mysqli_fetch_assoc($result)){
      $mahasiswa = $row;
    }
        mysqli_free_result($result);
}

// 5. tutup koneksi mysql
mysqli_close($con);

if (isset($_POST["submit"])){
    $nim = $_POST['nim'];
    $nama= $_POST['nama']; 
    $id_jurusan = $_POST['id_jurusan'];
    $tpt_lahir = $_POST['tpt_lahir'];
    $tgl_lahir = $_POST['tgl_lahir']; 
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
 }
     // 1. Buat koneksi dengan MySQL
     $con = mysqli_connect("localhost","root","","fakultas");
 
     // 2. Cek koneksi dengan MySQL
     if(mysqli_connect_error()){
         echo "Koneksi gagal". mysqli_connect_error();
     }else{
         echo "Koneksi berhasil";
     }
     // buat sql query untuk insert ke database
     // Buat query insert dan jalankan
     $sql = "insert into mahasiswa (id_jurusan, nim, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat)
             values ($id_jurusan, '$nim', '$nama', '$gender', '$tpt_lahir', '$tgl_lahir', '$alamat')";
 
 
     // jalankan query 
     if (mysqli_query($con,$sql)) {
         echo "Data berhasil ditambah";
     } else {
         echo "Ada error " .$sql. "<br> . mysqli_error();
     }
     mysqli_close($con);
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Update Data Mahasiswa</h1>
    <?php var_dump($mahasiswa); ?>
    <form action="insert.php" method="post"> 
        NIM: <input type="text" name="nim" value="<?php echo $mahasiswa['nim']; ?>"><br>
        Nama: <input type="text" name="nama" value="<?php echo $mahasiswa['nama']; ?>"><br>
        ID Jurusan: <input type="number" name="id_jurusan" value="<?php echo $mahasiswa['id_jurusan']; ?>"><br>
        Jenis Kelamin: <input type="text" name="gender" value="<?php echo $mahasiswa['jenis_kelamin']; ?>"><br> 
        Tempat Lahir: <input type="text" name="tpt_lahir" value="<?php echo $mahasiswa['tempat_lahir']; ?>"><br> 
        Tanggal Lahir (yyyy-mm-dd): <input type="text" name="tgl_lahir" value="<?php echo $mahasiswa['tanggal_lahir']; ?>"><br>
        Alamat: <input type="text" name="alamat" value="<?php echo $mahasiswa['alamat']; ?>"><br>
        <button type="submit" name="submit">Tambah Data</button>
     </form> 
</body>
</html>