<?php 
/*
 * Template Name: Page Galerie
 * description: >-
  Template pour la page Galerie
 */
get_header(); ?>

<div class="mh-wrapper mh-clearfix">
   <main id="main" class="page-template page-template-gallery" role="main">     
  
   <?php 

	$text = get_post_meta( $object->ID, 'page_template_text', true );

   while ( have_posts() ) : the_post();

   endwhile; ?>

	<div class="g_block-1">
		<h2 class="g_title">Exposition en Cours</h2>
		<div class="g_exhib">
			<img class="g_exhib_img" src="" width="0" height="0" alt="" />
			
			<h3 class="g_exhib_name"><?php echo esc_attr( $text ); ?></h3>
			<div class="g_exhib_info">
				<p class="g_exhib_artist">Carline Purgal</p>
				<p class="g_exhib_date">Du 12/08/2019 au 24/12/2019</p>
				<p class="g_exhib_description">Lorem ipsum</p>
				<p cass="g_exhib_more"></p>
			</div>
		</div>
	</div>
	<div class="g_block-2">
		<h2 class="g_title">Expositions Futures</h2>
		<img src="" width="0" height="0" alt="" />
		<h3 class="g_exhib_name">Test</h3>
		<div class="g_exhib_info">
			<p class="g_exhib_artist">Carline Purgal</p>
			<p class="g_exhib_date">Du 12/08/2019 au 24/12/2019</p>
			<p class="g_exhib_description">Lorem ipsum</p>
			<p cass="g_exhib_more"></p>
		</div>
	</div>
	<div class="g_block-3">
		<h2 class="g_title">Expositions Passées</h2>
		<ul>
			<li>
				<img src="" width="0" height="0" alt="" />
				<p class="g_exhib_archive_info">Archives</p>
			</li>
		</ul>
	</div>
   </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
