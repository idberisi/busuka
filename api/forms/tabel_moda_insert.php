<?php include 'kon/koneksi.php';if (trim($_POST['id']) ==''){$error[]= '- id harus diisi';}if (trim($_POST['nama']) ==''){$error[]= '- nama harus diisi';}if (trim($_POST['deskripsi']) ==''){$error[]= '- deskripsi harus diisi';}$id=$_POST['id'];$nama=$_POST['nama'];$deskripsi=$_POST['deskripsi'];if (isset($error)){echo implode("<br />", $error);}else{try{$pdo = new PDOx();$dbh=$pdo->getKoneksi();$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );$sql="INSERT INTO tabel_moda(id,nama,deskripsi)VALUES (:id,:nama,:deskripsi)"; $q = $dbh->prepare($sql); $q->execute(array('id'=>$id,'nama'=>$nama,'deskripsi'=>$deskripsi)); echo "Succes add data!";} catch(PDOException $e){echo "Error". $e->getMessage(); exit;}}?>