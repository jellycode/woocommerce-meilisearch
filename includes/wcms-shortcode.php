<?php

/**
 * wcms_shortcode.
 *
 * @return  void
 */

function wcms_search_page( $atts ){
  $html = '<form action="" id="wcms__search-form" style="width: 100%;">
      <input type="text" class="regular-text" id="wcms__search-terms" name="wcms_search" placeholder="Search while you type..." style="width: 100%;">
      <div id="wcms__search-hits">
        <ul><li>There are no search results.</li></ul>
      </div>
    </form>';

  echo $html;
}
add_shortcode('wcms_search', 'wcms_search_page');
