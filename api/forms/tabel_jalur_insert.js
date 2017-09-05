$(document).ready(function() {$('#tabel_jalur_form').submit(function() {
			$.ajax({
				type: 'POST',
				url: $(this).attr('action'),
				data: $(this).serialize(),
				success: function(data) {
					$('#notif').fadeIn('slow');
					$('#notif').html(data);
					$('#tbltabel_jalur').load('tabel_jalur_refresh.php');
					$('#tabel_jalur').trigger('reset');
				}
			})
			return false;
		});
			});
			function edit(pk)
			{
				var id=pk;
				var nama=$('#'+id+'nama').val();var keterangan=$('#'+id+'keterangan').val();$.ajax(
				{
				  type: 'POST',
				  url: '#tabel_jalur_update.php',
				  data: 
				  {id:id,nama:nama,keterangan:keterangan,},
				  success: function(data) {
					$('#notif').fadeIn('slow');
					alert(data);
					$('#tbltabel_jalur').load('tabel_jalur_refresh.php');
					$('#tabel_jalur').trigger('reset');
				  }
				})
				return false;
			}
			