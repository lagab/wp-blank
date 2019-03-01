<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'         => array(
		'label' => __( 'Title', 'fw' ),
		'desc'  => __( 'The list title', 'fw' ),
		'type'  => 'text',
	),
	'bars' => array(
		'label'         => __( 'Items', 'fw' ),
		'popup-title'   => __( 'Add/Edit Items', 'fw' ),
		'desc'          => __( 'Here you can add, remove and edit your Items.', 'fw' ),
		'type'          => 'addable-popup',
		'template'      => '{{=item_title}} | {{=item_percent}}%',
		'popup-options' => array(
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
			'item_color'    => array(
				'label' => __( 'color', 'fw' ),
				'desc'  => __( 'progressbar color', 'fw' ),
				'type'  => 'select',
				'choices' => array(
			    	'' => '---',
			    	'bg-success' => __( 'green', 'fw' ),
			    	'bg-info' => __( 'cian', 'fw' ),
			    	'bg-warning' => __( 'orange', 'fw' ),
			    	'bg-danger' => __( 'red', 'fw' ),
			    )
			),
			'item_percent'     => array(
				'label' => __( 'value', 'fw' ),
				'desc'  => __( 'item value (percentage)', 'fw' ),
				'type'  => 'slider',
			    'value' => 100,
			    'properties' => array(
			        'min' => 0,
			        'max' => 100,
			        'step' => 1
			    ),
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