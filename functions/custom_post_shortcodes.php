<?php
// create shortcode for custom post type

function komatsu_menu_shortcode( $atts = array(), $content = '' )
{
    $atts = shortcode_atts( array(
        'type' => 'courses' // default type
    ), $atts, 'square_slider' );

    // Sanitize input:
    $type = sanitize_title( $atts['type'] );

    // Output
    return komatsu_menu_template( $type );
}

add_shortcode( 'menu', 'komatsu_menu_shortcode' );


// query/loop
function komatsu_menu_template( $type = '' )
{
    $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
    $args = array(
        'post_type' => 'menu',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'tax_query' => array(
			array(
				'taxonomy' => 'courses',
				'field'    => 'slug',
				'terms'    => $type,
			)
		),
    );

$the_query = new WP_Query( $args );



if ( $the_query->have_posts() ) {

 $i++;
    $subhead = get_field('subheading');
	$image = get_field('image', $term);
	$image2 = get_field('image2', $term); //dessert exception
	$japanese = get_field('japanese', $term);
 ?>
	        <div id="<?php echo $term->slug; ?>" class="row">
				<h1><div class="char"><?php echo $japanese; ?>char</div></h1>
				<h2><?php echo $term->name; ?>heading</h2>
				<h3><?php echo $subhead; ?>subhead</h3>
				<hr/>
				<p class="col-sm-4 col-sm-offset-4"><?php echo $term->description; ?></p>

				<ul class="menu col-xs-12">
				<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
					<li id="post-<?php the_ID(); ?>" class="col-xs-10 col-xs-offset-1 col-sm-3 col-sm-offset-0">
			        	<?php if ( has_post_thumbnail() ) { ?>
					     	 <?php the_post_thumbnail('thumbnail', array( 'class' => 'img-responsive col-sm-12 hidden-xs'));?>
						 <?php } else { ?>
							<img class="img-responsive col-sm-12 hidden-xs" src="http://placehold.it/200x200/eeeeee/888888">
						 <?php } ?>
			            <div class="col-sm-12">
			                <h4><?php the_title(); ?></h4>
			                <p><?php the_field('brief_description'); ?></p>
			                <span><?php echo implode(', ', get_field('ingredients')); ?></span>
							<p class="price"><?php the_field('price'); ?></p>
						</div>
						<div class="clearfix"></div>
		            </li>
				<?php endwhile;
					wp_reset_postdata(); ?>
				</ul>
			</div>



 <?php /*
while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <li id="post-<?php the_ID(); ?>" class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 col-md-3">
	        	<?php if ( has_post_thumbnail() ) { ?>
			     	 <?php the_post_thumbnail('thumbnail', array( 'class' => 'img-responsive col-sm-12 hidden-xs'));?>
				 <?php } else { ?>
					<img class="img-responsive col-sm-12 hidden-xs" src="http://placehold.it/200x200/eeeeee/888888">
				 <?php } ?>
	            <div class="col-sm-12">
	                <h4><?php the_title(); ?></h4>

	                <span><?php echo implode(', ', get_field('ingredients')); ?></span>
					<p class="price"><?php the_field('price'); ?></p>
				</div>
				<div class="clearfix"></div>
            </li>
            <?php endwhile;
            wp_reset_postdata();
*/ ?>



    <?php }
}