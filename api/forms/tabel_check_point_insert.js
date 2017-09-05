$(document).ready(function() {
	var tablex = $('#example').DataTable({
		ajax:'http://localhost/busuka/api/table.php?nm=tabel_check_point'
	});
	$('#tabel_check_point_form').submit(function() {
			$.ajax({
				type: 'POST',
				url: $(this).attr('action'),
				data: $(this).serialize(),
				success: function(data) {
					alert(data)
					$('#notif').fadeIn('slow');
					$('#notif').html(data);
					$('#tbltabel_check_point').html("");
					$('#tbltabel_check_point').load('refresh.php?nm=tabel_check_point');
					$('#tbltabel_check_point').DataTable();
					$('#tabel_check_point').trigger('reset');
					tablex.ajax.reload( null, false );
					 
				}
			})
			return false;
		});
			
			});
			function edit(pk)
			{
				var id=pk;
				var nama=$('#'+id+'nama').val();var deskripsi=$('#'+id+'deskripsi').val();var latitude=$('#'+id+'latitude').val();var longtitude=$('#'+id+'longtitude').val();$.ajax(
				{
				  type: 'POST',
				  url: '#tabel_check_point_update.php',
				  data: 
				  {id:id,nama:nama,deskripsi:deskripsi,latitude:latitude,longtitude:longtitude,},
				  success: function(data) {
					$('#notif').fadeIn('slow');
					alert(data);
					$('#tbltabel_check_point').load('tabel_check_point_refresh.php');
					$('#tabel_check_point').trigger('reset');
				  }
				})
				return false;
			}
			