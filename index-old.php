<!DOCTYPE HTML>

<html lang="es">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>FishAppSS	</title>

	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
  <?php
    require_once('places_config.php');
    $places = $db->query('SELECT * FROM tbl_places');
  ?>
</head>
<body class="back_ground1">
<div id="nav" class="row-fluid">
		<div class="span12">

<nav class="navbar navbar-primary navbar-static-top" role="navigation">
  <div class="navbar-inner">
    <div class="container">
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="brand" href="#">FishApp</a>
      <div class="nav-collapse collapse">
        <ul class="nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="http://www.bootply.com">Bootply</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>
  </div>
</div>
<div class="span12">
<p></p>
</div>
<div id="content" class="row-fluid">
		<div class="span7 buttonspan">	<p class="search">
			<input class="search" type="text" placeholder="Search New Places" id="search_new_places" autofocus>
			</p>
			<div id="map_container"><div id="map_canvas"></div></div>
		</div>

		<div class="span4 topspan">	<p>
		<br><p></p></br>
                  <div id="CarouselPreview" class="carousel slide">
                    <div class="carousel-inner">
                      <div class="item active">
					  <div class="img-responsive">
                        <img src="images/ac-dc-background-11-700443.jpg" id="imm" alt="">
                        <div class="carousel-caption">
						<div id="star" class="rating" data-number="5">            </div>
                          <h4 id="texto">Preview</h4>

                          <a id="texto2" href="#myModal" data-toggle="modal" data-dismiss="modal">Ver mas...</a>

                        </div>
						</div>
                      </div>
                    </div>
                  </div>

</div>
<div class="span12">
<p></p>
</div>

<!-- Modal -->
				<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Place Name</h3>
  </div>
  <div class="modal-body">

	<p>Place´s Info / Place´s rate</p>

  <div class="list-group-item-text">
                  <div id="myCarousel2" class="carousel slide">
                    <div class="carousel-inner">
                      <div class="item">
					  <div class="img-responsive">
                        <img src="images/chasco.jpg" id="imm" alt="">
                        <div class="carousel-caption">
                          <h4 id="text1">Nombre</h4>
                          <p id="text2">Date</p>
                        </div>
						</div>
                      </div>
                      <div class="item">
					  <div class="img-responsive">
                        <img src="images/ac-dc-background-11-700443.jpg" alt="">
                        <div class="carousel-caption">
                          <h4>Nombre</h4>
                          <p>Date</p>
                        </div>
						</div>
                      </div>
                      <div class="item active">
					  <div class="item active">
                        <img src="images/chascomus2.jpg" alt="" class="img">
                        <div class="carousel-caption">
                          <h4>Nombre</h4>
                          <p>Date</p>
                        </div>
						</div>
                      </div>
                    </div>
                    <a class="left carousel-control" href="#myCarousel2" data-slide="prev">&lsaquo;</a>
                    <a class="right carousel-control" href="#myCarousel2" data-slide="next">&rsaquo;</a>
                  </div>
				    <p>Discussion / Comment about the Picture</p>
            </div>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
<!-- End Modal -->
<!-- AddSpotModal -->
				<div id="AddSpotModal" class="modal hide fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
				  <div class="modal-body">
					<p>Would you really want to add a new fishing spot?</p>
				  </div>
				  <div class="modal-footer">
					<button class="btn" data-dismiss="modal">Cancel</button>
					<button class="btn btn-primary" data-dismiss="modal" href="#AddFormModal" data-toggle="modal">Sure</button>
				  </div>
				</div>

<!-- End AddSpotModal -->

<div id="myForm" class="modal hide fade" tabindex="-1" data-backdrop="static" data-keyboard="false" action="upload.php" method="post" enctype="multipart/form-data">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Place Name</h3>
  </div>
  <form id="InfroText" method="POST">
     <input type="file" size="60" name="myfile">
     <input type="submit" value="upload">
					 <div id="progress">
							<div id="bar"></div>
							<div id="percent">0%</div >
					</div>
<br/>
<div id="message"></div>
 </form>

</div>
<!-- AddFormModal -->
				<div id="AddFormModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">Fishing Spot Creation.</h3>
    </div>

    <div class="modal-body">

      <form id="myForm"  method="post" enctype="multipart/form-data">

      <input type="hidden" name="myfile" value="1">
		<div class="table-responsive">
      <table class="table">
        <tbody><tr><td>Place Name:</td><td><input type="text" name="title" id="title" style="width:300px"><span class="hide help-inline">This is required</span></td></tr>
        <tr><td>Place Description:</td><td><textarea name="contect" style="width:300px;height:100px"></textarea></td></tr>
			<div class="btn-group">
			  <button type="button" class="btn btn-info">Type</button>
			  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
				<li><a href="#">Rio</a></li>
				<li><a href="#">Arroyo</a></li>
				<li><a href="#">Lago</a></li>
				<li><a href="#">Laguna</a></li>
				<li><a href="#">Mar Abierto</a></li>
				<li><a href="#">Mar Costa</a></li>
			  </ul>
			</div>
			<br>

	  </tbody></table>
	  </div>

      </form>

