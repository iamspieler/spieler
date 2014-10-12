<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Admin_Menu extends Controller_Admin {
    /*
     * Главная страница модуля
     * 
     * 
     * 
    */
    public function action_index()
    {

	 $menu_list = array();
	 
	       $content = View::factory('/Admin/'.$this->c_controller.'/List')
		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('menu_list', $menu_list)
		       ->bind('mod_url', $this->clow_controller)
		       ->bind('main_menu', $main_menu);


		       $breadcrumbs = View::factory('/Admin/Breadcrumbs')
				       ->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));


	       $menu_list = Model::factory('Menu')->ap_get_list();

	       $this->template->content = $content;
	       $this->template->title_page = Kohana::$config->load($this->clow_controller.'.mod_title');

    }  
    
    
    public function action_pgselect()
    {
	  $_POST['action'] = HTML::chars($_POST['action']);
	  $_POST['menu_mod'] = HTML::chars($_POST['menu_mod']);
     
     switch ($_POST['action']){
     
        case "showCtrlPages":

		if($_POST['menu_mod'] == 'news') {
		     echo '<select name="item_mod_page" data-style="btn-info">';
		     echo '<option value="">-- '.__('No').' --</option>';
		     
		     $menu_opt = Model::factory('News')->ap_get_menu_list();
		     foreach ($menu_opt as $mn) {
			      echo '<option value="sections/'.$mn['section_url'].'">'.$mn['section_title'].'</option>';
		     };
		     
		     echo '</select>';
		}
		elseif($_POST['menu_mod'] == 'pages') {
		     echo '<select name="item_mod_page" data-style="btn-info">';
		     echo '<option value="">--'.__('No').' --</option>';
		     
		     $menu_opt = Model::factory('Pages')->ap_get_menu_list();
		     foreach ($menu_opt as $mn) {
			      echo '<option value="'.$mn['pages_url'].'">'.$mn['pages_title'].'</option>';
		     };
		     
		     echo '</select>';
		}
		elseif($_POST['menu_mod'] == 'brands') {
		     echo '<select name="item_mod_page" data-style="btn-info">';
		     echo '<option value="">-- '.__('No').' --</option>';
		     
		     $menu_opt = Model::factory('Brands')->ap_get_menu_list();
		     foreach ($menu_opt as $mn) {
			      echo '<option value="'.$mn['brand_url'].'">'.$mn['brand_title'].'</option>';
		     };
		     
		     echo '</select>';
		}
                else $menu_opt = '';
                
                break;

        
	  };
	  exit();
    }
    
    
    public function action_parentselect()
    {
	  $_POST['action'] = HTML::chars($_POST['action']);
	  $_POST['menu_id'] = HTML::chars($_POST['menu_id']);
     
     switch ($_POST['action']){
     
        case "showItems":

		     echo '<select name="item_parent" data-style="btn-info">';
		     echo '<option value="0">-- Нет --</option>';
		     
		     $menu_opt = Model::factory('Menu')->ap_get_parents_sel($_POST['menu_id']);
		     foreach ($menu_opt as $mn) {
			      echo '<option value="'.$mn['id_item'].'">'.$mn['item_title'].'</option>';
		     };
		     
		     echo '</select>';
		
                
                break;

        
	  };
	  exit();
    }
    
    /*
     * Форма создания / редактирования контакта
     * 
     * 
     * 
    */
    public function action_menu_form()
    {
	       // инициализация массива с данными формы    
	       $menu_list = array(
			'menu_pos' => '0',
			'menu_title' => '',
			'menu_status' => ''
	       );    
	       
	       // инициализация массива с данными формы    
	       $items_list = array();
	       
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
				    $menu_id = $validate_param['id']; // id записи для извлечения из базы
				    $action = $validate_param['act'];	 // определяяем action - добавление или редактирование
				    

				    // если определен id записи и не равен нулю
				    if($menu_id != 0) {
					 $menu_list = Model::factory('Menu')->ap_get_profile($menu_id); // выборка баннера из БД

					 $pos_list = Model::factory('Menu')->ap_get_pos(); // позиции баннеров
					 $items_list = Model::factory('Menu')->ap_get_items($menu_list['id_menu']); // позиции баннеров
					 
					 $activity_flag = ($menu_list['menu_status'] != 0) ? TRUE : FALSE;   // определяем активность в форме
					 
					 // заголовок, action и subaction формы
					 $form_title = __('Menu_edit');
					 $form_action = 'post';
					 $form_sub_action = 'update';
					
				    }
				    else $this->request->redirect(URL::site(NULL, TRUE).$this->clow_controller.'/');
				    
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

				    $activity_flag = TRUE;
				    
				    $menu_id = 0;

				    $pos_list = Model::factory('Menu')->ap_get_pos(); // позиции баннеров
				    
				    // заголовок, action и subaction формы
				    $form_title = __('Menu_add');
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
	       


	       $content = View::factory('/Admin/'.$this->c_controller.'/Form')

		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('menu_list', $menu_list)
		       ->bind('items_list', $items_list)
		       ->bind('activity_flag', $activity_flag)
		       ->bind('mod_url', $this->clow_controller)
		       ->bind('mod_action', $form_action)
		       ->bind('sub_action', $form_sub_action)
		       ->bind('form_title', $form_title)
		       ->bind('menu_id', $menu_id)
		       ->bind('pos_list', $pos_list)
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
    public function action_menu_post()
    {

	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());

	       $menu_list = array();

	       $_POST = Arr::map('trim', $this->request->post());
	       $_POST = Arr::map('SpHTML::unchars', $this->request->post());
	     

	       $valid = Validation::factory($_POST);
	       $valid -> rule('menu_title', 'not_empty')
		      -> rule('menu_title', 'max_length', array(':value', 255))
		      -> rule('menu_pos', 'not_empty')
		      -> rule('menu_pos', 'digit')
		      -> rule('menu_activity', 'digit')
		      -> rule('menu_id', 'not_empty')
		      -> rule('menu_id', 'digit')
		      -> rule('menu_id', 'max_length', array(':value', 11))
		      -> rule('contact_time', 'digit')
		      -> rule('contact_secret', 'alpha_dash');
	       
	       
	       $m_activity = (isset($_POST['menu_activity']) and ($_POST['menu_activity'] == '1')) ? 1 : 0;
	       
	       // Типографирование для текстовых полей
	       $_POST['menu_title'] = SpHTML::typo($_POST['menu_title']);


	       
	       
	       // если неверное значение в секретном поле - отправляем на главную модуля
	       if(HTML::chars($_POST['contact_xhr']) !=  sha1(Kohana::$config->load('global.site_secret_form').HTML::chars($_POST['contact_time']))) {
		    $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/');
	       }

	       if(Request::current()->method() == Request::POST && $valid->check()) {
			 if(HTML::chars($_POST['action_type']) == 'update') {
			      
			      $upd_c = Model::factory('Menu')->ap_menu_upd(
				      $_POST,$m_activity
			      );
			      if($upd_c) {
				 if(isset($_POST['submit_form'])) {
				      $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/edit/'.$_POST['menu_id'].'/');
				      
				 }
				 else $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/');
			      }
			      else throw new HTTP_Exception_404();
			      
			 }
			 elseif(HTML::chars($_POST['action_type']) == 'new') {
			      
			      $add_c = Model::factory('Menu')->ap_menu_add(
				      $_POST,$m_activity
			      );
			      if($add_c) {
				 if(isset($_POST['submit_form'])) {
				      $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/edit/'.$add_c[0].'/');
				 }
				 else $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/');
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
    
    public function action_menu_delete()
    {
	       $menu_profile = array();

	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());
	       
		       $validate_id = Validation::factory($this->request->param());
		       $validate_id -> rule('id', 'not_empty')
				    -> rule('id', 'max_length', array(':value', 11))
				    -> rule('id', 'digit');

		       $menu_id = (($validate_id -> check())) ? $validate_id['id'] : '0';


		       $menu_profile = Model::factory('Menu')->ap_menu_delete($menu_id); 
			   if($menu_profile) {
					$this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/');
					exit();
				}
    } 
    
    
    
    public function action_items_list()
    {
	       $items_list = array();


	       $content = View::factory('/Admin/'.$this->c_controller.'/Items_List')
		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('pos_list', $pos_list)
		       ->bind('mod_url', $this->clow_controller)
		       ->bind('group_active', $group_active)
		       ->bind('main_menu', $main_menu);

	       
		       $breadcrumbs = View::factory('/Admin/Breadcrumbs')
				       ->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));



	       $pos_list = Model::factory('Banners')->ap_get_pos();

	       $this->template->content = $content;
	       $this->template->title_page = Kohana::$config->load($this->clow_controller.'.mod_title');

    }  
    
    /*
     * Форма создания / редактирования контакта
     * 
     * 
     * 
    */
    public function action_items_form()
    {
	       // инициализация массива с данными формы    
	       $item_list = array(
			'menu_id' => '0',
			'item_title' => '',
			'item_url' => '',
			'item_mod' => '',
			'item_pid' => '',
			'item_sort' => '0'
	       );    
	       
	       // инициализация массива с данными формы    
	       //$items_list = array();
	       
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
				    $item_id = $validate_param['id']; // id записи для извлечения из базы
				    $action = $validate_param['act'];	 // определяяем action - добавление или редактирование
				    

				    // если определен id записи и не равен нулю
				    if($item_id != 0) {
					 $item_list = Model::factory('Menu')->ap_item_profile($item_id); // выборка баннера из БД
					 $content_list = Form::select('item_mod_page', Model::factory('Menu')->ap_get_content_sel($item_list['item_mod']), $item_list['item_url'], array('data-style' => 'btn-info'));
					 $parents_list = Form::select('item_parent', Model::factory('Menu')->ap_get_parents_sel($item_list['menu_id'], $item_list['id_item']), $item_list['item_pid'], array('data-style' => 'btn-info'));
					 $menu_list = Model::factory('Menu')->ap_get_list_sel(); // позиции баннеров
					 
					 $h_phone_flag = ($item_list['item_hide_phone'] != 0) ? TRUE : FALSE;   // скрываем для мобильных
					 $h_desktop_flag = ($item_list['item_hide_desktop'] != 0) ? TRUE : FALSE;   // скрываем для десктопа

					 // заголовок, action и subaction формы
					 $form_title = __('Menu_item_edit');
					 $form_action = 'post';
					 $form_sub_action = 'update';
					
				    }
				    else $this->request->redirect(URL::site(NULL, TRUE).$this->clow_controller.'/');
				    
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
				    
				    $item_id = 0;

				    $parents_list = Form::select('item_parent', Model::factory('Menu')->ap_get_parents_sel(1), '', array('id' => 'content_parent', 'data-style' => 'btn-info'));
				    $content_list = '';
				    $menu_list = Model::factory('Menu')->ap_get_list_sel();
				    
				    $h_phone_flag = FALSE;   // скрываем для мобильных
				    $h_desktop_flag = FALSE;   // скрываем для десктопа
				    
				    // заголовок, action и subaction формы
				    $form_title = __('Menu_item_add');
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

	       $get_ctrl = array('pages' => __('Pages'),'feedback' => __('Feedback'),'rooms' => __('Rooms'));

	       /* TODO !!!! change array to array of controllers */
	       $ctrl_list = Arr::unshift($get_ctrl, 'home', ' '.__('Home').' ');

	       $content = View::factory('/Admin/'.$this->c_controller.'/Items_Form')

		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('item_list', $item_list)
		       ->bind('menu_list', $menu_list)
		       ->bind('parent_list', $parents_list)
		       ->bind('ctrl_list', $ctrl_list)
		       ->bind('content_list', $content_list)
		       ->bind('h_phone_flag', $h_phone_flag)
		       ->bind('h_desktop_flag', $h_desktop_flag)
		       ->bind('mod_url', $this->clow_controller)
		       ->bind('mod_action', $form_action)
		       ->bind('sub_action', $form_sub_action)
		       ->bind('form_title', $form_title)
		       ->bind('item_id', $item_id)
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
    public function action_items_post()
    {
	 
	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());

	       $item_list = array();

	       $_POST = Arr::map('trim', $this->request->post());
	       $_POST = Arr::map('SpHTML::unchars', $this->request->post());
	       

	       $valid = Validation::factory($_POST);
	       $valid -> rule('item_title', 'not_empty')
		      -> rule('item_title', 'max_length', array(':value', 250))
		      -> rule('item_pos', 'not_empty')
		      -> rule('item_pos', 'digit')
		      -> rule('item_mod', 'not_empty')
		      -> rule('item_mod', 'max_length', array(':value', 250))
		      -> rule('item_mod_page', 'max_length', array(':value', 1000))
		      -> rule('item_menu', 'not_empty')
		      -> rule('item_menu', 'digit')
		      -> rule('item_hide_phone', 'digit')
		      -> rule('item_hide_desktop', 'digit')
		      -> rule('item_parent', 'not_empty')
		      -> rule('item_parent', 'digit')
		      -> rule('item_parent', 'max_length', array(':value', 11))
		      -> rule('item_id', 'not_empty')
		      -> rule('item_id', 'digit')
		      -> rule('item_id', 'max_length', array(':value', 11))
		      -> rule('contact_time', 'digit')
		      -> rule('contact_secret', 'alpha_dash');
	       
	       // Типографирование для текстовых полей
	       $_POST['item_title'] = SpHTML::typo($_POST['item_title']);
	       $_POST['item_mod_page'] = !isset($_POST['item_mod_page']) ? '' : HTML::chars($_POST['item_mod_page']);
	       
	       $h_phone = (isset($_POST['item_hide_phone']) and ($_POST['item_hide_phone'] == '1')) ? 1 : 0;
	       $h_desktop = (isset($_POST['item_hide_desktop']) and ($_POST['item_hide_desktop'] == '1')) ? 1 : 0;

	       
	       
	       // если неверное значение в секретном поле - отправляем на главную модуля
	       if(HTML::chars($_POST['contact_xhr']) !=  sha1(Kohana::$config->load('global.site_secret_form').HTML::chars($_POST['contact_time']))) {
		    $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/');
	       }

	       if(Request::current()->method() == Request::POST && $valid->check()) {
			 if(HTML::chars($_POST['action_type']) == 'update') {
			      
			      $upd_c = Model::factory('Menu')->ap_menu_items_upd(
				      $_POST, $h_phone, $h_desktop
			      );
			      if($upd_c) {
				 if(isset($_POST['submit_form'])) {
				      $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/items/edit/'.$_POST['item_id'].'/');
				      
				 }
				 else $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/edit/'.$_POST['item_menu'].'/');
			      }
			      else throw new HTTP_Exception_404();
			      
			 }
			 elseif(HTML::chars($_POST['action_type']) == 'new') {
			      
			      $add_c = Model::factory('Menu')->ap_menu_items_add(
				      $_POST, $h_phone, $h_desktop
			      );
			      if($add_c) {
				 if(isset($_POST['submit_form'])) {
				      $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/items/edit/'.$add_c[0].'/');
				 }
				 else $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/');
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
     * Форма создания / редактирования позиции
     * 
     * 
     * 
    */
    public function action_positions_form()
    {

	     // инициализация массива с данными формы    
	     $pos_list = array(
			
			 'pos_title' => '',
			'pos_text' => ''
	       );    
	       
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
				    $pos_id = $validate_param['id']; // id записи для извлечения из базы
				    $action = $validate_param['act'];	 // определяяем action - добавление или редактирование
				    

				    // если определен id записи и не равен нулю
				    if($pos_id != 0) {
					 $pos_list = Model::factory('Banners')->ap_get_sections($pos_id); // выборка информации о позиции из БД
					 $pos_list = $pos_list[0];
					 
					 $activity_flag = ($pos_list['pos_status'] != 0) ? TRUE : FALSE;   // определяем активность в форме
					 
					 $posid = $pos_list['id_pos'];

					 // заголовок, action и subaction формы
					 $form_title = __('Position_edit');
					 $form_action = 'post';
					 $form_sub_action = 'update';
					
				    }
				    else $this->request->redirect(URL::site(NULL, TRUE).$this->clow_controller.'/positions/');
				    
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
				    $activity_flag = TRUE;   // определяем активность в форме
				    
				    $posid = 0;
				    
				    // заголовок, action и subaction формы
				    $form_title = __('Position_add');
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
	       


	       $content = View::factory('/Admin/'.$this->c_controller.'/Positions_Form')

		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('pos_list', $pos_list)
		       ->bind('mod_action', $form_action)
		       ->bind('mod_url', $this->clow_controller)
		       ->bind('activity_flag', $activity_flag)
		       ->bind('sub_action', $form_sub_action)
		       ->bind('form_title', $form_title)
		       ->bind('pos_id', $posid)
		       ->bind('contact_time_cr', $contact_time_cr)
		       ->bind('contact_secret', $contact_secret);



		       $breadcrumbs = View::factory('/Admin/Breadcrumbs')
				      -> set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));
		       



	       $this->template->content = $content;
	       $this->template->title_page = Kohana::$config->load($this->clow_controller.'.mod_title');

    }  
    
     
    /*
     * Сохранение / обновление группы в базе
     * 
     * 
     * 
    */
    public function action_positions_post()
    {

	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());


	       
	       $_POST = Arr::map('trim', $this->request->post());
	       $_POST = Arr::map('SpHTML::unchars', $this->request->post());
	       
	       
  

	       $valid = Validation::factory($_POST);
	       $valid -> rule('pos_title', 'not_empty')
		      -> rule('pos_title', 'max_length', array(':value', 255))
		      -> rule('pos_id', 'not_empty')
		      -> rule('pos_id', 'digit')
		      -> rule('contact_time', 'digit')
		      -> rule('contact_secret', 'alpha_dash');
	       


	       

	       
	       // Типографирование для текстовых полей
	       $_POST['pos_title'] = SpHTML::typo($_POST['pos_title']);
	       $_POST['pos_descr'] = SpHTML::typo($_POST['pos_descr']);
		   
	       // если неверное значение в секретном поле - отправляем на главную модуля
	       if(HTML::chars($_POST['contact_xhr']) !=  sha1(Kohana::$config->load('global.site_secret_form').HTML::chars($_POST['contact_time']))) {
		    $this->request->redirect(URL::site(NULL, TRUE).$clow_controller.'/');
	       }
	       
	       

	       if(Request::current()->method() == Request::POST && $valid->check()) {
			 if(HTML::chars($_POST['action_type']) == 'update') {

			      $upd_c = Model::factory('Banners')->ap_sections_upd(
				      $_POST,$section_url
			      );
			    
				 if(isset($_POST['submit_form'])) {
				      $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/sections/edit/'.$_POST['section_id'].'/');
				      
				 }
				 else $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/sections/');

			      
			 }
			 elseif(HTML::chars($_POST['action_type']) == 'new') {
			      
			      $add_c = Model::factory('News')->ap_sections_add(
				      $_POST,$section_url
			      );
			      if($add_c) {
				 if(isset($_POST['submit_form'])) {
				      $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/sections/edit/'.$add_c[0].'/');
				 }
				 else $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/sections/');
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
    
    
    public function action_menu_items_delete()
    {
	       $items_profile = array();

	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());
	       
		       $validate_id = Validation::factory($this->request->param());
		       $validate_id -> rule('id', 'not_empty')
				    -> rule('id', 'max_length', array(':value', 11))
				    -> rule('id', 'digit');

		       $item_id = (($validate_id -> check())) ? $validate_id['id'] : '0';


		       $items_profile = Model::factory('Menu')->ap_items_delete($item_id); 
			   if($items_profile) {
					$this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/');
					exit();
				}
    } 
    
 


} // End Page