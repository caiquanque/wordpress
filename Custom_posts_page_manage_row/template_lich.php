<?php
/**
 * Template Name: Lich
 */

get_header();
?>
<main class="main">

    <section>
        <div>
            <?php
            $lichs = get_post_meta($post->ID,'lich_info_group_extra_id',1);
            ?>
            <div class="title"><?php _e( $post->post_title, THONG_THEME ); ?></div>
            <div >
                <div>
                    <div>Ngay(*)</div>
                    <div>Gio-GMT +7(*)</div>
                    <div>Noi_dung</div>
                    <div>Link</div>
                </div>
                <?php foreach ( $lichs as $lich ): ?>
                <div class="lich__table-row">
                    <div class="col col-date">
                        <div>Ngay(*)</div>
                        <div><?php _e($lich['lich_date_id'],THONG_THEME); ?></div>
                    </div>
                    <div>
                        <div>Gio-GMT +7(*)</div>
                        <div>
                            <?php
                            if ( $lich['gio_gmt_id'] ):
                                _e($lich['gio_gmt_id'],THONG_THEME);
                            else: _e('Khong co thoi gian bieu',THONG_THEME);
                            endif;
                            ?></div>
                    </div>
                    <div>
                        <div>Noi_dung</div>
                        <div><?php _e($lich['noi_dung_id'],THONG_THEME); ?></div>
                    </div>
                    <div>
                        <div>Link</div>
                        <div><a href="link_link_id" title="<?php _e($lich['link_title_id'],THONG_THEME) ?>"><?php _e($lich['link_title_id'],THONG_THEME) ?></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>