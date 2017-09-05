<?php
	class PDOx{
		function getDatabase(){
			$database= 'u919593114_yhyhy';//'jalanbatam_dbxcv';
			return $database;
		}
		function getKoneksi(){
			$hostname = '127.0.0.1';
			$username = 'root';
			$password = '';
			$database= 'u919593114_yhyhy';//'jalanbatam_dbxcv';
			$koneksi = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
			return $koneksi;
		}
	}
	
	class Jsonx{
		
		function getJson($table_name,$x = null)
		{
			$pdo = new PDOx();
			$koneksi=$pdo->getKoneksi();
			$database=$pdo->getDatabase();
			if($x==null)
			{
				$preparedStatement=$koneksi->prepare("SELECT * from $table_name");
			}
			else{
				$preparedStatement=$koneksi->prepare("SELECT * from $table_name where $where");
			}
			
				$preparedStatement->execute();
				$results=$preparedStatement->fetchAll(PDO::FETCH_ASSOC);
				echo json_encode($results);
		}
		
		function getJsonDataTable($table_name,$x = null)
		{
			$pdo = new PDOx();
			$koneksi=$pdo->getKoneksi();
			$database=$pdo->getDatabase();
			if($x==null)
			{
				$preparedStatement=$koneksi->prepare("SELECT * from $table_name");
			}
			else{
				$preparedStatement=$koneksi->prepare("SELECT * from $table_name where $where");
			}
			
				$preparedStatement->execute();
				$results=$preparedStatement->fetchAll();
				$data=array();
				foreach($results as $result){
				   $dataDalam=array();
				   for ($a=0;$a<(count($result)/2);$a++)
				   {
						array_push($dataDalam,$result[$a]);   
				   }					
				   array_push($data,$dataDalam);
				}
				$dataakhir=array('data'=>$data);
				echo json_encode($dataakhir);
		}
		
		function getJsonQ($query)
		{
			$pdo = new PDOx();
			$koneksi=$pdo->getKoneksi();
			$database=$pdo->getDatabase();
				$preparedStatement=$koneksi->prepare($query);
				$preparedStatement->execute();
				$results=$preparedStatement->fetchAll(PDO::FETCH_ASSOC);
				echo json_encode($results);
		}
		
		function busukaJson(){
			$pdo = new PDOx();
			$listJalur=array();
			$listDataJalur=array();
			
			$koneksi=$pdo->getKoneksi();
			$database=$pdo->getDatabase();
			$preparedStatement=$koneksi->prepare("SELECT DISTINCT JalurId from showtransport");
			$preparedStatement->execute();
			$results=$preparedStatement->fetchAll();
			foreach($results as $result){			 
			   array_push($listJalur,$result['JalurId']);
			}
			
			foreach($listJalur as $jalurx){		
				$preparedStatement=$koneksi->prepare("SELECT * from showtransport where JalurId=$jalurx");
				$preparedStatement->execute();
				//$results=$preparedStatement->fetchAll(PDO::FETCH_ASSOC);
				$results=$preparedStatement->fetchAll();
				$checkPoints=array();
				$namamoda;
				$colormoda;
				$strokemoda;
				$opacitymoda;
				$jalur;
				foreach($results as $result){			  
					$data=array(
						"nama"=>$result['nama'],
						"lat"=>$result['latitude'],
						"long"=>$result['longtitude'],
						"desc"=>$result['deskripsi'],
						"icon"=>$result['icon'],
					);
					array_push($checkPoints,$data);
					$namamoda=$result['NamaModa'];
					$colormoda=$result['strokeColor'];
				    $opacitymoda=$result['strokeOpacity'];
				    $strokemoda=$result['strokeWeight'];
					$jalur=$result['keterangan'];
				};
				
				
				$preparedStatement=$koneksi->prepare("SELECT * from showwaypoint where JalurId=$jalurx");
				$preparedStatement->execute();
				//$results=$preparedStatement->fetchAll(PDO::FETCH_ASSOC);
				$results=$preparedStatement->fetchAll();			
				$waypoints=array();
				foreach($results as $result){			  
					$data=array(
						"nama"=>$result['nama'],
						"lat"=>$result['latitude'],
						"long"=>$result['longtitude'],
						"desc"=>$result['deskripsi'],
					);
					array_push($waypoints,$data); 
				};
				
				$xx=array(
					"jalurId"=>$jalurx,
					"namaJalur"=>$jalur,
					"namaModa"=>$namamoda,
					"colorModa"=>$colormoda,
					"opacitymoda"=>$opacitymoda,
				    "strokemoda"=>$strokemoda,
					"checkPoint"=>$checkPoints,
					"wayPoint"=>$waypoints
				);
				array_push($listDataJalur,$xx);
				//array_push($jalur,$xx);
			}	
			echo json_encode($listDataJalur);
		}
		
		function getHalte($id){
			$pdo = new PDOx();
			$listJalur=array();
			$listDataJalur=array();
			
			$koneksi=$pdo->getKoneksi();
			$database=$pdo->getDatabase();
				$preparedStatement=$koneksi->prepare("SELECT deskripsi from showtransport where JalurId=$id");
				$preparedStatement->execute();
				$results=$preparedStatement->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode($results);
		}
	
	}

	
	class Tables{
		
		function getTable($table_name)// GET TABLE FROM DATABASE AKA STD
			{
			try {
				$pdo = new PDOx();
				$koneksi=$pdo->getKoneksi();
				$database=$pdo->getDatabase();
				$preparedStatement=$koneksi->prepare("SELECT column_name FROM information_schema.columns WHERE table_name='$table_name' and table_schema='$database'");
				$preparedStatement->execute();
				$baris=0;
				$headTbl=array();
				echo '<table id=tbl'.$table_name.' class="table"><thead><tr>';
				$results=$preparedStatement->fetchAll();
				foreach($results as $result){
					array_push($headTbl,$result[0]);
					$isi=str_replace("_", " ", $result[0]);
					echo "<th>".ucwords($isi)."</th>";
					$baris+=1;
				}

				//echo "<th>Fungsi</th>";
				echo "</tr></thead>";
				$preparedStatement=$koneksi->prepare("SELECT * from $table_name");
				$preparedStatement->execute();
				$results=$preparedStatement->fetchAll();
				foreach($results as $result){
					echo "<tr>";
					for ($a=0;$a<$baris;$a++){
						//echo "<td><input type='text' id='$result[0]$headTbl[$a]' name='$headTbl[$a]' value='".$result[$a]."'></td>";
						echo "<td>$result[$a]</td>";
					}

					//echo '<td align="center"><button onclick="hapus('."'".$result[0]."'".')">Hapus</button>';
					//echo '<button onclick="edit('."'".$result[0]."'".')">Edit</button></td>';
					echo "</tr>";
				}

				echo "</table>";
				$koneksi=null;
			}

			catch(PDOException $e){
				echo $e->getMessage();
			}

		}
		
		
		
		
		function getTable2($table_name)// GET TABLE FROM DATABASE AKA STD
			{
			try {
				$pdo = new PDOx();
				$koneksi=$pdo->getKoneksi();
				$database=$pdo->getDatabase();
				$preparedStatement=$koneksi->prepare("SELECT column_name FROM information_schema.columns WHERE table_name='$table_name' and table_schema='$database'");
				$preparedStatement->execute();
				$baris=0;
				$headTbl=array();
				echo '<table id=tbl'.$table_name.' class="table tbla"><tr>';
				$results=$preparedStatement->fetchAll();
				foreach($results as $result){
					array_push($headTbl,$result[0]);
					$isi=str_replace("_", " ", $result[0]);
					echo "<th>".ucwords($isi)."</th>";
					$baris+=1;
				}
				if($table_name=='transaksi_d')
				{
					$preparedStatement=$koneksi->prepare("SELECT * from $table_name order by tanggal DESC, waktu DESC");
				}
				
				else if($table_name=='tabel_log')
				{
					$preparedStatement=$koneksi->prepare("SELECT * from $table_name order by waktu DESC");
				}
				else
				{
					echo "<th>Aksi</th>";
					$preparedStatement=$koneksi->prepare("SELECT * from $table_name");
				}
				

				//echo "<th>Fungsi</th>";
				echo "</tr>";
				
				$preparedStatement->execute();
				$results=$preparedStatement->fetchAll();
				$rownum=1;
				foreach($results as $result){
					echo "<tr>";
					for ($a=0;$a<$baris;$a++){
						//echo "<td><input type='text' id='$result[0]$headTbl[$a]' name='$headTbl[$a]' value='".$result[$a]."'></td>";
						if($table_name=='tabel_user')
						{
							if($a==6)
							{
								echo "<td><img style='width:80px' src='uploads/$result[$a]'></img></td>";
							}
							else
							{
								echo "<td>$result[$a]</td>";
							}
						}
						
					
						else
						echo "<td>$result[$a]</td>";
					}
					if($table_name!='transaksi_d' AND $table_name!='tabel_log')
					{
						echo '<td align="center"><button onclick="hapus('."'".$result[0]."'".')">Hapus</button>';
						echo '<button onclick="edit('."'".$rownum."'".')">Rubah</button>';
						if($table_name=='tabel_barang')
						{
							echo '<button onclick="trs('."'".$rownum."'".')">Transaksi</button>';
						}
						echo '</td>';
					}
					echo "</tr>";
					$rownum+=1;
				}

				echo "</tr></table>";
				$koneksi=null;
			}

			catch(PDOException $e){
				echo $e->getMessage();
			}

		}
		
		
		
		function getTableAndroid($table_name)// GET TABLE FROM DATABASE AKA STD
			{
			try {
				$pdo = new PDOx();
				$koneksi=$pdo->getKoneksi();
				$database=$pdo->getDatabase();
				$preparedStatement=$koneksi->prepare("SELECT * from $table_name");
				$preparedStatement->execute();
				while($r=mysql_fetch_array($preparedStatement)){
					$arr[] = $r;
				}

				echo '{"items":'. json_encode($arr).'}';
				$koneksi=null;
			}

			catch(PDOException $e){
				echo $e->getMessage();
			}
			}

			
			function getScalar($query)
			{
				try {
					$pdo = new PDOx();
					$koneksi=$pdo->getKoneksi();
					$database=$pdo->getDatabase();
					$preparedStatement=$koneksi->prepare("$query");
					$preparedStatement->execute();
					$results=$preparedStatement->fetchAll();
					foreach($results as $result){
						echo $result[0];
					}
					$koneksi=null;
				}

				catch(PDOException $e){
					echo $e->getMessage();
				}	
			}
			
			function getScalar2($query)
			{
				try {
					$pdo = new PDOx();
					$koneksi=$pdo->getKoneksi();
					$database=$pdo->getDatabase();
					$preparedStatement=$koneksi->prepare("$query");
					$preparedStatement->execute();
					$results=$preparedStatement->fetchAll();
					foreach($results as $result){
						if($result[0]==0)
						{
							
						}
						else
						{
							echo "<div class='notNull'>$result[0]</div>";
						}
						
					}
					$koneksi=null;
				}

				catch(PDOException $e){
					echo $e->getMessage();
				}	
			}
			
			
		function getTableCustomColumnHeader($table_name,$colnames,$wherecond,$limits,$orders,$arr_header){
			try {
				$pdo = new PDOx();
				$koneksi=$pdo->getKoneksi();
				$database=$pdo->getDatabase();
				$baris=0;
				$limit="";
				$order="";
				if($limits !=null)
				{
					$limit="Limit $limits";
				}
				if($orders !=null)
				{
					$order="ORDER BY $orders DESC";
				}
				echo '<table id=tbl'.$table_name.' class="table"><tr>';
				$colname = explode(",", $colnames);
				if($arr_header == 1)
				{
					for ($i=0;$i<count($colname);$i++)
					{
						echo "<th>".$colname[$i]."</th>";
						
					}
				}
				//echo "<th>Fungsi</th>";
				echo "</tr>";
				if($wherecond ==null)
				{
					$preparedStatement=$koneksi->prepare("SELECT $colnames from $table_name $order $limit");
				}
				else if($wherecond =="CUSTOM")
				{
					$preparedStatement=$koneksi->prepare($table_name);
				}
				else
				{
					$preparedStatement=$koneksi->prepare("SELECT $colnames from $table_name where $wherecond $order $limit");
				}
				
				$preparedStatement->execute();
				echo "<tr>";
				$results=$preparedStatement->fetchAll();
				foreach($results as $result){
					echo "<tr>";
					
					for ($a=0;$a<count($colname);$a++){
						//echo "<td><input type='text' id='$result[0]$headTbl[$a]' name='$headTbl[$a]' value='".$result[$a]."'></td>";
						echo "<td class='$result[0]'>".mb_strimwidth($result[$a], 0, 200, '...')."</td>";
					}

					//echo '<td align="center"><button onclick="hapus('."'".$result[0]."'".')">Hapus</button><br> ';
					//echo '<button onclick="edit('."'".$result[0]."'".')">Edit</button></td>';
					echo "</tr>";
				}

				echo "</tr></table>";
				$koneksi=null;
			}

			catch(PDOException $e){
				echo $e->getMessage();
			}

		}
		
		

		
		function getFormInsert($table_name)// GET FORM INSERT INTO FILE AKA STD
			{
			try {
				$pdo = new PDOx();
				$koneksi=$pdo->getKoneksi();
				$database=$pdo->getDatabase();
				$preparedStatement=$koneksi->prepare("SELECT column_name FROM information_schema.columns WHERE table_name='$table_name' and table_schema='$database'");
				$preparedStatement->execute();
				$baris=0;
				$isi="";
				$isi.='<?php include "kon/koneksi.php"; $table=new Tables(); $ambil=new Tables(); ?>';
				$isi.='<head><script src="js/jquery-1.11.2.min.js"></script><script src="'.$table_name.'_insert.js" type="text/javascript"></script> </head>';
				$isi.='<body>';
				$isi.='<form id="'.$table_name.'_form" name="form2" method="post" action="'.$table_name.'_insert.php">';
				$isi.= '<div class="form-group">';
				$results=$preparedStatement->fetchAll();
				foreach($results as $result){
					//echo ("SELECT REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME FROM INFORMATION_SCHEMA.`KEY_COLUMN_USAGE`  WHERE table_schema = '$database' and table_name='$table_name' and column_name='$result[0]' ORDER BY table_name <br><br>");
					$preparedStatement2=$koneksi->prepare("SELECT REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME FROM INFORMATION_SCHEMA.`KEY_COLUMN_USAGE`  WHERE table_schema = '$database' and table_name='$table_name' and column_name='$result[0]' ORDER BY table_name");
					$preparedStatement2->execute();
					$results2=$preparedStatement2->fetchAll();
					$isid="";
					foreach($results2 as $result2)
					{
						if($result2[0] !="")
						{
							$isid=str_replace("_", " ", $result[0]);
							$isi.= "<label>".ucwords($isid)."</label>";
							$isi.='<?php $ambil->getComboBox("select * from '.$result2[0].'","'.$result2[1].'") ?>';
						}
					}
						if(strrchr($isid,$result[0]) =="")
						{
							$isid=str_replace("_", " ", $result[0]);
							$isi.= "<label>".ucwords($isid)."</label><input name='$result[0]' id='$result[0]' class='form-control' placeholder='Enter ".ucwords($isid)."'>";
							$baris+=1;
						}
				}

				$isi.= "</div>";
				$isi.= '<button type="submit" class="btn btn-default">Submit</button>';
				$isi.= '<button type="reset" class="btn btn-default">Reset</button>';
				$isi.= '</form></body>';
				$myfile=fopen($table_name.'_form.php',"w");
				fwrite ($myfile,$isi);
				fclose($myfile);
				$koneksi=null;
			}

			catch(PDOException $e){
				echo $e->getMessage();
			}

		}

		function getAllTableFunction()
		{
		$pdo = new PDOx();
					$dbh = $pdo->getKoneksi();
					$database=$pdo->getDatabase();
					$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
					try 
					{
						$result = $dbh->query("select table_name from information_schema.tables where table_schema='$database'");
						while($row = $result->fetch()) {
							$this->getFormInsert("$row[0]");
							$this->getInsertFunction("$row[0]");
						}
						
					}
					catch (PDOException $e) {
						// tampilkan pesan kesalahan jika koneksi gagal
						print "Gagal ! " . $e->getMessage() . "<br/>";
						die();
					}
		}
		
		function getInsertFunction($table_name){
			try {
				$pdo = new PDOx();
				$koneksi=$pdo->getKoneksi();
				$database=$pdo->getDatabase();
				$preparedStatement=$koneksi->prepare("SELECT column_name FROM information_schema.columns WHERE table_name='$table_name' and table_schema='$database'");
				$preparedStatement->execute();
				$baris=0;
				$results=$preparedStatement->fetchAll();
				$scr="";
				$scr.="<?php include 'kon/koneksi.php';";
				foreach($results as $result){
					$scr.="if (trim(".'$_POST'."['".$result[0]."']) ==''){".'$error[]'."= '- $result[0] harus diisi';}";
				}

				foreach($results as $result){
					$scr.= '$'.$result[0].'=$_POST['."'".$result[0]."'".'];';
				}

				$scr.='if (isset($error)){echo implode("<br />", $error);}';
				$scr.='else{';
				$scr.= 'try{';
				$scr.= '$pdo = new PDOx();$dbh=$pdo->getKoneksi();$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );';
				$scr.= '$sql="INSERT INTO '.$table_name.'(';
				$lgr=0;
				foreach($results as $result){
					if($lgr==count($results)-1)
					{
						$scr.= $result[0];
					}
					else
					{
						$scr.= $result[0].',';
					}
					$lgr+=1;
				}
				$scr.= ')';

				$lgr=0;
				$scr.= 'VALUES (';
				foreach($results as $result){
					if($lgr==count($results)-1)
					{
						$scr.= ':'.$result[0];
					}
					else
					{
						$scr.= ':'.$result[0].',';
					}
					$lgr+=1;
				}
				$lgr=0;
				$scr.=')"; ';
				$scr.= '$q = $dbh->prepare($sql); ';
				$scr.='$q->execute(array(';
				foreach($results as $result){
					if($lgr==count($results)-1)
					{
						$scr.= "'$result[0]'=>".'$'."$result[0]";
					}
					else
					{
						$scr.= "'$result[0]'=>".'$'."$result[0],";
					}
					$lgr+=1;
				}
				$scr.=")); ";
				$scr.='echo "Succes add data!";} ';
				$scr.= 'catch(PDOException $e){';
				$scr.= 'echo "Error". $e->getMessage(); ';
				$scr.= 'exit;}}?>';
				$myfile=fopen($table_name.'_insert.php',"w");
				fwrite ($myfile,$scr);
				fclose($myfile);
				$myfile2=fopen($table_name.'_insert.js',"w");
				$scr2="";
				$scr2.='$(document).ready(function() {';
				$scr2.="$('#$table_name".'_form'."').submit(function() {
			$.ajax({
				type: 'POST',
				url: $(this).attr('action'),
				data: $(this).serialize(),
				success: function(data) {
					$('#notif').fadeIn('slow');
					$('#notif').html(data);
					$('#tbl$table_name').load('".$table_name."_refresh.php');
					$('#$table_name').trigger('reset');
				}
			})
			return false;
		});
			});
			function edit(pk)
			{
				var id=pk;
				";
				$apk=0;
				foreach($results as $result){
					$apk+=1;
					
					if ($apk==1){
					} else {
						$scr2.= "var $result[0]=$('#'+id+'$result[0]').val();";
					}

				}

				$scr2.="$.ajax(
				{
				  type: 'POST',
				  url: '#".$table_name."_update.php',
				  data: 
				  {";
				$apk=0;
				foreach($results as $result){
					$apk+=1;
					
					if ($apk==1){
						$scr2.="$result[0]:id,";
					} else {
						$scr2.= "$result[0]:$result[0],";
					}

				}

				$scr2.="},
				  success: function(data) {
					$('#notif').fadeIn('slow');
					alert(data);
					$('#tbl$table_name').load('".$table_name."_refresh.php');
					$('#$table_name').trigger('reset');
				  }
				})
				return false;
			}
			";
				fwrite ($myfile2,$scr2);
				fclose($myfile2);
				$koneksi=null;
			}

			catch(PDOException $e){
				echo $e->getMessage();
			}

		}

		
		function getTableCustomHeader($table_name,$arr_header){
			try {
				$pdo = new PDOx();
				$koneksi=$pdo->getKoneksi();
				$database=$pdo->getDatabase();
				$baris=0;
				echo '<table class="table"><tr>';
				foreach($arr_header as $result){
					echo "<td>".$result."</td>";
					$baris+=1;
				}

				echo "</tr>";
				$preparedStatement=$koneksi->prepare("SELECT * from $table_name");
				$preparedStatement->execute();
				echo "<tr>";
				$results=$preparedStatement->fetchAll();
				foreach($results as $result){
					echo "<tr>";
					for ($a=0;$a<$baris;$a++){
						echo "<td>".$result[$a]."</td>";
					}

					//echo "<td><a href='edit.php'>Edit</a></td>";
					echo "</tr>";
				}

				echo "</tr></table>";
				$koneksi=null;
			}

			catch(PDOException $e){
				echo $e->getMessage();
			}

		}

		function insertLog($username,$activity)
		{
			$pdo = new PDOx();
			$dbh=$pdo->getKoneksi();
			$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$sql="INSERT INTO tabel_log (`log_id`, `Nama`, `Aktivitas`, `Waktu`) VALUES (NULL, '$username', '$activity', CURRENT_TIMESTAMP);";
			$q = $dbh->prepare($sql);
			$q->execute();
		}
		
		function login($username,$password){
			$pdo = new PDOx();
			$dbh=$pdo->getKoneksi();
			$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			//echo "SELECT $slc FROM $tbl_nm";
			try {
				$result= $dbh->query("SELECT * FROM tabel_user WHERE user_id='$username' && user_password='$password'");
				$cek_user=$result->rowCount();
				$username="";
				$userid="";
				$level="";
				$lokasi="";
				while($row = $result->fetch()) {
					$username=$row[0];
					$userid=$row[1];
					$level=$row[3];
					$lokasi=$row[2];
					if($level==1)
					{
						$sql1="Update tabel_user set user_aktif=0";
						$sql="UPDATE `tabel_user` SET `user_aktif` = '1' WHERE `user_id` = '$username'";
						$q = $dbh->prepare($sql1);
						$q->execute();
						$q = $dbh->prepare($sql);
						$q->execute();	
					}
				}

				return array($username, $userid, $level,$lokasi,$cek_user);
				$dbh = null;
			}

			catch (PDOException $e) {
				// tampilkan pesan kesalahan jika koneksi gagal
				print "Koneksi atau query bermasalah: " . $e->getMessage() . "<br/>";
				die();
			}

		}

		
		function getComboBox($query,$name){
			$pdo = new PDOx();
			$dbh = $pdo->getKoneksi();
			$database=$pdo->getDatabase();
			$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			try {
				echo "        
			<select id='$name' name='$name' class='form-control'>";
				$result = $dbh->query("$query");
				while($row = $result->fetch()) {
					echo "<option value='$row[0]'>$row[1]</option>";
				}

				echo"</select>							    
			";
				// hapus koneksi
				$dbh = null;
			}

			catch (PDOException $e) {
				// tampilkan pesan kesalahan jika koneksi gagal
				print "Gagal ! " . $e->getMessage() . "<br/>";
				die();
			}

		}
		
		function getSendData($user_id){
			$pdo = new PDOx();
			$dbh = $pdo->getKoneksi();
			$database=$pdo->getDatabase();
			$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			try {
				echo "
			<div class='judul'>Pemberitahuan</div>
<div class='msg'>			
			<table class='sendtable'>";
				$result = $dbh->query("select barang_nama,barang_lokasi,tabel_user.user_id,tabel_user.user_nama,barang_id from tabel_barang inner join tabel_user on barang_user=user_id where barang_user='$user_id'");
				while($row = $result->fetch()) {
					echo "<tr>";
					echo "<td>Operator</td><td>:</td><td>$row[2] - $row[3]</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>Nama Barang</td><td>:</td><td>$row[0]</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>Lokasi Barang</td><td>:</td><td>$row[1]</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>Kirim Pemberitahuan</td><td>:</td><td><button onclick='sendpemb($row[4])'>Kirim</button></td>";
					echo "</tr>";
					echo "<tr><td></td><td></td><td></td></tr>";
				}

				echo"</table></div>";
				// hapus koneksi
				$dbh = null;
			}

			catch (PDOException $e) {
				// tampilkan pesan kesalahan jika koneksi gagal
				print "Gagal ! " . $e->getMessage() . "<br/>";
				die();
			}

		}
		
		function getBarang($idbarang)
		{
			
		}
		
		
		function getPage($page,$user = null,$adr=null)
		{	
			if($page==1)
			{
				echo "<div class='judul'>User</div>
					<div class='msg'><button class='btambah'>Tambah User</button>";
				$this->getTable2("tabel_user");
				echo "</div>";
			}
			
			else if($page==2)
			{
				echo "<div class='judul'>Stock</div>
					<div class='msg'><button class='btambah'>Tambah Barang</button> <button class='report'>Download Excel</button>";
				$this->getTable2("tabel_barang");
				echo "</div>";
			}
			
			else if($page==4)
			{
				date_default_timezone_set('Asia/Jakarta');
				echo "<div class='judul'>Data Transaksi</div>
				<div class='msg'><button class='reportt'>Download Excel</button>";
				$this->getTable2("transaksi_d");
				echo "</div>";
			}
			
			else if($page==3)
			{
				date_default_timezone_set('Asia/Jakarta');
				echo "<div class='judul'>Data Stock (".date("d-m-y h:i:sa").")</div>";
				$this->getTable2("tabel_barang");
				echo "</div>";
			}
			
			else if($page==5)
			{
				date_default_timezone_set('Asia/Jakarta');
				echo "<div class='judul'>Data Transaksi (".date("d-m-y h:i:sa").")</div>";
				$this->getTable2("transaksi_d");
				echo "</div>";
			}
			
			else if($page==6)
			{
				echo "<div class='judul'>Pesan</div>";
				echo "<div class='col-md-3 unread cnt'>";
				echo "<div class='list-group'>";$this->getTable3(1,$user,$adr);
				echo 
				"</div></div>";
				
				echo "<div class='col-md-9 unread msgg'>";
				echo "<div class='list-group msggx ameg'>";$this->getTable3(2,$user,$adr);
				echo 
				"</div>
				<div class='col-md-12'>";
				if ($adr!=null)echo"
				<div class='row'>
				<div class='col-md-11'>
					<input id='ctms' class='form-control' type='text' />
				</div>
				<div class='col-md-1'>
					<input class='form-control buttonx' type='button'  onclick=".'"'."sendMs('$adr','$user')".'"'." value='Send' />
				</div>
				</div></div></div></div>";
			}
			
			else if($page==7)
			{
				echo "<div class='judul'>Log</div>
					<div class='msg'>";
				$this->getTable2("tabel_log");
				echo "</div>";
			}
			
		}
		
		function getMenu($level)
		{
			if($level==1)
			{
			echo "<center>
			<div id='blogin' class='box 1 login'><img src='http://localhost/partalert/css/img/login.png' /> <div>Logout</div> </div>
			<div id='buser' class='box 1 user'><img src='http://localhost/partalert/css/img/user.png' /> <div>User</div> </div>
			<div id='bstock' class='box 1 stock'><img src='http://localhost/partalert/css/img/stock.png' /> <div>Stock</div> </div>
			<div id='btran' class='box 1 stock'><img src='http://localhost/partalert/css/img/transaction.png' /> <div>Transaksi</div> </div>
			<div id='btlog' class='box 1 stock'><img src='http://localhost/partalert/css/img/log.png' /> <div>Log</div> </div>
			<div id='btreq' class='box 1 req'><img src='http://localhost/partalert/css/img/request.png' /><span class='badge'></span> <div>Pesan</div> </div>
			</center>";
			}
			
			else if($level==2)
			{
				echo "<center>
			<div id='blogin' class='box 1 login'><img src='http://localhost/partalert/css/img/login.png' /> <div>Logout</div> </div>
			<div id='bsend' class='box 1 send'><img src='http://localhost/partalert/css/img/send.png' /> <div>Send Alert</div> </div>
			<div id='btreq' class='box 1 req'><img src='http://localhost/partalert/css/img/request.png' /><span class='badge'></span><div>Request</div> </div>
			</center>";
			}
			
			else
			{
				echo "<center>
			<div id='blogin' class='box 1 login'><img src='http://localhost/partalert/css/img/login.png' /> Login </div>";	
			}
		}
		
		function getFooter(){
			echo"2015";
		}

		
	}

	

	?>