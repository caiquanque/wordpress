<form class="search-form" role="search" method="get"
      action="<?php _e(home_url('/'), THONG_THEME); ?>" name="search">
    <input type="search" placeholder="Search..."
           value="<?php _e(get_search_query(), THONG_THEME) ?>" data-input-field name="s">
    <span class="icon icon-search box-search__toggle" data-search-btn></span>
    <button class="icon icon-search box-search__submit" type="submit" data-submit-btn></button>
</form>