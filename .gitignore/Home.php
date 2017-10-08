<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Hotel Finder</title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="materialize/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="materialize/js/materialize.js"></script>
  <script src="materialize/js/init.js"></script>

  <style>
	@import url('https://fonts.googleapis.com/css?family=Cookie');
	@import url('https://fonts.googleapis.com/css?family=Lobster');
  </style>
</head>
<body>

 	<div class="row" >
	 	<div class="parallax-container" id="title-bar">
			<div class="section no-pad-bot">
			    <div class="container">
			        <h1 class="header center ">Hotel Finder</h1>
			        <div class="row-center">
						<h2 id="sub-title" class=" valign center">A Hotel Finding Site</</h2>
					</div>
			    </div>
			</div>
			<div class="parallax"><img src="background4.jpg" alt="img1"></div>
		</div>
		

		<div class="container">
			<div class="section">
			  <!--   Icon Section   -->
				<div class="row">
					<div class="col s12">
					  <div class="icon-block">
					    <h2 class="center brown-text"><i class="material-icons icon-custom">favorite_border</i></h2>
					    <h5 class="center">Start finding!</h5>
					    <form>
					      <div class="input-field col s12">
						    <select id="type">
						      <option value="1" selected>1 bed</option>
						      <option value="2">2 beds</option>
						      <option value="3">Family-sized</option>
						    </select>
						    <label>Type</label>
						  </div>
						   <div class="row center">
					          <a href="#" type="submit" id="submit" class="btn-large waves-effect waves-light red lighten-1"><i class="material-icons right">search</i> Find Your Room</a>
					        </div>
						</form>
					  </div>
					</div>
				</div>
			</div>
		</div>


		<div class="parallax-container valign-wrapper" id="show_reco">
			<div class="section no-pad-bot">
			  <div class="container">
			    <div class="row center">
			      <h4 class="header col s12 light white-text">Here are some recommendations.</h4>
			    </div>
			  </div>
			</div>
			<div class="parallax"><img src="background2.jpg" alt="Unsplashed background img 2"></div>
		</div>

		<div class="container" id="results">
			<div class="section">
				<div class="row">
					<div class="col s12 center" id="results_inner">
						<div class="col s12 m12">'; 
						
						
						<!-- SHOW CARDS -->

						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<footer class="page-footer nav">
	    <div class="container">
	      <div class="row">
	        <div class="col l6 s12">
	          <h5 class="white-text">Find Us!</h5>
	          <p class="grey-text text-lighten-4">Find find find find find find finding find find find find find find find...</p>


	        </div>
	        <div class="col l3 s12">
	          <h5 class="white-text">Settings</h5>
	          <ul>
	            <li><a class="white-text" href="#!">Link 1</a></li>
	            <li><a class="white-text" href="#!">Link 2</a></li>
	            <li><a class="white-text" href="#!">Link 3</a></li>
	            <li><a class="white-text" href="#!">Link 4</a></li>
	          </ul>
	        </div>
	        <div class="col l3 s12">
	          <h5 class="white-text">Connect</h5>
	          <ul>
	            <li><a class="white-text" href="#!">Link 1</a></li>
	            <li><a class="white-text" href="#!">Link 2</a></li>
	            <li><a class="white-text" href="#!">Link 3</a></li>
	            <li><a class="white-text" href="#!">Link 4</a></li>
	          </ul>
	        </div>
	      </div>
	    </div>
	    <div class="footer-copyright">
	      <div class="container">
	      Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
	      </div>
	    </div>
  	</footer>

  	</body>

<script type="text/javascript">
	$(document).ready(function() {
    	$('select').material_select();
    	$("#show_reco").hide();
    	$('#results').hide();
  	});


  	$("#submit").click(function(){
			var drop_id = $("#type").val();
			console.log(drop_id);
			$.ajax({
				url: "merge.php",
				type: "post",
				data: {'id':drop_id},
				success: function(data){
					console.log(data);
					$("#show_reco").show();
					$("#results").show();
					$("#results_inner").show();

					var results = '';
					$.each(JSON.parse(data), function(key, value){
						
						results += '<div class="card horizontal">';
						results += '<div class="card-image">';
						results += '<img src="image.jpg">';
						results += '</div>';
						results += '<div class="card-stacked">';
						results += '<div class="card-content">';
						results += '<h5><strong>'+ value +'</strong><h5>';	
						results += '<p class="green-text lighten-1"> Php'+ key +'.00</p>';
						results += '</div>';
						results += '<div class="card-action red lighten-1">';
						results += '<a href="#" class="white-text">Book</a>';
						results += '</div></div></div>';
					});	

					$("#results_inner").html(results);
				}
			})
	});
</script>

</html>
