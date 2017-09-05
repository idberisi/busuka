<?php include "../kon/koneksi.php"; $table=new Tables(); $ambil=new Tables(); ?>
<html>
<head>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.6/dt-1.10.12/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.6/dt-1.10.12/datatables.min.js"></script>
	<script src="tabel_check_point_insert.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class='row' style="padding:20px;">
            <div class='col-md-6 col-md-offset-3'>
                <form action="tabel_check_point_insert.php" id="tabel_check_point_form" method="post" name="form2">
                    <div class="form-group">
                        <label>Nama</label>
                        <input class='form-control' id='nama' name='nama' placeholder='Enter Nama'>
                        <label>Deskripsi</label>
                        <input class='form-control' id='deskripsi' name='deskripsi' placeholder='Enter Deskripsi'>
                        <label>Latitude</label>
                        <input class='form-control' id='latitude' name='latitude' placeholder='Enter Latitude'>
                        <label>Longtitude</label>
                        <input class='form-control' id='longtitude' name='longtitude' placeholder='Enter Longtitude'>
                    </div>
                    <button class="btn btn-default" type="submit">Submit</button>
                    <button class="btn btn-default" type="reset">Reset</button>
                </form>
				<hr>
				
				<table id="example" class="table display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Name</th>
						<th>Position</th>
						<th>Office</th>
						<th>Extn.</th>
						<th>Start date</th>
					</tr>
				</thead>
			</table>
            </div>
        </div>
    </div>
</body>
</html>