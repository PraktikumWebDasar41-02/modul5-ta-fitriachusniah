	<center>
		<br><br><br><br>
<?php
	session_start();
	$nim = $_SESSION['nim'];
	include "koneksi.php";
	$query2 = "SELECT * FROM t_jurnal1 WHERE NIM = '$nim'";
    $result = $koneksi->query($query2);
    if ($result->num_rows > 0) {
      
			while($row = $result->fetch_assoc()) {
				$nama = $row["Nama"];
				//echo $nama;
			}
    } else {
        echo "0 results";
    }
  
	echo "Nama : Hai ".$nama;
?>
<html>
<head><title>TA5 Fitria Ridatuk Chusniah</title></head>
<body background="bg.jpg" style="color: #ffffff">

<form action="#" method="post">
Komentar : <textarea name="komen"></textarea><br>

<input type="submit" name="submit" value="SUBMIT">
</form>
</html>
<?php

if(isset($_POST['submit'])){
	$komen = $_POST['komen'];
	$len = str_word_count($_POST['komen']);
	if($len<5){
		echo "komentar minimal 5 kata";
	}else{
		
	
	
			$query = "UPDATE t_jurnal1 SET Komentar = '$komen' WHERE NIM = '$nim'";
			$update = mysqli_query($koneksi,$query);
			if($update){
				echo "Berhasil";
			}else{
				echo "Gagal";
			}
	}
}
?>
</center>