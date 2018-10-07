<?php
	session_start();
	include "koneksi.php";
?>
<html>
<head><title>TA5 Fitria Ridatuk Chusniah</title></head>
<body background="bg.jpg" style="color: #ffffff">
	<form method="post">
<center>
	<br><br><br>
		<table style="border: solid thin #666">
			<tr>
				<td>NIM</td><td>:</td>
				<td><input type="text" name="nim"><br></td>
			</tr>
			<tr>
				<td>Nama</td><td>:</td>
				<td><input type="text" name="nama"><br></td>
			</tr>
			<tr>
				<td>Email</td><td>:</td>
				<td><input type="text" name="email"><br></td>
			</tr>
			<tr>
				<td>Tgl Lahir</td><td>:</td>
				<td> <input type="Date" name="tgl"><br></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td><td>:</td>
				<td><input type="radio" name="jk" value="L" checked="checked">L<input type="radio" name="jk" value="P">P</td>
			</tr>
			<tr>
				<td>Program Studi</td><td>:</td>
				<td>
					<select name="prodi">
						<option value="S1 Teknik Elektro">S1 Teknik Elektro</option>
						<option value="S1 Desain Interior">S1 Desain Interior</option>
						<option value="S1 Komunikasi dan Bisnis">S1 Komunikasi dan Bisnis</option>
						<option value="D3 Manajemen Informatika">D3 Manajemen Informatika</option>
						<option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Fakultas</td><td>:</td>
				<td>
					 <select name="fakultas">
						<option value="Teknik Elektro">Teknik Elektro</option>
						<option value="Industri Kreatif">Industri Kreatif</option>
						<option value="Komunikasi dan Bisnis">Komunikasi dan Bisnis</option>
						<option value="Ilmu Terapan">Ilmu Terapan</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="3"><input type="submit" name="submit" value="SUBMIT"></td>
			</tr>
		</table>
		
		
	</form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
	$nim = $_POST['nim'];
	$_SESSION['nim'] = $nim;
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$tgl = $_POST['tgl'];
	$tgl_ini = substr($tgl, 0,4);
	$jk = $_POST['jk'];
	$prodi = $_POST['prodi'];
	$fakultas = $_POST['fakultas'];
	$cek_error = true;
	$len = strlen($nim);
	
	if(empty($nim)){
			echo "Maaf, anda harus mengisi NIM<br>";
			$cek_error = false;
	}else{
		if (!is_numeric($nim)){
			echo "Maaf, NIM harus berupa angka<br>";
			$cek_error = false;
		}
		if($len!=10){
			echo "NIM harus tidak lebih/kurang dari 10 angka<br>";
			$cek_error = false;
		}
	}
	
	$len2 = strlen($nama);
	if(empty($nama)){
		echo "Maaf, anda harus mengisi nama<br>";
		$cek_error = false;
	}else{
		if (is_numeric($nama)){
			echo "Maaf, nama harus berupa huruf<br>";
			$cek_error = false;
		}
		if($len2>20){
			echo "Nama harus tidak lebih dari 20 karakter<br>";
			$cek_error = false;
		}
	}

	if(empty($email)){
		echo "Maaf, anda harus mengisi email<br>";
		$cek_error = false;
	}else{
		if(!strpos($email,'@') || !strpos($email,'.com')){
			echo "Format Email salah!<br>";
			$cek_error = false;
		}
	}

	if($tgl_ini>2008){
		echo "Anda harus kelahiran tahun 2008 ke bawah!<br>";
	}

	if($cek_error){
				$query= "INSERT INTO t_jurnal1 (NIM,Nama,Email,tgl_lahir,jk,prodi,fakultas) VALUES ('$nim','$nama','$email','$tgl','$jk','$prodi','$fakultas')";
			
			$hasil = mysqli_query($koneksi,$query);
			if($hasil){
				header("Location:form_input2.php");
			}else{
				echo "data gagal diinput";
			}
	}else{
		echo "Data harus diisi dengan benar!";
	}
	
	

}
?>
</center>