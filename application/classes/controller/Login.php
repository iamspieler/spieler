<?php defined('SYSPATH') or die('No direct access allowed.');

class Controller_Login extends Controller {

    public function before()
    {
        parent::before();
	
	// избавляемся от дублей страниц, добавляя в конец URL закрывающий слэш
	if( substr($_SERVER['REQUEST_URI'], -1) != '/' ){
	     header("HTTP/1.1 301 Moved Permanently");
	     header("Location: ".$_SERVER['REQUEST_URI']."/"); 
	     exit();
	}
    }
     
    public function action_index()
    {
	
		$is_captcha = FALSE;
		//$_POST['captcha'] = '';
	
			$errors = array();
			$contact_time_cr = time();    // время последнего редактирования записи
			$contact_secret = sha1(Kohana::$config->load('global.site_secret_form').$contact_time_cr); // секретное поле
	       
			$captcha = Captcha::instance();
			$token = Security::token();
			
			$is_captcha = $this->check_brt();
		   
    // Проверям, вдруг пользователь уже зашел
         if(Auth::instance()->logged_in())
            {
            // И если это так, то отправляем его сразу на страницу пользователей
            // return $this->request->redirect(ADMINURL);
			return Controller::redirect(ADMINURL);
            }

        // Если же пользователь не зашел, но данные на страницу пришли, то:
        if ($_POST)
        {
			$_POST = Arr::map('trim', $this->request->post());
	        $_POST = Arr::map('HTML::chars', $this->request->post());
			
			// обновляем лог заходов
			$this->check_brt_upd();

	     $valid = Validation::factory($_POST);
	     $valid   -> rule('username', 'not_empty')
		      -> rule('password', 'min_length', array(':value', 4))
		      -> rule('username', 'max_length', array(':value', 255))
		      -> rule('username', 'alpha_dash')
		      -> rule('password', 'not_empty')
		      -> rule('password', 'min_length', array(':value', 6))
		      -> rule('password', 'max_length', array(':value', 255))
		      -> rule('password', 'alpha_dash')
		      -> rule('contact_time', 'not_empty')
		      -> rule('contact_time', 'digit')
		      -> rule('contact_xhr', 'not_empty')
		      -> rule('contact_xhr', 'alpha_dash')
			  -> rule('csrf', 'not_empty')
			  -> rule('csrf', 'Security::check');

			  
		 if($is_captcha) {
			$error_captcha = Captcha::valid(@$_POST['captcha']) ? FALSE : TRUE;
		 }
		 else $error_captcha = FALSE;
	     if (!$valid -> check() or $error_captcha) {
			
			// запись в лог об ошибке входа
			@Kohana::$log->add(Log::INFO, 'Login admin error. <br />'.$valid['username'].'<br />'.$valid['password'].'<br />')->write();
			$captcha_v_errors = $error_captcha ? array(__('Captcha_error')) : array();
			
			$view = View::factory('Admin/Errors');
			$view->errors = $valid->errors('validation', TRUE);
		//echo $view;
		
		$is_captcha = TRUE;

			$login_form = View::factory('Login')
			   ->bind('is_captcha', $is_captcha)
			   ->bind('contact_time', $contact_time_cr)
			   ->bind('contact_secret', $contact_secret);
			$login_form->errors = $view->errors;
			$login_form->errors_c = $captcha_v_errors;
			$login_form->captcha = $captcha->render();
	       	echo $login_form;
			
			exit();
	     }
	     
	     // если неверное значение в секретном поле - отправляем на главную модуля
	       if(HTML::chars($_POST['contact_xhr']) !=  sha1(Kohana::$config->load('global.site_secret_form').HTML::chars($_POST['contact_time']))) {
		    //$this->request->redirect(URL::site(NULL, TRUE).$clow_controller.'/');
			Controller::redirect(URL::site(NULL, TRUE).$clow_controller.'/');
	       }
	       $is_remember = (isset($_POST['rememberme']) and ($_POST['rememberme'] == 1)) ? true : false;
	       
            // Создаем переменную, отвечающую за связь с моделью данных User
            $user = ORM::factory('user');
            // в $status помещаем результат функции login
            $status = Auth::instance()->login($_POST['username'], $_POST['password'], $is_remember);
            // Если логин успешен, то
            if ($status)
            {
                // Отправляем пользователя на его страницу
                //$this->request->redirect(ADMINURL);
				$session = Session::instance();
				$back_url = ($session->get('back_url')) ? URL::site(NULL, TRUE).HTML::chars($session->get('back_url')).'/' : ADMINURL;
				
				Controller::redirect($back_url);
            }
            else
            {
                // Иначе ничего не получилось, пишем failed
                /* echo '<div id="login-alert" class="alert alert-danger col-sm-12"><h4><i class="glyphicon glyphicon-exclamation-sign"></i> <?= __(\"Error\");?></h4><?= __(\"Login_failed\"); ?></div>'; */
				$errors = array(__('Incorrect username or password'));
				$errors_c = array();
				$is_captcha = TRUE;
			}
        }
		$session = Session::instance();
		$back_u = HTML::chars($session->get('back_url'));
		$back_url = ($back_u) ? URL::site(NULL, TRUE).HTML::chars($back_u).'/' : '';
		$session->delete('back_url');
		
        // Грузим view логина  
	       $login_form = View::factory('Login')
			   ->bind('contact_time', $contact_time_cr)
			   ->bind('is_captcha', $is_captcha)
			   ->bind('back_url', $back_url)
			   ->bind('errors', $errors)
			   ->bind('errors_c', $errors_c)
			   ->bind('contact_secret', $contact_secret);
	       $login_form->captcha = $captcha->render();
	       $this->response->body($login_form);
	    
	    
    }
    
    
    
    
    
