
<?php get_header(); ?>
<?php 
// Get all custom fields attached to this post and store them in an array
$custom_fields = base_get_all_custom_fields();
?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php 
				if(has_post_thumbnail()) {
				the_post_thumbnail();
				echo '<h2 class="thumbHeading grid_12 alpha clearfix">' . get_the_title() . '</h2>';
				} 
				else {
					echo '<h2 class="heading grid_12 alpha clearfix">' . get_the_title() . '</h2>';
				}
			?>
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="grid_8 zi1">
				<div class="entry">					
					<?php the_content(); ?>

					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
					
					<?php the_tags( 'Tags: ', ', ', ''); ?>
				</div>
				
				<?php edit_post_link('Rediger','',''); ?>
				<?php comments_template(); ?>		
			</div>
		</div>
	
		
<?php endwhile; endif; ?>	

	<div class="sidebar grid_4 zi1 clearfix">
	<?php if( !empty($custom_fields['page_sidebar']) ) { ?>
		<div class="entry">		
			<?php echo $custom_fields['page_sidebar']; ?>			
		</div>
	<?php } ?>
	</div>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		lastBlock = $("#nav1 div.tabOpen");
	});
</script>
<?php get_footer(); ?>