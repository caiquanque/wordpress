<main class="main">
    <section class="">
        <div class="container">
        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> >

            <a><?php the_title('<h1 class="entry-title">', '</h1>'); ?></a>

            <?php if (has_post_thumbnail()): ?>

                <div class="pull-left"><?php the_post_thumbnail('thumbnail'); ?></div>

            <?php endif; ?>

            <?php the_excerpt(); ?>

            <a href="<?php _e(get_page_link(get_the_ID()), THONG_THEME); ?>">Learn more</a>
        </article>
        </div>
    </section>
</main>