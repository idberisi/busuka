$(document).ready(function() {$('#tabel_lampu_merah_form').submit(function() {
			$.ajax({
				type: 'POST',
				url: $(this).attr('action'),
				data: $(this).serialize(),
				success: function(data) {
					$('#notif').fadeIn('slow');
					$('#notif').html(data);
					$('#tbltabel_lampu_merah').load('tabel_lampu_merah_refresh.php');
					$('#tabel_lampu_merah').trigger('reset');
				}
			})
			return false;
		});
			});
			function edit(pk)
			{
				var id=pk;
				var lokasi=$('#'+id+'lokasi').val();var photo=$('#'+id+'photo').val();$.ajax(
				{
				  type: 'POST',
				  url: '#tabel_lampu_merah_update.php',
				  data: 
				  {id:id,lokasi:lokasi,photo:photo,},
				  success: function(data) {
					$('#notif').fadeIn('slow');
					alert(data);
					$('#tbltabel_lampu_merah').load('tabel_lampu_merah_refresh.php');
					$('#tabel_lampu_merah').trigger('reset');
				  }
				})
				return false;
			}
			