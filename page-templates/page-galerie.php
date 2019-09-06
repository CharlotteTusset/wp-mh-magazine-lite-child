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
	// Define ACF fields
	$exhibOngoingBlock = get_field('exhib-ongoing_blocks');
	$exhibFutureBlock = get_field('exhib_future-blocks');
	
	?>	

	<?php if(get_field('show_ongoing-exhib')): ?>
		<div class="g_block g_block-1">
			<h2 class="g_title">En ce moment</h2>
			<div class="g_exhib">
				<div class="g_exhib_img_block">
					<img class="g_exhib_img" src=<?php echo $exhibOngoingBlock['exhib-ongoing_image']; ?> alt="" width=700px height=auto/>
				</div>
				<div class="g_exhib_info">
					<h3 class="g_exhib_name"><?php echo $exhibOngoingBlock['exhib-ongoing_name']; ?></h3>
					<p class="g_exhib_artist"><?php echo $exhibOngoingBlock['exhib-ongoing_artist']; ?></p>
					<p class="g_exhib_date">Du <?php echo $exhibOngoingBlock['exhib-ongoing_date-from']; ?> au <?php echo $exhibOngoingBlock['exhib-ongoing_date-to']; ?></p>
					<p class="g_exhib_description"><?php echo $exhibOngoingBlock['exhib-ongoing_description']; ?></p>
				</div>
			</div>
		</div>
	<?php endif;?>


	<?php if(get_field('show_future-exhib')): ?>
		<div class="g_block g_block-2">
			<h2 class="g_title">À venir</h2>
			<div class="g_exhib">
				<div class="g_exhib_img_block">
					<img class="g_exhib_img" src=<?php echo $exhibFutureBlock['exhib-future_image']; ?> alt="" width=700px height=auto/>
				</div>
				<div class="g_exhib_info">
					<h3 class="g_exhib_name"><?php echo $exhibFutureBlock['exhib-future_name']; ?></h3>
					<p class="g_exhib_artist"><?php echo $exhibFutureBlock['exhib-future_artist']; ?></p>
					<p class="g_exhib_date-from">Du <?php echo $exhibFutureBlock['exhib-future_date-from']; ?> au <?php echo $exhibFutureBlock['exhib-future_date-to']; ?></p>
					<p class="g_exhib_description"><?php echo $exhibFutureBlock['exhib-future_description']; ?></p>
				</div>
			</div>
		</div>
	<?php endif;?>
	<!-- <div class="g_block-3">
		<h2 class="g_title">Expositions Passées</h2>
		<ul>
			<li>
				<img src="" width="0" height="0" alt="" />
				<p class="g_exhib_archive_info">Archives</p>
			</li>
		</ul>
	</div> -->


   </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
