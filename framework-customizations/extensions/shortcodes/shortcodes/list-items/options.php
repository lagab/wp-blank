<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'         => array(
		'label' => __( 'Title', 'fw' ),
		'desc'  => __( 'Option list title', 'fw' ),
		'type'  => 'text',
	),
	'testimonials' => array(
		'label'         => __( 'Items', 'fw' ),
		'popup-title'   => __( 'Add/Edit Items', 'fw' ),
		'desc'          => __( 'Here you can add, remove and edit your Items.', 'fw' ),
		'type'          => 'addable-popup',
		'template'      => '{{=item_title}} | {{=item_label}}',
		'popup-options' => array(
			'item_image' => array(
				'label' => __( 'Image', 'fw' ),
				'desc'  => __( 'Either upload a new, or choose an existing image from your media library', 'fw' ),
				'type'  => 'upload',
			),
			'item_title'   => array(
				'label' => __( 'Title', 'fw' ),
				'desc'  => __( 'Enter the title of this item', 'fw' ),
				'type'  => 'text'
			),
			'item_description'    => array(
				'label' => __( 'description', 'fw' ),
				'desc'  => __( 'Can be used for a item description', 'fw' ),
				'type'  => 'text'
			),
			'item_label'     => array(
				'label' => __( 'label', 'fw' ),
				'desc'  => __( 'label of item (price)', 'fw' ),
				'type'  => 'text'
			)
		)
	),
	'class'           => array(
		'attr'  => array( 'class' => 'border-bottom-none' ),
		'label' => __( 'Custom Class', 'fw' ),
		'desc'  => __( 'Enter custom CSS class', 'fw' ),
		'type'  => 'text',
		'help'  => __( 'You can use this class to further style this shortcode by adding your custom CSS in the <strong>style.css</strong> file. This file is located on your server in the <strong>child-theme</strong> folder.', 'fw' ),
		'value' => '',
	),
);