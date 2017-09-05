<?php 
	include '../kon/koneksi.php';
	
	if (trim($_POST['nama']) ==''){
		$error[]= '- nama harus diisi';
	}

	
	if (trim($_POST['deskripsi']) ==''){
		$error[]= '- deskripsi harus diisi';
	}

	
	if (trim($_POST['latitude']) ==''){
		$error[]= '- latitude harus diisi';
	}

	
	if (trim($_POST['longtitude']) ==''){
		$error[]= '- longtitude harus diisi';
	}

	$id=null;
	$nama=$_POST['nama'];
	$deskripsi=$_POST['deskripsi'];
	$latitude=$_POST['latitude'];
	$longtitude=$_POST['longtitude'];
	
	if (isset($error)){
		echo implode("<br />", $error);
	} else {
		try{
			$pdo = new PDOx();
			$dbh=$pdo->getKoneksi();
			$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$sql="INSERT INTO tabel_check_point(id,nama,deskripsi,latitude,longtitude)VALUES (:id,:nama,:deskripsi,:latitude,:longtitude)";
			$q = $dbh->prepare($sql);
			$q->execute(array('id'=>$id,'nama'=>$nama,'deskripsi'=>$deskripsi,'latitude'=>$latitude,'longtitude'=>$longtitude));
			echo "Succes add data!";
		}

		catch(PDOException $e){
			echo "Error". $e->getMessage();
			exit;
		}

	}

	?>