<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Admin_Feedback extends Controller_Admin {

     public function before() {
	    parent::before();

	    View::set_global('mod_url', $modurl = Kohana::$config->load(
		   'controllers.'.SpHTML::str_2lower(
			   HTML::chars(
				   Request::current()->controller()
			   )
		   )
	    ));
	    
	    View::set_global('articles_config', Kohana::$config->load('articles'));
	    
	    define('MOD_URL', $modurl);
	    
	    
    }

    /*
     * Главная страница модуля
     * 
     * 
     * 
    */
    public function action_index()
    {
	    $fb_list = array();
	    
	    $_GET = str_replace("/", "", $_GET);

	    $valid = Validation::factory($_GET);
	    $valid -> rule('status', 'not_empty')
		   -> rule('status', 'max_length', array(':value', 11))
		   -> rule('status', 'digit');
	    $group_active = (($valid -> check()) and ($_GET['status'] != 'null')) ? $_GET['status'] : NULL;


	    $content = View::factory('/Admin/'.$this->c_controller.'/List')
		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('fb_list', $fb_list)
		       ->bind('group_active', $group_active)
		       ->bind('main_menu', $main_menu);



		$breadcrumbs = View::factory('/Admin/Breadcrumbs')
				     ->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));

		$count_c = Model::factory('Feedback')->ap_count_list($group_active);
		$total_items = $count_c[0]['total'];

		$content->pagination = Pagination::factory(
			       array(
						'total_items' => $total_items,
						'items_per_page' => Kohana::$config->load($this->clow_controller.'.mod_ap_by_page')
			       )
		);
		




		$validate_page = Validation::factory($this->request->param());
		$validate_page -> rule('page', 'not_empty')
			       -> rule('page', 'max_length', array(':value', 11))
			       -> rule('page', 'digit');

		$cur_page = (($validate_page -> check())) ? $validate_page['page'] : '1';

	    
	    $fb_list = Model::factory('Feedback')->ap_get_list($cur_page, $group_active);
	    
	    $this->template->content = $content;
	    $this->template->title_page = Kohana::$config->load($this->clow_controller.'.mod_title');

    }  
    
 
    
    /*
     * Форма создания / редактирования вопроса
     * 
     * 
     * 
    */
    public function action_feedback_form()
    {

	     // инициализация массива с данными формы    
	     $news_list = array(
			'fb_title' => '',
			'fb_text' => '',
			'fb_author' => '',
			'fb_email' => '',
			'fb_phone' => '',
			'fb_answer_author' => '',
			'fb_answer' => '',
			'fb_post_date' => date('d.m.Y H:i:s'),
			'fb_post_date_hour' => date('H'),
			'fb_post_date_minute' => date('i'),
			'fb_answer_date' => date('d.m.Y H:i:s'),
			'fb_answer_date_hour' => date('H'),
			'fb_answer_date_minute' => date('i'),
			'fb_status' => '',
			'id_fb' => '',
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
				    $fb_id = $validate_param['id']; // id записи для извлечения из базы
				    $action = $validate_param['act'];	 // определяяем action - добавление или редактирование
				    

				    // если определен id записи и не равен нулю
				    if($fb_id != 0) {
					 $fb_list = Model::factory('Feedback')->ap_get_profile($fb_id); // выборка контакта из БД
					 
					 $users_list = Model::factory('Users')->get_list_short(); // выборка контакта из БД
	
					 $activity_flag = ($fb_list['fb_status'] != 0) ? TRUE : FALSE;   // определяем активность в форме
					 
					 // заголовок, action и subaction формы
					 $form_title = __('Feedback_edit');
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
				    
				    $fb_id = 0;
				    
				    $authors_list = Model::factory('Users')->get_list_short();
				    
				    // заголовок, action и subaction формы
				    $form_title = __('Feedback_add');
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
		       ->bind('fb_list', $fb_list)
		       ->bind('activity_flag', $activity_flag)
		       ->bind('mod_action', $form_action)
		       ->bind('sub_action', $form_sub_action)
		       ->bind('form_title', $form_title)
		       ->bind('fb_id', $fb_id)
		       ->bind('authors_list', $users_list)
		       ->bind('contact_time_cr', $contact_time_cr)
		       ->bind('contact_secret', $contact_secret);


		       $breadcrumbs = View::factory('/Admin/Breadcrumbs')
				      -> set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));
		       



	       $this->template->content = $content;
	       $this->template->title_page = Kohana::$config->load($this->clow_controller.'.mod_title');

    }  
    
    
    public function action_issue_month()
    {
	 $valid = Validation::factory($_GET);
	 $valid -> rule('issue_year', 'not_empty')
			   -> rule('issue_year', 'max_length', array(':value', 11))
			   -> rule('issue_year', 'digit');
	 $issue_year = (($valid -> check()) and ($_GET['issue_year'] != 'null')) ? $_GET['issue_year'] : NULL;
	 
	 $issue_year = '2013';
	 
	 $result = Model::factory('Articles')->ap_get_issues_list_month($issue_year);
 
	  
	  print json_encode($result);

    }
    
    
    /*
     * Сохранение / обновление контакта в базе
     * 
     * 
     * 
    */
    public function action_news_post()
    {

	       $news_list = array();
	       $c_photo = '';

	       $_POST = Arr::map('trim', $this->request->post());
	       $_POST = Arr::map('SpHTML::unchars', $this->request->post());
	     
	       
				  // директория для загрузки картинок
				  if($_POST['news_picture_old'] != '') $picture_dir = date('Y').'/'.date('m').'/';
				  else $picture_dir = HTML::chars($_POST['news_picture_dir']);
				  // путь для загрузки картинок
				  $p_upload_path = DOCROOT.'media/news/'.$picture_dir;
				  
				  $photo_nc = (isset($_POST['content_photo_nc']) and ($_POST['content_photo_nc'] == '1')) ? 1 : 0;

				  
			  
			  if(isset($_FILES) and (trim($_FILES['content_photo_small']['name']) != '')) {
			      $valid_thumb = Validation::factory($_FILES)
				   ->rule('content_photo_small', 'Upload::valid')
				   ->rule('content_photo_small', 'Upload::not_empty')
				   ->rule('content_photo_small', 'Upload::type',  array(':value', array('jpg','png','gif')))
				   ->rule('content_photo_small', 'Upload::size', array(':value', '1M'));

			  if ($valid_thumb->check())
			  {
				  // Успешная валидация
				  $filename_thumb = Upload::save($_FILES['content_photo_small'], time().'.'.pathinfo($_FILES['content_photo_small']['name'], PATHINFO_EXTENSION), DOCROOT.'/media/news/', 0777);
				  // имя большой картинки
				  $picture_name = time();
				  // имя превью
				  $picture_name_smp = $picture_name.'_smp.';
				  // расширение картинок
				  $picture_ext = strtolower(pathinfo($_FILES['content_photo_small']['name'], PATHINFO_EXTENSION));

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


				  unlink($filename_thumb);
				  @unlink(DOCROOT.'/media/news/'.$picture_dir.$news_picture_small);
				  chmod(DOCROOT.'/media/news/', 0644);
				  chmod($p_upload_path, 0644);
				  
				  $news_picture_small = $picture_name_smp.$picture_ext;
				  

				  
				  
				  $news_picture = HTML::chars($_POST['news_picture_old']); 
				  $news_picture_main = HTML::chars($_POST['news_picture_main_old']);
			          $news_picture_dir = $picture_dir;
			  }
			  else
			  {
				  // Вывод ошибки
				  $this->errors = $valid_image->errors('upload');
				  print_r($this->errors);
			  }
	       }
               elseif(isset($_FILES) and (trim($_FILES['content_photo_main']['name']) != '')) {
		    $valid_image = Validation::factory($_FILES)
			      ->rule('content_photo_main', 'Upload::valid')
			      ->rule('content_photo_main', 'Upload::not_empty')
			      ->rule('content_photo_main', 'Upload::type',  array(':value', array('jpg','png','gif')))
			      ->rule('content_photo_main', 'Upload::size', array(':value', '1M'));

			  if ($valid_image->check())
			  {
				  // Успешная валидация
				  $filename = Upload::save($_FILES['content_photo_main'], time().'.'.pathinfo($_FILES['content_photo_main']['name'], PATHINFO_EXTENSION), DOCROOT.'/media/news/', 0777);
				  // имя большой картинки
				  $picture_name = time();
				  // имя картинки для главной новости
				  $picture_name_mp = $picture_name.'_mp.';
				  // расширение картинок
				  $picture_ext = strtolower(pathinfo($_FILES['content_photo_main']['name'], PATHINFO_EXTENSION));
				 
				  // ширина картинки для главной новости
				  $picture_name_m_w = Kohana::$config->load($this->clow_controller.'.mod_npm_w');
				  // высота картинки для главной новости
				  $picture_name_m_h = Kohana::$config->load($this->clow_controller.'.mod_npm_h');
				  
				 
				  // проверяем, существует ли папка, если нет, создаем
				  if(!file_exists($p_upload_path)) mkdir($p_upload_path, 0700, TRUE);
				  else chmod($p_upload_path, 0700);	  
				  
				  
				   // ресайз картинки для главной страницы
				   $picture_main = Image::factory($filename);
				   // Подсчитываем соотношение сторон картинки
				   $ratio = $picture_main->width / $picture_main->height;
				   // Соотношение сторон нужных размеров
				   $original_ratio = $picture_name_m_w / $picture_name_m_h;
				   // Размеры, до которых обрежем картинку до масштабирования
				   $crop_width = $picture_main->width;
				   $crop_height = $picture_main->height;
				  
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
				   $picture_main->crop($crop_width, $crop_height);
				   // Масштабируем картинку то точных размеров
				   $picture_main->resize($picture_name_m_w, $picture_name_m_h, Image::NONE);
				   // Сохраняем изображение в файл
				   $picture_main->save($p_upload_path.$picture_name_mp.$picture_ext, 80);
				   

				   
				   
				   

				  unlink($filename);
				  @unlink(DOCROOT.'/media/news/'.$picture_dir.$news_picture_main);
				  chmod(DOCROOT.'/media/news/', 0644);
				  chmod($p_upload_path, 0644);
				  

				  $news_picture_main = $picture_name_mp.$picture_ext;
				  
				  $news_picture = HTML::chars($_POST['news_picture_old']); 
				  $news_picture_small = HTML::chars($_POST['news_picture_small_old']);
			          $news_picture_dir = $picture_dir;
			  }
			  else
			  {
				  // Вывод ошибки
				  $this->errors = $valid_image->errors('upload');
				  print_r($this->errors);
			  }
	       }  
	       elseif(isset($_FILES) and (trim($_FILES['content_photo']['name']) != '')) {
		    $valid_image = Validation::factory($_FILES)
			      ->rule('content_photo', 'Upload::valid')
			      ->rule('content_photo', 'Upload::not_empty')
			      ->rule('content_photo', 'Upload::type',  array(':value', array('jpg','png','gif')))
			      ->rule('content_photo', 'Upload::size', array(':value', '1M'));

			  if ($valid_image->check())
			  {
				  // Успешная валидация
				  $filename = Upload::save($_FILES['content_photo'], time().'.'.pathinfo($_FILES['content_photo']['name'], PATHINFO_EXTENSION), DOCROOT.'/media/news/', 0777);
				  // имя большой картинки
				  $picture_name = time();
				  // имя превью
				  $picture_name_sm = $picture_name.'_sm.';
				  // имя картинки для главной новости
				  $picture_name_m = $picture_name.'_m.';
				  // расширение картинок
				  $picture_ext = strtolower(pathinfo($_FILES['content_photo']['name'], PATHINFO_EXTENSION));
				 
				  // ширина большой картинки
				  $picture_name_w = Kohana::$config->load($this->clow_controller.'.mod_np_w');
				  // высота большой картинки
				  $picture_name_h = Kohana::$config->load($this->clow_controller.'.mod_np_h');
				  // ширина превью
				  $picture_name_sm_w = Kohana::$config->load($this->clow_controller.'.mod_nps_w');
				  // высота превью
				  $picture_name_sm_h = Kohana::$config->load($this->clow_controller.'.mod_nps_h');
				  // ширина картинки для главной новости
				  $picture_name_m_w = Kohana::$config->load($this->clow_controller.'.mod_npm_w');
				  // высота картинки для главной новости
				  $picture_name_m_h = Kohana::$config->load($this->clow_controller.'.mod_npm_h');
				  
				 
				  // проверяем, существует ли папка, если нет, создаем
				  if(!file_exists($p_upload_path)) mkdir($p_upload_path, 0700, TRUE);
				  else chmod($p_upload_path, 0700);	  
				  
				  // ресайз большой картинки
				  $picture = Image::factory($filename);
				  // Подсчитываем соотношение сторон картинки
				  $ratio = $picture->width / $picture->height;
				  // Соотношение сторон нужных размеров
				  $original_ratio = $picture_name_w / $picture_name_h;
				  // Размеры, до которых обрежем картинку до масштабирования
				  $crop_width = $picture->width;
				  $crop_height = $picture->height;
				  
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
				   $picture->crop($crop_width, $crop_height);
				   // Масштабируем картинку то точных размеров
				   $picture->resize($picture_name_w, $picture_name_h, Image::NONE);
					
					// если наложение водяного знака
					if(Kohana::$config->load($this->clow_controller.'.mod_np_watermark')) {
					     $watermark = Image::factory(DOCROOT.'/media/watermark/'.Kohana::$config->load($this->clow_controller.'.mod_np_watermark_file'));
					     $picture = $picture->watermark($watermark, TRUE, TRUE, 70);
					}
					
				   // Сохраняем изображение в файл
				   $picture->save($p_upload_path.$picture_name.'.'.$picture_ext, 80);

				   
				   if($photo_nc != 1) {
				   
					     // ресайз маленькой картинки
					     $picture_small = Image::factory($filename);
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
					     $picture_small->save($p_upload_path.$picture_name_sm.$picture_ext, 80);




					     // ресайз картинки для главной страницы
					     $picture_main = Image::factory($filename);
					     // Подсчитываем соотношение сторон картинки
					     $ratio = $picture_main->width / $picture_main->height;
					     // Соотношение сторон нужных размеров
					     $original_ratio = $picture_name_m_w / $picture_name_m_h;
					     // Размеры, до которых обрежем картинку до масштабирования
					     $crop_width = $picture_main->width;
					     $crop_height = $picture_main->height;

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
					     $picture_main->crop($crop_width, $crop_height);
					     // Масштабируем картинку то точных размеров
					     $picture_main->resize($picture_name_m_w, $picture_name_m_h, Image::NONE);
					     // Сохраняем изображение в файл
					     $picture_main->save($p_upload_path.$picture_name_m.$picture_ext, 80);
				   
					     
					     
					     $news_picture_small = $picture_name_sm.$picture_ext;
					     $news_picture_main = $picture_name_m.$picture_ext;
				  }
				  else {
				       $news_picture_small = HTML::chars($_POST['news_picture_small_old']);
				       $news_picture_main = HTML::chars($_POST['news_picture_main_old']);
				  } 
				   
				   

				  unlink($filename);
				  chmod(DOCROOT.'/media/news/', 0644);
				  chmod($p_upload_path, 0644);
				  
				  $news_picture = $picture_name.'.'.$picture_ext;
				  $news_picture_dir = $picture_dir;
			  }
			  else
			  {
				  // Вывод ошибки
				  $this->errors = $valid_image->errors('upload');
				  print_r($this->errors);
			  }
	       }  
	       else {
		    $news_picture = HTML::chars($_POST['news_picture_old']);
		    $news_picture_small = HTML::chars($_POST['news_picture_small_old']);
		    $news_picture_main = HTML::chars($_POST['news_picture_main_old']);
		    $news_picture_dir = HTML::chars($_POST['news_picture_dir']);
	       }
	       
	       
	       
	       
	       
	       
	       
	       

	       
	       

	       $valid = Validation::factory($_POST);
	       $valid -> rule('news_title', 'not_empty')
		      -> rule('news_title', 'max_length', array(':value', 255))
		      -> rule('news_url', 'max_length', array(':value', 255))
		      -> rule('news_url', 'alpha_dash', array(':value', TRUE))	
		      -> rule('news_section', 'not_empty')
		      -> rule('news_section', 'digit')
		      -> rule('news_section', 'max_length', array(':value', 11))
		      -> rule('news_url', 'alpha_dash', array(':value', TRUE))	    
		      -> rule('news_seo_title', 'max_length', array(':value', 255))
		      -> rule('news_date', 'date')
		      -> rule('news_author_id', 'digit')
		      -> rule('news_author', 'max_length', array(':value', 255))
		      -> rule('news_activity', 'digit')
		      -> rule('news_ismain', 'digit')
		      -> rule('news_id', 'not_empty')
		      -> rule('news_id', 'digit')
		      -> rule('news_id', 'max_length', array(':value', 11))
		      -> rule('contact_time', 'digit')
		      -> rule('contact_secret', 'alpha_dash');
	       
	       
	       $n_activity = (isset($_POST['news_activity']) and ($_POST['news_activity'] == '1')) ? 1 : 0;
	       $n_ismain = (isset($_POST['news_ismain']) and ($_POST['news_ismain'] == '1')) ? 1 : 0;
	       
	       $_POST['news_date'] = Date::formatted_time($_POST['news_date'], 'Y-m-d H:i:s');
	       
	       // Типографирование для текстовых полей
	       $_POST['news_title'] = SpHTML::typo($_POST['news_title']);
	       $_POST['news_text'] = HTML::chars(SpHTML::typo($_POST['news_text']));
	       $_POST['news_text_full'] = HTML::chars(SpHTML::typo($_POST['news_text_full']));
	       
	       
	       
	       if(!isset($_POST['news_url'])) {
		    if(isset($_POST['news_url_old'])) {
			 if(!Model::factory('News')->ap_check_news_url($_POST['news_url_old'],$_POST['news_id'])) $_POST['news_url'] = $_POST['news_url_old'];
			 else $_POST['news_url'] = $_POST['news_url_old'].time();
		    }
		    else $_POST['news_url'] = SpHTML::translit($_POST['news_title']);
	       }
	       else {
		    if(!Model::factory('News')->ap_check_news_url($_POST['news_url'],$_POST['news_id'])) $_POST['news_url'] = $_POST['news_url'];
		    else $_POST['news_url'] = $_POST['news_url'].time();
	       }

	       
	       
	       // если неверное значение в секретном поле - отправляем на главную модуля
	       if(HTML::chars($_POST['contact_xhr']) !=  sha1(Kohana::$config->load('global.site_secret_form').HTML::chars($_POST['contact_time']))) {
		    $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/');
	       }

	       if(Request::current()->method() == Request::POST && $valid->check()) {
			 if(HTML::chars($_POST['action_type']) == 'update') {
			      
			      $upd_c = Model::factory('News')->ap_news_upd(
				      $_POST,$c_photo,$n_activity,$n_ismain,$news_picture,$news_picture_small,$news_picture_main,$news_picture_dir
			      );
			      if($upd_c) {
				 if(isset($_POST['submit_form'])) {
				      $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/edit/'.$_POST['news_id'].'/');
				      
				 }
				 else $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/');
			      }
			      else throw new HTTP_Exception_404();
			      
			 }
			 elseif(HTML::chars($_POST['action_type']) == 'new') {
			      
			      $add_c = Model::factory('News')->ap_news_add(
				      $_POST, $c_photo, $n_activity, $n_ismain,$news_picture,$news_picture_small,$news_picture_main,$news_picture_dir
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
    
    public function action_news_delete()
    {
	       $news_profile = array();

	       
		       $validate_id = Validation::factory($this->request->param());
		       $validate_id -> rule('id', 'not_empty')
				    -> rule('id', 'max_length', array(':value', 11))
				    -> rule('id', 'digit');

		       $news_id = (($validate_id -> check())) ? $validate_id['id'] : '0';


		       $news_profile = Model::factory('News')->ap_news_delete($news_id); 
			   if($news_profile) {
					$this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/');
					exit();
				}
    } 
    
    
    
  
    
    /*
     * Форма создания / редактирования раздела
     * 
     * 
     * 
    */
    public function action_sections_form()
    {

	     // инициализация массива с данными формы    
	     $sections_list = array(
			'section_title' => '',
			'section_url' => '',
			'section_descr' => '',
			'id_section' => '',
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
				    $section_id = $validate_param['id']; // id записи для извлечения из базы
				    $action = $validate_param['act'];	 // определяяем action - добавление или редактирование
				    

				    // если определен id записи и не равен нулю
				    if($section_id != 0) {
					 $sections_list = Model::factory('Articles')->ap_get_sections($section_id); // выборка информации о разделе из БД
					 $sections_list = $sections_list[0];
					 
					 $sectionid = $sections_list['id_section'];
					
					 $url_change = TRUE;   // определяем активность в форме
					 
					 // заголовок, action и subaction формы
					 $form_title = __('Section_edit');
					 $form_action = 'post';
					 $form_sub_action = 'update';
					
				    }
				    else $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.MOD_URL.'/sections/');
				    
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

				    
				    $sectionid = 0;
				    
				    $url_change = FALSE;  
				    
				    // заголовок, action и subaction формы
				    $form_title = __('Section_add');
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
	       


	       $content = View::factory('/Admin/'.$this->c_controller.'/Sections_Form')

		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('sections_list', $sections_list)
		       ->bind('url_change', $url_change)
		       ->bind('mod_action', $form_action)
		       ->bind('sub_action', $form_sub_action)
		       ->bind('form_title', $form_title)
		       ->bind('section_id', $sectionid)
		       ->bind('contact_time_cr', $contact_time_cr)
		       ->bind('contact_secret', $contact_secret);



		       $breadcrumbs = View::factory('/Admin/Breadcrumbs')
				      -> set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));
		       



	       $this->template->content = $content;
	       $this->template->title_page = Kohana::$config->load($this->clow_controller.'.mod_title');

    }  
    
     
    /*
     * Сохранение / обновление раздела в базе
     * 
     * 
     * 
    */
    public function action_sections_post()
    {
	       
	       $_POST = Arr::map('trim', $this->request->post());
	       $_POST = Arr::map('SpHTML::unchars', $this->request->post());
	       

	       $valid = Validation::factory($_POST);
	       $valid -> rule('section_title', 'not_empty')
		      -> rule('section_title', 'max_length', array(':value', 255))
		      -> rule('section_url', 'alpha_dash', array(':value', TRUE))	
		      -> rule('section_url', 'max_length', array(':value', 255))
		      -> rule('section_url_old', 'alpha_dash', array(':value', TRUE))	
		      -> rule('section_url_old', 'max_length', array(':value', 255))
		      -> rule('section_id', 'not_empty')
		      -> rule('section_id', 'digit')
		      -> rule('contact_time', 'digit')
		      -> rule('contact_secret', 'alpha_dash');
	       
	       
	       // Типографирование для текстовых полей
	       $_POST['section_title'] = SpHTML::typo($_POST['section_title']);
	       $_POST['section_descr'] = SpHTML::typo($_POST['section_descr']);
		   
	       // если неверное значение в секретном поле - отправляем на главную модуля
	       if(HTML::chars($_POST['contact_xhr']) !=  sha1(Kohana::$config->load('global.site_secret_form').HTML::chars($_POST['contact_time']))) {
		    $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.MOD_URL.'/');
	       }
	       
	       
	       
	       if(!isset($_POST['section_url'])) {
		    if(isset($_POST['section_url_old'])) {
			 if(!Model::factory('Articles')->ap_check_sections_url($_POST['section_url_old'],$_POST['section_id'])) $section_url = $_POST['section_url_old'];
			 else $section_url = $_POST['section_url_old'].time();
		    }
		    else $section_url = SpHTML::translit($_POST['section_title']);
	       }
	       else {
		    if(!Model::factory('Articles')->ap_check_sections_url($_POST['section_url'],$_POST['section_id'])) $section_url = $_POST['section_url'];
		    else $section_url = $_POST['section_url'].time();
	       }



	       if(Request::current()->method() == Request::POST && $valid->check()) {
			 if(HTML::chars($_POST['action_type']) == 'update') {

			      $upd_c = Model::factory('Articles')->ap_sections_upd(
				      $_POST,$section_url
			      );
			    
				 if(isset($_POST['submit_form'])) {
				      $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.MOD_URL.'/sections/edit/'.$_POST['section_id'].'/');
				      
				 }
				 else $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.MOD_URL.'/sections/');

			      
			 }
			 elseif(HTML::chars($_POST['action_type']) == 'new') {
			      
			      $add_c = Model::factory('Articles')->ap_sections_add(
				      $_POST,$section_url
			      );
			      if($add_c) {
				 if(isset($_POST['submit_form'])) {
				      $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.MOD_URL.'/sections/edit/'.$add_c[0].'/');
				 }
				 else $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.MOD_URL.'/sections/');
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
     * Удаление раздела
     * 
     * 
     * 
    */
    public function action_sections_delete()
    {
	       $sections_profile = array();
	       
	       $validate_id = Validation::factory($this->request->param());
	       $validate_id -> rule('id', 'not_empty')
			    -> rule('id', 'max_length', array(':value', 11))
			    -> rule('id', 'digit');

	       $section_id = (($validate_id -> check())) ? $validate_id['id'] : '0';

	       $sections_profile = Model::factory('Articles')->ap_sections_delete($section_id); 
			   if($sections_profile) {
					$this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.MOD_URL.'/sections/');
					exit();
				}
    } 

    
    /*
     * Список изданий
     * 
     * 
     * 
    */
    public function action_editions()
    {
	  $editions_list = array();

	  $content = View::factory('/Admin/'.$this->c_controller.'/Editions_List')
		   ->bind('breadcrumbs', $breadcrumbs)
		   ->bind('editions_list', $editions_list)
		   ->bind('main_menu', $main_menu);



	  $breadcrumbs = View::factory('/Admin/Breadcrumbs')
		       ->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));

	  $editions_list = Model::factory('Articles')->ap_get_editions();

	  $this->template->content = $content;
	  $this->template->title_page = Kohana::$config->load($this->clow_controller.'.mod_title');
    } 
    
    /*
     * Форма создания / редактирования раздела
     * 
     * 
     * 
    */
    public function action_editions_form()
    {

	     // инициализация массива с данными формы    
	     $editions_list = array(
			'edition_title' => '',
			'edition_url' => '',
			'edition_descr' => '',
			'edition_picture' => '',
			'edition_pos' => '',
			'edition_status' => '1',
			'edition_picture' => '',
			'id_edition' => '',
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
				    $edition_id = $validate_param['id']; // id записи для извлечения из базы
				    $action = $validate_param['act'];	 // определяяем action - добавление или редактирование
				    

				    // если определен id записи и не равен нулю
				    if($edition_id != 0) {
					 $editions_list = Model::factory('Articles')->ap_get_editions($edition_id); // выборка информации о разделе из БД

					 $editionid = $editions_list[0]['id_edition'];
					
					 $url_change = TRUE;   // определяем активность в форме
					 
					 // заголовок, action и subaction формы
					 $form_title = __('Edition_edit');
					 $form_action = 'post';
					 $form_sub_action = 'update';
					
				    }
				    else $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.MOD_URL.'/editions/');
				    
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

				    $editionid = 0;
				    
				    $url_change = FALSE;  
				    
				    // заголовок, action и subaction формы
				    $form_title = __('Edition_add');
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
	       


	       $content = View::factory('/Admin/'.$this->c_controller.'/Editions_Form')

		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('editions_list', $editions_list[0])
		       ->bind('url_change', $url_change)
		       ->bind('mod_action', $form_action)
		       ->bind('sub_action', $form_sub_action)
		       ->bind('form_title', $form_title)
		       ->bind('edition_id', $editionid)
		       ->bind('contact_time_cr', $contact_time_cr)
		       ->bind('contact_secret', $contact_secret);



		       $breadcrumbs = View::factory('/Admin/Breadcrumbs')
				      -> set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));
		       



	       $this->template->content = $content;
	       $this->template->title_page = Kohana::$config->load($this->clow_controller.'.mod_title');

    }  
    
     
    /*
     * Сохранение / обновление раздела в базе
     * 
     * 
     * 
    */
    public function action_editions_post()
    {
	       
	       $_POST = Arr::map('trim', $this->request->post());
	       $_POST = Arr::map('SpHTML::unchars', $this->request->post());
	       
	       $p_upload_path = DOCROOT.'media/editions/';

  
	       if(isset($_FILES) and (trim($_FILES['edition_photo']['name']) != '')) {
			      $valid_thumb = Validation::factory($_FILES)
				   ->rule('edition_photo', 'Upload::valid')
				   ->rule('edition_photo', 'Upload::not_empty')
				   ->rule('edition_photo', 'Upload::type',  array(':value', array('jpg','png','gif')))
				   ->rule('edition_photo', 'Upload::size', array(':value', '1M'));

			  if ($valid_thumb->check())
			  {
				  // Успешная валидация
				  $filename_thumb = Upload::save($_FILES['edition_photo'], time().'.'.pathinfo($_FILES['edition_photo']['name'], PATHINFO_EXTENSION), DOCROOT.'/media/editions/', 0777);
				  // имя большой картинки
				  $picture_name = time();
				  // имя превью
				  $picture_name_smp = $picture_name.'_smp.';
				  // расширение картинок
				  $picture_ext = strtolower(pathinfo($_FILES['edition_photo']['name'], PATHINFO_EXTENSION));

				  // ширина картинки
				  $picture_name_sm_w = Kohana::$config->load($this->clow_controller.'.mod_aes_w');
				  // высота картинки
				  $picture_name_sm_h = Kohana::$config->load($this->clow_controller.'.mod_aes_h');
				  

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


				  unlink($filename_thumb);
				  unlink(DOCROOT.'/media/editions/'.HTML::chars($_POST['edition_picture_old']));
				  @unlink(DOCROOT.'/media/editions/'.$news_picture_small);
				  chmod(DOCROOT.'/media/editions/', 0644);
				  chmod($p_upload_path, 0644);
				  
				  $_POST['edition_picture'] = $picture_name_smp.$picture_ext;
			  }
			  else
			  {
				  // Вывод ошибки
				  $this->errors = $valid_image->errors('upload');
				  print_r($this->errors);
			  }
	       }
               
	       else {
		    $_POST['edition_picture'] = HTML::chars($_POST['edition_picture_old']);
	       }
	       

	       $valid = Validation::factory($_POST);
	       $valid -> rule('edition_title', 'not_empty')
		      -> rule('edition_title', 'max_length', array(':value', 255))
		      -> rule('edition_url', 'alpha_dash', array(':value', TRUE))	
		      -> rule('edition_url', 'max_length', array(':value', 255))
		      -> rule('edition_url_old', 'alpha_dash', array(':value', TRUE))	
		      -> rule('edition_url_old', 'max_length', array(':value', 255))
		      -> rule('edition_status', 'not_empty')
		      -> rule('edition_status', 'digit')
		      -> rule('edition_id', 'not_empty')
		      -> rule('edition_id', 'digit')
		      -> rule('contact_time', 'digit')
		      -> rule('contact_secret', 'alpha_dash');
	       
	       
	       // Типографирование для текстовых полей
	       $_POST['edition_title'] = SpHTML::typo($_POST['edition_title']);
	       $_POST['edition_descr'] = SpHTML::typo($_POST['edition_descr']);
		   
	       // если неверное значение в секретном поле - отправляем на главную модуля
	       if(HTML::chars($_POST['contact_xhr']) !=  sha1(Kohana::$config->load('global.site_secret_form').HTML::chars($_POST['contact_time']))) {
		    $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.MOD_URL.'/');
	       }
	       
	       
	       
	       if(!isset($_POST['edition_url'])) {
		    if(isset($_POST['edition_url_old'])) {
			 if(!Model::factory('Articles')->ap_check_editions_url($_POST['edition_url_old'],$_POST['edition_id'])) $edition_url = $_POST['edition_url_old'];
			 else $edition_url = $_POST['edition_url_old'].time();
		    }
		    else $edition_url = SpHTML::translit($_POST['edition_title']);
	       }
	       else {
		    if(!Model::factory('Articles')->ap_check_editions_url($_POST['edition_url'],$_POST['edition_id'])) $edition_url = $_POST['edition_url'];
		    else $edition_url = $_POST['edition_url'].time();
	       }



	       if(Request::current()->method() == Request::POST && $valid->check()) {
			 if(HTML::chars($_POST['action_type']) == 'update') {

			      $upd_c = Model::factory('Articles')->ap_editions_upd(
				      $_POST,$edition_url
			      );
			    
				 if(isset($_POST['submit_form'])) {
				      $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.MOD_URL.'/editions/edit/'.$_POST['edition_id'].'/');
				      
				 }
				 else $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.MOD_URL.'/editions/');

			      
			 }
			 elseif(HTML::chars($_POST['action_type']) == 'new') {
			      
			      $add_c = Model::factory('Articles')->ap_editions_add(
				      $_POST,$edition_url
			      );
			      if($add_c) {
				 if(isset($_POST['submit_form'])) {
				      $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.MOD_URL.'/editions/edit/'.$add_c[0].'/');
				 }
				 else $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.MOD_URL.'/editions/');
			      }
			      else throw new HTTP_Exception_404();

			 }
			 else throw new HTTP_Exception_404();

	       }
	       else {
		    $view = View::factory('/Admin/Errors');
		    $view->errors = Debug::vars($valid->errors('validation', TRUE));
		    $this->template->content = $view;
		    $this->template->title_page = Kohana::$config->load('articles.mod_title');
	       }



    } 
  
    
    /*
     * Удаление раздела
     * 
     * 
     * 
    */
    public function action_editions_delete()
    {
	       $editions_profile = array();
	       
	       $validate_id = Validation::factory($this->request->param());
	       $validate_id -> rule('id', 'not_empty')
			    -> rule('id', 'max_length', array(':value', 11))
			    -> rule('id', 'digit');

	       $edition_id = (($validate_id -> check())) ? $validate_id['id'] : '0';

	       $editions_profile = Model::factory('Articles')->ap_editions_delete($edition_id); 
			   if($editions_profile) {
					$this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.MOD_URL.'/editions/');
					exit();
				}
    } 


} // End Page