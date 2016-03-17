<?php get_header(); ?>
<div id="menu" class="text-center">
	<h1 class="hidden">Komatsu Ramen Menu – Appetizers, Salads, Ramen, Grilled, Dessert, & Drinks</h1>
	<div id="grid" class="container-fluid">
		<?php $terms = get_terms( 'courses', array('hide_empty' => 0,'exclude' => array(12,13)) );

			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
		    $count = count( $terms );
		    $i = 0;
		    foreach ( $terms as $term ) {
		        $i++;
		        $subhead = get_field('subheading', $term);
				$image = get_field('image', $term);
				$image2 = get_field('image2', $term); //dessert exception
				$japanese = get_field('japanese', $term);

		        $args = array ('taxonomy'=>'courses','term'=>$term->slug);
				$myquery = new WP_Query ($args);
				$article_count = $myquery->post_count; ?>

				<h1><div class="char"><?php echo $japanese; ?></div></h1>
				<h2><?php echo $term->name; ?></h2>
				<h3><?php echo $subhead; ?></h3>
				<hr/>
				<p class="col-sm-4 col-sm-offset-4"><?php echo $term->description; ?></p>

			<?php if ($article_count) {  ?>
			<div class="row">
				<ul class="menu">
				<?php while ($myquery->have_posts()) : $myquery->the_post(); ?>
					<li id="post-<?php the_ID(); ?>" class="col-xs-10 col-xs-offset-1 col-sm-3 col-sm-offset-0">
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
				<?php endwhile;  ?>
				</ul>
			</div>
			<?php } } }?>

		<h2 id="beverages">Beverages</h2>
		<div class="beverages"><?php //echo do_shortcode('[menu type="beverages"]'); ?>
			<ul class="menu">
				<li class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 col-md-3">
					<a target="_blank" href="<?php the_field('pdf',264); ?>">
						<img class="img-responsive col-sm-12 hidden-xs" src="<?php the_field('thumb',264); ?>" alt="Kansas City Wine & Beer List"/>
						<div class="col-sm-12">
							<h4>Kansas City Wine & Beer List</h4>
						</div>
					</a>
					PDF
				</li>
			</ul>
		</div>
	</div>
</div>
<?php get_footer(); ?>