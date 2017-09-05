$(document).ready(function() {$('#tabel_moda_form').submit(function() {
			$.ajax({
				type: 'POST',
				url: $(this).attr('action'),
				data: $(this).serialize(),
				success: function(data) {
					$('#notif').fadeIn('slow');
					$('#notif').html(data);
					$('#tbltabel_moda').load('tabel_moda_refresh.php');
					$('#tabel_moda').trigger('reset');
				}
			})
			return false;
		});
			});
			function edit(pk)
			{
				var id=pk;
				var nama=$('#'+id+'nama').val();var deskripsi=$('#'+id+'deskripsi').val();$.ajax(
				{
				  type: 'POST',
				  url: '#tabel_moda_update.php',
				  data: 
				  {id:id,nama:nama,deskripsi:deskripsi,},
				  success: function(data) {
					$('#notif').fadeIn('slow');
					alert(data);
					$('#tbltabel_moda').load('tabel_moda_refresh.php');
					$('#tabel_moda').trigger('reset');
				  }
				})
				return false;
			}
			