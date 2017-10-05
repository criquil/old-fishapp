<!DOCTYPE HTML>

<html lang="es">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>FishApp</title>

	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

</head>
<body class="back_ground1" onload="initialize()">>
  <?php
    require_once('places_config.php');
    $places = $db->query('SELECT * FROM tbl_places');
  ?>
<h1 class="head1"> FishApp </h1>






	<div class="row-fluid">
		<div class="span2">
			<p class="search">
			<label class="search" for="search_new_places">New Places</label>
			<input class="search" type="text" placeholder="Search New Places" id="search_new_places" autofocus>
			</p>

			<p class="search">
			<label class="search" for="search_ex_places">Saved Places</label>
			<input class="search" type="text" placeholder="Search Saved Places" id="search_ex_places" list="saved_places">
			</p>

			<input class="search" type="hidden" name="place_id" id="place_id"/>

			<p class="search">
			<label class="search" for="place">Name</label>
			<input class="search" type="text" name="n_place" id="n_place"/>
			</p>

			<p class="search">
			<label class="search" for="description">Description</label>
			<input class="search" type="text" name="n_description" id="n_description"/>
			</p>

      <p class="but">
			<input type="button" id="btn_save" value="save place"/>
      <input type="button" id="plot_marker" value="plot marker"/>
      </p>

			<datalist class="search" id="saved_places">
			<!--loop through the places saved in the database and store their data into each of the data attribute in the options-->
			<?php while($row = $places->fetch_object()){ ?>
			  <option value="<?php echo $row->place; ?>" data-id="<?php echo $row->place_id; ?>" data-lat="<?php echo $row->lat; ?>" data-lng="<?php echo $row->lng; ?>" data-place="<?php echo $row->place; ?>" data-description="<?php echo $row->description; ?>"><?php echo $row->place; ?></option>
			<?php } ?>
			</datalist>

		</div>
		<div class="span7">
			<div id="map_container"><div id="map_canvas"></div></div>
		</div>
      <div class="span3">
        <div class="list-group-fluid">

          <h4 class="list-group-item-heading">List group item heading</h4>
            <p class="list-group-item-text">

                  <div id="myCarousel" class="carousel slide">
                    <div class="carousel-inner">
                      <div class="item">
                        <img src="images/chasco.jpg" alt="">
                        <div class="carousel-caption">
                          <h4>First Thumbnail label</h4>
                          <p>Text...</p>
                        </div>
                      </div>
                      <div class="item">
                        <img src="images/ac-dc-background-11-700443.jpg" alt="">
                        <div class="carousel-caption">
                          <h4>Second Thumbnail label</h4>
                          <p>Text...</p>
                        </div>
                      </div>
                      <div class="item active">
                        <img src="images/chascomus2.jpg" alt="" class="img">
                        <div class="carousel-caption">
                          <h4>Third Thumbnail label</h4>
                          <p>Text...</p>
                        </div>
                      </div>
                    </div>
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
                  </div>




            </p>

            <p class="list-group-item-text">content goes here...</p>

            <a href="#" class="list-group-item active">See More</a>






</div>
    </div>
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

<script>
function initialize(){
    var myOptions = {
//  iconImage = "images/fisher_marker.png";
//  iconImage2 = "images/fisher_marker2.png";
//  iconImageShadow = "images/fisher_marker_shadow.png";
	 var lat = 18.35827827454; //default latitude
    var lng = 121.63744354248; //default longitude
    var homeLatlng = new google.maps.LatLng(lat, lng); //set default coordinates
    var homeMarker = new google.maps.Marker({ //set marker
      position: homeLatlng, //set marker position equal to the default coordinates
      map: map, //set map to be used by the marker
      draggable: true //make the marker draggable
//      icon: iconImage, //Using custom Icon
  //    shadow: iconImageShadow //Using custom Shadow for Icon
    });

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

}

$(document).ready(function() {
 var markers=[];

  $.getJSON( 'http://localhost:8080/maps1/toXML2.php', function(data) {
        $.each( data.markers, function(i, m) {

	var homeLatlng = new google.maps.LatLng(m.lat, m.lng); //set default coordinates
    var homeMarker = new google.maps.Marker({ //set marker
      position: homeLatlng, //set marker position equal to the default coordinates
      map: map, //set map to be used by the marker
      draggable: false //make the marker draggable

//      icon: iconImage, //Using custom Icon
//      shadow: iconImageShadow //Using custom Shadow for Icon

    });

		markers.push(homeMarker);

        });

		 var markerCluster = new MarkerClusterer(map, markers, {averageCenter: true });

   });

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
 /*	   $(document).ready(function() {


  $.getJSON( 'http://localhost:8080/maps1/toXML2.php', function(data) {
        $.each( data.markers, function(i, m) {
                $('#map_canvas').gmap('addMarker', { 'position': new google.maps.LatLng(m.lat, m.lng), 'bounds':true, 'icon': iconImage, 'shadow': iconImageShadow} );
        });
});


   });*/

     /*       $(function() {

					$('#map_canvas').gmap({'center': '57.7973333,12.0502107', 'zoom': 10, 'disableDefaultUI':true, 'callback': function() {
						var self = this;
						self.addMarker({'position': this.get('map').getCenter() }).click(function() {
							self.openInfoWindow({ 'content': 'Hello World!' }, this);
						});
					}});

			}).load();;

*/

</script>
