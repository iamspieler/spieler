<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Admin_Info extends Controller_Admin {
 

    /*
     * Главная страница модуля
     * 
     * 
     * 
    */
    public function action_index()
    {

	     // инициализация массива с данными формы    
	     $info_list = array(
			'site_phone' => '',
			'site_phone1' => '',
			'site_phone2' => '',
			'site_email' => '',
			'site_address' => '',
			'site_address_full' => ''
	       );    
	       
	       $contact_time_cr = time();    // время последнего редактирования записи
	       $contact_secret = sha1(Kohana::$config->load('global.site_secret_form').$contact_time_cr); // секретное поле


		$info_list = Model::factory('Info')->ap_get_info();

					 
					 // заголовок, action и subaction формы
					 $form_title = __('Info_edit');
					 $form_action = 'post';
					 $form_sub_action = 'update';  

	       $content = View::factory('/Admin/'.$this->c_controller.'/Form')

		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('info_list', $info_list)
		       ->bind('mod_url', $this->clow_controller)
		       ->bind('mod_action', $form_action)
		       ->bind('sub_action', $form_sub_action)
		       ->bind('form_title', $form_title)
		       ->bind('contact_time_cr', $contact_time_cr)
		       ->bind('contact_secret', $contact_secret);



		       $breadcrumbs = View::factory('/Admin/Breadcrumbs')
				      -> set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));
		       



	       $this->template->content = $content;
	       $this->template->title_page = Kohana::$config->load($this->clow_controller.'.mod_title');

    }  
    
    
    /*
     * Сохранение / обновление контакта в базе
     * 
     * 
     * 
    */
    public function action_post()
    {

	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());

	       $info_list = array();


	       $_POST = Arr::map('trim', $this->request->post());
	       $_POST = Arr::map('SpHTML::unchars', $this->request->post());
	     
/*
	       $valid = Validation::factory($_POST);
	       $valid -> rule('site_phone', 'not_empty')
		      -> rule('pages_title', 'max_length', array(':value', 255))
		      -> rule('pages_url', 'max_length', array(':value', 255))
		      -> rule('pages_url', 'alpha_dash', array(':value', TRUE))	
		      -> rule('pages_url', 'alpha_dash', array(':value', TRUE))	    
		      -> rule('pages_seo_title', 'max_length', array(':value', 255))
		      -> rule('pages_date', 'date')
		      -> rule('pages_author_id', 'digit')
		      -> rule('pages_author', 'max_length', array(':value', 255))
		      -> rule('pages_activity', 'digit')
		      -> rule('pages_ismain', 'digit')
		      -> rule('pages_id', 'not_empty')
		      -> rule('pages_id', 'digit')
		      -> rule('pages_id', 'max_length', array(':value', 11))
		      -> rule('contact_time', 'digit')
		      -> rule('contact_secret', 'alpha_dash');
	*/       
	       

	       // если неверное значение в секретном поле - отправляем на главную модуля
	       /*
	       if(HTML::chars($_POST['contact_xhr']) !=  sha1(Kohana::$config->load('global.site_secret_form').HTML::chars($_POST['contact_time']))) {
		    $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/');
	       }
	       */
	       if(Request::current()->method() == Request::POST) {

			      
			      $upd_c = Model::factory('Info')->ap_upd_info(
				      $_POST
			      );
			    
				 if(isset($_POST['submit_form'])) {
				      $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/');
				      
				 }
				 else $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/');
			     



	       }
	       else {
		    $view = View::factory('Errors');
		    $view->errors = Debug::vars($valid->errors('validation', TRUE));
		    $this->template->content = $view;
		    $this->template->title_page = Kohana::$config->load($clow_controller.'.mod_title');
	       }



    } 

} // End Page