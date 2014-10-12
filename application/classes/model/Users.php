<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Users extends Model
{
    protected $_tableUsers = 'users';
    protected $_tableUsersRoles = 'roles';

    public function get_list($page)
    {
	 
	$clow_controller = SpHTML::str_2lower(Request::current()->controller());
	$begin = ($page - 1)*Kohana::$config->load($clow_controller.'.mod_c_by_page'); 
	
	$query = DB::select('id', 'email','username','logins','last_login','user_off_name')
                 ->from($this->_tableUsers)
		 ->order_by('id', 'ASC')
		 ->limit($begin.",".Kohana::$config->load($clow_controller.'.mod_c_by_page'))
		 ->execute()
                 ->as_array(); 
 
        if($query)
            return $query;
        else
            return array();  
    }
    
    public function get_list_short()
    {
	 
	$query = DB::select('id', 'username')
                 ->from($this->_tableUsers)
		 ->order_by('username', 'ASC')
		 ->execute()
                 ->as_array('id', 'username'); 
 
        if($query)
            return $query;
        else
            return array();  
    }
    
    
    
    public function get_list_g($page, $group_id = 0)
    {
	 
	if(isset($group_id) and ($group_id != 0)) {
	   $a[0] = 'id_group';
	   $a[1] = '=';
	   $a[2] = $group_id;   
	}
	else {
	   $a[0] = 'id_group';
	   $a[1] = '!=';
	   $a[2] = 0;   
	}
	
	
	$clow_controller = SpHTML::str_2lower(Request::current()->controller());
	$begin = ($page - 1)*Kohana::$config->load($clow_controller.'.mod_c_by_page'); 
	
	$query = DB::select('id_group', 'group_title','group_url','group_description')
                 ->from($this->_tableContactsGroups)
		 ->where($a[0],$a[1],$a[2])
		 ->order_by('group_title', 'ASC')
		 ->limit($begin.",".Kohana::$config->load($clow_controller.'.mod_c_by_page'))
		 ->execute()
                 ->as_array();
        if($query)
            return $query;
        else
            return array();  
    }
    
    
    
    
    public function get_list_by_group($page,$group_url)
    {
	 
	$clow_controller = SpHTML::str_2lower(Request::current()->controller());
	$begin = ($page - 1)*Kohana::$config->load($clow_controller.'.mod_c_by_page'); 
	
	if(isset($group_url)) {
	   $a[0] = 'group_url';
	   $a[1] = '=';
	   $a[2] = $group_url;   
	}
	else {
	   $a[0] = 'group_url';
	   $a[1] = '!=';
	   $a[2] = '';  
	}

	
	$query = DB::select('id_contact', 'group_id','contact_name','contact_second_name','contact_surname','contact_phone_cell','contact_phone_work','contact_phone_home','id_group','group_title','group_url')
                 ->from($this->_tableContacts)
		 ->join($this->_tableContactsGroups)
		 ->on($this->_tableContacts.'.group_id', '=', $this->_tableContactsGroups.'.id_group')
	         ->where('contact_status', '=', '1')
		 ->and_where($a[0],$a[1],$a[2])
		 ->order_by('contact_surname', 'ASC')
		 ->limit($begin.",".Kohana::$config->load($clow_controller.'.mod_c_by_page'))
		 ->execute()
                 ->as_array(); 
 
        if($query)
            return $query;
        else
            return array();  
    }
    
    
    

    
    
    
    public function user_add($post_array)
    {
	try
        {
	       $model = ORM::factory('user');
	       $model->values(array(
		      'email' => $post_array['email'],
		      'username' => $post_array['username'],
		      'password' => $post_array['password'],
		      'password_confirm' => $post_array['password_confirm'],
		      'user_off_name' => HTML::chars($post_array['user_off_name']),
		      'user_curator' => Auth::instance()->get_user()->id
	       ));
	       $query = $model->save();
	       
	       foreach($_POST['user_role'] as $ur) {
		    $model->add('roles', ORM::factory('role')->where('id', '=', $ur)->find());
	       }
	       
	       return $query;
	}
        catch (ORM_Validation_Exception $e)
        {
            echo $e;
	    return array();
        }
    }
    
    
    
    public function user_upd($post_array)
    {
	  try
	  {
	       $query = ORM::factory('user', $_POST['user_id'])
		      -> update_user($post_array, array(
			      'email',
			      'username',
			      'password',
			      'user_off_name',
		      ));
	       $model = ORM::factory('user', $_POST['user_id']);
	       $model->remove('roles', ORM::factory('role'));
	       foreach($_POST['user_role'] as $ur) {
		    $model->add('roles', ORM::factory('role')->where('id', '=', $ur)->find());
	       }
	       
	       
	       return $query;
	  }
	  catch (ORM_Validation_Exception $e)
	  {
	       echo $e;
	       return array();
	  }
    }
    
    
    public function group_add($post_array)
    {
	$columns = array(
			      'group_title',
			      'group_url',
			      'group_description',
			  );
	
	$ins_info = array(
			      HTML::chars($post_array['group_title']),
			      HTML::chars($post_array['group_url']),
			      HTML::chars($post_array['group_description'])
			  );

	$query = DB::insert('contacts_groups', $columns)
			  ->values($ins_info)
			  ->execute()
			  ; 
 
        if($query)
            return $query;
        else
            return array();
    }
    
    
    
    public function group_upd($post_array)
    {

	
	$query = DB::update('contacts_groups')
			  ->set(array(
			      'group_title' => 'a',
			      'group_url' => 'f',
			      'group_description' => 'd'
			  ))
			  ->where('id_group', '=', HTML::chars($post_array['group_id']))
			  ->execute(); 

        if($query)
            return $query;
        else
           return array();
    }
    
    
    public function count_users($group_active = 0)
    {
	/* 
	if((isset($group_active)) and ($group_active != 0)) {
	   $a[0] = 'group_id';
	   $a[1] = '=';
	   $a[2] = $group_active;   
	}
	else {
	   $a[0] = 'group_id';
	   $a[1] = '!=';
	   $a[2] = '0';  
	}
	 
 
	$query = DB::select(DB::expr('COUNT(id) AS total'))
                 ->from($this->_tableUsers)
	         ->where('id', '!=', '0')
		// ->and_where($a[0],$a[1],$a[2])
		 ->execute()
                 ->as_array(); 
	*/
	 
	$query = ORM::factory('user')
	       ->count_all();
 
        if($query)
            return $query;
        else
            return array();  
    }
    
    
    public function count_list_groups()
    {
	 
	$query = DB::select(DB::expr('COUNT(id_group) AS total'))
                 ->from($this->_tableContactsGroups)
		 ->execute()
                 ->as_array(); 
 
        if($query)
            return $query;
        else
            return array();  
    }
    
    
    
    public function get_roles_list()
    {

	$query = DB::select('id', 'name', 'name_native', 'description')
                 ->from($this->_tableUsersRoles)
		 ->execute()
                 ->as_array(); 
 
        if($query)
            return $query;
        else
            return array();  
    }
    
    public function get_user_roles($userid)
    {

	$user = ORM::factory('user', $userid);
	$role = $user->roles->find_all()->as_array('id', 'name');
 
	return $role;  
    }
    

    
    
    
    public function get_profile($userid)
    {
	 
	$clow_controller = SpHTML::str_2lower(Request::current()->controller());
	
	if(isset($group_active)) {
	   $a[0] = 'group_id';
	   $a[1] = '=';
	   $a[2] = $group_active;   
	}
	else {
	   $a[0] = 'group_id';
	   $a[1] = '!=';
	   $a[2] = '0';  
	}

	$columns = array(
	       'id',
	       'email',
	       'username',
	       'last_login',
	       'user_off_name'
	);
	
	$query = DB::select_array($columns)
                 ->from($this->_tableUsers)
	         ->where('id', '=', ':id')
		 ->bind(':id', $userid)
		 ->execute()
                 ->as_array(); 
 
        if($query)
            return $query[0];
        else
            return array();  
    }
}