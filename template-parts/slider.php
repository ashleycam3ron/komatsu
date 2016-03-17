<section id="slider">
	<h1 class="hidden">Featured Dishes</h1>
    <div id="carousel" class="carousel slide">
            <?php $slider = new WP_Query(array(
				'post_type' => 'menu',
				'posts_per_page' => -1,
				'orderby' => 'menu_order',
				'order' => 'ASC',
			    'tax_query' => array(
					array(
						'taxonomy' => 'courses',
						'field'    => 'slug',
						'terms'    => 'featured',
					))
			    ));
			    $count = 0; ?>
		<ol class="carousel-indicators">
          <?php while($slider->have_posts()): $slider->the_post(); ?>
            <li <?php if ( $count == 0){ echo 'class="active"';} ?> data-target="#carousel" data-slide-to="<?php echo $count++; ?>"></li>
          <?php endwhile;  wp_reset_postdata(); ?>
        </ol>

        <div class="carousel-inner">
          <?php $count = 0;
             while ($slider->have_posts()) : $slider->the_post();
             $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
             ?>
			<div class="item <?php if ( $count == 0){ echo 'active';};?> text-right" data-slide-number="<?php echo $count++;?>" style="background-image:url(<?php echo $image[0];?>);">
			     <div class="col-md-4 col-md-offset-7">
				     <p><em>fresh daily</em></p>
				     <hr/>
				     <h3><?php the_title();?></h3>
				     <p class="col-md-4 pull-right" style="padding-right: 0;">Description or list of ingredients here. Description or list of ingredients simply goes here</p>
				     <p><?php echo implode('<br>', get_field('ingredients')); ?></p>
			     </div>
			</div><!-- item active -->
			<?php endwhile; wp_reset_postdata(); ?>

        </div>
        <a class="carousel-control prev" href="#carousel" data-slide="prev"></a>
        <a class="carousel-control next" href="#carousel" data-slide="next"></a>

    </div>
</section><!-- end #slider -->
<script>
	jQuery(function($){
		jQuery('#carousel').carousel({
		    interval: false
		});
	});

<?php if ( wp_is_mobile() ) { ?>
	jQuery(document).ready(function() {
	   jQuery("#carousel").swiperight(function() {
	      jQuery(this).carousel('prev');
	    });
	   jQuery("#carousel").swipeleft(function() {
	      jQuery(this).carousel('next');
	   });
	});
<?php } ?>
</script>