</div>
<br/>
    <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
      <button class="btn btn-primary" data-toggle="modal" data-dismiss="modal" href="upload.html" id="InfroTextSubmit">Save changes</button>
    </div>
</div>
<!-- End AddFormModal -->


<div class="container" id="footer">

			<hr>
			<div class="row-fluid">
				<div class="span12">
					<div class="span8">
						<a href="#">Terms of Service</a>
						<a href="#">Privacy</a>
						<a href="#">Security</a>
					</div>
					<div class="span4">
						<p class="muted pull-right">© 2013 Company Name. All rights reserved</p>
					</div>
				</div>
			</div>
			</hr>
  </div>


	<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>

</html>

<script type="text/javascript"
  src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD9uiyFbXfbSOsY6umTUtl4_rvl_LkQKxE&sensor=false&libraries=places">
</script>
<script type="text/javascript" src="js/jquery.ui.map.js"></script>
<script type="text/javascript" src="js/gmaps.js"></script>
<script type="text/javascript" src="js/markerclusterer.min.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/jquery.raty.js"></script>
<script>
$('#star').raty({ readOnly: true, score: 3, starOn : '/img/staron.gif', starOff  : '/img/staroff.gif'});
	iconImage = "img/ico.gif";
//  iconImage2 = "images/fisher_marker2.png";
	iconImageShadow = "img/shadow1.gif";
	 var lat = 18.35827827454; //default latitude
    var lng = 121.63744354248; //default longitude
    var homeLatlng = new google.maps.LatLng(lat, lng); //set default coordinates
    var homeMarker = new google.maps.Marker({ //set marker
      position: homeLatlng, //set marker position equal to the default coordinates
      map: map, //set map to be used by the marker
      draggable: true, //make the marker draggable
      icon: iconImage, //Using custom Icon
      shadow: iconImageShadow //Using custom Shadow for Icon
    });






$(document).ready(function() {
 var markers=[];

  $.getJSON( 'http://localhost:8181/maps1/toXML2.php', function(data) {
        $.each( data.markers, function(i, m) {

	var homeLatlng = new google.maps.LatLng(m.lat, m.lng); //set default coordinates
    var homeMarker = new google.maps.Marker({ //set marker
      position: homeLatlng, //set marker position equal to the default coordinates
      map: map, //set map to be used by the marker
      draggable: false, //make the marker draggable
      icon: iconImage, //Using custom Icon
      shadow: iconImageShadow //Using custom Shadow for Icon

    });
//Initilize all Listener HERE!!!
			google.maps.event.addListener(homeMarker, 'click', function() {
			map.setZoom(8);
			map.setCenter(homeMarker.getPosition());
			var lati=encodeURI(homeMarker.getPosition().lat());
			var longi=encodeURI(homeMarker.getPosition().lng());
			$("#imm").attr("src","http://extratecno.com/wp-content/uploads/2012/02/AndroidWallpaper.jpg");


			$.getJSON('http://localhost:8181/selectFromMap.php', {'lat': lati, 'lng':longi}, function(e){
			if (e.bool){}
			$("#texto").text(e.place);
			$("#texto2").text("Ver mas....");
	  });

  });
   google.maps.event.addListener(homeMarker, 'position_changed', function(){
      var lat = homeMarker.getPosition().lat(); //set lat current latitude where the marker is plotted
      var lng = homeMarker.getPosition().lng(); //set lat current longitude where the marker is plotted
    });

    //if the center of the map has changed
    google.maps.event.addListener(map, 'center_changed', function(){
      var lat = homeMarker.getPosition().lat(); //set lat to current latitude where the marker is plotted
      var lng = homeMarker.getPosition().lng(); //set lng current latitude where the marker is plotted

    });
		markers.push(homeMarker);
        });

		 var markerCluster = new MarkerClusterer(map, markers, {averageCenter: true });

   });
$('[data-toggle="modal"]').click(function(e) {
	e.preventDefault();
	var url = $(this).attr('href');
	if (url.indexOf('#') == 0) {
		$(url).modal('open');
	} else {
		$.get(url, function(data) {
			$('<div class="modal hide fade">' + data + '</div>').modal();
		}).success(function() { $('input:text:visible:first').focus(); });
	}
});

});

    var myOptions = {
      center: new google.maps.LatLng(16.61096000671, 120.31346130371), //set map center
      zoom: 17, //set zoom level to 17
      mapTypeId: google.maps.MapTypeId.ROADMAP //set map type to road map
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"),
        myOptions); //initialize the map

    //if the position of the marker changes set latitude and longitude to
    //current position of the marker
    google.maps.event.addListener(homeMarker, 'position_changed', function(){
      var lat = homeMarker.getPosition().lat(); //set lat current latitude where the marker is plotted
      var lng = homeMarker.getPosition().lng(); //set lat current longitude where the marker is plotted
    });

    //if the center of the map has changed
    google.maps.event.addListener(map, 'center_changed', function(){
      var lat = homeMarker.getPosition().lat(); //set lat to current latitude where the marker is plotted
      var lng = homeMarker.getPosition().lng(); //set lng current latitude where the marker is plotted
    });

