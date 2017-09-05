<?php 
	include '../kon/koneksi.php';
	
	if (trim($_POST['jalur_id_assg']) ==''){
		$error[]= '- jalur_id_assg harus diisi';
	}

	
	if (trim($_POST['check_point_id']) ==''){
		$error[]= '- check_point_id harus diisi';
	}

	
	if (trim($_POST['icon']) ==''){
		$error[]= '- icon harus diisi';
	}

	$id=null;
	$jalur_id_assg=$_POST['jalur_id_assg'];
	$check_point_id=$_POST['check_point_id'];
	$icon=$_POST['icon'];
	
	if (isset($error)){
		echo implode("<br />", $error);
	} else {
		try{
			$pdo = new PDOx();
			$dbh=$pdo->getKoneksi();
			$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$sql="INSERT INTO tabel_assign_loc(id,jalur_id_assg,check_point_id,icon)VALUES (:id,:jalur_id_assg,:check_point_id,:icon)";
			$q = $dbh->prepare($sql);
			$q->execute(array('id'=>$id,'jalur_id_assg'=>$jalur_id_assg,'check_point_id'=>$check_point_id,'icon'=>$icon));
			echo "Succes add data!";
		}

		catch(PDOException $e){
			echo "Error". $e->getMessage();
			exit;
		}

	}

	?>