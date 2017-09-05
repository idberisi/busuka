$(document).ready(function() {$('#tabel_assign_loc_form').submit(function() {
			$.ajax({
				type: 'POST',
				url: $(this).attr('action'),
				data: $(this).serialize(),
				success: function(data) {
					alert(data)
					$('#notif').fadeIn('slow');
					$('#notif').html(data);
					$('#tbltabel_assign_loc').load('tabel_assign_loc_refresh.php');
					$('#tabel_assign_loc').trigger('reset');
				}
			})
			return false;
		});
			});
			function edit(pk)
			{
				var id=pk;
				var jalur_id_assg=$('#'+id+'jalur_id_assg').val();var check_point_id=$('#'+id+'check_point_id').val();var icon=$('#'+id+'icon').val();$.ajax(
				{
				  type: 'POST',
				  url: '#tabel_assign_loc_update.php',
				  data: 
				  {id:id,jalur_id_assg:jalur_id_assg,check_point_id:check_point_id,icon:icon,},
				  success: function(data) {
					$('#notif').fadeIn('slow');
					alert(data);
					$('#tbltabel_assign_loc').load('tabel_assign_loc_refresh.php');
					$('#tabel_assign_loc').trigger('reset');
				  }
				})
				return false;
			}
			