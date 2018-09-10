<?php
// Template Name: Home
get_header();
?>

<!-- HERO SLIDER -->
<div id="home-hero-slider" class="full-width-slider">
  <!-- SLIDE 1 -->
  <div class="slick-slide" style="background-image: url(/wp-content/uploads/2017/10/thc-home-largest-1700x966.jpg);">
    <div class="thc-slide-content-left">
      <h2>Left aligned slide content</h2>
      <p>Slide sub header.</p>
      <a style="color: <?php echo $theme_color_1; ?>;" class="btn btn-outline-primary btn-lg" href="#" role="button">Link</a>
    </div>
  </div>
  <!-- SLIDE 2 -->
  <div class="slick-slide" style="background-image: url(/wp-content/uploads/2017/10/boom-large-1700x966.jpg);">
    <div class="thc-slide-content-right">
      <h2>Right aligned slide content</h2>
      <p>Slide sub header.</p>
      <a style="color: <?php echo $theme_color_1; ?>;" class="btn btn-outline-primary btn-lg" href="#" role="button">Link</a>
    </div>
  </div>
  <!-- SLIDE 3 -->
  <div class="slick-slide" style="background-image: url(/wp-content/uploads/2017/10/thc-team.png);">
    <div class="thc-slide-content-center">
      <h2>Center aligned slide content</h2>
      <p>Slide sub header.</p>
      <a style="color: <?php echo $theme_color_1; ?>;" class="btn btn-outline-primary btn-lg" href="#" role="button">Link</a>
    </div>
  </div>
</div><!-- end #home-hero-slider -->



<script type="text/javascript">
$( document ).ready( function() {

  $( '#home-hero-slider' ).slick();

});
</script>

<?php
get_footer();
?>