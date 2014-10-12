<?php defined('SYSPATH') or die('No direct script access.');
 
abstract class Controller_Common extends Controller_Template {
 
    public $template = 'Main';
 
    public function before()
    {
        parent::before();
	
	$blocks_column = array();
	$blocksc = array();
	
	// избавляемся от дублей страниц, добавляя в конец URL закрывающий слэш
	if( substr($_SERVER['REQUEST_URI'], -1) != '/' ){
	     header("HTTP/1.1 301 Moved Permanently");
	     header("Location: ".$_SERVER['REQUEST_URI']."/"); 
	     exit();
	}

	// какой язык в адресе?
	$validate_lang = Validation::factory($this->request->param());
	$validate_lang -> rule('lang', 'max_length', array(':value', 2))
				   -> rule('lang', 'alpha');
	$lang_uri = ((isset($validate_lang['lang'])) and ($validate_lang['lang'] != '') and ($validate_lang -> check())) ? $validate_lang['lang'] : Kohana::$config->load('global.site_lang');


	if(!defined('LANG')) {
       define('LANG', $lang_uri);
	}


	if(!defined('LANG_SUBURL')) {
	   $lang_bc = (LANG != Kohana::$config->load('global.site_lang')) ? LANG.'/' : NULL;
	   define('LANG_SUBURL', $lang_bc);
	}

	// подключаем файл перевода 
	//if(LANG != Kohana::$config->load('global.site_lang'))
	i18n::lang(LANG . '-' . LANG);

	
        View::set_global('title', $title = Kohana::$config->load('global.site_title'));
	View::set_global('tiny_title', $tiny_title = Kohana::$config->load('global.site_tiny_title'));
	View::set_global('template', $title = Kohana::$config->load('global.frontend_template'));
        View::set_global('description', $title = Kohana::$config->load('global.site_description'));
	View::set_global('keywords', $title = Kohana::$config->load('global.site_keywords'));
	View::bind_global('menu_main', $menu_main);
	View::bind_global('menu_sub', $menu_sub);
	View::bind_global('blocks_column', $blocks_column);
	View::bind_global('blocks_main_slider', $blocks_main_slider);
	View::bind_global('blocks_main_text', $blocks_main_text);
	View::bind_global('info_site', $info_site);
	$description = Kohana::$config->load('global.site_description');
	
	
/*
	       $blocks_column = Model::factory('Blocks')->blocks_list('column');
	       if(Request::current()->uri() == '/') {
		    $blocks_main_slider = Model::factory('Blocks')->blocks_list('main_slider');
		    $blocks_main_text = Model::factory('Blocks')->blocks_list('main_text');
	       }
	       
	       $info_site = Model::factory('Info')->get_info();
	       
	       $menu_positions = Model::factory('Menu')->get_menu_pos();
	       
	       foreach ($menu_positions as $key => $value) {
		    $menus[] = Model::factory('Menu')->get_menu($key);
	       }

	       $menu_main = $menus[1];
	       $menu_sub = $menus[0];

	/*
	$menu_main = View::factory('MenuMain');
	$menu_sub = View::factory('MenuSub')
	       ->bind('url', $age);
	*/
	
	  
	
        $this->template->content = '';
        $this->template->styles = array('bootstrap.min','font-awesome.min','style');
        $this->template->scripts = array('bootstrap.min','main');
	
	//$this->template->editor = '';

	
	 $this->c_controller = HTML::chars(Request::current()->controller());
	 $this->clow_controller = SpHTML::str_2lower($this->c_controller);
	 $this->c_action = HTML::chars(Request::current()->action());
	 
	 


	       $this->bc[] = array('name' => __('Main_page'), 'link' => URL::base());
	       $this->bc[] = array('name' => Kohana::$config->load($this->clow_controller.'.mod_title'), 'link' => URL::base().LANG_SUBURL.$this->clow_controller);	
	       $this->bc[] = ($this->c_action != 'index') ? 
		       array(
			   'name' => __($this->c_controller.'_'.$this->c_action), 
			   'link' => URL::base().LANG_SUBURL.$this->clow_controller
		       ) : 
		       array(
			   'name' => __($this->c_controller.'_index'),
			   'link' => ''
		       );
			   
		$this->breadcrumbs = View::factory('/Breadcrumbs')
				       ->set('breadcrumb', Breadcrumbs::generate($this->bc, LANG_SUBURL));
			   
			   
		$validate_page = Validation::factory($this->request->param());
		$validate_page -> rule('page', 'not_empty')
				       -> rule('page', 'max_length', array(':value', 11))
				       -> rule('page', 'digit');
		$this->cur_page = (($validate_page -> check())) ? $validate_page['page'] : '1';
    }
    
    /* 
    public function after()
    {
	$this->template->editor = Ckeditor::instance();
	parent::after();
	 
    }
     */
 
} // End Common