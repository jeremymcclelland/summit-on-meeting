<?php
/**
 * @package WordPress
 * @subpackage Wyzelink
 * @since Wyzelink Industries Inc.
 *

Google Map javascript and API links to run the contact page maps
 */
?>  
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6CG1xmRJTwYgAlRQnaH-NlENfGzdVgsM"></script>

<script>
function initialize() {
  mapOptions = {
    zoom: 16,
    center: new google.maps.LatLng(30.285142, -97.740889),
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    panControl: true,
    zoomControl: true,
    scaleControl: true,
    scrollwheel: false,
    draggable: true,
    styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"color":"#ff0000"},{"lightness":"100"}]},{"featureType":"administrative.country","elementType":"labels.text.fill","stylers":[{"color":"#0fbcd9"}]},{"featureType":"administrative.province","elementType":"labels.text.fill","stylers":[{"color":"#0fbcd9"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#0fbcd9"},{"visibility":"on"}]},{"featureType":"administrative.neighborhood","elementType":"labels.text.fill","stylers":[{"color":"#0fbcd9"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#0fbcd9"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#f5f5f5"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#9c9c9c"},{"saturation":"-100"},{"lightness":"35"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"},{"lightness":"3"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#0fbcd9"},{"visibility":"on"}]}]
  }; /* end const mapOptions */

  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

 // MAP MARKER ONE (Property)
  markerOne = new google.maps.Marker({
    position: new google.maps.LatLng(30.284076, -97.744151),
    map: map,
    icon: "<?php echo get_template_directory_uri();?>/images/pins/muze.png",
    zIndex: 100
  });

  infoWindowOne = new google.maps.InfoWindow({
    content: "<p style='font-size: 20px; line-height: 23px;font-weight: bold; color: #09bcda;margin-bottom:5px;'>Muze</p><p style='margin-bottom:5px;'>2100 Nueces<br />Austin. TX 78705<br><a target='_blank' href='https://www.google.com/maps/dir//2100+Nueces,+Austin,+TX+78705/@30.2869567,-97.7453505,16z'>Get directions</a></p>"
  });

  var infoWindowOneOpen = false;

  google.maps.event.addListener(markerOne, 'click', function() {
    if (infoWindowOneOpen) {
      infoWindowOne.close(map, markerOne)
      infoWindowOneOpen = false;
    } else {
      infoWindowOne.open(map, markerOne)
      infoWindowOneOpen = true;
    }
  });

  // MAP MARKER TWO (Leasing Office)
  markerTwo = new google.maps.Marker({
    position: new google.maps.LatLng(30.287412, -97.741888),
    map: map,
    icon: "<?php echo get_template_directory_uri();?>/images/pins/leasing.png",
    zIndex: 100
  });

  infoWindowTwo = new google.maps.InfoWindow({
    content: "<p style='font-size: 20px; line-height: 23px;font-weight: bold; color: #09bcda;margin-bottom:5px;'>Leasing Center</p><p style='margin-bottom:5px;'>2350 Guadalupe St.<br />Austin. TX 78705<br><a target='_blank' href='https://www.google.com/maps/dir//2350+Guadalupe+St,+Austin,+TX+78705/@30.2869567,-97.7453505,16z'>Get directions</a></p>"
  });

  var infoWindowTwoOpen = false;

  google.maps.event.addListener(markerTwo, 'click', function() {
    if (infoWindowTwoOpen) {
      infoWindowTwo.close(map, markerTwo)
      infoWindowTwoOpen = false;
    } else {
      infoWindowTwo.open(map, markerTwo)
      infoWindowTwoOpen = true;
    }
  });

   // ADDITIONAL MAP MARKERS
  tap24 = new google.maps.Marker({
    position: new google.maps.LatLng(30.288433, -97.748132),
    map: map,
    icon: "<?php echo get_template_directory_uri();?>/images/pins/tap24.png",
    zIndex: 100
  });
  cain = new google.maps.Marker({
    position: new google.maps.LatLng(30.287717, -97.744471),
    map: map,
    icon: "<?php echo get_template_directory_uri();?>/images/pins/cain.png",
    zIndex: 100
  });
  pluckers = new google.maps.Marker({
    position: new google.maps.LatLng(30.286596, -97.745660),
    map: map,
    icon: "<?php echo get_template_directory_uri();?>/images/pins/pluckers.png",
    zIndex: 100
  });
  fac = new google.maps.Marker({
    position: new google.maps.LatLng(30.286419, -97.740407),
    map: map,
    icon: "<?php echo get_template_directory_uri();?>/images/pins/fac.png",
    zIndex: 100
  });
  mainMall = new google.maps.Marker({
    position: new google.maps.LatLng(30.286038, -97.741247),
    map: map,
    icon: "<?php echo get_template_directory_uri();?>/images/pins/main-mall.png",
    zIndex: 100
  });
  coop = new google.maps.Marker({
    position: new google.maps.LatLng(30.285486, -97.742280),
    map: map,
    icon: "<?php echo get_template_directory_uri();?>/images/pins/co-op.png",
    zIndex: 100
  });
  uot = new google.maps.Marker({
    position: new google.maps.LatLng(30.286143, -97.735522),
    map: map,
    icon: "<?php echo get_template_directory_uri();?>/images/pins/uot.png",
    zIndex: 100
  });
  stadium = new google.maps.Marker({
    position: new google.maps.LatLng(30.283697, -97.732508),
    map: map,
    icon: "<?php echo get_template_directory_uri();?>/images/pins/stadium.png",
    zIndex: 100
  });
  robertHall = new google.maps.Marker({
    position: new google.maps.LatLng(30.281919, -97.741225),
    map: map,
    icon: "<?php echo get_template_directory_uri();?>/images/pins/robert-hall.png",
    zIndex: 100
  });
  target = new google.maps.Marker({
    position: new google.maps.LatLng(30.283686, -97.741804),
    map: map,
    icon: "<?php echo get_template_directory_uri();?>/images/pins/target.png",
    zIndex: 100
  });
  pcl = new google.maps.Marker({
    position: new google.maps.LatLng(30.282695, -97.738251),
    map: map,
    icon: "<?php echo get_template_directory_uri();?>/images/pins/pcl.png",
    zIndex: 100
  });
  mccombs = new google.maps.Marker({
    position: new google.maps.LatLng(30.284969, -97.737605),
    map: map,
    icon: "<?php echo get_template_directory_uri();?>/images/pins/mccombs.png",
    zIndex: 100
  });
  gregory = new google.maps.Marker({
    position: new google.maps.LatLng(30.284005, -97.736422),
    map: map,
    icon: "<?php echo get_template_directory_uri();?>/images/pins/gregory.png",
    zIndex: 100
  });
  southMall = new google.maps.Marker({
    position: new google.maps.LatLng(30.284588, -97.739317),
    map: map,
    icon: "<?php echo get_template_directory_uri();?>/images/pins/south-mall.png",
    zIndex: 100
  });
  blanton = new google.maps.Marker({
    position: new google.maps.LatLng(30.281221, -97.739427),
    map: map,
    icon: "<?php echo get_template_directory_uri();?>/images/pins/blanton.png",
    zIndex: 100
  });
  lbj = new google.maps.Marker({
    position: new google.maps.LatLng(30.285804, -97.729266),
    map: map,
    icon: "<?php echo get_template_directory_uri();?>/images/pins/lbj-library.png",
    zIndex: 100
  });
  ut = new google.maps.Marker({
    position: new google.maps.LatLng(30.286227, -97.739383),
    map: map,
    icon: "<?php echo get_template_directory_uri();?>/images/pins/ut-tower.png",
    zIndex: 100
  });
  
  // Define the LatLng coordinates for the polygon's path.
  UniversityOfTexasOutlineCoords = [
    new google.maps.LatLng(30.281885, -97.742110),
    new google.maps.LatLng(30.289795, -97.741365),
    new google.maps.LatLng(30.289137, -97.730468),
    new google.maps.LatLng(30.286731, -97.725282),
    new google.maps.LatLng(30.278594, -97.730505),
    new google.maps.LatLng(30.281885, -97.742110)
  ];

  // Construct the polygon.
  var UniversityOfTexasOutline = new google.maps.Polygon({
    paths: UniversityOfTexasOutlineCoords,
    strokeColor: '#09bcda',
    strokeOpacity: 0.8,
    strokeWeight: 0,
    fillColor: '#09bcda',
    fillOpacity: 0.25
  });

  UniversityOfTexasOutline.setMap(map);
} /* end initialize() */

google.maps.event.addDomListener(window, 'load', initialize);
    
</script>


