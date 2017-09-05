$(document).ready(function() {$('#tabel_assign_lampu_merah_form').submit(function() {
			$.ajax({
				type: 'POST',
				url: $(this).attr('action'),
				data: $(this).serialize(),
				success: function(data) {
					$('#notif').fadeIn('slow');
					$('#notif').html(data);
					$('#tbltabel_assign_lampu_merah').load('tabel_assign_lampu_merah_refresh.php');
					$('#tabel_assign_lampu_merah').trigger('reset');
				}
			})
			return false;
		});
			});
			function edit(pk)
			{
				var id=pk;
				var lampu_merah_id=$('#'+id+'lampu_merah_id').val();var icon=$('#'+id+'icon').val();var keterangan=$('#'+id+'keterangan').val();$.ajax(
				{
				  type: 'POST',
				  url: '#tabel_assign_lampu_merah_update.php',
				  data: 
				  {assign_loc_id:id,lampu_merah_id:lampu_merah_id,icon:icon,keterangan:keterangan,},
				  success: function(data) {
					$('#notif').fadeIn('slow');
					alert(data);
					$('#tbltabel_assign_lampu_merah').load('tabel_assign_lampu_merah_refresh.php');
					$('#tabel_assign_lampu_merah').trigger('reset');
				  }
				})
				return false;
			}
			