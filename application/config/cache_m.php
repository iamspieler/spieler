<?php defined('SYSPATH') or die('No direct script access');

// cache lifetime
return array(
	  'list_blog'       => 10, // cache list of last entries
	  'archive_blog'       => 10, // cache list of last entries
	  'sections'       => 100, // cache entries in section
	  'list_sections'       => 100, // cache sections list on page
	  'item_tags'       => 100, // cache tags on item
	  'list_tags'       => 100, // cache tags on module tags
	  'rss_blog'       => 100,
);