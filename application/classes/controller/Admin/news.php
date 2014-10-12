<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Admin_News extends Controller_Admin {
    /*
     * Главная страница модуля
     * 
     * 
     * 
    */
    public function action_index()
    {
	       $news_list = array();

	       $valid = Validation::factory($_POST);
	       $valid ->rule('group_id', 'not_empty')
		      -> rule('group_id', 'max_length', array(':value', 11))
		      -> rule('group_id', 'digit');
	       $group_active = (($valid -> check()) and ($_POST['group_id'] != 'null')) ? $_POST['group_id'] : NULL;

	     

	       $content = View::factory('/Admin/'.$this->c_controller.'/List')
		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('news_list', $news_list)
		       ->bind('sections_list_short', $news_list_sections)
		       ->bind('mod_url', $this->clow_controller)
		       ->bind('group_active', $group_active)
		       ->bind('main_menu', $main_menu);



		       $breadcrumbs = View::factory('/Admin/Breadcrumbs')
				       ->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));

		       $count_c = Model::factory('News')->ap_count_list($group_active);
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

	       $news_list = Model::factory('News')->ap_get_list($cur_page, $group_active);
	       $news_list_sections = Model::factory('News')->ap_get_sections_short($group_active);

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

	       $content = View::factory('/Admin/'.$this->c_controller.'/Sections_List')
		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('sections_list', $sections_list)
		       ->bind('mod_url', $this->clow_controller)
		       ->bind('main_menu', $main_menu);



		       $breadcrumbs = View::factory('/Admin/Breadcrumbs')
				       ->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));

	       $sections_list = Model::factory('News')->ap_get_sections();

	       $this->template->content = $content;
	       $this->template->title_page = Kohana::$config->load($this->clow_controller.'.mod_title');

    } 
    
 
    
    
    /*
     * Форма создания / редактирования контакта
     * 
     * 
     * 
    */
    public function action_news_form()
    {

	     // инициализация массива с данными формы    
	     $news_list = array(
			'news_title' => '',
			'news_url' => '',
			'news_text' => '',
			'news_text_full' => '',
			'news_date' => '',
			'news_seo_title' => '',
			'news_seo_descr' => '',
			'news_seo_keywords' => '',
			'news_author' => '',
			'news_author_id' => '',
			'news_picture' => '',
			'news_picture_small' => '',
			'news_picture_main' => '',
			'news_picture_dir' => '',
			'news_hour' => date('H'),
			'news_minute' => date('i'),
			'news_date' => date('d.m.Y H:i:s'),
			'news_main' => '',
			'news_status' => '',
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
				    $news_id = $validate_param['id']; // id записи для извлечения из базы
				    $action = $validate_param['act'];	 // определяяем action - добавление или редактирование
				    

				    // если определен id записи и не равен нулю
				    if($news_id != 0) {
					 $news_list = Model::factory('News')->ap_get_profile($news_id); // выборка контакта из БД
					 
					 $users_list = Model::factory('Users')->get_list_short(); // выборка контакта из БД
	
					 $activity_flag = ($news_list['news_status'] != 0) ? TRUE : FALSE;   // определяем активность в форме
					 $ismain_flag = ($news_list['news_main'] != 0) ? TRUE : FALSE;   // главная новость или нет
					 
					 $news_section = $news_list['id_section'];
					 $news_sections_list = Model::factory('News')->ap_get_sections_list();
					 
					 $url_change = TRUE;   // определяем активность в форме
					 
					 // заголовок, action и subaction формы
					 $form_title = __('News_edit');
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
				    $ismain_flag = FALSE;
				    
				    $news_id = 0;

				    $news_section = 0;
				    $news_sections_list = Model::factory('News')->ap_get_sections_list();
				    
				    
				    // выбираем бренды
				    $news_brands_list = Model::factory('News')->ap_get_sections_list();
				    
				    
				    
				    $users_list = Model::factory('Users')->get_list_short();
				    
				    $url_change = FALSE;   // определяем активность в форме
				    
				    // заголовок, action и subaction формы
				    $form_title = __('News_add');
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
		       ->bind('news_list', $news_list)
		       ->bind('url_change', $url_change)
		       ->bind('news_sections_list', $news_sections_list)
		       ->bind('activity_flag', $activity_flag)
		       ->bind('ismain_flag', $ismain_flag)
		       ->bind('mod_url', $this->clow_controller)
		       ->bind('mod_action', $form_action)
		       ->bind('sub_action', $form_sub_action)
		       ->bind('form_title', $form_title)
		       ->bind('news_id', $news_id)
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
    public function action_news_post()
    {

	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());

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

	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());
	       
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
     * Форма создания / редактирования группы
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
					 $sections_list = Model::factory('News')->ap_get_sections($section_id); // выборка информации о разделе из БД
					 $sections_list = $sections_list[0];
					 
					 $sectionid = $sections_list['id_section'];
					
					 $url_change = TRUE;   // определяем активность в форме
					 
					 // заголовок, action и subaction формы
					 $form_title = __('Section_edit');
					 $form_action = 'post';
					 $form_sub_action = 'update';
					
				    }
				    else $this->request->redirect(URL::site(NULL, TRUE).$this->clow_controller.'/sections/');
				    
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
		       ->bind('mod_url', $this->clow_controller)
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
     * Сохранение / обновление группы в базе
     * 
     * 
     * 
    */
    public function action_sections_post()
    {

	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());


	       
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
		    $this->request->redirect(URL::site(NULL, TRUE).$clow_controller.'/');
	       }
	       
	       
	       
	       if(!isset($_POST['section_url'])) {
		    if(isset($_POST['section_url_old'])) {
			 if(!Model::factory('News')->ap_check_sections_url($_POST['section_url_old'],$_POST['section_id'])) $section_url = $_POST['section_url_old'];
			 else $section_url = $_POST['section_url_old'].time();
		    }
		    else $section_url = SpHTML::translit($_POST['section_title']);
	       }
	       else {
		    if(!Model::factory('News')->ap_check_sections_url($_POST['section_url'],$_POST['section_id'])) $section_url = $_POST['section_url'];
		    else $section_url = $_POST['section_url'].time();
	       }

	       
	       

	       if(Request::current()->method() == Request::POST && $valid->check()) {
			 if(HTML::chars($_POST['action_type']) == 'update') {

			      $upd_c = Model::factory('News')->ap_sections_upd(
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
    
    
    public function action_sections_delete()
    {
	       $sections_profile = array();

	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());
	       
		       $validate_id = Validation::factory($this->request->param());
		       $validate_id -> rule('id', 'not_empty')
				    -> rule('id', 'max_length', array(':value', 11))
				    -> rule('id', 'digit');

		       $section_id = (($validate_id -> check())) ? $validate_id['id'] : '0';


		       $sections_profile = Model::factory('News')->ap_sections_delete($section_id); 
			   if($sections_profile) {
					$this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/sections/');
					exit();
				}
    } 
    
 


} // End Page