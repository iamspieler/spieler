<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Admin_Rooms extends Controller_Admin {
 

    /*
     * Главная страница модуля
     * 
     * 
     * 
    */
    public function action_index()
    {
	       $rooms_list = array();


	       $content = View::factory('/Admin/'.$this->c_controller.'/List')
		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('rooms_list', $rooms_list)
		       ->bind('mod_url', $this->clow_controller)
		       ->bind('main_menu', $main_menu);


		       $breadcrumbs = View::factory('/Admin/Breadcrumbs')
				       ->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));

		       $count_c = Model::factory('Rooms')->ap_count_list();
		       $total_items = $count_c[0]['total'];

		       $content->pagination = Pagination::factory(array('total_items' => $total_items));



		       $validate_page = Validation::factory($this->request->param());
		       $validate_page -> rule('page', 'not_empty')
				      -> rule('page', 'max_length', array(':value', 11))
				      -> rule('page', 'digit');

		       $cur_page = (($validate_page -> check())) ? $validate_page['page'] : '1';

	       $rooms_list = Model::factory('Rooms')->ap_get_list($cur_page);

	       $this->template->content = $content;
	       $this->template->title_page = Kohana::$config->load($this->clow_controller.'.mod_title');

    }  
    
    /*
     * Группы (категории)
     * 
     * 
     * 
    */
    public function action_sections()
    {
	   	   $sections_list = array();

	       $content = View::factory('/admin/'.$this->c_controller.'/sections_list')
		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('sections_list', $sections_list)
		       ->bind('mod_url', $this->clow_controller)
		       ->bind('main_menu', $main_menu);



		       $breadcrumbs = View::factory('/admin/breadcrumbs')
				       ->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));

	       $sections_list = Model::factory('Pages')->ap_get_sections();

	       $this->template->content = $content;
	       $this->template->title_page = Kohana::$config->load($this->clow_controller.'.mod_title');

    } 
    
 
    
    
    /*
     * Форма создания / редактирования контакта
     * 
     * 
     * 
    */
    public function action_rooms_form()
    {

	     // инициализация массива с данными формы    
	     $rooms_list = array(
			'room_title' => '',
			'room_url' => '',
			'room_text' => '',
			'room_text_full' => '',
			'room_seo_title' => '',
			'room_seo_descr' => '',
			'room_seo_keywords' => '',
			'room_author_id' => '',
			'room_author' => '',
			'room_date' => date('d.m.Y H:i:s'),
			'room_pos' => '',
			'room_cost' => '',
			'room_cost_old' => '',
			'pages_status' => ''
	       ); 
	       
	       $photos_list = array();
	       
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
				    $room_id = $validate_param['id']; // id записи для извлечения из базы
				    $action = $validate_param['act'];	 // определяяем action - добавление или редактирование
				    
				    // если определен id записи и не равен нулю
				    if($room_id != 0) {
					 $rooms_list = Model::factory('Rooms')->ap_get_profile($room_id); // выборка контакта из БД
					 
					 $photos_list = Model::factory('Rooms')->ap_get_photos('rooms', $room_id);
					 
					 $users_list = Model::factory('Users')->get_list_short(); // выборка контакта из БД
	
					 $activity_flag = ($rooms_list['room_status'] != 0) ? TRUE : FALSE;   // определяем активность в форме
										 
					 $url_change = TRUE;   // определяем активность в форме
					 
					 // заголовок, action и subaction формы
					 $form_title = __('Rooms_edit');
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
				    
				    $room_id = 0;
				    
				    $photos_list = array();

				    $users_list = Model::factory('Users')->get_list_short();
				    
				    $url_change = FALSE;   // определяем активность в форме
				    
				    // заголовок, action и subaction формы
				    $form_title = __('Rooms_add');
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
		       ->bind('rooms_list', $rooms_list)
		       ->bind('photos_list', $photos_list)
		       ->bind('url_change', $url_change)
		       ->bind('activity_flag', $activity_flag)
		       ->bind('mod_url', $this->clow_controller)
		       ->bind('mod_action', $form_action)
		       ->bind('sub_action', $form_sub_action)
		       ->bind('form_title', $form_title)
		       ->bind('room_id', $room_id)
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
    public function action_rooms_post()
    {

	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());

	       $rooms_list = array();
	       $c_photo = '';


	       $_POST = Arr::map('trim', $this->request->post());
	       $_POST = Arr::map('SpHTML::unchars', $this->request->post());
	       
	       $p_upload_path = DOCROOT.'media/photo/';
	       
	       if(isset($_FILES) and (trim($_FILES['room_photo']['name']) != '')) {
			      $valid_thumb = Validation::factory($_FILES)
				   ->rule('roo_photo', 'Upload::valid')
				   ->rule('room_photo', 'Upload::not_empty')
				   ->rule('room_photo', 'Upload::type',  array(':value', array('jpg','png','gif')))
				   ->rule('room_photo', 'Upload::size', array(':value', '1M'));

			  if ($valid_thumb->check())
			  {
				  // Успешная валидация
				  $filename_thumb = Upload::save($_FILES['room_photo'], time().'.'.pathinfo($_FILES['room_photo']['name'], PATHINFO_EXTENSION), DOCROOT.'/media/photo/', 0777);
				  // имя большой картинки
				  $picture_name = time();
				  // имя превью
				  $picture_name_smp = $picture_name.'_smp.';
				  $picture_name_md = $picture_name.'_mdm.';
				  // расширение картинок
				  $picture_ext = strtolower(pathinfo($_FILES['room_photo']['name'], PATHINFO_EXTENSION));

				  // ширина превью
				  $picture_name_sm_w = Kohana::$config->load($this->clow_controller.'.mod_nps_w');
				  // высота превью
				  $picture_name_sm_h = Kohana::$config->load($this->clow_controller.'.mod_nps_h');
				  

				  // проверяем, существует ли папка, если нет, создаем
				  if(!file_exists($p_upload_path)) mkdir($p_upload_path, 0700, TRUE);
				  else chmod($p_upload_path, 0700);
					  
				   
				   // ресайз маленькой картинки
				   $picture_small = Image::factory($filename_thumb);
				   // Подсчитываем соотношение сторон картинки
				   $ratio = $picture_small->width / $picture_small->height;
				   // Соотношение сторон нужных размеров
				   $original_ratio = $picture_name_sm_w / $picture_name_sm_h;
				   // Размеры, до которых обрежем картинку до масштабирования
				   $crop_width = $picture_small->width;
				   $crop_height = $picture_small->height;
				  
				   // Смотрим соотношения
				   if($ratio > $original_ratio)
				   {
					// Если ширина картинки слишком большая для пропорции, то будем обрезать по ширине
					$crop_width = round($original_ratio * $crop_height);
				   }
				   else
				   {
					// Либо наоборот, если высота картинки слишком большая для пропорции, то обрезать будем по высоте
					$crop_height = round($crop_width / $original_ratio);
				   }
				   // Обрезаем по высчитанным размерам до нужной пропорции
				   $picture_small->crop($crop_width, $crop_height);
				   // Масштабируем картинку то точных размеров
				   $picture_small->resize($picture_name_sm_w, $picture_name_sm_h, Image::NONE);
				   // Сохраняем изображение в файл
				   $picture_small->save($p_upload_path.$picture_name_smp.$picture_ext, 80);
				   
				   
				   
				   
				   
				   
				  // ширина средней картинки
				  $picture_name_m_w = Kohana::$config->load($this->clow_controller.'.mod_npp_w');
				  // высота превью
				  $picture_name_m_h = Kohana::$config->load($this->clow_controller.'.mod_npp_h');
				  

				  // проверяем, существует ли папка, если нет, создаем
				  if(!file_exists($p_upload_path)) mkdir($p_upload_path, 0700, TRUE);
				  else chmod($p_upload_path, 0700);
					  
				   
				   // ресайз маленькой картинки
				   $picture_medium = Image::factory($filename_thumb);
				   // Подсчитываем соотношение сторон картинки
				   $ratio = $picture_medium->width / $picture_medium->height;
				   // Соотношение сторон нужных размеров
				   $original_ratio = $picture_name_m_w / $picture_name_m_h;
				   // Размеры, до которых обрежем картинку до масштабирования
				   $crop_width = $picture_medium->width;
				   $crop_height = $picture_medium->height;
				  
				   // Смотрим соотношения
				   if($ratio > $original_ratio)
				   {
					// Если ширина картинки слишком большая для пропорции, то будем обрезать по ширине
					$crop_width = round($original_ratio * $crop_height);
				   }
				   else
				   {
					// Либо наоборот, если высота картинки слишком большая для пропорции, то обрезать будем по высоте
					$crop_height = round($crop_width / $original_ratio);
				   }
				   // Обрезаем по высчитанным размерам до нужной пропорции
				   $picture_medium->crop($crop_width, $crop_height);
				   // Масштабируем картинку то точных размеров
				   $picture_medium->resize($picture_name_m_w, $picture_name_m_h, Image::NONE);
				   // Сохраняем изображение в файл
				   $picture_medium->save($p_upload_path.$picture_name_md.$picture_ext, 80);


				  unlink($filename_thumb);
				  chmod(DOCROOT.'/media/photo/', 0700);
				  chmod($p_upload_path, 0700);
				  
				  $photo_picture_small = $picture_name_smp.$picture_ext;
				  $photo_picture_medium = $picture_name_md.$picture_ext;
				  $photo_picture_big = $picture_name.$picture_ext;

				  

				  
			  }
			  else
			  {
				  // Вывод ошибки
				  $this->errors = $valid_image->errors('upload');
				  print_r($this->errors);
			  }
	       }


	       $valid = Validation::factory($_POST);
	       $valid -> rule('room_title', 'not_empty')
		      -> rule('room_title', 'max_length', array(':value', 255))
		      -> rule('room_url', 'max_length', array(':value', 255))
		      -> rule('room_url', 'alpha_dash', array(':value', TRUE))	
		      -> rule('room_url', 'alpha_dash', array(':value', TRUE))	    
		      -> rule('room_seo_title', 'max_length', array(':value', 255))
		      -> rule('room_date', 'date')
		      -> rule('room_author_id', 'digit')
		      -> rule('room_author', 'max_length', array(':value', 255))
		      -> rule('room_activity', 'digit')
		      -> rule('room_id', 'not_empty')
		      -> rule('room_id', 'digit')
		      -> rule('room_id', 'max_length', array(':value', 11))
		      -> rule('contact_time', 'digit')
		      -> rule('contact_secret', 'alpha_dash');
	       
	       
	       $n_activity = (isset($_POST['room_activity']) and ($_POST['room_activity'] == '1')) ? 1 : 0;
	       
	       $_POST['room_date'] = Date::formatted_time($_POST['room_date'], 'Y-m-d H:i:s');
	       
	       // Типографирование для текстовых полей
	       $_POST['room_title'] = SpHTML::typo($_POST['room_title']);

	       
	       if(isset($_POST['room_url']))  $room_url = $_POST['room_url'];
	       else $room_url = $_POST['room_url_old'];
	    
	       
	       
	       if(!isset($_POST['room_url'])) {
		    if(isset($_POST['room_url_old'])) {
			 if(!Model::factory('Rooms')->ap_check_rooms_url($_POST['room_url_old'], $_POST['room_id'])) $room_url = $_POST['room_url_old'];
			 else $room_url = $_POST['room_url_old'].time();
		    }
		    else $room_url = SpHTML::translit($_POST['rooms_title']);
	       }
	       else {
		    if(!Model::factory('Rooms')->ap_check_rooms_url($_POST['room_url_old'], $_POST['room_id'])) $room_url = $_POST['room_url'];
		    else $room_url = $_POST['room_url_old'].time();
	       }
	      
	  
	       
	       
	       // если неверное значение в секретном поле - отправляем на главную модуля
	       if(HTML::chars($_POST['contact_xhr']) !=  sha1(Kohana::$config->load('global.site_secret_form').HTML::chars($_POST['contact_time']))) {
		    $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/');
	       }

	       if(Request::current()->method() == Request::POST && $valid->check()) {
			 if(HTML::chars($_POST['action_type']) == 'update') {
			      
			      $upd_c = Model::factory('Rooms')->ap_rooms_upd(
				      $_POST,$room_url,$n_activity
			      );
			     
				 if(isset($_POST['submit_form'])) {
				      
				      if(isset($photo_picture_small)) {
					     $add_photo = Model::factory('Rooms')->ap_photo_add(
						  $_POST['room_id'], $photo_picture_small, $photo_picture_medium, $photo_picture_big
					     );
					     if(!$add_photo) exit('photo_upload_error');
				      }
				      
				      if(isset($_POST['deletephoto'])) {
					   foreach($_POST['deletephoto'] as $photod) {
						$del_photo = Model::factory('Rooms')->ap_photo_delete(
						  $photod
						);
						if(!$del_photo) exit('photo_upload_error');
					   }  
				      }
				      
				      $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/edit/'.$_POST['room_id'].'/');
				      
				 }
				 else $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/');
			     
			      
			 }
			 elseif(HTML::chars($_POST['action_type']) == 'new') {
			      
			      $add_c = Model::factory('Rooms')->ap_rooms_add(
				      $_POST, $room_url, $n_activity
			      );
			      if($add_c) {
				 if(isset($_POST['submit_form'])) {
				      
				      if(isset($photo_picture_small)) {
					     $add_photo = Model::factory('Rooms')->ap_photo_add(
						  $add_c[0], $photo_picture_small, $photo_picture_medium, $photo_picture_big
					     );
					     if(!$add_photo) exit('photo_upload_error');
				      }
				      
				      if(isset($_POST['deletephoto'])) {
					   foreach($_POST['deletephoto'] as $photod) {
						$del_photo = Model::factory('Rooms')->ap_photo_delete(
						  $photod
						);
						if(!$del_photo) exit('photo_upload_error');
					   }    
				      }
				      
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

} // End Page