    // Регистрация пользователей
    public function action_register()
    {
    // Если есть данные, присланные методом POST
    if ($_POST)
        {
        // Создаем переменную, отвечающую за связь с моделью данных User
        $model = ORM::factory('user');
        // Вносим в эту переменную значения, переданные из POST
        $model->values(array(
           'username' => $_POST['username'],
           'email' => $_POST['email'],
           'password' => $_POST['password'],
           'password_confirm' => $_POST['password_confirm'],
        ));
        try
        {
            // Пытаемся сохранить пользователя (то есть, добавить в базу)
            $model->save();
            // Назначаем ему роли
            $model->add('roles', ORM::factory('role')->where('name', '=', 'login')->find());
            // И отправляем его на страницу пользователя
                //$this->request->redirect('member/view/');
				Controller::redirect('member/view/');
        }
        catch (ORM_Validation_Exception $e)
        {
            // Это если возникли какие-то ошибки
            echo $e;
	     var_dump($e->errors());
        }
        }
        // Загрузка формы логина
        $this->response->body(View::factory('Register'));
    }

    // Просмотр пользовательских данных
    public function action_view()
    {
    // Проверям, залогинен ли пользователь
    if(Auth::instance()->logged_in())
            {
            // Если да, то здороваемся и предлагаем выйти. Это можно было и в виде view реализовать
            echo 'Добро пожаловать, '.Auth::instance()->get_user()->username.'!';
            echo '<br /><a href=\'logout\'>logout</a>';
            }
    else
        {
            // А если он не залогинен, отправляем логиниться
            //return $this->request->redirect('login');
			Controller::redirect('login');
        }

    }

    // Метод разлогивания
    public function action_logout()
    {
    // Пытаемся разлогиниться
    if (Auth::instance()->logout())
        {
            // Если получается, то предлагаем снова залогиниться
            //return $this->request->redirect('login');
			Controller::redirect('login');
        }
    else
        {
            // А иначе - пишем что не удалось
            echo 'fail logout';
        }
    }
	
	protected function check_brt() {

		$u_info = $this->check_u_info();
		
		$current = file_get_contents($u_info['logf']);
		
		if($current != NULL) {
			$arr_f = explode(' | ', $current);
			if((is_array($arr_f)) and ($arr_f[1] == $u_info['ustr']) and ($arr_f[0])) {
			
				$interval = time() - $arr_f[0];
				//echo $interval;
				$captcha_show = ($interval < (60*5)) ? TRUE : FALSE;
			}
			else $captcha_show = FALSE;
		}
		else $captcha_show = FALSE;
		
		return $captcha_show;

	}
	
	protected function check_brt_upd() {
		$u_info = $this->check_u_info();
	
		$fp = file_put_contents($u_info['logf'], $u_info['utxt'], LOCK_EX);
	}
	
	protected function check_u_info() {
		$user_ip = Request::$client_ip;
		$user_agent = Request::$user_agent;
		$user_time = time();
		$s_string = sha1($user_ip.$user_agent.Cookie::$salt);
		
		$user_text = time(). ' | ' .$s_string;
		
		$file = APPPATH."logs/login/cbrt.txt";
		
		return array('logf' => $file, 'uip' => $user_ip, 'uag' => $user_agent, 'utm' => $user_time, 'ustr' => $s_string, 'utxt' => $user_text);

	}



}