/*	var contextMenu = google.maps.event.addListener( map, "rightclick", createMenu );


		function createMenu(event) {


									$("#AddSpotModal").modal("show");
							}
	*/
	google.maps.event.addListener(map, "rightclick", function(event) {
    var lat = event.latLng.lat();
    var lng = event.latLng.lng();
    // populate yor box/field with lat, lng
    //alert("Lat=" + lat + "; Lng=" + lng);
	$("#AddSpotModal").modal("show");


});


    var input = document.getElementById('search_new_places'); //get element to use as input for autocomplete
    var autocomplete = new google.maps.places.Autocomplete(input); //set it as the input for autocomplete

    autocomplete.bindTo('bounds', map); //bias the results to the maps viewport

    //executed when a place is selected from the search field
    google.maps.event.addListener(autocomplete, 'place_changed', function(){

        //get information about the selected place in the autocomplete text field
        var place = autocomplete.getPlace();

        if (place.geometry.viewport){ //for places within the default view port (continents, countries)
          map.fitBounds(place.geometry.viewport); //set map center to the coordinates of the location
        } else { //for places that are not on the default view port (cities, streets)
          map.setCenter(place.geometry.location);  //set map center to the coordinates of the location
          map.setZoom(17); //set a custom zoom level of 17
        }

      homeMarker.setMap(map); //set the map to be used by the  marker
     homeMarker.setPosition(place.geometry.location); //plot marker into the coordinates of the location

    });

  $('#plot_marker').click(function(e){ //used for plotting the marker into the map if it doesn't exist already
      e.preventDefault();
      homeMarker.setMap(map); //set the map to be used by marker
      homeMarker.setPosition(map.getCenter()); //set position of marker equal to the current center of the map
      map.setZoom(17);

      $('input[type=text], input[type=hidden]').val('');
  });

  $('#search_ex_places').blur(function(){//once the user has selected an existing place

      var place = $(this).val();
      //initialize values
      var exists = 0;
      var lat = 0;
      var lng = 0;
      $('#saved_places option').each(function(index){ //loop through the save places
        var cur_place = $(this).data('place'); //current place description

        //if current place in the loop is equal to the selected place
        //then set the information to their respected fields
        if(cur_place == place){
          exists = 1;
          $('#place_id').val($(this).data('id'));
          lat = $(this).data('lat');
          lng = $(this).data('lng');
          $('#n_place').val($(this).data('place'));
          $('#n_description').val($(this).data('description'));
        }
      });

      if(exists == 0){//if the place doesn't exist then empty all the text fields and hidden fields
        $('input[type=text], input[type=hidden]').val('');

      }else{
        //set the coordinates of the selected place
        var position = new google.maps.LatLng(lat, lng);

        //set marker position
        homeMarker.setMap(map);
        homeMarker.setPosition(position);

        //set the center of the map
        map.setCenter(homeMarker.getPosition());
        map.setZoom(17);

      }
    });

    $('#btn_save').click(function(){
      var place   = $.trim($('#n_place').val());
      var description = $.trim($('#n_description').val());
      var lat = homeMarker.getPosition().lat();
      var lng = homeMarker.getPosition().lng();

      $.post('save_place.php', {'place' : place, 'description' : description, 'lat' : lat, 'lng' : lng},
        function(data){
          var place_id = data;
          var new_option = $('<option>').attr({'data-id' : place_id, 'data-place' : place, 'data-lat' : lat, 'data-lng' : lng, 'data-description' : description}).text(place);
          new_option.appendTo($('#saved_places'));
        }
      );

      $('input[type=text], input[type=hidden]').val('');
    });
</script>
