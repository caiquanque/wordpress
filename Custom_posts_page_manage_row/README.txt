Quản lý page theo dòng, theo chức năng
Mỗi chức năng được gôm lại thành một dòng

Technical: CMB2
add_field
add_group_field
get_meta_post($post->ID,'id bên function', 1);


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

foreach ( $lichs as $lich ):
	<div>Ngay(*)</div>
        <div><?php _e($lich['lich_date_id'],THONG_THEME); ?></div>
.......
endforeach;
