<style type="text/css">

.gm-style-iw p {
	margin-bottom: 0;
}
#map-wrapper {
	padding: 0;
}

.acf-map {
	width: 100%;
	height: 650px;
}

/* fixes potential theme css conflict */
.acf-map img {
   max-width: inherit !important;
}

</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC64TkUxHsuNgJPDKpYZtH6mYNR_WAr5iU"></script>
<script type="text/javascript">
(function($) {


	var global_markers = [];
	var global_infowindows = [];

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/

function new_map( $el ) {
	
	// var
	var $markers = $el.find('.marker');
	
	
	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
	
	
	// create map	        	
	var map = new google.maps.Map( $el[0], args);
	
	
	// add a markers reference
	map.markers = [];
	
	
	// add markers
	$markers.each(function(){
		
    	add_marker( $(this), map );
		
	});
	

	// Toggles between infowindows
	for (var i = 0; i < global_markers.length; i++) {
	    // Keep value of 'i' in event creation
	    (function(i) {
	        google.maps.event.addListener(global_markers[i], 'click', function() {
	            closeInfowindows();
	            global_infowindows[i].open(map, global_markers[i]);
	        });
	    }(i));
	}
	
	// center map
	center_map( map );
	
	
	// return
	return map;
	
}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		icon		: $marker.attr('data-pin'),
		map			: map
	});

	// add to array
	map.markers.push( marker );

	// PUSH INTO GLOBAL_MARKERS
	global_markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// PUSH INTO GLOBAL_INFOWINDOWS
    	global_infowindows.push( infowindow );

		// show info window when marker is clicked
		// google.maps.event.addListener(marker, 'click', function() {

		// 	infowindow.open( map, marker );

		// });
	}

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}

}


function closeInfowindows() {
    for (var x = 0; x < global_infowindows.length; x++) {
        global_infowindows[x].close();
    }
}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
// global var
var map = null;

$(document).ready(function(){

	$('.acf-map').each(function(){

		// create map
		map = new_map( $(this) );

	});

});

})(jQuery);
</script>




<?php
// WP_Query arguments
    $args = array (
        'post_type'              => 'points',
        'post_status'            => 'publish',
        'posts_per_page'         => -1,
    );
    // The Query
    $loop = new WP_Query( $args );
    if( $loop->have_posts()) {
    	$html = '';
    	$html .= '
    	<div class="acf-wrapper">
    	<div class="acf-map">
    		
    	';
	    //the loop
	    while ( $loop->have_posts() ) : $loop->the_post();
	    	$location = get_field('point_location');
	    	$title = get_the_title();

	    	$point_address_line_1 = get_field('point_address_line_1');
	    	$point_address_line_2 = get_field('point_address_line_2');
	    	$point_directions_link = get_field('point_directions_link');

	    	$link = '';
	    	if($point_directions_link){
	    		$link = '<p><a href="' . $point_directions_link . '" target="_blank">Get Directions</a></p>';
	    	}

	    	$map_pin = get_field('point_map_pin');

	    	
	    	$html .= '
	    	<div class="marker custom-markers" data-pin="' . $map_pin . '" data-lat="' . $location['lat'] . '" data-lng="' . $location['lng'] . '">
				<h4>' . $title . '</h4>
				<p class="address">' . $point_address_line_1 . '</p>
				<p class="address">' . $point_address_line_2 . '</p>
				' . $link . '
			</div>
	    	';
	    endwhile;
	    wp_reset_query();
	    $html .= '</div></div>
	   <!-- <button data-marker="0">Open 1</button> -->
	    ';
	    echo $html;
	}
?>