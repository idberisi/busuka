$(document).ready(function() {$('#tabel_assign_moda_form').submit(function() {
			$.ajax({
				type: 'POST',
				url: $(this).attr('action'),
				data: $(this).serialize(),
				success: function(data) {
					$('#notif').fadeIn('slow');
					$('#notif').html(data);
					$('#tbltabel_assign_moda').load('tabel_assign_moda_refresh.php');
					$('#tabel_assign_moda').trigger('reset');
				}
			})
			return false;
		});
			});
			function edit(pk)
			{
				var id=pk;
				var jalur_id=$('#'+id+'jalur_id').val();var moda_id=$('#'+id+'moda_id').val();$.ajax(
				{
				  type: 'POST',
				  url: '#tabel_assign_moda_update.php',
				  data: 
				  {id:id,jalur_id:jalur_id,moda_id:moda_id,},
				  success: function(data) {
					$('#notif').fadeIn('slow');
					alert(data);
					$('#tbltabel_assign_moda').load('tabel_assign_moda_refresh.php');
					$('#tabel_assign_moda').trigger('reset');
				  }
				})
				return false;
			}
			