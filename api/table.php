<?php include "kon/koneksi.php";
$jsons=new Jsonx(); 
$tables=new Tables();
if(isset($_GET['id_jalur'])){
	$jsons->getHalte($_GET['id_jalur']);
}
elseif(isset($_GET['nm'])){
	$jsons->getJsonDataTable($_GET['nm']);
}
else{
	$jsons->busukaJson();
}



//$tables->getAllTableFunction();
?>