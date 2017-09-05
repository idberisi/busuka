<!DOCTYPE html>
<html>
 
<head>
    <title>Movie Fire</title>
	<style>
		body {
			font-family: "calibri";
			background: #efefef;
			padding: 32px;
			padding-top: 16px;
			color: #333;
		}
		h1,h3 {
			text-align: center;
			color: #787878;
		}
		 
		#movieName
		{
			width: 98%;
			padding: 9px;
			font-size: 16px;
		}
	</style>
</head>
 
<body>
    <h1>Movie Fire</h1>
    <h3>Save all your Favorite Movies here</h3>
    <hr />
    <input type="text" id="movieName" placeholder="Enter your Favorite Movie Name" />
    <h4>My Favorite Movies</h4>
    <ol id="favMovies">
      <label id="loading">Loading.. Please wait..</label>
    </ol>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/json2/20121008/json2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.4.3/underscore-min.js"></script>
    <script src="https://cdn.firebase.com/js/client/1.0.21/firebase.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/0.9.10/backbone-min.js"></script>
    <script src="https://cdn.firebase.com/libs/backfire/0.3.0/backbone-firebase.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/firebase/app.js')?>"></script>
    
    <script type="text/template" id="movieTemplate">
    <%- name %> [
            <a href="javascript:" class="edit">Edit</a>|
            <a href="javascript:" class="delete">Delete</a>]
    </script>
</body>
</html>
