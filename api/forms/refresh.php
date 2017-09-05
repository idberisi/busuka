<?php 
	$tbl_nm=$_GET['nm'];
	include "../kon/koneksi.php"; 
	$table=new Tables(); 
	$ambil=new Tables();
	$ambil->getTable($tbl_nm);
?>