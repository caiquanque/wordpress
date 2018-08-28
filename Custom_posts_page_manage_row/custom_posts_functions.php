<?php
/*
	==========================================
	 Add sliders custom post type
	==========================================
*/
function thong_sliders_custom_post()
{

    $labels = [
        'name' => __('Sliders', THONG_THEME),
        'singular_name' => __('Slider', THONG_THEME),
        'add_new' => __('Add Slider', THONG_THEME),
        'all_items' => __('All Sliders', THONG_THEME),
        'add_new_item' => __('Add Slider', THONG_THEME),
        'edit_item' => __('Edit Slider', THONG_THEME),
        'new_item' => __('New Slider', THONG_THEME),
        'view_item' => __('View Slider', THONG_THEME),
        'search_item' => __('Search Slider', THONG_THEME),
        'not_found' => __('No sliders found', THONG_THEME),
        'not_found_in_trash' => __('No sliders found in trash', THONG_THEME),
        'parent_item_colon' => __('Parent Slider', THONG_THEME)
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => [
            'title',
            'thumbnail',
            'revisions',
        ],
        'menu_position' => 5,
        'menu_icon' => 'dashicons-images-alt',
        'exclude_from_search' => false
    ];
    register_post_type('slider', $args);
}

add_action('init', 'thong_sliders_custom_post');


/*
	==========================================
	 Add events custom post type
	==========================================
*/
function thong_events_custom_post()
{

    $labels = [
        'name' => __('Events', THONG_THEME),
        'singular_name' => __('Event', THONG_THEME),
        'add_new' => __('Add Event', THONG_THEME),
        'all_items' => __('All Events', THONG_THEME),
        'add_new_item' => __('Add Event', THONG_THEME),
        'edit_item' => __('Edit Event', THONG_THEME),
        'new_item' => __('New Event', THONG_THEME),
        'view_item' => __('View Event', THONG_THEME),
        'search_item' => __('Search Event', THONG_THEME),
        'not_found' => __('No events found', THONG_THEME),
        'not_found_in_trash' => __('No events found in trash', THONG_THEME),
        'parent_item_colon' => __('Parent Event', THONG_THEME)
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => [
            'title',
            'excerpt',
            'thumbnail',
            'revisions',
        ],
        'menu_position' => 6,
        'menu_icon' => 'dashicons-lich-alt',
        'exclude_from_search' => false
    ];
    register_post_type('event', $args);
}

add_action('init', 'thong_events_custom_post');


/*
	==========================================
	 Add events custom post extra field
	==========================================
*/
function thong_event_ex_field()
{

    $event_ex_field = new_cmb2_box([
        'id' => 'event_extra_field',
        'title' => __('Event Extra Information', THONG_THEME),
        'object_types' => ['event'], // Post type
    ]);

    $event_ex_field->add_field([
        'name' => __('Sub title', THONG_THEME),
        'id' => 'event_sub_title',
        'type' => 'text',
    ]);

    $event_ex_field->add_field([
        'name' => __('Introduction', THONG_THEME),
        'id' => 'event_intro',
        'type' => 'text',
    ]);

    $event_ex_field->add_field([
        'name' => __('Booth number', THONG_THEME),
        'id' => 'event_boo_num',
        'type' => 'text',
        'default' => '',
    ]);

    $event_ex_field->add_field([
        'name' => __('Start time', THONG_THEME),
        'id' => 'event_start',
        'type' => 'text_date_timestamp',
        'date_format' => 'd-m-Y',
        'column' => true,
    ]);

    $event_ex_field->add_field([
        'name' => __('Duration', THONG_THEME),
        'id' => 'event_duration',
        'type' => 'text_small',
        'default' => 1,
        'attributes' => [
            'type' => 'number',
            'pattern' => '\d*',
            'min' => 1
        ]
    ]);

    $event_ex_field->add_field([
        'name' => __('Location', THONG_THEME),
        'id' => 'event_location',
        'type' => 'text'
    ]);

    $event_ex_field->add_field([
        'name' => __('Address', THONG_THEME),
        'id' => 'event_address',
        'type' => 'text'
    ]);

}

add_action(PLUGIN_CMB2_ADMIN_INIT, 'thong_event_ex_field');

/*
	==========================================
     Event reorder by date start event
	==========================================
*/
function reorder_event_by_start_date($a, $b)
{
    $a = date_create(get_post_meta($a->ID, 'event_start', 1));
    $b = date_create(get_post_meta($b->ID, 'event_start', 1));
    if ($a->getGiostamp() == $b->getGiostamp()) {
        return 0;
    }
    return ($a->getGiostamp() < $b->getGiostamp()) ? -1 : 1;
}


