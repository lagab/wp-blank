<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id = uniqid( 'progressbar-items-' );
?>

<div class="fw-progressbar-items <?php echo $atts['class']; ?>">
	<?php if (!empty($atts['title'])): ?>
		<h3 class="fw-list-title"><?php echo $atts['title']; ?></h3>
	<?php endif; ?>

	<div class="fw-item-list" id="<?php echo esc_attr($id); ?>">
		<?php foreach ($atts['bars'] as $item): ?>
			<?php if (!empty($item['item_title'])): ?>
				<span class="progress-label"><?php echo $item['item_title'] ?></span>
			<?php endif; ?>
			<div class="progress">
			  <div class="progress-bar <?php echo $item['item_color'] ?>" style="width: <?php echo $item['item_percent'] ?>%;" role="progressbar" aria-valuenow="<?php echo $item['item_percent'] ?>" aria-valuemin="0" aria-valuemax="100">
			  	<?php echo !empty($item['item_description']) ? $item['item_description'] : '' ?>
			  	</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>