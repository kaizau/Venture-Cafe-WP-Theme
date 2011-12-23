<section id="callToAction" class="group row">
  <!-- TODO this is where the call to action goes -->
  Boom shaka lakka
</section>

<section id="jqGallery" class="group row">
  <div class="wrapper">
    <ul class="group">

    <?php
      $options = get_option('vc_theme_options');

      for ( $slide = 1; $slide < 6; $slide++ ) {
        if ( $options[$slide]['title'] || $options[$slide]['text'] || $options[$slide]['link'] ) {
    ?>

      <li class="slide">
        <a href="<?php echo $options[$slide]['link'] ?>"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/img/photos/<?php echo $slide; ?>.jpg"></a>
        <div class="right">
        <!-- <?php if ( $options[$slide]['title'] ) { ?>
          <h2><?php echo $options[$slide]['title']; ?></h2>
        <?php } ?> -->
        <?php if ( $options[$slide]['text'] ) { ?>
          <h3><?php echo $options[$slide]['text']; ?></h3>
        <?php } ?>
        <!-- <?php if ( $options[$slide]['link'] ) { ?>
          <p><a href="<?php echo $options[$slide]['link'] ?>">Learn more &raquo;</a></p>
        <?php } ?> -->

        </div>
      </li>
    <?php }
      }
    ?>

    <?php if ( ( $options[1]['title'] == '' ) && ( $options[1]['text'] == '' ) ) { ?>
      <li class="slide">
        <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/img/photos/1.jpg">
        <div class="right">
          <h3><q>The café serves as a nexus for helping innovators and entrepreneurs find one another and collaborate to bring their dreams to reality.</q></h3>
        </div>
      </li>
    <?php } ?>

    </ul>
  </div>
</section>
