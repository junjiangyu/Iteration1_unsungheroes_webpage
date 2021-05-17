 jQuery('div.elementor-widget-posts').each(function(_, widget) {
    // Add ID to the posts Widget (using the data-id)
    jQuery(widget).attr('id', jQuery(widget).attr('data-id'));

    // Add the id to the pagination URL
    jQuery('a.page-numbers', widget).map(function(_, link) {
      jQuery(link).attr('href', jQuery(link).attr('href') + '#' + jQuery(widget).attr('id'));
    });
  });