<?php
get_header();
?>
    <main class="main">
        <section class="">
            <div class="container">
				<?php
				if ( have_posts() ): {
					while ( have_posts() ) : the_post();
						get_template_part('content','search');
					endwhile;
				}
				endif;
				?>
            </div>
        </section>
    </main>
<?php get_footer(); ?>