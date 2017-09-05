$(document).ready(function(){
	$('#namjalur').change(function(){
		$(".thalte").html("");
		$(".ldghalte").append("<center><img style='width:40px;' src='imgs/dashinfinity (2).gif' /></center>");
		$.getJSON( "api/table.php?id_jalur="+$(this).val(), function( data ) {
		  var items = [];
		  $.each( data, function( key, val ) {
			items.push( "<tr><td id='" + key + "'>" + val.deskripsi + "</td></tr>" );
		  });
		 
		  $( "<tbody/>", {
			html: items.join( "" )
		  }).appendTo( ".thalte" );
		  $(".jmlhalte").text(items.length);
		  $(".ldghalte").html("");
		});
	})
})