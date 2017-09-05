<?php include "../kon/koneksi.php"; $table=new Tables(); $ambil=new Tables(); ?>
<html>
<head>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.6/dt-1.10.12/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.6/dt-1.10.12/datatables.min.js"></script>
	<script src="tabel_assign_loc_insert.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class='row' style="padding:20px;">
            <div class='col-md-6 col-md-offset-3'>
                   <form id="tabel_assign_loc_form" name="form2" method="post" action="tabel_assign_loc_insert.php">
						<div class="form-group">
							<label>Jalur Id Assg</label>
							<?php $ambil->getComboBox('SELECT tabel_assign_moda.id, CONCAT_WS(" ",tabel_jalur.keterangan,tabel_moda.nama) as jalur FROM `tabel_assign_moda` inner join tabel_jalur on tabel_assign_moda.jalur_id=tabel_jalur.id inner join tabel_moda on tabel_assign_moda.moda_id=tabel_moda.id',"jalur_id_assg") ?>
							<label>Check Point Id</label>
							<?php $ambil->getComboBox("SELECT id,deskripsi FROM tabel_check_point","check_point_id") ?>
							<label>Icon</label>
							<input name='icon' id='icon' class='form-control' placeholder='Enter Icon'>
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
						<button type="reset" class="btn btn-default">Reset</button>
					</form>
            </div>
        </div>
    </div>
</body>
</html>

