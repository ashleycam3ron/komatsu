<?php
/*
Template Name: Home Page
*/
get_header(); ?>

<div id="home" class="container-fluid">
	<?php get_template_part('/template-parts/slider'); ?>

    <section id="story" class="row">
	    <h1 class="hidden"><?php bloginfo('name')?> – <?php bloginfo('description');?></h1>
		<div class="col-md-4"><img class="img-responsive" src="<?php echo get_stylesheet_directory_uri();?>/images/fresh-ramen-noodles-handmade-daily.jpg" alt="placeholder" /></div>
		<div class="col-md-6 col-md-offset-1">
			<img class="img-responsive pull-right highlights" src="<?php echo get_stylesheet_directory_uri();?>/images/highlights.png" alt="highlights" />
			<h2><?php the_title(); ?></h2>
			<?php the_excerpt(); ?>
			<a class="btn btn-info" href="/our-story">Read More</a>
			<a class="btn" href="/what-to-expect">What to Expect →</a>
		</div>
    </section><!-- end .row -->

	<section id="reservations" class="row text-center">
		<div class="col-sm-6 col-md-4">
			<h1><div class="char">予約</div></h1>
			<h2>Reservations</h2>
			<p>Call us or reserve a table in advance online. <br/>Calls can be made the same day.</p>
			<a class="btn btn-default" href="/menu">Book A Table</a>
		</div>
		<div class="hidden-xs col-sm-6 col-md-8"><img class="img-responsive" src="<?php echo get_stylesheet_directory_uri();?>/images/Komatsu-interior.jpg" alt="Komatsu interior" /></div>
	</section>

	<section id="grid" class="row text-center">
		<?php $args = array('hide_empty' => 0,'exclude' => array(10,12,13));
			  $terms = get_terms( 'courses', $args );

		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
		    $count = count( $terms );
		    $i = 0;
		    foreach ( $terms as $term ) {
		        $i++;
				$subhead = get_field('subheading', $term);
				$image = get_field('image', $term);
				//$image = $img['sizes']['feature'];
				$image2 = get_field('image2', $term); //dessert exception
				$japanese = get_field('japanese', $term); ?>

	<div class="col-xs-12 col-md-4 item-<?php echo $i; ?>">

    <?php if ( $i == 1 || $i == 3 || $i == 4 || $i == 6 ){
	    // $myclass = 'odd'; ?>
		<div class="row">
		 	<?php if( !empty($image) ){ ?>
		 	  <img class="img-responsive" src="<?php echo $image['sizes']['feature']; ?>" alt="<?php echo $image['title']; ?>" />
		 	<?php } else { ?>
	          <img class="img-responsive" src="http://placehold.it/533x533" alt="placeholder" />
	       <?php } ?>
		</div>
		<div class="col-xs-6 col-md-10 col-md-offset-1 text">
			<h1><div class="char"><?php echo $japanese; ?></div></h1>
			<h2><?php echo $term->name; ?></h2>
			<h3><?php echo $subhead; ?></h3>
			<hr class="hidden-xs"/>
			<p class="hidden-xs"><em><?php echo $term->description; ?></em></p>
			<a title="menu" class="menu-link" href="<?php echo esc_url( home_url() ) ?>/menu#<?php echo $term->slug; ?>"><!-- 献立 -->Menu</a>
			<a title="menu" class="menu" href="<?php echo esc_url( home_url() ) ?>/menu#<?php echo $term->slug; ?>"><img src="<?php echo get_stylesheet_directory_uri();?>/images/menu.png" alt="Menu Link" /></a>
		</div>
	<?php } elseif ( $i == 7 ) { ?>
		<div class="col-md-4">
			<div class="row">
		 	<?php if( !empty($image) ){ ?>
		 	  <img class="img-responsive" src="<?php echo $image['sizes']['feature']; ?>" alt="<?php echo $image['title']; ?>" />
		 	<?php } else { ?>
	          <img class="img-responsive" src="http://placehold.it/533x533" alt="placeholder" />
	       <?php } ?>
			</div>
		</div>
		<div class="col-md-4">
			<div class="col-xs-6 col-md-10 col-md-offset-1 text">
				<h1><div class="char"><?php echo $japanese; ?></div></h1>
				<h2><?php echo $term->name; ?></h2>
				<h3><?php echo $subhead; ?></h3>
				<hr class="hidden-xs"/>
				<p class="hidden-xs"><em><?php echo $term->description; ?></em></p>
				<a title="menu" class="menu-link" href="<?php echo esc_url( home_url() ) ?>/menu#<?php echo $term->slug; ?>"><!-- 献立  -->Menu</a>
				<a title="menu" class="menu" href="<?php echo esc_url( home_url() ) ?>/menu#<?php echo $term->slug; ?>"><img src="<?php echo get_stylesheet_directory_uri();?>/images/menu.png" alt="Menu Link" /></a>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row hidden visible-md-block visible-lg-block">
		 	<?php if( !empty($image2) ){ ?>
		 	  <img class="img-responsive" src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['title']; ?>" />
		 	<?php } else { ?>
	          <img class="img-responsive" src="http://placehold.it/533x533" alt="placeholder" />
	       <?php } ?>
			</div>
		</div>
<?php } else { ?>
		<div class="col-xs-6 col-md-10 col-md-offset-1 text">
			<h1><div class="char"><?php echo $japanese; ?></div></h1>
			<h2><?php echo $term->name; ?></h2>
			<h3><?php echo $subhead; ?></h3>
			<hr class="hidden-xs"/>
			<p class="hidden-xs"><em><?php echo $term->description; ?></em></p>
			<a title="menu" class="menu-link" href="<?php echo esc_url( home_url() ) ?>/menu#<?php echo $term->slug; ?>"><!-- 献立  -->Menu</a>
			<a title="menu" class="menu" href="<?php echo esc_url( home_url() ) ?>/menu#<?php echo $term->slug; ?>"><img src="<?php echo get_stylesheet_directory_uri();?>/images/menu.png" alt="Menu Link" /></a>
		</div>
		<div class="row">
		 	<?php if( !empty($image) ){ ?>
		 	  <img class="img-responsive" src="<?php echo $image['sizes']['feature']; ?>" alt="<?php echo $image['title']; ?>" />
		 	<?php } else { ?>
	          <img class="img-responsive" src="http://placehold.it/533x533" alt="placeholder" />
	       <?php } ?>
		</div>
<?php } ?>
</div>
<?php }?>
<?php } ?>
</section>

</div>

<script>
	jQuery(function($){
		jQuery('#carousel').carousel({
		    interval: false
		});
	});
</script>

<?php get_footer(); ?>