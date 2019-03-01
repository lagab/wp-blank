<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id = uniqid( 'list-items-' );
?>

<div class="fw-list-items">
	<?php if (!empty($atts['title'])): ?>
		<h3 class="fw-list-title"><?php echo $atts['title']; ?></h3>
	<?php endif; ?>

	<div class="fw-item-list" id="<?php echo esc_attr($id); ?>">
		<?php foreach ($atts['testimonials'] as $item): ?>
			<div class="fw-list-item clearfix">
				<div class="fw-item-meta">
					<div class="fw-item-avatar fw-col-sm-2 text-center">
						<?php
						$item_image_url = !empty($item['item_image']['url'])
											? $item['item_image']['url']
											: fw_get_framework_directory_uri('/static/img/no-image.png');
						?>
						<img src="<?php echo esc_attr($item_image_url); ?>" alt="<?php echo esc_attr($item['item_title']); ?>" class="img-circle2 img-thumbnail2"/>
					</div>
					<div class="fw-item-text fw-col-sm-8 ">
						<span class="item-title"><?php echo $item['item_title']; ?></span>
						<em><?php echo $item['item_description']; ?></em>
						
					</div>
					<div class="fw-item-label fw-col-sm-2">
						<span class="item-price"><?php echo $item['item_label']; ?></span>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>