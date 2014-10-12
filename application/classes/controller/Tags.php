<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Tags extends Controller_Common {
 

    /*
     * Облако тегов
     * 
     * 
     * 
    */
    public function action_index()
    {
	
		$tags_list = array();
		$get_config = Kohana::$config->load('blog');
		$global_config = Kohana::$config->load('global');
		$ctrl = Kohana::$config->load('controllers.blog');
		$begin = ($this->cur_page - 1)*$get_config['items_by_page'];
		


		$content = View::factory('/'.$this->c_controller.'/Cloud')
		       ->bind('breadcrumbs', $this->breadcrumbs)
		       ->bind('tags_list', $tags_list)
			   ->bind('sections_list', $sections_list)
			   ->bind('lang_suburl', $suburl)
			   ->bind('url_type', $get_config['url_type'])
		       ->bind('widgets', $widgets)
		       ->bind('mod_url', $ctrl)
			   ;
			   
		if($global_config['site_cache']) {
			$cache_db = Cache::instance('sqlite');
			$cache_lt_list = Kohana::$config->load('cache_m.list_blog');
			$cache_lt_s = Kohana::$config->load('cache_m.list_sections');
			$cache_key = 'list_blog-'.$this->cur_page.'-'.LANG;
			$cache_key_s = 'list_sections-'.LANG;
			$cache_key_c = 'items_list-'.$this->cur_page.'-'.LANG;
		
			// get list entries
			if($result_list = Kohana::cache($cache_key, NULL, $cache_lt_list)) {
				$blog_list = $result_list;
			}
			else {
				$blog_list = Model::factory('Blog')->get_items($this->cur_page, $begin, LANG);
				Kohana::cache($cache_key, $blog_list, $cache_lt_list);
			}
		
			// get sections
			if($result_s = Kohana::cache($cache_key_s, NULL, $cache_lt_s)) {
				$sections_list = $result_s;
			}
			else {
				$sections_list = Model::factory('Blog')->get_sections();
				Kohana::cache($cache_key_s, $sections_list, $cache_lt_s);
			}
			
			// pagination
			if($result_c = Kohana::cache($cache_key_c, NULL, $cache_lt_list)) {
				$count_c = $result_c;
			}
			else {
				$count_c = Model::factory('Blog')->count_items();
				Kohana::cache($cache_key_c, $count_c, $cache_lt_list);
			}
		}
		else {
			$blog_list = Model::factory('Blog')->get_items($this->cur_page, $begin);
			$sections_list = Model::factory('Blog')->get_sections();
			$count_c = Model::factory('Blog')->count_items();
		}


		   $total_items = $count_c[0]['total'];
		   $content->pagination = Pagination::factory(
			       array(
				   'total_items' => $total_items,
				   'items_per_page' => Kohana::$config->load('blog.items_by_page')
			       )
		    );
		   
		   

	       $this->template->content = $content;
	       $this->template->title_page = '';

    }  
	

	
	
	public function action_tag()
    {

	
		$tags_list = array();
		$sections_list = array();
		$get_config = Kohana::$config->load('tags');
		$global_config = Kohana::$config->load('global');
		$ctrl = Kohana::$config->load('controllers.tags');
		$begin = ($this->cur_page - 1)*$get_config['items_by_page'];


		$content = View::factory('/'.$this->c_controller.'/View')
		       ->bind('breadcrumbs', $this->breadcrumbs)
		       ->bind('tags_list', $tags_list)
			   ->bind('sections_list', $sections_list)
		       ->bind('widgets', $widgets)
		       ->bind('mod_url', $ctrl)
			   ;


		$validate_page = Validation::factory($this->request->param());
		$validate_page -> rule('id', 'not_empty')
					   -> rule('id', 'max_length', array(':value', 255))
				       -> rule('id', 'alpha_dash');
		$tag_url = (($validate_page -> check()) and (isset($validate_page['id']))) ? $validate_page['id'] : NULL;			   

		if($global_config['site_cache']) {
			$cache_db = Cache::instance('sqlite');
			$cache_lt_item = Kohana::$config->load('cache_m.list_tags');
			$cache_lt_s = Kohana::$config->load('cache_m.list_sections');
			$cache_key = 'taginfo-'.$tag_url.'-'.LANG;
			$cache_key_s = 'list_sections-'.LANG;
			
			// get archive entries
			if($result_list = Kohana::cache($cache_key, NULL, $cache_lt_item)) {
				$tags_list = $result_list;
			}
			else {
				$tags_list = Model::factory('Tags')->get_tag($tag_url);
				Kohana::cache($cache_key, $blog_list, $cache_lt_item);
			}
			
			// get sections
			if($result_s = Kohana::cache($cache_key_s, NULL, $cache_lt_s)) {
				$sections_list = $result_s;
			}
			else {
				$sections_list = Model::factory('Blog')->get_sections();
				Kohana::cache($cache_key_s, $sections_list, $cache_lt_s);
			}
			
		}
		else {
			$tags_list = Model::factory('Tags')->get_tag($entryid);
			$sections_list = Model::factory('Blog')->get_sections();
		}
		   
		 
	    $this->template->content = $content;
	    $this->template->title_page = '';

    }
	
	public function action_entry_slug()
    {

	
		$blog_list = array();
		$sections_list = array();
		$get_config = Kohana::$config->load('blog');
		$global_config = Kohana::$config->load('global');
		$ctrl = Kohana::$config->load('controllers.blog');
		$begin = ($this->cur_page - 1)*$get_config['items_by_page'];

		$content = View::factory('/'.$this->c_controller.'/View')
		       ->bind('breadcrumbs', $this->breadcrumbs)
		       ->bind('blog_list', $blog_list)
			   ->bind('sections_list', $sections_list)
			   ->bind('tags_list', $tags_list)
			   ->bind('url_type', $get_config['url_type'])
		       ->bind('widgets', $widgets)
		       ->bind('mod_url', $ctrl);

		$validate_page = Validation::factory($this->request->param());
		$validate_page -> rule('slug', 'not_empty')
					   -> rule('slug', 'max_length', array(':value', 255))
				       -> rule('slug', 'alpha_dash');
		$entryurl = (($validate_page -> check()) and (isset($validate_page['slug']))) ? $validate_page['slug'] : NULL;			  

		
		if($global_config['site_cache']) {
			$cache_db = Cache::instance('sqlite');
			$cache_lt_item = Kohana::$config->load('cache_m.list_blog');
			$cache_lt_s = Kohana::$config->load('cache_m.list_sections');
			$cache_lt_t = Kohana::$config->load('cache_m.item_tags');
			$cache_key = 'item-'.$entryurl.'-'.LANG;
			$cache_key_s = 'list_sections-'.LANG;
			$cache_key_t = 'tags-'.$entryid.'-'.LANG;
			
			// get archive entries
			if($result_list = Kohana::cache($cache_key, NULL, $cache_lt_item)) {
				$blog_list = $result_list;
			}
			else {
				$blog_list = Model::factory('Blog')->get_entry_slug($entryurl);
				Kohana::cache($cache_key, $blog_list, $cache_lt_item);
			}
			
			// get sections
			if($result_s = Kohana::cache($cache_key_s, NULL, $cache_lt_s)) {
				$sections_list = $result_s;
			}
			else {
				$sections_list = Model::factory('Blog')->get_sections();
				Kohana::cache($cache_key_s, $sections_list, $cache_lt_s);
			}	
			
			// get tags
			if($result_t = Kohana::cache($cache_key_t, NULL, $cache_lt_t)) {
				$tags_list = $result_t;
			}
			else {
				$tags_list = Model::factory('Blog')->get_tags($blog_list['id_item']);
				Kohana::cache($cache_key_t, $tags_list, $cache_lt_t);
			}

		}
		else {
			$blog_list = Model::factory('Blog')->get_entry_slug($entryurl);
			$sections_list = Model::factory('Blog')->get_sections();
			$tags_list = Model::factory('Blog')->get_tags($blog_list['id_item']);
		}


	    $this->template->content = $content;
	    $this->template->title_page = '';

    }
	
	public function action_entry_archive()
    {
	
		$blog_list = array();
		$sections_list = array();
		$get_config = Kohana::$config->load('blog');
		$global_config = Kohana::$config->load('global');
		$ctrl = Kohana::$config->load('controllers.blog');
		$begin = ($this->cur_page - 1)*$get_config['items_by_page'];

		$content = View::factory('/'.$this->c_controller.'/View')
		       ->bind('breadcrumbs', $this->breadcrumbs)
		       ->bind('blog_list', $blog_list)
			   ->bind('sections_list', $sections_list)
			   ->bind('tags_list', $tags_list)
			   ->bind('url_type', $get_config['url_type'])
		       ->bind('widgets', $widgets)
		       ->bind('mod_url', $ctrl)
			   ;


		$validate_page = Validation::factory($this->request->param());
		$validate_page -> rule('year', 'not_empty')
					   -> rule('year', 'max_length', array(':value', 4))
				       -> rule('year', 'digit')
					   -> rule('month', 'not_empty')
					   -> rule('month', 'max_length', array(':value', 2))
				       -> rule('month', 'digit')
					   -> rule('day', 'not_empty')
					   -> rule('day', 'max_length', array(':value', 2))
				       -> rule('day', 'digit')
					   -> rule('slug', 'not_empty')
					   -> rule('slug', 'max_length', array(':value', 255))
				       -> rule('slug', 'alpha_dash');
		$entryurl = (($validate_page -> check()) and (isset($validate_page['slug']))) ? $validate_page['slug'] : NULL;			  
		$entryyear = (($validate_page -> check()) and (isset($validate_page['year']))) ? $validate_page['year'] : NULL;
		$entrymonth = (($validate_page -> check()) and (isset($validate_page['month']))) ? $validate_page['month'] : NULL;
		$entryday = (($validate_page -> check()) and (isset($validate_page['day']))) ? $validate_page['day'] : NULL;
		
		
		if($global_config['site_cache']) {
			$cache_db = Cache::instance('sqlite');
			$cache_lt_item = Kohana::$config->load('cache_m.list_blog');
			$cache_lt_s = Kohana::$config->load('cache_m.list_sections');
			$cache_lt_t = Kohana::$config->load('cache_m.item_tags');
			$cache_key = 'item-'.$entryurl.'-'.$entryyear.$entrymonth.$entryday.'-'.LANG;
			$cache_key_s = 'list_sections-'.LANG;
			$cache_key_t = 'tags-'.$entryid.'-'.LANG;
			
			// get archive entries
			if($result_list = Kohana::cache($cache_key, NULL, $cache_lt_item)) {
				$blog_list = $result_list;
			}
			else {
				$blog_list = Model::factory('Blog')->get_entry_archive($entryurl, $entryyear, $entrymonth, $entryday);
				Kohana::cache($cache_key, $blog_list, $cache_lt_item);
			}
			
			// get sections
			if($result_s = Kohana::cache($cache_key_s, NULL, $cache_lt_s)) {
				$sections_list = $result_s;
			}
			else {
				$sections_list = Model::factory('Blog')->get_sections();
				Kohana::cache($cache_key_s, $sections_list, $cache_lt_s);
			}
			
			// get tags
			if($result_t = Kohana::cache($cache_key_t, NULL, $cache_lt_t)) {
				$tags_list = $result_t;
			}
			else {
				$tags_list = Model::factory('Blog')->get_tags($blog_list['id_item']);
				Kohana::cache($cache_key_t, $tags_list, $cache_lt_t);
			}
			
		}
		else {
			$blog_list = Model::factory('Blog')->get_entry_archive($entryurl, $entryyear, $entrymonth, $entryday);
			$sections_list = Model::factory('Blog')->get_sections();
			$tags_list = Model::factory('Blog')->get_tags($blog_list['id_item']);
		}
		   

	    $this->template->content = $content;
	    $this->template->title_page = '';

    }
	
	public function action_rss()
    {

	
		$blog_list = array();
		$sections_list = array();
		$get_config = Kohana::$config->load('blog');
		$global_config = Kohana::$config->load('global');
		$ctrl = Kohana::$config->load('controllers.blog');
		$begin = ($this->cur_page - 1)*$get_config['rss_by_page'];

			   
		$info = array(
            'title' => __('Blog_rss'),
            'language' => LANG,
            'description' => __('Blog_rss_descr'),
            'link' => URL::base().LANG_SUBURL.$ctrl.'/rss/',
            'pubDate' => time());


		$cache_db = Cache::instance('sqlite');
		$cache_lt_list = Kohana::$config->load('cache_m.rss_blog');
		$cache_key = 'rss_blog-'.LANG;
			
		// get list entries
		if($result_list = Kohana::cache($cache_key, NULL, $cache_lt_list)) {
			$blog_list = $result_list;
		}
		else {
			$blog_list = Model::factory('Blog')->get_items($this->cur_page, $begin);
			Kohana::cache($cache_key, $blog_list, $cache_lt_list);
		}
		
		
		foreach ($blog_list as $blog)
        {
			switch ($get_config['url_type']) {
					case 0:
						$url = 'item/'.HTML::chars($blog['id_item']);
						break;
					case 1:
						$url = HTML::chars($blog['item_url']);
						break;
					case 2:
						$url = substr(HTML::chars($blog['item_publish_date']),0,4).'/'.substr(HTML::chars($blog['item_publish_date']),5,2).'/'.substr(HTML::chars($blog['item_publish_date']),8,2).'/'.HTML::chars($blog['item_url']);
						break;
					default:
						$url = 'item/'.HTML::chars($blog['id_item']);
			}
		
			$item_url = URL::base().LANG_SUBURL.$ctrl.'/'.$url.'/';
        
			$items[] = array(
                    'title' => $blog['item_title_'.LANG],
                    'link' => $item_url,
                    'guid' => $item_url,
                    'description' => $blog['item_text_'.LANG],
                    'pubDate' => Date::formatted_time($blog['item_publish_date'], 'D, d M Y H:i:s')
            );
			

				
		}
		
		
 
			header('Content-Type: text/xml');

			echo Feed::create($info, $items);
			exit();

    }
 

} // End Page