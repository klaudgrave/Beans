<?php
/**
 * Test data for the Beans Fields API integration tests.
 *
 * @package Beans\Framework\Tests\Integration\API\Fields\Fixtures
 *
 * @since   1.5.0
 */

return array(
	// Single fields.
	'single_fields' => array(
		'fields'  => array(
			array(
				'id'      => 'beans_layout',
				'label'   => 'Layout',
				'type'    => 'radio',
				'default' => 'default_fallback',
				'options' => array(
					'default_fallback' => 'Use Default Layout',
					'c'                => BEANS_THEME_DIR . 'lib/admin/assets/images/layouts/c.png',
					'c_sp'             => BEANS_THEME_DIR . 'lib/admin/assets/images/layouts/c_sp.png',
					'sp_c'             => BEANS_THEME_DIR . 'lib/admin/assets/images/layouts/sp_c.png',
				),
			),
			array(
				'id'             => 'beans_checkbox_test',
				'label'          => false,
				'checkbox_label' => 'Enable the checkbox test',
				'type'           => 'checkbox',
				'default'        => false,
			),
			array(
				'id'      => 'beans_text_test',
				'type'    => 'text',
				'default' => 'Testing the text field.',
			),
		),
		'context' => 'tests',
		'section' => 'tm-beans',
	),

	// Group of fields.
	'group'         => array(
		'fields'  => array(
			array(
				'id'          => 'beans_group_test',
				'label'       => 'Group of fields',
				'description' => 'This is a group of fields.',
				'type'        => 'group',
				'fields'      => array(
					array(
						'id'      => 'beans_compile_all_scripts',
						'type'    => 'activation',
						'default' => false,
					),
					array(
						'id'         => 'beans_compile_all_scripts_mode',
						'type'       => 'select',
						'default'    => 'aggressive',
						'attributes' => array( 'style' => 'margin: -3px 0 0 -8px;' ),
						'options'    => array(
							'aggressive' => 'Aggressive',
							'standard'   => 'Standard',
						),
					),
					array(
						'id'             => 'beans_checkbox_test',
						'label'          => false,
						'checkbox_label' => 'Enable the checkbox test',
						'type'           => 'checkbox',
						'default'        => false,
					),
				),
			),
		),
		'context' => 'group_tests',
		'section' => 'tm-beans',
	),
);
