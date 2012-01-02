<?php
  $options = get_option('vc_theme_options');
  $thisweek = get_posts(array('numberposts'=>1,'category_name'=>'this-week-in-the-cafe'));
  $thisweek = $thisweek[0]->ID;
?>

<a id="callToAction" href="<?php echo get_permalink($thisweek); ?>">
  <span>From the Cafe:</span><?php echo get_the_title($thisweek); ?>
</a>

<section id="jqGallery" class="group row">
  <div class="wrapper">
    <ul class="group">

    <?php
      for ( $slide = 1; $slide < 6; $slide++ ) {
        if ( $options[$slide]['title'] || $options[$slide]['text'] ) {
    ?>
      <li class="slide">
        <img alt="<?php echo $options[$slide]['title']; ?>" src="<?php bloginfo( 'stylesheet_directory' ); ?>/img/photos/<?php echo $slide; ?>.jpg">
        <div class="right">
        <?php if ( $options[$slide]['text'] ) { ?>
          <h3><?php echo $options[$slide]['text']; ?></h3>
        <?php } ?>
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
