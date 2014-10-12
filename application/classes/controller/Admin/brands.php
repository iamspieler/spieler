<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Admin_Brands extends Controller_Admin {
    /*
     * Главная страница модуля
     * 
     * 
     * 
    */
    public function action_index()
    {
	       $brands_list = array();

	       $content = View::factory('/Admin/'.$this->c_controller.'/List')
		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('brands_list', $brands_list)
		       ->bind('sections_list_short', $news_list_sections)
		       ->bind('mod_url', $this->clow_controller)
		       ->bind('group_active', $group_active)
		       ->bind('main_menu', $main_menu);



		       $breadcrumbs = View::factory('/Admin/Breadcrumbs')
				       ->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));

		       $count_c = Model::factory('Brands')->ap_count_list();
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

	       $brands_list = Model::factory('Brands')->ap_get_list($cur_page);
	       $news_list_sections = Model::factory('News')->ap_get_sections_short($group_active);

	       $this->template->content = $content;
	       $this->template->title_page = Kohana::$config->load($this->clow_controller.'.mod_title');

    }  
    
    
    
    /*
     * Форма создания / редактирования контакта
     * 
     * 
     * 
    */
    public function action_brands_form()
    {

	     // инициализация массива с данными формы    
	     $brands_list = array(
			'brand_title' => '',
			'brand_url' => '',
			'brand_info' => '',
			'brand_info_full' => '',
			'brand_logo' => '',
			'brand_logo_onlist' => '',
			'brand_gallery' => '',
			'brand_picture' => '',
			'brand_picture_big' => '',
			'brand_map_section' => '',
			'brand_seo_title' => '',
			'brand_seo_descr' => '',
			'brand_seo_keywords' => '',
			'brand_status' => ''
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
				    $brand_id = $validate_param['id']; // id записи для извлечения из базы
				    $action = $validate_param['act'];	 // определяяем action - добавление или редактирование
				    

				    // если определен id записи и не равен нулю
				    if($brand_id != 0) {
					 $brands_list = Model::factory('Brands')->ap_get_profile($brand_id); // выборка контакта из БД
	
					 $activity_flag = ($brands_list['brand_status'] != 0) ? TRUE : FALSE;   // определяем активность в форме
					 
					 $brands_sections_list = Model::factory('Brands')->ap_get_sections_list();
					 $brands_sections_get = Model::factory('Brands')->ap_get_sections_for_brand($brand_id);
	
					 foreach($brands_sections_get as $bsg)
					 {
					      
					     $brands_sections[] = $bsg['section_id'];
					 }
					 
					 $galleries_list = Model::factory('Brands')->ap_get_galleries_list();
					 $map_sections = Model::factory('Brands')->ap_get_sections_map();
					 
					 $url_change = TRUE;   // определяем активность в форме
					 
					 // заголовок, action и subaction формы
					 $form_title = __('Brand_edit');
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
				    
				    $brand_id = 0;

				    $brands_sections_list = Model::factory('Brands')->ap_get_sections_list();
				    $brands_sections = array();
				    
				    $galleries_list = Model::factory('Brands')->ap_get_galleries_list();
				    $map_sections = Model::factory('Brands')->ap_get_sections_map();
				    
				    $url_change = FALSE;   // определяем активность в форме
				    
				    // заголовок, action и subaction формы
				    $form_title = __('Brand_add');
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
		       ->bind('brands_list', $brands_list)
		       ->bind('url_change', $url_change)
		       ->bind('brands_sections_list', $brands_sections_list)
		       ->bind('brands_sections',$brands_sections)
		       ->bind('galleries_list', $galleries_list)
		       ->bind('map_sections', $map_sections)
		       ->bind('activity_flag', $activity_flag)
		       ->bind('mod_url', $this->clow_controller)
		       ->bind('mod_action', $form_action)
		       ->bind('sub_action', $form_sub_action)
		       ->bind('form_title', $form_title)
		       ->bind('brand_id', $brand_id)
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
    public function action_brands_post()
    {

	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());

	       $brands_list = array();
	       $brand_logo = '';
	       $brand_picture = '';
	       $brand_picture_big = '';
	       

	       $_POST = Arr::map('trim', $this->request->post());
	       $_POST = Arr::map('SpHTML::unchars', $this->request->post());
	       


				   // путь для загрузки логотипа
				  $logo_upload_path = DOCROOT.'media/brands/logos/';
				  
			 if(isset($_FILES) and (trim($_FILES['content_logo']['name']) != '')) {
			      $valid_thumb = Validation::factory($_FILES)
				   ->rule('content_logo', 'Upload::valid')
				   ->rule('content_logo', 'Upload::not_empty')
				   ->rule('content_logo', 'Upload::type',  array(':value', array('jpg','png','gif')))
				   ->rule('content_logo', 'Upload::size', array(':value', '1M'));

			      if ($valid_thumb->check())
			      {
				  // Успешная валидация
				  $filename_thumb = Upload::save($_FILES['brand_logo'], time().'.'.pathinfo($_FILES['brand_logo']['name'], PATHINFO_EXTENSION), DOCROOT.'/media/brands/logos/', 0777);
				  // имя логотипа
				  $logop_name = time();
				  // расширение логотипа
				  $logop_ext = strtolower(pathinfo($_FILES['brand_logo']['name'], PATHINFO_EXTENSION));

				  // ширина лого
				  $logop_sm_w = Kohana::$config->load($this->clow_controller.'.mod_bl_w');
				  // высота лого
				  $logop_sm_h = Kohana::$config->load($this->clow_controller.'.mod_bl_h');
					  
				   
				   // ресайз лого
				   $picture_logo = Image::factory($filename_thumb);
				   // Подсчитываем соотношение сторон картинки
				   $ratio = $picture_logo->width / $picture_logo->height;
				   // Соотношение сторон нужных размеров
				   $original_ratio = $logop_sm_w / $logop_sm_h;
				   // Размеры, до которых обрежем картинку до масштабирования
				   $crop_width = $picture_logo->width;
				   $crop_height = $picture_logo->height;
				  
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
				   $picture_logo->crop($crop_width, $crop_height);
				   // Масштабируем картинку то точных размеров
				   $picture_logo->resize($logop_sm_w, $logop_sm_h, Image::NONE);
				   // Сохраняем изображение в файл
				   $picture_logo->save($logo_upload_path.$logop_name.$logop_ext, 80);

				   
				  unlink($filename_thumb);
				  @unlink($logo_upload_path.$logop_name);
				  chmod($logo_upload_path, 0644);
				  
				  $brand_logo = $logop_name.$logop_ext;
			  }
			  else
			  {
				  // Вывод ошибки
				  $this->errors = $valid_image->errors('upload');
				  print_r($this->errors);
			  }
	       }
	       else {
		    $brand_logo = HTML::chars($_POST['brand_logo_old']);
	       }
	  
				  
		if((trim($brand_logo) != '') and (isset($_POST['brand_logo_onlist'])) and ($_POST['brand_logo_onlist'] == '1')) $brand_logo_onlist = 1;
		else $brand_logo_onlist = 0;
				  

			  
			  if(isset($_FILES) and (trim($_FILES['content_photo']['name']) != '')) {
			      $valid_thumb = Validation::factory($_FILES)
				   ->rule('content_photo', 'Upload::valid')
				   ->rule('content_photo', 'Upload::not_empty')
				   ->rule('content_photo', 'Upload::type',  array(':value', array('jpg','png','gif')))
				   ->rule('content_photo', 'Upload::size', array(':value', '1M'));

			  if ($valid_thumb->check())
			  {
				  // Успешная валидация
				  $filename_thumb = Upload::save($_FILES['content_photo'], time().'.'.pathinfo($_FILES['content_photo']['name'], PATHINFO_EXTENSION), DOCROOT.'/media/brands/', 0777);
				  // имя большой картинки
				  $picture_name = time();
				  // имя превью
				  $picture_name_smp = $picture_name.'_sm.';
				  // расширение картинок
				  $picture_ext = strtolower(pathinfo($_FILES['content_photo']['name'], PATHINFO_EXTENSION));

				  // ширина превью
				  $picture_name_sm_w = Kohana::$config->load($this->clow_controller.'.mod_bps_w');
				  // высота превью
				  $picture_name_sm_h = Kohana::$config->load($this->clow_controller.'.mod_bps_h');
				  // ширина большой картинки
				  $picture_name_b_w = Kohana::$config->load($this->clow_controller.'.mod_bbs_w');
				  // высота большой картинки
				  $picture_name_b_h = Kohana::$config->load($this->clow_controller.'.mod_bbs_h');
					  
				   
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
				   
				   
				   // ресайз большой картинки
				   $picture_big = Image::factory($filename_thumb);
				   // Подсчитываем соотношение сторон картинки
				   $ratio = $picture_big->width / $picture_big->height;
				   // Соотношение сторон нужных размеров
				   $original_ratio = $picture_name_b_w / $picture_name_b_h;
				   // Размеры, до которых обрежем картинку до масштабирования
				   $crop_width = $picture_big->width;
				   $crop_height = $picture_big->height;
				  
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
				   $picture_big->crop($crop_width, $crop_height);
				   // Масштабируем картинку то точных размеров
				   $picture_big->resize($picture_name_sm_w, $picture_name_sm_h, Image::NONE);
				   // Сохраняем изображение в файл
				   $picture_big->save($p_upload_path.$picture_name.".".$picture_ext, 80);


				  unlink($filename_thumb);
				  @unlink(DOCROOT.'/media/brands/pict/'.$news_picture_small);
				  chmod(DOCROOT.'/media/brands/pict/', 0644);
				  chmod($p_upload_path, 0644);
				  
				  $brand_picture = $picture_name_smp.$picture_ext;
				  $brand_picture_big = $picture_name.".".$picture_ext;
			  }
			  else
			  {
				  // Вывод ошибки
				  $this->errors = $valid_image->errors('upload');
				  print_r($this->errors);
			  }
	       }
	       else {
		    $brand_picture = HTML::chars($_POST['brand_pict_old']);
		    $brand_picture_big = HTML::chars($_POST['brand_pictb_old']);
	       }


	       $valid = Validation::factory($_POST);
	       $valid -> rule('brand_title', 'not_empty')
		      -> rule('brand_title', 'max_length', array(':value', 255))
		      -> rule('brand_url', 'max_length', array(':value', 255))
		      -> rule('brand_url', 'alpha_dash', array(':value', TRUE))	
		      -> rule('brand_sections', 'not_empty')  
		      -> rule('brand_logo', 'max_length', array(':value', 255))
		      -> rule('brand_logo_onlist', 'digit')
		      -> rule('brand_picture', 'max_length', array(':value', 255))
		      -> rule('brand_picture_big', 'max_length', array(':value', 255))
		      -> rule('brand_gallery', 'digit')
		      -> rule('brand_map_section', 'digit')
		      -> rule('brand_seo_title', 'max_length', array(':value', 255))
		      -> rule('brand_activity', 'not_empty')
		      -> rule('brand_activity', 'digit')
		      -> rule('brand_id', 'not_empty')
		      -> rule('brand_id', 'digit')
		      -> rule('brand_id', 'max_length', array(':value', 11))
		      -> rule('contact_time', 'digit')
		      -> rule('contact_secret', 'alpha_dash');
	       
	       
	       $b_activity = (isset($_POST['brand_activity']) and ($_POST['brand_activity'] == '1')) ? 1 : 0;
	       
	       // Типографирование для текстовых полей
	       $_POST['brand_title'] = SpHTML::typo($_POST['brand_title']);
	       $_POST['brand_info'] = SpHTML::typo($_POST['brand_info']);
	       $_POST['brand_info_full'] = SpHTML::typo($_POST['brand_info_full']);
	       
	       if(!isset($_POST['brand_gallery'])) $_POST['brand_gallery'] = 0;
	       
	       
	       $brand_s = Model::factory('Brands')->ap_brand_sect_upd($_POST['brand_sections'],$_POST['brand_id']);
	       
	       
	       if(!isset($_POST['brand_url'])) {
		    if(isset($_POST['brand_url_old'])) {
			 if(!Model::factory('Brands')->ap_check_brand_url($_POST['brand_url_old'],$_POST['brand_id'])) $_POST['brand_url'] = $_POST['brand_url_old'];
			 else $_POST['brand_url'] = $_POST['brand_url_old'].time();
		    }
		    else $_POST['brand_url'] = SpHTML::translit($_POST['brand_title']);
	       }
	       else {
		    if(!Model::factory('Brands')->ap_check_brand_url($_POST['brand_url'],$_POST['brand_id'])) $_POST['brand_url'] = $_POST['brand_url'];
		    else $_POST['brand_url'] = $_POST['brand_url'].time();
	       }

	       
	       
	       // если неверное значение в секретном поле - отправляем на главную модуля
	       if(HTML::chars($_POST['contact_xhr']) !=  sha1(Kohana::$config->load('global.site_secret_form').HTML::chars($_POST['contact_time']))) {
		    $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/');
	       }

	       if(Request::current()->method() == Request::POST && $valid->check()) {
			 if(HTML::chars($_POST['action_type']) == 'update') {
			      
			      $upd_c = Model::factory('Brands')->ap_brand_upd(
				      $_POST,$b_activity,$brand_picture,$brand_picture_big,$brand_logo,$brand_logo_onlist
			      );

			      
				 if(isset($_POST['submit_form'])) {
				      $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/edit/'.$_POST['brand_id'].'/');
				      
				 }
				 else $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/');

			      
			      
			 }
			 elseif(HTML::chars($_POST['action_type']) == 'new') {
			      
			      $add_c = Model::factory('Brands')->ap_brand_add(
				      $_POST,$b_activity,$brand_picture,$brand_picture_big,$brand_logo,$brand_logo_onlist
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
    
    public function action_brands_delete()
    {
	       $brands_profile = array();

	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());
	       
		       $validate_id = Validation::factory($this->request->param());
		       $validate_id -> rule('id', 'not_empty')
				    -> rule('id', 'max_length', array(':value', 11))
				    -> rule('id', 'digit');

		       $brand_id = (($validate_id -> check())) ? $validate_id['id'] : '0';


		       $brands_profile = Model::factory('Brands')->ap_brand_delete($brand_id); 
			   if($brands_profile) {
					$this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/');
					exit();
				}
    } 
    
    
    /*
     * Группы (категории)
     * 
     * 
     * 
    */
    public function action_brands_sections()
    {
	       $sections_list = array();

	       $content = View::factory('/Admin/'.$this->c_controller.'/Sections_List')
		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('sections_list', $sections_list)
		       ->bind('mod_url', $this->clow_controller)
		       ->bind('main_menu', $main_menu);



		       $breadcrumbs = View::factory('/Admin/Breadcrumbs')
				       ->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));

	       $sections_list = Model::factory('Brands')->ap_get_sections();

	       $this->template->content = $content;
	       $this->template->title_page = Kohana::$config->load($this->clow_controller.'.mod_title');

    } 
  
    
    /*
     * Форма создания / редактирования группы
     * 
     * 
     * 
    */
    public function action_brands_sections_form()
    {

	     // инициализация массива с данными формы    
	     $sections_list = array(
			'section_title' => '',
			'section_url' => '',
			'section_color' => '',
			'section_status' => '',
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
					 $sections_list = Model::factory('Brands')->ap_get_sections($section_id); // выборка информации о разделе из БД
					 $sections_list = $sections_list[0];
					 
					 $sectionid = $sections_list['id_section'];
					
					 $url_change = TRUE;   // определяем активность в форме
					 $activity_flag = ($sections_list['section_status'] != 0) ? TRUE : FALSE;   // определяем активность в форме
					 //
					 //
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
				    $activity_flag = TRUE;   // определяем активность в форме
				    
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
		       ->bind('activity_flag',$activity_flag)
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
    public function action_brands_sections_post()
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
		      -> rule('section_color', 'max_length', array(':value', 255))
		      -> rule('section_url_old', 'alpha_dash', array(':value', TRUE))	
		      -> rule('section_url_old', 'max_length', array(':value', 255))
		      -> rule('section_activity', 'digit')
		      -> rule('section_id', 'digit')
		      -> rule('section_id', 'not_empty')
		      -> rule('section_id', 'digit')
		      -> rule('contact_time', 'digit')
		      -> rule('contact_secret', 'alpha_dash');
	       


	       $s_activity = (isset($_POST['section_activity']) and ($_POST['section_activity'] == '1')) ? 1 : 0;

	       
	       // Типографирование для текстовых полей
	       $_POST['section_title'] = SpHTML::typo($_POST['section_title']);
		   
	       // если неверное значение в секретном поле - отправляем на главную модуля
	       if(HTML::chars($_POST['contact_xhr']) !=  sha1(Kohana::$config->load('global.site_secret_form').HTML::chars($_POST['contact_time']))) {
		    $this->request->redirect(URL::site(NULL, TRUE).$clow_controller.'/');
	       }
	       
	       
	       
	       if(!isset($_POST['section_url'])) {
		    if(isset($_POST['section_url_old'])) {
			 if(!Model::factory('Brands')->ap_check_sections_url($_POST['section_url_old'],$_POST['section_id'])) $section_url = $_POST['section_url_old'];
			 else $section_url = $_POST['section_url_old'].time();
		    }
		    else $section_url = SpHTML::translit($_POST['section_title']);
	       }
	       else {
		    if(!Model::factory('Brands')->ap_check_sections_url($_POST['section_url'],$_POST['section_id'])) $section_url = $_POST['section_url'];
		    else $section_url = $_POST['section_url'].time();
	       }

	       
	       

	       if(Request::current()->method() == Request::POST && $valid->check()) {
			 if(HTML::chars($_POST['action_type']) == 'update') {

			      $upd_c = Model::factory('Brands')->ap_sections_upd(
				      $_POST,$section_url,$s_activity
			      );
			    
				 if(isset($_POST['submit_form'])) {
				      $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/sections/edit/'.$_POST['section_id'].'/');
				      
				 }
				 else $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/sections/');

			      
			 }
			 elseif(HTML::chars($_POST['action_type']) == 'new') {
			      
			      $add_c = Model::factory('Brands')->ap_sections_add(
				      $_POST,$section_url,$s_activity
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
    
    
    public function action_brands_sections_delete()
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


		       $sections_profile = Model::factory('Brands')->ap_sections_delete($section_id); 
			   if($sections_profile) {
					$this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/sections/');
					exit();
				}
    } 
    
 
    public function action_brands_positions()
    {
	       $positions_list = array();
	       
	       $valid = Validation::factory($_POST);
	       $valid -> rule('floor_id', 'not_empty')
		      -> rule('floor_id', 'max_length', array(':value', 11))
		      -> rule('floor_id', 'digit');
	       $floor_active = (($valid -> check()) and ($_POST['floor_id'] != 'null')) ? $_POST['floor_id'] : NULL;

	       $content = View::factory('/Admin/'.$this->c_controller.'/Positions_List')
		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('positions_list', $positions_list)
		       ->bind('mod_url', $this->clow_controller)
		       ->bind('floor_active', $floor_active)
		       ->bind('main_menu', $main_menu);



		       $breadcrumbs = View::factory('/Admin/Breadcrumbs')
				       ->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));

	       $positions_list = Model::factory('Brands')->ap_get_positions(0, $floor_active);

	       $this->template->content = $content;
	       $this->template->title_page = Kohana::$config->load($this->clow_controller.'.mod_title');

    } 
    
    
    public function action_brands_positions_form()
    {

	     // инициализация массива с данными формы    
	     $positions_list = array(
			'section_title' => '',
			'section_coords' => '',
			'section_form' => '',
			'section_floor' => '',
			'section_status' => '',
			'id_section' => '',
	     );    
	     
	     $pos_forms_list = array(
		 'default' => __('Area_default'),
		 'rect' => __('Area_rect'),
		 'circle' => __('Area_circle'),
		 'poly' => __('Area_poly')
	     );
	     
	     $pos_floors_list = array(
		 1 => 1,
		 2 => 2
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
				    $position_id = $validate_param['id']; // id записи для извлечения из базы
				    $action = $validate_param['act'];	 // определяяем action - добавление или редактирование
				    

				    // если определен id записи и не равен нулю
				    if($position_id != 0) {
					 $positions_list = Model::factory('Brands')->ap_get_positions($position_id, 0); // выборка информации о разделе из БД
					 $positions_list = $positions_list[0];
					 
					 $posid = $positions_list['id_section'];

					 $activity_flag = ($positions_list['section_status'] != 0) ? TRUE : FALSE;   // определяем активность в форме
					 //
					 //
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

				    
				    $posid = 0;
				    
				    $activity_flag = TRUE;   // определяем активность в форме
				    
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
		       ->bind('positions_list', $positions_list)
		       ->bind('pos_forms_list', $pos_forms_list)
		       ->bind('pos_floors_list', $pos_floors_list)
		       ->bind('activity_flag',$activity_flag)
		       ->bind('mod_url', $this->clow_controller)
		       ->bind('mod_action', $form_action)
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
    public function action_brands_positions_post()
    {

	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());


	       
	       $_POST = Arr::map('trim', $this->request->post());
	       $_POST = Arr::map('SpHTML::unchars', $this->request->post());
	       
	       
  

	       $valid = Validation::factory($_POST);
	       $valid -> rule('position_title', 'not_empty')
		      -> rule('position_title', 'max_length', array(':value', 255))
		      -> rule('position_form', 'alpha_dash', array(':value', TRUE))	
		      -> rule('position_form', 'max_length', array(':value', 255))
		      -> rule('position_coords', 'max_length', array(':value', 255))
		      -> rule('position_floor', 'not_empty')
		      -> rule('position_floor', 'digit')
		      -> rule('position_activity', 'digit')
		      -> rule('pos_id', 'not_empty')
		      -> rule('pos_id', 'digit')
		      -> rule('contact_time', 'digit')
		      -> rule('contact_secret', 'alpha_dash');
	       


	       $p_activity = (isset($_POST['position_activity']) and ($_POST['position_activity'] == '1')) ? 1 : 0;

	       
	       // Типографирование для текстовых полей
	       $_POST['position_title'] = SpHTML::typo($_POST['position_title']);
		   
	       // если неверное значение в секретном поле - отправляем на главную модуля
	       if(HTML::chars($_POST['contact_xhr']) !=  sha1(Kohana::$config->load('global.site_secret_form').HTML::chars($_POST['contact_time']))) {
		    $this->request->redirect(URL::site(NULL, TRUE).$clow_controller.'/');
	       }
	       

	       
	       

	       if(Request::current()->method() == Request::POST && $valid->check()) {
			 if(HTML::chars($_POST['action_type']) == 'update') {

			      $upd_c = Model::factory('Brands')->ap_positions_upd(
				      $_POST,$p_activity
			      );
			    
				 if(isset($_POST['submit_form'])) {
				      $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/positions/edit/'.$_POST['pos_id'].'/');
				      
				 }
				 else $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/positions/');

			      
			 }
			 elseif(HTML::chars($_POST['action_type']) == 'new') {
			      
			      $add_c = Model::factory('Brands')->ap_positions_add(
				      $_POST,$p_activity
			      );
			      if($add_c) {
				 if(isset($_POST['submit_form'])) {
				      $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/positions/edit/'.$add_c[0].'/');
				 }
				 else $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/positions/');
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
    
    
    public function action_brands_positions_delete()
    {
	       $positions_profile = array();

	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());
	       
		       $validate_id = Validation::factory($this->request->param());
		       $validate_id -> rule('id', 'not_empty')
				    -> rule('id', 'max_length', array(':value', 11))
				    -> rule('id', 'digit');

		       $pos_id = (($validate_id -> check())) ? $validate_id['id'] : '0';


		       $positions_profile = Model::factory('Brands')->ap_positions_delete($pos_id); 
			   if($positions_profile) {
					$this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/positions/');
					exit();
				}
    } 

} // End Page