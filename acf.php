<?php

defined( 'ABSPATH' ) or die();

function cpwd_register_fields() {
    if( ! function_exists('acf_add_local_field_group') ) return;
    acf_add_local_field_group([
        'key' => 'group_4b3cb386b5f2',
        'title' => __( 'Page Specific Styles and Scripts', 'cpwd' ),
        'label_placement' => 'top',
        'menu_order' => 0,
        'style' => 'default',
        'position' => 'normal',
        'fields' => [
            [
                'key' => 'field_8b2923eea5d1',
                'label' => 'Page Specific Styles',
                'name' => 'page_specific_styles',
                'type' => 'textarea',
                'rows' => 4,
                'new_lines' => '',
                'instructions' => 'Type your CSS code in the box, there is no need to include the STYLE tag.',
                'placeholder' => 'BODY{}',
            ],
            [
                'key' => 'field_d18e178a9d1d',
                'label' => 'Page Specific Scripts',
                'name' => 'page_specific_scripts',
                'type' => 'textarea',
                'rows' => 4,
                'new_lines' => '',
                'instructions' => 'Type your JavaScript code in the box, there is no need to include the SCRIPT tag.',
                'placeholder' => '(($) => {})(jQuery);',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page'
                ]
            ].
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post'
                ]
            ].
        ],
        'instruction_placement' => 'label',
    ]);
}
add_action( 'acf/init', 'cpwd_register_fields' );
