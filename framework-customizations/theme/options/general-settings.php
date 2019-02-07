<?php
if (!defined('FW')) {
	die('Forbidden');
}
$template_directory = get_template_directory_uri(). "/assets";
$options = array(
	'general' => array(
		'title' => __('General', 'fw'),
		'type' => 'tab',
		'options' => array(
			'general-settings' => array(
				'title' => __('General Settings', 'fw'),
				'type' => 'tab',
				'options' => array(
					'general-box' => array(
						'title' => __('General Settings', 'fw'),
						'type' => 'box',
						'options' => array(
							'logo-title' => array(
								'label' => __('Logo title', 'fw'),
								'desc' => __('Write your website logo name', 'fw'),
								'type' => 'text',
								'value' => get_bloginfo('name')
							),
							'logo' => array(
								'label' => __('Logo', 'fw'),
								'desc' => __('Upload a logo', 'fw'),
								'type' => 'upload'
							),
							'enable_coming_soon' => array(
								'type'    => 'multi-picker',
								'label'   => false,
								'desc'    => false,
								'picker'  => array(
									'selected' => array(
										'type'         => 'switch',
										'value'        => 'no',
										'label'        => __( 'Coming soon / Maintenance Page', 'fw' ),
										'desc'         => __( 'Enable coming soon/maintenance page?', 'fw' ),
										'help'    => __( 'The users will be redirected to this page when they are not logged in. Note that you need to disable it manually in order to make your website accessible again.', 'fw' ),
										'left-choice'  => array(
											'value' => 'no',
											'label' => __( 'No', 'fw' ),
										),
										'right-choice' => array(
											'value' => 'yes',
											'label' => __( 'Yes', 'fw' ),
										)
									),
								),
								'choices' => array(
									'yes' => array(
										'coming_soon_page'          => array(
											'label'   => __( '', 'fw' ),
											'desc'    => __( 'Select the coming soon page', 'fw' ),
											'value'   => '',
											'type'    => 'select',
											'choices' => fw_list_pages(),
										),
									)
								)
							),
						)
					),
				)
			),
			
		)
	)
);