<?php if (!defined('FW')) {
	die('Forbidden');
}

$options = array(
	'section_name' => array(
		'label' => __( 'Section Name', 'fw' ),
		'desc'  => __( 'Enter a name (it is for internal use and will not appear on the front end)', 'fw' ),
		'help'  => __( 'Use this option to name your sections. It will help you go through the structure easily.', 'fw' ),
		'type'  => 'text',
	),
	'is_fullwidth' => array(
		'label'        => __('Full Width', 'fw'),
		'type'         => 'switch',
	),
	'background_color' => array(
		'label' => __('Background Color', 'fw'),
		'desc'  => __('Please select the background color', 'fw'),
		'type'  => 'color-picker',
	),
	'background_image' => array(
		'label'   => __('Background Image', 'fw'),
		'desc'    => __('Please select the background image', 'fw'),
		'type'    => 'background-image',
		'choices' => array(//	in future may will set predefined images
		)
	),
	'video' => array(
		'label' => __('Background Video', 'fw'),
		'desc'  => __('Insert Video URL to embed this video', 'fw'),
		'type'  => 'text',
	),
	'is_parrallax' => array(
		'label'        => __('Parallax', 'fw'),
		'type'         => 'switch',
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
