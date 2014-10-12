<?php defined('SYSPATH') or die('No direct script access.');
 
//abstract class Controller_Admin extends Controller_Template {
class Controller_Admin extends Controller_Template { 
    public $template = '/Admin/Main';
 
    public function before()
    {
        parent::before();

	// избавляемся от дублей страниц, добавляя в конец URL закрывающий слэш
	if( substr($_SERVER['REQUEST_URI'], -1) != '/' ){
	     header("HTTP/1.1 301 Moved Permanently");
	     header("Location: ".$_SERVER['REQUEST_URI']."/"); 
	     exit();
	}
	
	if(!Auth::instance()->logged_in()) {
	     //$this->request->redirect('login');
		 $session = Session::instance();
		 $session->set('back_url', Request::initial()->uri());
		 
		 Controller::redirect('login');
	     exit();
	}
	
	if(Auth::instance()->logged_in('root')) define('LOGGED_AS', 'root');
	elseif(Auth::instance()->logged_in('admin')) define('LOGGED_AS', 'admin');
	elseif(Auth::instance()->logged_in('moderator')) define('LOGGED_AS', 'moderator');
	elseif(Auth::instance()->logged_in('editor')) define('LOGGED_AS', 'editor');
	else define('LOGGED_AS', 'login');
	
	
	View::set_global('title', $title = Kohana::$config->load('global.site_title'));
	View::set_global('tiny_title', $tiny_title = Kohana::$config->load('global.site_tiny_title'));
	View::set_global('template', $title = Kohana::$config->load('global.site_ap_template'));
	View::bind_global('description', $description);
	View::bind_global('menu_main', $menu_main);
	View::bind_global('menu_sub', $menu_sub);
	$description = Kohana::$config->load('global.site_description');
	
	
	$menu_main = View::factory('/Admin/MenuMain');
	$menu_sub = View::factory('/Admin/MenuSub');
	
	$this->template->title_page = '';
        $this->template->content = '';
        $this->template->styles = array('bootstrap.min','font-awesome.min','jquery.minicolors','animations','main');
        $this->template->scripts = array('bootstrap.min','sisyphus.min','bootstrap-datetimepicker.min','bootstrap-datetimepicker.'.I18n::lang(),'jquery.minicolors.min','jquery.cookie','jquery.pjax','jquery.velocity.min','dropzone.min','main');
	
	//$this->template->editor = '';
	
	
	
	 $this->c_controller = HTML::chars(Request::current()->controller());
	 $this->clow_controller = SpHTML::str_2lower($this->c_controller);
	 $this->c_action = HTML::chars(Request::current()->action());


	       $this->breadcrumb[] = array('name' => __('Dashboard'), 'link' => URL::base().ADMINURL);
	       $this->breadcrumb[] = array('name' => Kohana::$config->load($this->clow_controller.'.mod_title'), 'link' => URL::base().ADMINURL.'/'.$this->clow_controller);	
	       $this->breadcrumb[] = ($this->c_action != 'index') ? 
		       array(
			   'name' => __($this->c_controller.'_'.$this->c_action), 
			   'link' => ADMINURL.'/'.$this->clow_controller
		       ) : 
		       array(
			   'name' => __($this->c_controller.'_index'),
			   'link' => ''
		       );
	
    }

    /* 
    public function after()
    {
	$this->template->editor = Ckeditor::instance();
	parent::after();
	 
    }
     */
 
} // End Common