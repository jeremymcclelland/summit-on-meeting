</div><!-- #content -->

	<footer id="main-footer" class="site-footer">

    <div class="row">

      <!-- COLUMN 1 -->
      <div class="col-sm-12 col-md-6 col-xl-3">
        <h3>Footer column 1</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div><!-- end column 1 -->

      <!-- COLUMN 2 -->
      <div class="col-sm-12 col-md-6 col-xl-3">
        <h3>Footer column 2</h3>
        <ul>
          <li>Menu Item 1</li>
          <li>Menu Item 2</li>
          <li>Menu Item 3</li>
          <li>Menu Item 4</li>
        </ul>
      </div><!-- end column 2 -->

      <!-- COLUMN 3 -->
      <div class="col-sm-12 col-md-6 col-xl-3">
        <h3>Footer column 3</h3>
        <?php echo do_shortcode('[wpforms id="242"]'); ?>
      </div><!-- end column 3 -->

      <!-- COLUMN 4 -->
      <div class="col-sm-12 col-md-6 col-xl-3">
        <h3>Footer column 4</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div><!-- end column 4 -->
    </div><!-- .row -->

    <!-- COPYRIGHT -->
    <div class="container">
      <div class="text-center">
      &copy; Copyright <?php echo date('Y'); ?>
      </div>
    </div>

	</footer><!-- #colophon -->
</div><!-- #page -->



<!-- BOOTSTRAP JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<!-- SLICK SLIDER JS -->
<script type="text/javascript" src="/slick/slick.min.js"></script>
<?php wp_footer(); ?>

</body>
</html>
