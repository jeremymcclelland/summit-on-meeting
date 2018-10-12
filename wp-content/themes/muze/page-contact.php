<?php
/**
* @package WordPress
 * @subpackage Muze
 * @since Muze ATX
 */
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="main" class="page-contact">

	<?php include('template-parts/page-hero.php'); ?>
	
	<section class="after-hero">
		<div class="container row">
			<div class="small-12 columns">
				<?php the_content(); ?>
			</div>
		</div>
	</section>

	<section class="contact-form no-padding-top">
		<div class="container row">
			<div class="small-12 large-8 columns contact-form-wrapper">
				<?php echo do_shortcode( '[wpforms id="183" title="false" description="false"]' ); ?>
			</div>
			<div class="small-12 large-4 columns leasing-center">
				<div class="row collapse">
					<?php
	                    $address = of_get_option('leasing_address');
	                    $city = of_get_option('leasing_city');
	                    $state = of_get_option('leasing_state');
	                    $number = of_get_option('leasing_phone');
	                    $hours = of_get_option('leasing_hours');

	                    if ($address) {
	                        echo '	<div class="info-block small-12 medium-4 large-12 columns">
	                        			<p class="primary-h4">Visit our <span class="hide-small-and-down">temporary </span> leasing office:</p>
	                        			<p>' . $address . ', ' . $city . ' ' . $state . '</p>
	                        		</div>';
	                    }

	                    if ($number) {
	                        echo '	<div class="info-block small-12 medium-4 large-12 columns">
	                        			<p class="primary-h4">Phone:</p>
	                        			<p><a href="tel:' . $number . '">' . $number . '</a></p>
	                        		</div>

	                        		<div class="info-block small-12 medium-4 large-12 columns">
	                        			<p class="primary-h4">Email:</p>
	                        			<p><a href="mailto:summitplace@achliving.com">summitplace@achliving.com</a></p>
	                        		</div>
	                        		';
	                    }

	                    if ($hours) {
	                        echo '	<div class="info-block small-12 medium-4 large-12 columns">
	                        			<p class="primary-h4">Hours:</p>
	                        			' . $hours . '
	                        		</div>';
	                    }
	                ?>
            	</div>
			</div>
		</div>
	</section>

	<div class="pre-map">
		<div class="container row">
			<div class="small-12 large-7 columns">
				<p><strong>Leasing Center (Through July 2019):</strong>
					<?php
						$address = of_get_option('leasing_address');
	                    $city = of_get_option('leasing_city');
	                    $state = of_get_option('leasing_state');

	                    if ($address) {
	                        echo $address . ', ' . $city . ' ' . $state;
	                    }
					?>
				</p>
			</div>
			<div class="small-12 large-5 columns">
				<p><strong>Summit Place:</strong> 530 Meeting St., Charleston, SC</p>
			</div>
		</div>
	</div>

	<section id="map-wrapper">
		<?php get_sidebar('google-map'); ?>
	</section>

</div>

<script type="text/javascript">
	
	// Placeholder fix for IE
      $('.lt-ie10 [placeholder]').focus(function() {
        var i = $(this);
        if(i.val() == i.attr('placeholder')) {
          i.val('').removeClass('placeholder');
          if(i.hasClass('password')) {
            i.removeClass('password');
            this.type='password';
          }     
        }
      }).blur(function() {
        var i = $(this);  
        if(i.val() == '' || i.val() == i.attr('placeholder')) {
          if(this.type=='password') {
            i.addClass('password');
            this.type='text';
          }
          i.addClass('placeholder').val(i.attr('placeholder'));
        }
      }).blur().parents('form').submit(function() {
        //if($(this).validationEngine('validate')) { // If using validationEngine
          $(this).find('[placeholder]').each(function() {
            var i = $(this);
            if(i.val() == i.attr('placeholder'))
              i.val('');
              i.removeClass('placeholder');

          })
        //}
      });

</script>
<?php endwhile; endif; ?>
<?php include('template-parts/map-build.php'); ?>
<?php get_footer(); ?>
