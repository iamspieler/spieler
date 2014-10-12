<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Admin_Blocks extends Controller_Admin {
 

    /*
     * Главная страница модуля
     * 
     * 
     * 
    */
    public function action_index()
    {
	       $blocks_list = array();


	       $content = View::factory('/Admin/'.$this->c_controller.'/List')
		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('blocks_list', $blocks_list)
		       ->bind('mod_url', $this->clow_controller)
		       ->bind('main_menu', $main_menu);


		       $breadcrumbs = View::factory('/Admin/Breadcrumbs')
				       ->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));

		       $count_c = Model::factory('Blocks')->ap_count_list();
		       $total_items = $count_c[0]['total'];

		       $content->pagination = Pagination::factory(array('total_items' => $total_items));



		       $validate_page = Validation::factory($this->request->param());
		       $validate_page -> rule('page', 'not_empty')
				      -> rule('page', 'max_length', array(':value', 11))
				      -> rule('page', 'digit');

		       $cur_page = (($validate_page -> check())) ? $validate_page['page'] : '1';

	       $blocks_list = Model::factory('Blocks')->ap_get_list($cur_page);

	       $this->template->content = $content;
	       $this->template->title_page = Kohana::$config->load($this->clow_controller.'.mod_title');

    }  
    
  
    
    /*
     * Форма создания / редактирования контакта
     * 
     * 
     * 
    */
    public function action_blocks_form()
    {

	     // инициализация массива с данными формы    
	     $blocks_list = array(
			'block_title' => '',
			'block_type' => '',
			'block_text' => '',
			'block_photo' => '',
			'block_link' => '',
			'block_link_text' => '',
			'block_pos' => '0',
			'block_status' => ''
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
				    $block_id = $validate_param['id']; // id записи для извлечения из базы
				    $action = $validate_param['act'];	 // определяяем action - добавление или редактирование
				    

				    // если определен id записи и не равен нулю
				    if($block_id != 0) {
					 $blocks_list = Model::factory('Blocks')->ap_get_profile($block_id); // выборка контакта из БД
	
					 $activity_flag = ($blocks_list['block_status'] != 0) ? TRUE : FALSE;   // определяем активность в форме
					 
					 // заголовок, action и subaction формы
					 $form_title = __('Blocks_edit');
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
				    
				    $block_id = 0;
				    
				    // заголовок, action и subaction формы
				    $form_title = __('Blocks_add');
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
		       ->bind('blocks_list', $blocks_list)
		       ->bind('activity_flag', $activity_flag)
		       ->bind('mod_url', $this->clow_controller)
		       ->bind('mod_action', $form_action)
		       ->bind('sub_action', $form_sub_action)
		       ->bind('form_title', $form_title)
		       ->bind('block_id', $block_id)
		       ->bind('authors_list', $users_list)
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
    public function action_blocks_post()
    {

	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());

	       $blocks_list = array();
	       $b_photo = '';

	       $_POST = Arr::map('trim', $this->request->post());
	       $_POST = Arr::map('SpHTML::unchars', $this->request->post());
	     

	       $valid = Validation::factory($_POST);
	       $valid -> rule('block_title', 'not_empty')
		      -> rule('block_title', 'max_length', array(':value', 255))
		      -> rule('block_type', 'max_length', array(':value', 255))
		      -> rule('block_type', 'alpha_dash', array(':value', TRUE))	
		      -> rule('block_activity', 'digit')
		      -> rule('block_id', 'not_empty')
		      -> rule('block_id', 'digit')
		      -> rule('block_pos', 'not_empty')
		      -> rule('block_pos', 'digit')
		      -> rule('block_id', 'max_length', array(':value', 11))
		      -> rule('contact_time', 'digit')
		      -> rule('contact_secret', 'alpha_dash');
	       
	       
	       $b_activity = (isset($_POST['block_activity']) and ($_POST['block_activity'] == '1')) ? 1 : 0;

	       
	       // Типографирование для текстовых полей
	       $_POST['block_title'] = SpHTML::typo($_POST['block_title']);
	       
	
	       // если неверное значение в секретном поле - отправляем на главную модуля
	       if(HTML::chars($_POST['contact_xhr']) !=  sha1(Kohana::$config->load('global.site_secret_form').HTML::chars($_POST['contact_time']))) {
		    $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/');
	       }
	       
	       
	       // Создание объекта валидации
               if(isset($_FILES) and (trim($_FILES['block_photo']['name']) != '')) {
			 
			 $valid_image = Validation::factory($_FILES);
			 $valid_image->rule('block_photo','Upload::size',array(':value', '2M'));
			 $valid_image->rule('block_photo','Upload::type',array(':value', array('jpg', 'png', 'gif')));	 
			 $valid_image->rule('block_photo','Upload::valid');

			  if ($valid_image->check())
			  {
				  // Успешная валидация
				  $filename = Upload::save($_FILES['block_photo'], time().pathinfo($_FILES['block_photo']['name'], PATHINFO_EXTENSION), DOCROOT.'/media/blocks/', 0777);
				  $newname = time().'.'.pathinfo($_FILES['block_photo']['name'], PATHINFO_EXTENSION);
				  // Ресайз изображения с помощью класса Image
				  Image::factory($filename)
					   ->resize(400, 450, Image::WIDTH)
					   ->save(DOCROOT.'/media/blocks/'.$newname);
				  $b_photo = $newname;
				  unlink($filename);
			  }
			  else
			  {
				  // Вывод ошибки
				  $this->errors = $valid_image->errors('upload');
				  print_r($this->errors);
			  }
	       }
	       //else $b_photo = HTML::chars($_POST['block_photo_old']);
	       else $b_photo = '';
	       
	       if(Request::current()->method() == Request::POST && $valid->check()) {
			 if(HTML::chars($_POST['action_type']) == 'update') {
			      
			      $upd_c = Model::factory('Blocks')->ap_blocks_upd(
				      $_POST,$b_activity,$b_photo
			      );
			      if($upd_c) {
				 if(isset($_POST['submit_form'])) {
				      $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/edit/'.$_POST['block_id'].'/');
				      
				 }
				 else $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/');
			      }
			      else throw new HTTP_Exception_404();
			      
			 }
			 elseif(HTML::chars($_POST['action_type']) == 'new') {
			      
			      $add_c = Model::factory('Blocks')->ap_blocks_add(
				      $_POST,$b_activity,$b_photo
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
    
    
    
    public function action_delete()
    {
	       $blocks_profile = array();

	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());
	       
		       $validate_id = Validation::factory($this->request->param());
		       $validate_id -> rule('id', 'not_empty')
				    -> rule('id', 'max_length', array(':value', 11))
				    -> rule('id', 'digit');

		       $block_id = (($validate_id -> check())) ? $validate_id['id'] : '0';


		       $blocks_profile = Model::factory('Blocks')->ap_blocks_delete($block_id); 
			   if($blocks_profile) {
					$this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/');
					exit();
				}
    } 

} // End Page