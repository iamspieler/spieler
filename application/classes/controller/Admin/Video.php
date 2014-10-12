<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Admin_Video extends Controller_Admin {
    /*
     * Главная страница модуля
     * 
     * 
     * 
    */
    public function action_index()
    {
	       $video_list = array();
	     

	       $content = View::factory('/Admin/'.$this->c_controller.'/List')
		       ->bind('breadcrumbs', $breadcrumbs)
		       ->bind('video_list', $video_list)
		       ->bind('mod_url', $this->clow_controller)
		       ->bind('main_menu', $main_menu);

		       $breadcrumbs = View::factory('/Admin/Breadcrumbs')
				       ->set('breadcrumb', Breadcrumbs::generate($this->breadcrumb));

		       $count_c = Model::factory('Video')->ap_count_list();
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

	       $video_list = Model::factory('Video')->ap_get_list($cur_page);

	       $this->template->content = $content;
	       $this->template->title_page = Kohana::$config->load($this->clow_controller.'.mod_title');

    }  
    
     
    /*
     * Форма создания / редактирования контакта
     * 
     * 
     * 
    */
    public function action_video_form()
    {

	     // инициализация массива с данными формы    
	     $video_list = array(
			'video_title' => '',
			'video_descr' => '',
			'video_thumb' => '',
			'video_picture' => '',
			'video_file' => '',
			'video_date' => '',
			'video_main' => '',
			'video_status' => ''
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
				    $video_id = $validate_param['id']; // id записи для извлечения из базы
				    $action = $validate_param['act'];	 // определяяем action - добавление или редактирование
				    

				    // если определен id записи и не равен нулю
				    if($video_id != 0) {
					 $video_list = Model::factory('Video')->ap_get_profile($video_id); // выборка контакта из БД
	
					 $activity_flag = ($video_list['video_status'] != 0) ? TRUE : FALSE;   // определяем активность в форме
					 $ismain_flag = ($video_list['video_main'] != 0) ? TRUE : FALSE;   // главная новость или нет

					 
					 // заголовок, action и subaction формы
					 $form_title = __('Video_edit');
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
				    
				    $video_id = 0;
				    
				    // заголовок, action и subaction формы
				    $form_title = __('Video_add');
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
		       ->bind('video_list', $video_list)
		       ->bind('activity_flag', $activity_flag)
		       ->bind('ismain_flag', $ismain_flag)
		       ->bind('mod_url', $this->clow_controller)
		       ->bind('mod_action', $form_action)
		       ->bind('sub_action', $form_sub_action)
		       ->bind('form_title', $form_title)
		       ->bind('video_id', $video_id)
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
    public function action_video_post()
    {

	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());

	       $video_list = array();

	       $_POST = Arr::map('trim', $this->request->post());
	       $_POST = Arr::map('SpHTML::unchars', $this->request->post());
	     
	       

			  $p_upload_path = DOCROOT.'media/video/thumb/';
			  $v_upload_path = DOCROOT.'media/video/';
			  
			  
			  if(isset($_FILES) and (trim($_FILES['video_file']['name']) != '')) {
			      $valid_video = Validation::factory($_FILES)
				       ->rule('video_thumb', 'Upload::valid')
				       ->rule('video_thumb', 'Upload::not_empty')
				       ->rule('video_thumb', 'Upload::type',  array(':value', array('mp4','flv','webm')))
				       ->rule('video_thumb', 'Upload::size', array(':value', get_cfg_var('upload_max_filesize')));
			     
			     chmod($v_upload_path, 0777);
			     $v_fname = time();
			     $v_ext = pathinfo($_FILES['video_file']['name'], PATHINFO_EXTENSION);
			     
			     $video_upload = Upload::save($_FILES['video_file'], $v_fname.'.'.$v_ext, $v_upload_path, 0777); 
			     if($video_upload) $video_file = $v_fname.'.'.$v_ext;
			     else $video_file = '';
			     chmod($v_upload_path, 0644);
			     
			  }
			  else $video_file = HTML::chars($_POST['video_file_old']);
			  
			  
			  if(isset($_FILES) and (trim($_FILES['video_thumb']['name']) != '')) {
			      $valid_thumb = Validation::factory($_FILES)
				   ->rule('video_thumb', 'Upload::valid')
				   ->rule('video_thumb', 'Upload::not_empty')
				   ->rule('video_thumb', 'Upload::type',  array(':value', array('jpg','png','gif')))
				   ->rule('video_thumb', 'Upload::size', array(':value', '1M'));

			  if ($valid_thumb->check())
			  {
				  // Успешная валидация
				  $filename_thumb = Upload::save($_FILES['video_thumb'], time().'.'.pathinfo($_FILES['video_thumb']['name'], PATHINFO_EXTENSION), DOCROOT.'/media/video/thumb/', 0777);
				  // имя большой картинки
				  $picture_name = time();
				  // имя превью
				  $picture_name_smp = $picture_name.'_smp.';
				  // расширение картинок
				  $picture_ext = strtolower(pathinfo($_FILES['video_thumb']['name'], PATHINFO_EXTENSION));

				  // ширина превью
				  $picture_name_sm_w = Kohana::$config->load($this->clow_controller.'.mod_vps_w');
				  // высота превью
				  $picture_name_sm_h = Kohana::$config->load($this->clow_controller.'.mod_vps_h');
				  

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


				  //unlink($filename_thumb);
				  //@unlink(DOCROOT.'/media/video/thumb/'.$news_picture_small);
				  chmod(DOCROOT.'/media/video/thumb/', 0644);
				  chmod($p_upload_path, 0644);
				  
				  $video_picture_small = $picture_name_smp.$picture_ext;
				  $video_picture = $filename_thumb;
			  }
			  else
			  {
				  // Вывод ошибки
				  $this->errors = $valid_image->errors('upload');
				  print_r($this->errors);
			  }
	       }  
	       else {
		    $video_picture_small = HTML::chars($_POST['video_thumb_old']);
		    $video_picture = HTML::chars($_POST['video_picture_old']);
	       }
	       
	       
	       
	       
	       
	       
	       
	       

	       
	       

	       $valid = Validation::factory($_POST);
	       $valid -> rule('video_title', 'not_empty')
		      -> rule('video_title', 'max_length', array(':value', 255))
		      -> rule('video_activity', 'digit')
		      -> rule('video_ismain', 'digit')
		      -> rule('video_id', 'not_empty')
		      -> rule('video_id', 'digit')
		      -> rule('video_id', 'max_length', array(':value', 11))
		      -> rule('contact_time', 'digit')
		      -> rule('contact_secret', 'alpha_dash');
	       
	       
	       $v_activity = (isset($_POST['video_activity']) and ($_POST['video_activity'] == '1')) ? 1 : 0;
	       $v_ismain = (isset($_POST['video_ismain']) and ($_POST['video_ismain'] == '1')) ? 1 : 0;
	       

	       
	       $_POST['video_date'] = Date::formatted_time($_POST['video_date'], 'Y-m-d H:i:s');
	       
	       // Типографирование для текстовых полей
	       $_POST['video_title'] = SpHTML::typo($_POST['video_title']);
	       $_POST['video_descr'] = HTML::chars(SpHTML::typo($_POST['video_descr']));
	       
	       
  
	       
	       // если неверное значение в секретном поле - отправляем на главную модуля
	       if(HTML::chars($_POST['contact_xhr']) !=  sha1(Kohana::$config->load('global.site_secret_form').HTML::chars($_POST['contact_time']))) {
		    $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/');
	       }

	       if(Request::current()->method() == Request::POST && $valid->check()) {
			 if(HTML::chars($_POST['action_type']) == 'update') {
			      
			      $upd_c = Model::factory('Video')->ap_video_upd(
				      $_POST,$v_activity,$v_ismain,$video_picture_small,$video_picture,$video_file
			      );

				 if(isset($_POST['submit_form'])) {
				      $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/edit/'.$_POST['video_id'].'/');
				      
				 }
				 else $this->request->redirect(URL::site(NULL, TRUE).Kohana::$config->load('global.site_ap_url').'/'.$clow_controller.'/');

			      
			 }
			 elseif(HTML::chars($_POST['action_type']) == 'new') {
			      
			      $add_c = Model::factory('Video')->ap_video_add(
				     $_POST,$v_activity,$v_ismain,$video_picture_small,$video_picture,$video_file
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
    
    public function action_video_delete()
    {
	       $video_profile = array();

	       $c_controller = HTML::chars(Request::current()->controller());
	       $clow_controller = SpHTML::str_2lower($c_controller);
	       $c_action = HTML::chars(Request::current()->action());
	       
		       $validate_id = Validation::factory($this->request->param());
		       $validate_id -> rule('id', 'not_empty')
				    -> rule('id', 'max_length', array(':value', 11))
				    -> rule('id', 'digit');

		       $video_id = (($validate_id -> check())) ? $validate_id['id'] : '0';


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



		       $breadcrumbs = View::factory('/admin/breadcrumbs')
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