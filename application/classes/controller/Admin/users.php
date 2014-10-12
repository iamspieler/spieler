<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Admin_Users extends Controller_Admin {
 
    /*
     * Главная страница модуля
     * 
     * 
     * 
    */
    public function action_index()
    {
	 $arr = array(5, 4, 3);
	 if((!Auth::instance()->logged_in('manager')) and (!Auth::instance()->logged_in('admin')) and (!Auth::instance()->logged_in('root'))) $this->request->redirect(URL::site(NULL, TRUE));
	       $users_list = array();
	       
	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());


	       $breadcrumbs = View::factory('/Admin/Breadcrumbs')
				       ->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));

	     


	       $content = View::factory('/Admin/'.$this->c_controller.'/List')

		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('users_list', $users_list)
		       ->bind('roles_list', $users_list_roles)
		       ->bind('mod_url', $clow_controller)
		       ->bind('main_menu', $main_menu);


		       $total_items = Model::factory('Users')->count_users();

		       $content->pagination = Pagination::factory(array('total_items' => $total_items));



		       $validate_page = Validation::factory($this->request->param());
		       $validate_page -> rule('page', 'not_empty')
				      -> rule('page', 'max_length', array(':value', 11))
				      -> rule('page', 'digit');

		       $cur_page = (($validate_page -> check())) ? $validate_page['page'] : '1';

	       $users_list = Model::factory('Users')->get_list($cur_page);
	       $users_list_roles = Model::factory('Users')->get_roles_list();



	       $this->template->content = $content;
	       $this->template->title_page = Kohana::$config->load($clow_controller.'.mod_title');

    }  
    
    /*
     * Профиль контакта
     * 
     * 
     * 
    */
    public function action_profile()
    {
	       
	       if((!Auth::instance()->logged_in('manager')) and (!Auth::instance()->logged_in('admin')) and (!Auth::instance()->logged_in('root'))) $this->request->redirect(URL::site(NULL, TRUE));
	       
	       $user_profile = array();

	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());

	       
	       
	       $breadcrumbs = View::factory('/Admin/Breadcrumbs')
				       ->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));

	     



	       $content = View::factory('/Admin/'.$this->c_controller.'/Profile')
		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('profile', $user_profile)
		       ->bind('mod_url', $clow_controller)
		       ->bind('profile', $contacts_profile)       
		       //->bind('mod_url', $clow_controller)       
			       ;



		       $validate_id = Validation::factory($this->request->param());
		       $validate_id -> rule('id', 'not_empty')
				      -> rule('id', 'max_length', array(':value', 11))
				      -> rule('id', 'digit');

		       $user_id = (($validate_id -> check())) ? $validate_id['id'] : '1';


		       $contacts_profile = Model::factory('Users')->get_profile($user_id);
		 



	       $this->template->content = $content;
	       $this->template->title_page = Kohana::$config->load($clow_controller.'.mod_title');

    } 
    
    /*
     * Просмотр группы контактов
     * 
     * 
     * 
    */
    public function action_list_by_group()
    {
	
	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());
	       

	       $contacts_list = array();

	       $valid = Validation::factory($_POST);
	       $valid -> rule('group_url', 'not_empty')
		      -> rule('group_url', 'max_length', array(':value', 255))
		      -> rule('group_url', 'alpha_dash');
	       if ($valid -> check()) $this->request->redirect(URL::site(NULL, TRUE).$clow_controller.'/group/'.$_POST['group_url'].'/');



	       $validate_section = Validation::factory($this->request->param());
	       $validate_section -> rule('section', 'not_empty')
				 -> rule('section', 'max_length', array(':value', 255))
				 -> rule('section', 'alpha_dash');
	       $group_url = (($validate_section -> check())) ? $validate_section['section'] : NULL;


	   


	       $content = View::factory('/Admin/'.$this->c_controller.'/List')

		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('contacts_list', $contacts_list)
		       ->bind('groups_list_short', $contacts_list_groups)
		       ->bind('mod_url', $clow_controller)
		       ->bind('main_menu', $main_menu);



		       $breadcrumbs = View::factory('/Admin/Breadcrumbs')
				       ->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));

		       $validate_page = Validation::factory($this->request->param());
		       $validate_page -> rule('page', 'not_empty')
				      -> rule('page', 'max_length', array(':value', 11))
				      -> rule('page', 'digit');
		       $cur_page = (($validate_page -> check())) ? $validate_page['page'] : '1';



		       $contacts_list = Model::factory('Contacts')->get_list_by_group($cur_page,$group_url);
		       $contacts_list_groups = Model::factory('Contacts')->groups_list_short();


		       $count_c = Model::factory('Contacts')->count_list(HTML::chars($contacts_list[0]['group_id']));
		       $total_items = $count_c[0]['total'];

		       $content->pagination = Pagination::factory(array('total_items' => $total_items));


	       $this->template->content = $content;
	       $this->template->title_page = Kohana::$config->load($clow_controller.'.mod_title');

    }  
 
    
    
    /*
     * Форма создания / редактирования контакта
     * 
     * 
     * 
    */
    public function action_user_form()
    {
	 
	 if((!Auth::instance()->logged_in('admin')) and (!Auth::instance()->logged_in('root'))) $this->request->redirect(URL::site(NULL, TRUE));
	 

	 
	       $c_controller = HTML::chars(Request::current()->controller()); // текущий контроллер
	       $clow_controller = SpHTML::str_2lower($c_controller);  // контроллер в нижнем регистре для подстановки в url
	       $c_action = HTML::chars(Request::current()->action()); // текущий action

	       $users_list = array();     // инициализация массива с данными формы
	       
	       $contact_time_cr = time();    // время последнего редактирования записи
	       $contact_secret = sha1(Kohana::$config->load('global.site_secret_form').$contact_time_cr); // секретное поле
			  
	       /*
	       *  Редактирование записи
	       */
	       if(HTML::chars($this->request->param('act')) == 'edit') {
		    
		    // валидация параметров адресной строки
		    $validate_param = Validation::factory($this->request->param());
		    $validate_param -> rule('act', 'not_empty')
				    -> rule('act', 'equals', array(':value', 'edit'))
				    -> rule('id', 'not_empty')
				    -> rule('id', 'digit');
		    

			      // валидация параметров адресной строки пройдена
			      if($validate_param -> check()) {
				   
				    $user_id = $validate_param['id']; // id записи для извлечения из базы
				    $action = $validate_param['act'];	 // определяяем action - добавление или редактирование
				    

				    // если определен id записи и не равен нулю
				    if($user_id != 0) {
					 $users_list = Model::factory('Users')->get_profile($user_id); // выборка контакта из БД
					 
					 $check_rights = Model::factory('Users')->get_user_roles($user_id);
					 //$message_alert = ((isset($check_rights[4]) and (!Auth::instance()->logged_in('root')))) or (isset($check_rights[5])) ? 'oops' : 'oll';

					 if(isset($check_rights[5])) {
					     $message_alert = __('Cannot_update_root');
					 }
					 
					 $user_info = ORM::factory('user', $user_id);
					 $user_roles = $user_info->roles->find_all()->as_array('id');
					 $users_roles_list = Model::factory('Users')->get_roles_list();
					 
					 // заголовок, action и subaction формы
					 $form_title = __('Edit_user');
					 $form_action = 'post';
					 $form_sub_action = 'update';
					
				    }
				    else $this->request->redirect(URL::site(NULL, TRUE).$clow_controller.'/');
				    
			      }
			      // валидация параметров адресной строки НЕ пройдена - выводим список ошибок (переделать для PRODUCTION
			      else {
				     $view = View::factory('Errors');
				     $view->errors = Debug::vars($validate_param->errors('validation', TRUE));
				     echo $view; 
				     exit();
			      }
			      
	       } 
	       /*
	       *  Создание новой записи
	       */
	       elseif(HTML::chars($this->request->param('act')) == 'add') {
		    

		    
		    
		    
		    // валидация параметров адресной строки
		    $validate_param = Validation::factory($this->request->param());
		    $validate_param -> rule('act', 'not_empty')
				    -> rule('act', 'equals', array(':value', 'add'));
		    
			      // валидация параметров адресной строки пройдена
			      if($validate_param -> check()) {
				    $action = HTML::chars($validate_param['act']);
				    
				    $user_id = 0;

				  
				    $user_roles = array(0, 1);
				    $users_roles_list = ORM::factory('user')->roles->find_all()->as_array('id', 'name');
				    
				    // заголовок, action и subaction формы
				    $form_title = __('Add_user');
				    $form_action = 'post';
				    $form_sub_action = 'new';
				    
			      }
			      else {
				     $view = View::factory('Errors');
				     $view->errors = Debug::vars($validate_param->errors('validation', TRUE));
				     echo $view;
				     exit();
			      }
		    
	       }
	       else throw new HTTP_Exception_404();
	       

	       $breadcrumbs = View::factory('/Admin/Breadcrumbs')
				       ->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));

	     



	       $content = View::factory('/Admin/'.$this->c_controller.'/Form')

		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('message_alert', $message_alert)
		       ->bind('users_list', $users_list)
		       ->bind('users_roles_list', $users_roles_list)
		       ->bind('user_roles', $user_roles)
		       ->bind('mod_url', $clow_controller)
		       ->bind('mod_action', $form_action)
		       ->bind('sub_action', $form_sub_action)
		       ->bind('form_title', $form_title)
		       ->bind('user_id', $user_id)
		       ->bind('contact_time_cr', $contact_time_cr)
		       ->bind('contact_secret', $contact_secret);




	       $this->template->content = $content;
	       $this->template->title_page = Kohana::$config->load($clow_controller.'.mod_title');

    }  
    
    
    /*
     * Сохранение / обновление контакта в базе
     * 
     * 
     * 
    */
    public function action_post()
    {
	 
	 if((!Auth::instance()->logged_in('admin')) and (!Auth::instance()->logged_in('root'))) $this->request->redirect(URL::site(NULL, TRUE));

	 

	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());

	       $users_list = array();

	       $_POST = Arr::map('trim', $this->request->post());
	       $_POST = Arr::map('SpHTML::unchars', $this->request->post());

                

	       $valid = Validation::factory($_POST);
	       $valid -> rule('username', 'not_empty')
		      -> rule('username', 'max_length', array(':value', 255))
		      -> rule('username', 'alpha_dash', array(':value', TRUE))
		      -> rule('password', 'max_length', array(':value', 255))
		      -> rule('password', 'alpha_dash', array(':value', TRUE))
		      -> rule('password_confirm', 'max_length', array(':value', 255))
		      -> rule('password_confirm', 'alpha_dash', array(':value', TRUE))
		      -> rule('password_confirm', 'matches', array(':validation', 'password_confirm', 'password'))
		      -> rule('email', 'not_empty')
		      -> rule('email', 'max_length', array(':value', 255))
		      -> rule('email', 'email')
		      -> rule('user_id', 'not_empty')
		      -> rule('user_id', 'max_length', array(':value', 11))
		      -> rule('user_id', 'digit')
		      -> rule('contact_time', 'not_empty')
		      -> rule('contact_time', 'digit')
		      -> rule('contact_xhr', 'not_empty')
		      -> rule('contact_xhr', 'alpha_dash');
	       

	       
	       
	       // если неверное значение в секретном поле - отправляем на главную модуля
	       if(HTML::chars($_POST['contact_xhr']) !=  sha1(Kohana::$config->load('global.site_secret_form').HTML::chars($_POST['contact_time']))) {
		    $this->request->redirect(URL::site(NULL, TRUE).$clow_controller.'/');
	       }

	       if(Request::current()->method() == Request::POST && $valid->check()) {
			 if(HTML::chars($_POST['action_type']) == 'update') {
			      
			      		 $check_rights = Model::factory('Users')->get_user_roles($_POST['user_id']);
					 if(isset($check_rights[5])) {
					     $message_alert = __('Cannot_update_root');
					     $view = View::factory('Errors');
					     $view->errors = $message_alert;
					     echo $view;
					     exit();
					 }
			      
			      $upd_c = Model::factory('Users')->user_upd(
				      $_POST
			      );
			      if($upd_c) {
				 if(isset($_POST['submit_form'])) {
				      $this->request->redirect(URL::site(NULL, TRUE).$clow_controller.'/edit/'.$_POST['user_id'].'/');
				      
				 }
				 else $this->request->redirect(URL::site(NULL, TRUE).$clow_controller.'/');
			      }
			      else throw new HTTP_Exception_404();
			      
			 }
			 elseif(HTML::chars($_POST['action_type']) == 'new') {
			      
			      $add_c = Model::factory('Users')->user_add(
				      $_POST
			      );
			      if($add_c) {
				 if(isset($_POST['submit_form'])) {
				      $this->request->redirect(URL::site(NULL, TRUE).$clow_controller.'/edit/'.$add_c.'/');
				 }
				 else $this->request->redirect(URL::site(NULL, TRUE).$clow_controller.'/');
			      }
			      else throw new HTTP_Exception_404();

			 }
			 else throw new HTTP_Exception_404();

	       }
	       else {
		    $view = View::factory('Errors');
		    $view->errors = Debug::vars($valid->errors('validation', TRUE));
		    $this->template->content = $view;
		    $this->template->title_page = Kohana::$config->load($clow_controller.'.mod_title');
	       }



    } 
    
    
    
    
    
    /*
     * Просмотр группы контактов
     * 
     * 
     * 
    */
    public function action_list_groups()
    {
	
	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());

	       $groups_list = array();
	       

	       $breadcrumbs = View::factory('/Admin/Breadcrumbs')
				       ->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));

	     



	       $content = View::factory('/Admin/'.$this->c_controller.'/Groups')

		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('groups_list', $groups_list)
		       ->bind('mod_url', $clow_controller)
		       ->bind('main_menu', $main_menu);



		       $breadcrumbs = View::factory('common/breadcrumbs')
				       ->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));

		       $validate_page = Validation::factory($this->request->param());
		       $validate_page -> rule('page', 'not_empty')
				      -> rule('page', 'max_length', array(':value', 11))
				      -> rule('page', 'digit');
		       $cur_page = (($validate_page -> check())) ? $validate_page['page'] : '1';



		       $groups_list = Model::factory('Contacts')->get_list_g($cur_page);


		       $count_g = Model::factory('Contacts')->count_list_groups();
		       $total_items = $count_g[0]['total'];

		       $content->pagination = Pagination::factory(array('total_items' => $total_items));


	       $this->template->content = $content;
	       $this->template->title_page = Kohana::$config->load($clow_controller.'.mod_title');

    }  
    
    /*
     * Форма создания / редактирования группы
     * 
     * 
     * 
    */
    public function action_group_form()
    {
	
	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());

	       $group_list = array();
	       
	       $contact_time_cr = time();    // время последнего редактирования записи
	       $contact_secret = sha1(Kohana::$config->load('global.site_secret_form').$contact_time_cr); // секретное поле
	       //
	       //
	       if(HTML::chars($this->request->param('act')) == 'edit') {
		    $validate_param = Validation::factory($this->request->param());
		    $validate_param -> rule('act', 'not_empty')
				    -> rule('act', 'equals', array(':value', 'edit'))
				    -> rule('id', 'not_empty')
				    -> rule('id', 'digit');
		    
		    
			      if($validate_param -> check()) {
				    $group_id = $validate_param['id'];
				    $action = $validate_param['act'];
				    
				    // заголовок, action и subaction формы
				    $form_title = __('Edit_group');
				    $form_action = 'post';
				    $form_sub_action = 'update';


				    if($group_id != 0) {
					 $group_list = Model::factory('Contacts')->get_list_g(1, $group_id);
					 
					 $url_change = TRUE;   // определяем активность в форме
				    }
				    else $this->request->redirect(URL::site(NULL, TRUE).$clow_controller.'/');
				    
			      }
			      else {
				     $view = View::factory('Errors');
				     $view->errors = Debug::vars($validate_param->errors('validation', TRUE));
				     echo $view;
				     exit();
			      }
			      
	       } 
	       elseif(HTML::chars($this->request->param('act')) == 'add') {
		    $validate_param = Validation::factory($this->request->param());
		    $validate_param -> rule('act', 'not_empty')
				    -> rule('act', 'equals', array(':value', 'add'));
		    if($validate_param -> check()) {
			  $action = HTML::chars($validate_param['act']);

			  
			  // заголовок, action и subaction формы
			  $form_title = __('Add_group');
			  $form_action = 'post';
			  $form_sub_action = 'new';
			  
			  $group_id = 0;
			  $contact_groups_list = Model::factory('Contacts')->get_groups_list();
			  
			  $url_change = FALSE;
		    }
		    else {
			   $view = View::factory('Errors');
			   $view->errors = Debug::vars($validate_param->errors('validation', TRUE));
			   echo $view;
			   exit();
		    }
		    
	       }
	       else throw new HTTP_Exception_404();
	      
	       
	       
	       $breadcrumbs = View::factory('/Admin/Breadcrumbs')
				       ->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));

	     



	       $content = View::factory('/Admin/'.$this->c_controller.'/Form_Group')
			 ->bind('breadcrumbs', $breadcrumbs)
			 ->bind('group_list', $group_list[0])
		         ->bind('url_change', $url_change)
			 ->bind('mod_url', $clow_controller)
			 ->bind('mod_action', $form_action)
			 ->bind('sub_action', $form_sub_action)
			 ->bind('form_title', $form_title)
			 ->bind('group_id', $group_id)	
			 ->bind('contact_time_cr', $contact_time_cr)
			 ->bind('contact_secret', $contact_secret);



		       $breadcrumbs = View::factory('/Admin/Breadcrumbs')
				       ->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));



	       // выводим контент
	       $this->template->content = $content;
	       $this->template->title_page = Kohana::$config->load($clow_controller.'.mod_title');

    }  
    
       /*
     * Сохранение / обновление группы в базе
     * 
     * 
     * 
    */
    public function action_group_post()
    {

	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());


	       
	       $_POST = Arr::map('trim', $this->request->post());
	       $_POST = Arr::map('SpHTML::unchars', $this->request->post());
	       
	       
  

	       $valid = Validation::factory($_POST);
	       $valid -> rule('group_title', 'not_empty')
		      -> rule('group_title', 'max_length', array(':value', 255))
		      -> rule('group_url', 'alpha_dash', array(':value', TRUE))	
		      -> rule('group_url', 'max_length', array(':value', 255))
		      -> rule('group_old_url', 'alpha_dash', array(':value', TRUE))	
		      -> rule('group_old_url', 'max_length', array(':value', 255))
		      -> rule('group_id', 'not_empty')
		      -> rule('group_id', 'digit')
		      -> rule('contact_time', 'digit')
		      -> rule('contact_secret', 'alpha_dash');
	       

	       

	       

	       
	       // Типографирование для текстовых полей
	       $_POST['group_title'] = SpHTML::typo($_POST['group_title']);
	       
	       // если неверное значение в секретном поле - отправляем на главную модуля
	       if(HTML::chars($_POST['contact_xhr']) !=  sha1(Kohana::$config->load('global.site_secret_form').HTML::chars($_POST['contact_time']))) {
		    $this->request->redirect(URL::site(NULL, TRUE).$clow_controller.'/');
	       }

	       if(Request::current()->method() == Request::POST && $valid->check()) {
			 if(HTML::chars($_POST['action_type']) == 'update') {
			      
			      $upd_c = Model::factory('Contacts')->group_upd(
				      $_POST
			      );
			      if($upd_c) {
				 if(isset($_POST['submit_form'])) {
				      $this->request->redirect(URL::site(NULL, TRUE).$clow_controller.'/sections/edit/'.$_POST['group_id'].'/');
				      
				 }
				 else $this->request->redirect(URL::site(NULL, TRUE).$clow_controller.'/');
			      }
			      else throw new HTTP_Exception_404();
			      
			 }
			 elseif(HTML::chars($_POST['action_type']) == 'new') {
			      
			      $add_c = Model::factory('Contacts')->group_add(
				      $_POST
			      );
			      if($add_c) {
				 if(isset($_POST['submit_form'])) {
				      $this->request->redirect(URL::site(NULL, TRUE).$clow_controller.'/sections/edit/'.$add_c[0].'/');
				 }
				 else $this->request->redirect(URL::site(NULL, TRUE).$clow_controller.'/');
			      }
			      else throw new HTTP_Exception_404();

			 }
			 else throw new HTTP_Exception_404();

	       }
	       else {
		    $view = View::factory('Errors');
		    $view->errors = Debug::vars($valid->errors('validation', TRUE));
		    $this->template->content = $view;
	       }



    } 
    


} // End Page