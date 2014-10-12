<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Blog extends Controller_Common {
 

    /*
     * Главная страница модуля
     * 
     * 
     * 
    */
    public function action_index()
    {
	
		$blog_list = array();
		$sections_list = array();
		$get_config = Kohana::$config->load('blog');
		$ctrl = Kohana::$config->load('controllers.blog');
		$begin = ($this->cur_page - 1)*$get_config['items_by_page'];

			$cache_db = Cache::instance('sqlite');
		
		$content = View::factory('/'.$this->c_controller.'/List')
		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('blog_list', $blog_list)
			   ->bind('sections_list', $sections_list)
			   ->bind('url_type', $get_config['url_type'])
		       ->bind('widgets', $widgets)
		       ->bind('mod_url', $ctrl)
			   ;



		       $breadcrumbs = View::factory('/Breadcrumbs')
				       ->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));

	      $blog_list = Model::factory('Blog')->get_items($this->cur_page, $begin);
		   $sections_list = Model::factory('Blog')->get_sections();
		   
		   
		  $cache_db->set('test_id', $blog_list, 6000);
		   
		//    $blog_list = $cache_db->get('test_id');
		print_r($blog_list);
		   
		   $count_c = Model::factory('Blog')->count_items();
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
	
	
	public function action_archive()
    {
	
		$blog_list = array();
		$sections_list = array();
		$get_config = Kohana::$config->load('blog');
		$ctrl = Kohana::$config->load('controllers.blog');
		$begin = ($this->cur_page - 1)*$get_config['items_by_page'];

		$content = View::factory('/'.$this->c_controller.'/List')
		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('blog_list', $blog_list)
			   ->bind('sections_list', $sections_list)
			   ->bind('url_type', $get_config['url_type'])
		       ->bind('widgets', $widgets)
		       ->bind('mod_url', $ctrl)
			   ;
			   
		$validate_page = Validation::factory($this->request->param());
		$validate_page -> rule('year', 'not_empty')
				       -> rule('year', 'max_length', array(':value', 4))
				       -> rule('year', 'digit')
					   -> rule('month', 'max_length', array(':value', 2))
				       -> rule('month', 'digit')
					   -> rule('day', 'max_length', array(':value', 2))
				       -> rule('day', 'digit');
		$entryyear = (($validate_page -> check())) ? $validate_page['year'] : FALSE;	
		$entrymonth = (($validate_page -> check()) and (isset($validate_page['month']))) ? $validate_page['month'] : 0;
		$entryday = (($validate_page -> check()) and (isset($validate_page['day']))) ? $validate_page['day'] : 0;


		       $breadcrumbs = View::factory('/Breadcrumbs')
				       ->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));

	       $blog_list = Model::factory('Blog')->get_archive($this->cur_page, $begin, $entryyear, $entrymonth, $entryday);
		   $sections_list = Model::factory('Blog')->get_sections();
		   
		   $count_c = Model::factory('Blog')->count_items();
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
	
	public function action_by_section()
    {
	
		$blog_list = array();
		$sections_list = array();
		$get_config = Kohana::$config->load('blog');
		$ctrl = Kohana::$config->load('controllers.blog');
		$begin = ($this->cur_page - 1)*$get_config['items_by_page'];
		
		
	
		

		$content = View::factory('/'.$this->c_controller.'/List')
		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('blog_list', $blog_list)
			   ->bind('sections_list', $sections_list)
			   ->bind('url_type', $get_config['url_type'])
		       ->bind('widgets', $widgets)
		       ->bind('mod_url', $ctrl)
			   ;
		
		$validate_section = Validation::factory($this->request->param());
		$validate_section -> rule('section', 'not_empty')
						  -> rule('section', 'max_length', array(':value', 255))
				          -> rule('section', 'alpha_dash');
		$section = (($validate_section -> check()) and (isset($validate_section['section']))) ? $validate_section['section'] : NULL;	


		       $breadcrumbs = View::factory('/Breadcrumbs')
				       ->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));

	       $blog_list = Model::factory('Blog')->get_items_section($section, $this->cur_page, $begin);
		   $sections_list = Model::factory('Blog')->get_sections();
		   
		   $count_c = Model::factory('Blog')->count_items();
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
	
	
	public function action_entry_id()
    {

	
		$blog_list = array();
		$sections_list = array();
		$get_config = Kohana::$config->load('blog');
		$ctrl = Kohana::$config->load('controllers.blog');
		$begin = ($this->cur_page - 1)*$get_config['items_by_page'];

		$content = View::factory('/'.$this->c_controller.'/View')
		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('blog_list', $blog_list)
			   ->bind('sections_list', $sections_list)
			   ->bind('url_type', $get_config['url_type'])
		       ->bind('widgets', $widgets)
		       ->bind('mod_url', $ctrl)
			   ;



		$breadcrumbs = View::factory('/Breadcrumbs')
				->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));
		
		$validate_page = Validation::factory($this->request->param());
		$validate_page -> rule('id', 'not_empty')
					   -> rule('id', 'max_length', array(':value', 11))
				       -> rule('id', 'digit');
		$entryid = (($validate_page -> check()) and (isset($validate_page['id']))) ? $validate_page['id'] : NULL;			   

		
			$blog_list = Model::factory('Blog')->get_entry_id($entryid);
			$sections_list = Model::factory('Blog')->get_sections();
		/*   
		    $count_c = Model::factory('Blog')->count_items();
		    $total_items = $count_c[0]['total'];

		   $content->pagination = Pagination::factory(
			       array(
				   'total_items' => $total_items,
				   'items_per_page' => Kohana::$config->load('blog.items_by_page')
			       )
		    );
		  */ 
		   

	    $this->template->content = $content;
	    $this->template->title_page = '';

    }
	
	public function action_entry_slug()
    {
	
	print_r($this->request->param());
	
		$blog_list = array();
		$sections_list = array();
		$get_config = Kohana::$config->load('blog');
		$ctrl = Kohana::$config->load('controllers.blog');
		$begin = ($this->cur_page - 1)*$get_config['items_by_page'];

		$content = View::factory('/'.$this->c_controller.'/View')
		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('blog_list', $blog_list)
			   ->bind('sections_list', $sections_list)
			   ->bind('url_type', $get_config['url_type'])
		       ->bind('widgets', $widgets)
		       ->bind('mod_url', $ctrl)
			   ;



		$breadcrumbs = View::factory('/Breadcrumbs')
				->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));
		
		$validate_page = Validation::factory($this->request->param());
		$validate_page -> rule('slug', 'not_empty')
					   -> rule('slug', 'max_length', array(':value', 255))
				       -> rule('slug', 'alpha_dash');
		$entryurl = (($validate_page -> check()) and (isset($validate_page['slug']))) ? $validate_page['slug'] : NULL;			  

		
			$blog_list = Model::factory('Blog')->get_entry_slug($entryurl);
			$sections_list = Model::factory('Blog')->get_sections();
	/*	   
		    $count_c = Model::factory('Blog')->count_items();
		    $total_items = $count_c[0]['total'];

		   $content->pagination = Pagination::factory(
			       array(
				   'total_items' => $total_items,
				   'items_per_page' => Kohana::$config->load('blog.items_by_page')
			       )
		    );
	*/	   
		   

	    $this->template->content = $content;
	    $this->template->title_page = '';

    }
	
	public function action_entry_archive()
    {
	
	print_r($this->request->param());
	
		$blog_list = array();
		$sections_list = array();
		$get_config = Kohana::$config->load('blog');
		$ctrl = Kohana::$config->load('controllers.blog');
		$begin = ($this->cur_page - 1)*$get_config['items_by_page'];

		$content = View::factory('/'.$this->c_controller.'/View')
		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('blog_list', $blog_list)
			   ->bind('sections_list', $sections_list)
			   ->bind('url_type', $get_config['url_type'])
		       ->bind('widgets', $widgets)
		       ->bind('mod_url', $ctrl)
			   ;



		$breadcrumbs = View::factory('/Breadcrumbs')
				->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));
		
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
		
			$blog_list = Model::factory('Blog')->get_entry_archive($entryurl, $entryyear, $entrymonth, $entryday);
			$sections_list = Model::factory('Blog')->get_sections();
	/*	   
		    $count_c = Model::factory('Blog')->count_items();
		    $total_items = $count_c[0]['total'];

		   $content->pagination = Pagination::factory(
			       array(
				   'total_items' => $total_items,
				   'items_per_page' => Kohana::$config->load('blog.items_by_page')
			       )
		    );
	*/	   
		   

	    $this->template->content = $content;
	    $this->template->title_page = '';

    }
    

    public function action_select()
    {
	       $sections_list = array();
	       $blocks_main_slider = array();
	       $blocks_column = '';
	       
	   
	       // валидация параметров адресной строки
		    $validate_param = Validation::factory($this->request->param());
		    $validate_param -> rule('id', 'not_empty')
				    -> rule('id', 'alpha_dash');
		    if ($validate_param->check())
		    {
			 $pid = $validate_param['id'];
			
		    }
		    else $this->request->redirect(URL::site(NULL, TRUE));

	       $content = View::factory('/'.$this->c_controller.'/Page')
		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('pages_list', $pages_list)
		       ->bind('photos_list', $photos_list)
		       ->bind('blocks_column', $blocks_column)
		       ->bind('blocks_main_slider', $blocks_main_slider)
		       ->bind('blocks_main_text', $blocks_main_text)
		       ->bind('mod_url', $this->clow_controller)
		       ->bind('main_menu', $main_menu);



		       $breadcrumbs = View::factory('/Breadcrumbs')
				       ->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));
		
		

	       if(!$pages_list = Model::factory('Pages')->get_page($pid)) $this->request->redirect(URL::site(NULL, TRUE));
	       $photos_list = Model::factory('Pages')->get_photos('pages', $pages_list['id_pages']);


	       $this->template->content = $content;
	       $this->template->title_page = $pages_list['pages_title'];

    } 
    
 
    
    
  
    
 

} // End Page