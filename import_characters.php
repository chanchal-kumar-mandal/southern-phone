<!DOCTYPE html>
<html>
<head>
	<title>Characters</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript">
	  $(document).ready(function() {
        $.ajax({
              url: 'functions.php',
              type: "GET",
              success: function(response)
              { 
				var jsonData = JSON.parse(response);
				$('#all_characters').html(jsonData);
             }
         });
	  });
	</script>
</head>
<body>
	<a href="ChanchalMandal.html" title="ChanchalMandal">Home</a>

	<h2> List of all the characters from database table:-</h2>
	<div id="all_characters"></div>
</body>
</html>

