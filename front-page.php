<?php get_header(); ?>

<div id="home" class="container-fluid">
	<?php get_template_part('/template-parts/slider'); ?>

    <section id="story" class="row">
	    <h1 class="hidden"><?php bloginfo('name')?> – <?php bloginfo('description');?></h1>
			<?php //the_content(); ?>
		<div class="col-md-4"><img class="img-responsive" src="http://placehold.it/533x533" alt="placeholder" /></div>
		<div class="col-md-6 col-md-offset-1">
			<img class="img-responsive pull-right highlights" src="<?php echo get_stylesheet_directory_uri();?>/images/highlights.png" alt="highlights" />
			<h2>Our Story</h2>
			<p>Nori grape silver beet broccoli kombu beet greens fava bean potato quandong celery. Bunya nuts black-eyed pea prairie turnip leek lentil turnip greens parsnip. Sea lettuce lettuce water chestnut eggplant winter purslane fennel azuki bean earthnut pea sierra leone bologi leek soko chicory celtuce parsley salsify.</p>
			<p><strong>Come visit us with your family and friends and see for yourself!</strong></p>
			<a class="btn btn-info" href="/menu">Read More</a>
			<a class="btn" href="/experience">What to Expect -></a>
		</div>
    </section><!-- end .row -->

	<section id="reservations" class="row text-center">
		<div class="col-md-4">
			<h2>Reservations</h2>
			<p>Cras ante turpis, accumsan eu iaculis ut, dictum vulputate nisi. Aliquam lobortis mauris varius quam imperdiet, eu accumsan massa pellentesque.</p>
			<a class="btn btn-default" href="/menu">Book A Table</a>
		</div>
		<div class="col-md-8"><img class="img-responsive" src="http://placehold.it/1070x520" alt="placeholder" /></div>
	</section>

	<section id="grid" class="row text-center">


<?php
$args = array(
    'hide_empty' => 0,
);

$terms = get_terms( 'courses', $args );

if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
    $count = count( $terms );
    $i = 0;
//    $term_list = '<p class="my_term-archive">';
    foreach ( $terms as $term ) {
        $i++;
		$subhead = get_field('subheading', $term);
		$image = get_field('image', $term);
		$image2 = get_field('image2', $term); //dessert exception
		$japanese = get_field('japanese', $term);

    if ( $i == 1 || $i == 3 || $i == 4 || $i == 6 ){
        $myclass = 'odd'; ?>
	<div class="col-sm-6 col-md-4">
		<div class="row">
		 	<?php if( !empty($image) ){ ?>
		 	  <img class="img-responsive" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
		 	<?php } else { // $term_list .= '</p>'; ?>
	          <img class="img-responsive" src="http://placehold.it/533x533" alt="placeholder" />
	       <?php } ?>
		</div>
		<div class="col-md-10 col-md-offset-1 text">
			<h1><?php echo $japanese; ?></h1>
			<h2><?php echo $term->name; ?></h2>
			<h3><?php echo $subhead; ?></h3>
			<hr/>
			<p><?php echo $term->description; ?></p>
			<a title="menu" class="menu" href="/menu"><img src="<?php echo get_stylesheet_directory_uri();?>/images/menu.png" alt="Menu Link" /></a>
		</div>
	</div>
<?php } elseif ( $i == 7 ) { ?>
	<div style="clear:both;">
		<div class="col-md-4">
			<div class="row">
		 	<?php if( !empty($image) ){ ?>
		 	  <img class="img-responsive" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
		 	<?php } else { ?>
	          <img class="img-responsive" src="http://placehold.it/533x533" alt="placeholder" />
	       <?php } ?>
			</div>
		</div>
		<div class="col-md-4">
			<div class="col-md-10 col-md-offset-1 text">
				<h1><?php echo $japanese; ?></h1>
				<h2><?php echo $term->name; ?></h2>
				<h3><?php echo $subhead; ?></h3>
				<hr/>
				<p><?php echo $term->description; ?></p>
				<a title="menu" class="menu" href="/menu"><img src="<?php echo get_stylesheet_directory_uri();?>/images/menu.png" alt="Menu Link" /></a>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row">
		 	<?php if( !empty($image2) ){ ?>
		 	  <img class="img-responsive" src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>" />
		 	<?php } else { ?>
	          <img class="img-responsive" src="http://placehold.it/533x533" alt="placeholder" />
	       <?php } ?>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div class="col-sm-6 col-md-4 <?php echo $myclass; ?>">
		<div class="col-md-10 col-md-offset-1 text">
			<h1><?php echo $japanese; ?></h1>
			<h2><?php echo $term->name; ?></h2>
			<h3><?php echo $subhead; ?></h3>
			<hr/>
			<p><?php echo $term->description; ?></p>
			<a title="menu" class="menu" href="/menu"><img src="<?php echo get_stylesheet_directory_uri();?>/images/menu.png" alt="Menu Link" /></a>
		</div>
		<div class="row">
		 	<?php if( !empty($image) ){ ?>
		 	  <img class="img-responsive" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
		 	<?php } else { ?>
	          <img class="img-responsive" src="http://placehold.it/533x533" alt="placeholder" />
	       <?php } ?>
		</div>
	</div>
<?php } ?>
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