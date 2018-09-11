<?php
/**
 * Template Name: Financial Statements
 * Template Post Type: investor_updates, page
 */

$parent_category_id = get_term_by( 'slug', 'financial-statements', 'investor_category' )->term_id;
$child_categories   = get_terms( [
	'taxonomy' => 'investor_category',
	'parent'   => $parent_category_id,
	'orderby'  => 'slug',
	'order'    => 'DESC'
] );
?>

<div class="main">
    <div class="select">
        <form method="get">
            <select id="year" onchange="this.form.submit()" name="years">
				<?php
				if ( count( $child_categories ) ):
					$year_show = 0;
					foreach ( $child_categories as $child_category ):
						$selected = '';
						if ( $child_category->name === date( 'Y' ) || $child_category->term_id === $_GET['years'] ) {
							$selected  = 'selected';
							$year_show = $child_category->term_id;
						}
						?>
                        <option value="<?php echo $child_category->term_id ?>"
                                selected><?php echo $child_category->name ?></option>
						<?php
						array_push( $category_ids, $child_category->term_id );
					endforeach;

				endif;
				?>
            </select>
        </form>
    </div><br/>
    <div class="post">
	    <?php
        if ($_GET['years']){
	        $year_show = $_GET['years'];
        }
	    $financial_statement_posts = get_posts( [
		    'post_type'      => 'investor_updates',
		    'tax_query'      => [
			    [
				    'taxonomy' => 'investor_category',
				    'field'    => 'term_id',
				    'terms'    => $year_show,
			    ]
		    ],
		    'orderby'        => 'menu_order',
		    'posts_per_page' => -1
	    ] );

	    foreach ($financial_statement_posts as $financial_statement_post):
		    ?>
            <div style="background-color: #00a0d2">
                <h1><?php echo $financial_statement_post->post_title; ?></h1>
                <p><?php echo clean_br_in_string($financial_statement_post->post_content); ?></p>
            </div><hr/>
	    <?php
	    endforeach;
	    ?>
    </div>
</div>

