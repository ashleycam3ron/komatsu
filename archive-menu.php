<?php get_header(); ?>
<div id="menu" class="text-center">
	<h1 class="hidden">Komatsu Ramen Menu – Appetizers, Salads, Ramen, Grilled, Dessert, & Drinks</h1>
	<div id="grid" class="container-fluid">
		<?php $terms = get_terms( 'courses', array('hide_empty' => 0,'exclude' => array(10,12,13), 'orderby' => 'ID', 'order' => 'ASC') ); ?>
			<div id="navbar-menu">
				<h4>Menu</h4>
				<ul class="nav">
				  <?php foreach ( $terms as $term ) { ?>
					<li><a class="page-scroll" href="#<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
				  <?php } ?>
				  	<li><a class="page-scroll" href="#beverages">Beverages</a></li>
				</ul>
			</div>

		<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
		    $count = count( $terms );
		    $i = 0;
		    foreach ( $terms as $term ) {
		        $i++;
		        $subhead = get_field('subheading', $term);
				$image = get_field('image', $term);
				$image2 = get_field('image2', $term); //dessert exception
				$japanese = get_field('japanese', $term);

		        $args = array ('taxonomy'=>'courses','term'=>$term->slug, 'orderby' => array('term_order', 'date'), 'order' => 'ASC');
				$myquery = new WP_Query ($args);
				$article_count = $myquery->post_count; ?>

			<div id="<?php echo $term->slug; ?>" class="row">
				<h1><div class="char"><?php echo $japanese; ?></div></h1>
				<h2><?php echo $term->name; ?></h2>
				<h3><?php echo $subhead; ?></h3>
				<hr/>
				<p class="col-sm-4 col-sm-offset-4 col-md-12"><?php echo $term->description; ?></p>

			<?php if ($article_count) {  ?>
				<ul class="menu">
				<?php while ($myquery->have_posts()) : $myquery->the_post(); ?>
					<li id="post-<?php the_ID(); ?>" class="col-xs-6 col-sm-3 col-sm-offset-0">
			          <?php if ( has_post_thumbnail() ) { ?>
			        	<?php if ( wp_is_mobile() ) {
								the_post_thumbnail('thumbnail', array( 'class' => 'img-responsive col-sm-12'));
							} else {
								the_post_thumbnail('feature', array( 'class' => 'img-responsive col-sm-12'));
						    }
						  } else { ?>
							<img class="img-responsive col-sm-12" src="http://placehold.it/500x500/eeeeee/888888">
						 <?php } ?>
			            <div class="col-sm-12">
			                <h4><?php the_title(); ?></h4>
			                <?php if ( get_field('brief_description') ) { ?><p><?php the_field('brief_description'); ?><?php } ?></p>
			                <span><?php if (is_array(get_field('ingredients'))) {
									echo implode(', ', get_field('ingredients'));
								} ?></span>
							<p class="price"><?php the_field('price'); ?></p>
						</div>
						<div class="clearfix"></div>
		            </li>
				<?php endwhile;  ?>
				</ul>
			<?php } ?>
			</div>
		<?php } }?>



<?php //echo do_shortcode('[menu type="salads"]'); ?>
<?php //echo do_shortcode('[menu type="hot-buns"]'); ?>


		<h2 id="beverages">Beverages</h2>
		<div id="beverages"><?php //echo do_shortcode('[menu type="beverages"]'); ?>
			<ul class="menu">
				<li class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 col-md-3">
					<a target="_blank" href="http://komatsuramen.co/wp-content/uploads/Komatsu-Ramen-Drink-List.pdf">
						<img class="img-responsive col-sm-12" src="http://komatsuramen.co/wp-content/uploads/Komatu-shot-500x500.jpg" alt="Drink list"/>
						<div class="col-sm-12">
							<h4>Drink List</h4>

						</div>
					</a>
					PDF
				</li>
			</ul>
		</div>
	</div>
</div>

<script>
	jQuery('body').scrollspy({target: "#navbar-menu"})
	//jQuery to collapse the navbar on scroll
	jQuery(window).scroll(function() {
	    if (jQuery("#navbar-menu .nav").offset().top > 20) {
	        jQuery("#navbar-menu .nav").addClass("top-nav-collapse");
	    } else {
	        jQuery("#navbar-menu .nav").removeClass("top-nav-collapse");
	    }
	});

	//jQuery for page scrolling feature - requires jQuery Easing plugin
	jQuery(function() {
	    jQuery('a.page-scroll').bind('click', function(event) {
	        var $anchor = $(this);
	        jQuery('html, body').stop().animate({
	            scrollTop: $($anchor.attr('href')).offset().top
	        }, 1500, 'easeInOutExpo');
	        event.preventDefault();
	    });
	});
</script>
<?php get_footer(); ?>