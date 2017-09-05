$(document).ready(function() {$('#tabel_waypoint_form').submit(function() {
			$.ajax({
				type: 'POST',
				url: $(this).attr('action'),
				data: $(this).serialize(),
				success: function(data) {
					$('#notif').fadeIn('slow');
					$('#notif').html(data);
					$('#tbltabel_waypoint').load('tabel_waypoint_refresh.php');
					$('#tabel_waypoint').trigger('reset');
					alert(data);
				}
			})
			return false;
		});
			});
			function edit(pk)
			{
				var id=pk;
				var nama=$('#'+id+'nama').val();var jalur_id_assg=$('#'+id+'jalur_id_assg').val();var check_point_id=$('#'+id+'check_point_id').val();$.ajax(
				{
				  type: 'POST',
				  url: '#tabel_waypoint_update.php',
				  data: 
				  {id:id,nama:nama,jalur_id_assg:jalur_id_assg,check_point_id:check_point_id,},
				  success: function(data) {
					$('#notif').fadeIn('slow');
					alert(data);
					$('#tbltabel_waypoint').load('tabel_waypoint_refresh.php');
					$('#tabel_waypoint').trigger('reset');
				  }
				})
				return false;
			}
			