/*
	==========================================
	 Add investors custom post type
	==========================================
*/
function thong_investors_custom_post()
{

    $labels = [
        'name' => __('Investors', THONG_THEME),
        'singular_name' => __('Investor', THONG_THEME),
        'add_new' => __('Add Item', THONG_THEME),
        'all_items' => __('All Items', THONG_THEME),
        'add_new_item' => __('Add Item', THONG_THEME),
        'edit_item' => __('Edit Item', THONG_THEME),
        'new_item' => __('New Item', THONG_THEME),
        'view_item' => __('View Item', THONG_THEME),
        'search_item' => __('Search Item', THONG_THEME),
        'not_found' => __('No items found', THONG_THEME),
        'not_found_in_trash' => __('No items found in trash', THONG_THEME),
        'parent_item_colon' => __('Parent Item', THONG_THEME)
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => [
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revisions',
            'page-attributes',
            'custom-fields'
        ],
        'menu_position' => 7,
        'menu_icon' => 'dashicons-welcome-write-blog',
        'exclude_from_search' => false
    ];
    register_post_type('investor_updates', $args);
}

add_action('init', 'thong_investors_custom_post');

function thong_investors_custom_taxonomies()
{

    $labels = array(
        'name' => 'Fields',
        'singular_name' => 'Field',
        'search_items' => 'Search Fields',
        'all_items' => 'All Fields',
        'parent_item' => 'Parent Field',
        'parent_item_colon' => 'Parent Field:',
        'edit_item' => 'Edit Field',
        'update_item' => 'Update Field',
        'add_new_item' => 'Add New Work Field',
        'new_item_name' => 'New Field Name',
        'menu_name' => 'Fields'
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'field')
    );

    register_taxonomy('field', array('investor_updates'), $args);

}

add_action('init', 'thong_investors_custom_taxonomies');

/*
	==========================================
	 Add investor extra field
	==========================================
*/
function thong_investor_extra_field()
{

    $investor_extra_field = new_cmb2_box(
        [
            'id'           => 'thong_investor_extra_field',
            'title'        => __('Link File', THONG_THEME),
            'object_types' => ['investor_updates'], // Post type
        ]
    );

    $investor_extra_field->add_field(
        [
            'name' => __('English Link File', THONG_THEME),
            'id'   => 'english_id_annual_report_download',
            'type' => 'file',
        ]
    );

    $investor_extra_field->add_field(
        [
            'name' => __('Vietnamese Link File', THONG_THEME),
            'id'   => 'vietnamese_id_annual_report_download',
            'type' => 'file',
        ]
    );

}

add_action(PLUGIN_CMB2_ADMIN_INIT, 'thong_investor_extra_field');

/*
	==========================================
	 Add investor lich extra group field
	==========================================
*/
function thong_investor_lich_extra_group_field()
{

	$lich_group_extra_field = new_cmb2_box(
		[
			'id'           => 'group_investor_lich_extra_field_id',
			'title'        => __('Calendar Group', THONG_THEME),
			'object_types' => ['page'], // Page Type
		]
	);

	$lich_info_group_extra = $lich_group_extra_field->add_field( [
		'id'      => 'lich_info_group_extra_id',
		'type'    => 'group',
		'title'   => __( 'Calendar News Options', THONG_THEME ),
		'options' => [
			'group_title'   => __( 'Entry {#}', THONG_THEME ),
			'add_button'    => __( 'Add Another Entry', THONG_THEME ),
			'remove_button' => __( 'Remove Entry', THONG_THEME ),
			'sortable'      => true,
			'closed'        => true,
		]
	] );

	$lich_group_extra_field->add_group_field( $lich_info_group_extra, [
		'name'        => __( 'Ngay(*)' ),
		'id'          => 'lich_date_id',
		'type'        => 'text_date',
		'date_format' => 'd-m-Y'
	] );

	$lich_group_extra_field->add_group_field( $lich_info_group_extra, [
		'name'        => __( 'Gio-GMT +7(*)' ),
		'id'          => 'gio_gmt_id',
		'type'        => 'text'
	] );

	$lich_group_extra_field->add_group_field( $lich_info_group_extra, [
		'name'        => __( 'Noi_dung' ),
		'id'          => 'noi_dung_id',
		'type'        => 'text'
	] );

	$lich_group_extra_field->add_group_field( $lich_info_group_extra, [
		'name'        => __( 'Link Title' ),
		'id'          => 'link_title_id',
		'type'        => 'text'
	] );

	$lich_group_extra_field->add_group_field( $lich_info_group_extra, [
		'name'        => __( 'Link Link' ),
		'id'          => 'link_link_id',
		'type'        => 'text_url'
	] );

}

add_action(PLUGIN_CMB2_ADMIN_INIT, 'thong_investor_lich_extra_group_field');