<?php
/*
Template Name: Locations
*/

get_header(); ?>

<div id="content" class="container-fluid">
	<h1 class="hidden"><?php the_title(); ?></h1>

	<?php if( have_rows('map') ): ?>
		<div class="acf-map text-center">
			<?php while ( have_rows('map') ) : the_row();
				$location = get_sub_field('locations');
				$address = explode( ',' , $location['address']);
				$image = get_sub_field('image');
				$alt = $image['alt'];
				$size = 'thumbnail';
				$thumb = $image['sizes'][ $size ]; ?>

				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>" data-icon="<?php echo get_stylesheet_directory_uri();?>/images/marker.png">
					<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" />
					<h4>Komatsu Ramen</h4>
					<p class="address"><?php echo $location['address']; ?><br/>
					<a tel="<?php echo the_sub_field('phone'); ?>">+ <?php echo the_sub_field('phone'); ?></a></p>
					<a target="_blank" class="directions" href="https://www.google.com/maps/place/<?php echo $address[0].$address[1].$address[2].$address[3]; ?>/<?php echo $location['lat'] . ',' . $location['lng']; ?>"><?php _e('Get Directions','ashleycameron'); ?></a>
				</div>
		<?php endwhile; ?>
		</div>
	<?php endif; ?>

</div>

<?php get_footer();?>