<?php
/**
 * The template part for displaying excerpts in list format

 * @package WordPress
 * @subpackage Double-E Foundation
 * @since Double-E Foundation 3.1.2
 */
?>

<?php
$format = get_post_format();
$type = get_post_type();
$category = get_the_category();

// Determine wrapping tag
if($type == 'post') {
	$tag = 'article';
} else {
	$tag = 'div';
}

// Determine button text
if ($format == 'video') {
	$button_text = "Watch";
} else {
	$button_text = "Read more";
}
?>

<<?php echo $tag; ?> <?php post_class('excerpt excerpt-list-style row collapse'); ?>>

	<div class="nested row">

		<?php if(has_post_thumbnail()) { ?>
			<div class="image small-12 medium-4 columns">
				<?php the_post_thumbnail('medium'); ?>
			</div>
			<div class="content small-12 medium-8 columns">
		<?php } else { ?>
			<div class="content small-12 columns">
		<?php } ?>

			<?php include( 'meta.php' ); // get_template_part doesn't work for same subfolder ?>

			<h2><?php the_title(); ?></h2>

			<?php
			// If manual excerpt is set, use that
			if(has_excerpt()) {
				the_excerpt();
			} else {
				// Otherwise, use custom excerpt function,
				// which can be found in functions/developer.php
				echo doublee_custom_excerpt(get_the_content(), 30);
			} ?>
			<a class="small button" href="<?php the_permalink(); ?>">
				<?php echo $button_text; ?>
			</a>

		</div>

	</div>

</<?php echo $tag; ?>>