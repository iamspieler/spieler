<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Blog extends Model
{
    protected $_tableItems = 'sblog_items';
    protected $_tableSections = 'sblog_sections';
	protected $_tableIS = 'sblog_is';
	protected $_tableTags = 'sblog_tags';
	protected $_tableTI = 'tags_items';
    protected $_tableUsers = 'users';
    protected $_tableRolesUsers = 'roles_users';

    
    
    public function ap_get_list($page)
    {
	 
	$clow_controller = SpHTML::str_2lower(Request::current()->controller());
	$begin = ($page - 1)*Kohana::$config->load($clow_controller.'.ap_items_by_page');

	
	$query = DB::select('id_item', 'item_title_ru','item_url','item_publish_date','item_is_ru','item_is_en','item_status')
                 ->from($this->_tableItems)
				 ->order_by('item_publish_date', 'DESC')
				 ->limit($begin.",".Kohana::$config->load($clow_controller.'.ap_items_by_page'))
				 ->execute()
                 ->as_array(); 
 
        if($query)
            return $query;
        else
            return array();  
    }
    
	
	public function ap_get_sections()
    {

		$clow_controller = SpHTML::str_2lower(Request::current()->controller());
		
		
		$query = DB::select(
					'id_section', 
					array('section_title_'.Kohana::$config->load('global.site_lang'), 'section_title'),
					'section_url',
					'section_count',
					'section_status'
				)
					 ->from($this->_tableSections)
					 ->order_by('id_section', 'ASC')
					 ->execute()
					 ->as_array(); 
 
        if($query)
            return $query;
        else
            return array();  
    }
	
	
	public function ap_get_sections_list()
    {
		$clow_controller = SpHTML::str_2lower(Request::current()->controller());

		$query = DB::select(
					'id_section', 
					array('section_title_'.Kohana::$config->load('global.site_lang'), 'section_title')
				)
					 ->from($this->_tableSections)
					 ->where('section_status', '=', '1')
					 ->order_by('id_section', 'ASC')
					 ->execute()
					 ->as_array('id_section','section_title'); 
	 
			if($query)
				return $query;
			else
				return array();  
    }
	
	public function ap_get_item_tags($itemid = NULL)
    {

		if(!isset($itemid)) throw new HTTP_Exception_500();

		$columns = array(
				'id_tag',
				'tag_title_ru',
				'tag_url'
		);
		
		$query = DB::select_array($columns)
					 ->join($this->_tableTI, 'INNER')
					 ->on($this->_tableTags.'.id_tag', '=', $this->_tableTI.'.tag_id')
					 ->from($this->_tableTags)
					 ->where('tag_status', '=', 1)
					 ->and_where('ctrl', '=', 'blog')
					 ->and_where('item_id', '=', ':id')
					 ->bind(':id', $itemid)
					 ->execute()
					 ->as_array(); 
 
        if($query)
            return $query;	
        else
            return array();

		
    }
	
	public function ap_get_tags_json()
    {



		
		$query = DB::select('tag_title_ru')
					 ->from($this->_tableTags)
					 ->where('tag_status', '=', 1)
					 ->execute()
					 ->as_array('tag_title_ru'); 
 
        if($query)
            return $query;	
        else
            return array();

		
    }
    
	
	
    public function ap_get_photos($itemctrl = 'pages', $itemid)
    {
	 
	$clow_controller = SpHTML::str_2lower(Request::current()->controller());
	
	if(isset($itemid)) {
	   $a[0] = 'id_pages';
	   $a[1] = '=';
	   $a[2] = $itemid;   
	}
	else {
	   exit('error'); 
	}
	
	$query = DB::select('id_photo', 'photo_title','photo_small','photo_status')
                 ->from($this->_tablePhotos)
		 ->where('item_id', '=', ':id')
		 ->bind(':id', $itemid)
		 ->order_by('id_photo', 'ASC')
		 ->execute()
                 ->as_array(); 
 
        if($query)
            return $query;
        else
            return array();  
    }
    
    public function ap_photo_delete($photoid)
    {
	$query = DB::delete($this->_tablePhotos)
			  ->where('id_photo', '=', ':id')
			  ->bind(':id', $photoid)
			  ->limit(1)
			  ->execute();
 
        if($query)
            return $query;
        else
            return array();
    }
    
    
    public function ap_get_profile($itemid = NULL)
    {
	 
	$clow_controller = SpHTML::str_2lower(Request::current()->controller());
	
	if(isset($itemid)) {
	   $a[0] = 'id_item';
	   $a[1] = '=';
	   $a[2] = HTML::chars($itemid);   
	}
	else {
	   exit('error'); 
	}

	$columns = array(
	       'id_item',
	       'item_title_ru',
		   'item_title_en',
	       'item_url',
	       'item_text_ru',
		   'item_text_en',
	       'item_text_full_ru',
		   'item_text_full_en',
	       'item_picture',
	       'item_picture_dir',
	       'item_publish_date',
	       'item_unpublish_date',
	       'item_is_ru',
	       'item_is_en',
	       'item_main',
	       'item_status',
		   DB::expr("Group_concat(".Database::instance()->table_prefix().$this->_tableIS.".section_id SEPARATOR ',') sections ")
	);
	
	$query = DB::select_array($columns)
             ->from($this->_tableItems)
			 ->join($this->_tableIS)
			 ->on($this->_tableItems.'.id_item', '=', $this->_tableIS.'.item_id')
	         ->where('id_item', '=', ':id')
			 ->bind(':id', $itemid)
			 ->execute()
             ->as_array(); 
 
        if($query)
           return $query[0];
        else
            return array();  
			
			
    }
    
    
    
    
    // для выпадаюшего списка
    public function ap_pages_list()
    {

	$query = DB::select('pages_title','pages_url')
                 ->from($this->_tablePages)
		 ->order_by('pages_title', 'ASC')
		 ->execute()
                 ->as_array('pages_url', 'pages_title'); 
 
        if($query)
            return $query;
        else
            return array();  
    }
    
    
    public function ap_photo_add($pageid, $photo_picture_small, $photo_picture_medium, $photo_picture_big)
    {
	$columns = array(
			      'item_id',
			      'item_ctrl',
			      'photo_title',
			      'photo_small',
			      'photo_medium',
			      'photo_big',
			      'photo_status'
			  );
	
	$ins_info = array(
			      HTML::chars($pageid),
			      'pages',
			      HTML::chars('Photo'),
			      HTML::chars($photo_picture_small),
			      HTML::chars($photo_picture_medium),
			      HTML::chars($photo_picture_big),
			      1
			  );

	$query = DB::insert($this->_tablePhotos, $columns)
			  ->values($ins_info)
			  ->execute()
			  ; 
 
        if($query)
            return $query;
        else
            return array();
    }
    
    
    public function ap_pages_add($post_array, $pages_url, $activity, $ismain)
    {
	$columns = array(
			      'pages_title',
			      'pages_url',
			      'pages_text',
			      'pages_text_full',
			      'pages_seo_title',
			      'pages_seo_descr',
			      'pages_seo_keywords',
			      'pages_author_id',
			      'pages_author',
			      'pages_date',
			      'pages_main',
			      'pages_status'
			  );
	
	$ins_info = array(
			      HTML::chars($post_array['pages_title']),
			      HTML::chars($pages_url),
			      HTML::chars($post_array['pages_text']),
			      HTML::chars($post_array['pages_text_full']),
			      HTML::chars($post_array['pages_seo_title']),
			      HTML::chars($post_array['pages_seo_descr']),
			      HTML::chars($post_array['pages_seo_keywords']),
			      HTML::chars($post_array['pages_author_id']),
			      HTML::chars($post_array['pages_author']),
			      HTML::chars($post_array['pages_date']),
			      HTML::chars($ismain),
			      HTML::chars($activity)
			  );

	$query = DB::insert($this->_tablePages, $columns)
			  ->values($ins_info)
			  ->execute()
			  ; 
 
        if($query)
            return $query;
        else
            return array();
    }
    
    
    
    public function ap_pages_upd($post_array, $pages_url, $activity, $ismain)
    {



	$query = DB::update($this->_tablePages)
			  ->set(array(
			      'pages_title' => HTML::chars($post_array['pages_title']),
			      'pages_url' => HTML::chars($pages_url),
			      'pages_text' => SpHTML::unchars($post_array['pages_text']),
			      'pages_text_full' => SpHTML::unchars($post_array['pages_text_full']),
			      'pages_seo_title' => HTML::chars($post_array['pages_seo_title']),
			      'pages_seo_descr' => HTML::chars($post_array['pages_seo_descr']),
			      'pages_seo_keywords' => HTML::chars($post_array['pages_seo_keywords']),
			      'pages_author_id' => HTML::chars($post_array['pages_author_id']),
			      'pages_author' => HTML::chars($post_array['pages_author']),
			      'pages_date' => $post_array['pages_date'],
			      'pages_main' => $ismain,
			      'pages_status' => $activity
			  ))
			  ->where('id_pages', '=', HTML::chars($post_array['pages_id']))
			  ->execute(); 
 
        if($query)
            return $query;
        else
            return array();
    } 
    
    
 
    
    public function ap_count_list()
    {
 
 
	$query = DB::select(DB::expr('COUNT(id_item) AS total'))
                 ->from($this->_tableItems)
				 ->execute()
                 ->as_array(); 
 
        if($query)
            return $query;
        else
            return array();  
    }
    
   
    
    public function ap_check_pages_url($nurl, $nid)
    {
	
	$query = DB::select(DB::expr('COUNT(id_pages) AS total'))
                 ->from($this->_tablePages)
		 ->where('pages_url', '=', HTML::chars($nurl))
		 ->and_where('id_pages', '!=', HTML::chars($nid))
		 ->execute()
		 ->as_array(); 
 
        if($query[0]['total'] > 0) 
	     return true;
        else
             return false;
    }


    
    
    
    
 
    
    public function get_list($page, $only_active = true)
    {
	 
	$clow_controller = SpHTML::str_2lower(Request::current()->controller());
	$begin = ($page - 1)*Kohana::$config->load($clow_controller.'.mod_c_by_page'); 

	
	$query = DB::select('id_pages', 'section_id','pages_title','pages_url','pages_text','pages_date','pages_status','id_section','section_title','section_url')
                 ->from($this->_tablePages)
		 ->join($this->_tablePagesCat)
		 ->on($this->__tablePages.'.section_id', '=', $this->_tablePagesCat.'.id_section')
	         ->where('pages_status', '=', '1')
		 ->and_where('pages_date','<', NOW())
		 ->order_by('pages_date', 'DESC')
		 ->limit($begin.",".Kohana::$config->load($clow_controller.'.mod_c_by_page'))
		 ->execute()
                 ->as_array(); 
 
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
    
    
    
    public function get_groups_list()
    {

	$query = DB::select('id_group', 'group_title')
                 ->from($this->_tableContactsGroups)
		 ->order_by('group_title', 'ASC')
		 ->execute()
                 ->as_array('id_group', 'group_title'); 
 
        if($query)
            return $query;
        else
            return array();  
    }
    
    public function get_owners()
    {

	$query = DB::select('id', 'username', 'user_id', 'role_id')
                 ->from($this->_tableUsers)
		 ->join($this->_tableRolesUsers)
		 ->on($this->_tableRolesUsers.'.user_id', '=', $this->_tableUsers.'.id')
		 ->where('role_id', '>=', '2')
		 ->order_by('username', 'ASC')
		 ->execute()
                 ->as_array('id', 'username'); 
 
        if($query)
            return $query;
        else
            return array();  
    }
    
    // подсчет записей в рубрике
    public function count_i_section($section = NULL, $lang = LANG)
    {
			$query = DB::select(
				DB::expr('COUNT(id_item) AS total')
			)
			->from($this->_tableItems)
			->join($this->_tableIS)
			->on($this->_tableIS.'.item_id', '=', $this->_tableItems.'.id_item')
			->join($this->_tableSections)
			->on($this->_tableSections.'.id_section', '=', $this->_tableIS.'.section_id')
			->where('item_status', '=', '1')
			->and_where('section_url', '=', ':section')
			->bind(':section', $section)
			->and_where('item_publish_date', '<=', 'NOW()')
			->and_where('item_is_'.$lang, '=', 1)
			->execute()
			->as_array(); 
 
        if($query)
            return $query;
        else
            return array();  
    
	}
	
    public function count_items($year = 0, $month = 0, $day = 0, $lang = LANG)
    {
		if($year != 0) {
		   $a[0] = DB::expr("YEAR(item_publish_date)");
		   $a[1] = '=';
		   $a[2] = $year;   
		}
		else {
		   $a[0] = 'id_item';
		   $a[1] = '!=';
		   $a[2] = 0; 
		}
	
		if($month != 0) {
		   $b[0] = DB::expr("MONTH(item_publish_date)");
		   $b[1] = '=';
		   $b[2] = $month;   
		}
		else {
		   $b[0] = 'id_item';
		   $b[1] = '!=';
		   $b[2] = 0; 
		}
		
		if($day != 0) {
		   $c[0] = DB::expr("DAY(item_publish_date)");
		   $c[1] = '=';
		   $c[2] = $day;   
		}
		else {
		   $c[0] = 'id_item';
		   $c[1] = '!=';
		   $c[2] = 0; 
		}
 
 
		$query = DB::select(
				DB::expr('COUNT(id_item) AS total')
			)
			->from($this->_tableItems)
			->where('item_status', '=', '1')
			->and_where('item_publish_date', '<=', 'NOW()')
			->and_where('item_is_'.$lang, '=', 1)
			->and_where($a[0], $a[1], $a[2])
			->and_where($b[0], $b[1], $b[2])
			->and_where($c[0], $c[1], $c[2])
			->execute()
			->as_array(); 
 
        if($query)
            return $query;
        else
            return array();  
    }
	

    
    
    public function get_photos($itemctrl = 'pages', $itemid)
    {
	 
	$clow_controller = SpHTML::str_2lower(Request::current()->controller());
	
	if(isset($itemid)) {
	   $a[0] = 'id_pages';
	   $a[1] = '=';
	   $a[2] = $itemid;   
	}
	else {
	   exit('error'); 
	}
	
	$query = DB::select('id_photo', 'photo_title','photo_small','photo_medium','photo_status')
                 ->from($this->_tablePhotos)
		 ->where('item_id', '=', ':id')
		 ->bind(':id', $itemid)
		 ->order_by('id_photo', 'ASC')
		 ->execute()
                 ->as_array(); 
 
        if($query)
            return $query;
        else
            return array();  
    }
	
	
	public function get_tags($entryid = NULL, $lang = LANG)
    {

		if(!isset($entryid)) throw new HTTP_Exception_500();

		$columns = array(
				'id_tag',
				'tag_title_'.$lang,
				'tag_url'
		);
		
		$query = DB::select_array($columns)
					 ->join($this->_tableTI, 'INNER')
					 ->on($this->_tableTags.'.id_tag', '=', $this->_tableTI.'.tag_id')
					 ->from($this->_tableTags)
					 ->where('tag_status', '=', 1)
					 ->and_where('ctrl', '=', 'blog')
					 ->and_where('item_id', '=', ':id')
					 ->bind(':id', $entryid)
					 ->execute()
					 ->as_array(); 
 
        if($query)
            return $query;	
        else
            return array();

		
    }
    
	
	public function get_sections($lang = LANG)
    {

		$query = DB::select(
			'id_section',
			'section_title_'.$lang,
			'section_url',
			'section_count'
		)
		->from($this->_tableSections)
			 ->where('section_status', '=', 1)
			 ->execute()
			 ->as_array(); 
 
        if($query)
            return $query;
        else
            return array();  
    }
    
    
    public function get_items($page, $begin = 0, $lang = LANG)
    {
			
		$query = DB::select(
			'id_item',
			'item_title_'.$lang,
			'item_text_'.$lang,
			'item_text_full_'.$lang,
			'item_url',
			'item_picture',
			'item_picture_dir',
			'item_publish_date',
			DB::expr("Group_concat(".Kohana::$config->load('database.default.table_prefix').$this->_tableSections.".section_url SEPARATOR '::::') sect_ids, Group_concat(".Kohana::$config->load('database.default.table_prefix').$this->_tableSections.".section_title_".$lang." SEPARATOR '::::') sect_names ")
		)
		->group_by($this->_tableItems.'.id_item', $this->_tableItems.'.item_title_'.$lang)
		->from($this->_tableItems)
			 ->join($this->_tableIS, 'INNER')
			 ->on($this->_tableItems.'.id_item', '=', $this->_tableIS.'.item_id')
			 ->join($this->_tableSections, 'INNER')
			 ->on($this->_tableIS.'.section_id', '=', $this->_tableSections.'.id_section')
			 ->where('item_status', '=', '1')
			 ->and_where('section_status','=',1)
			 ->and_where('item_publish_date', '<=', 'NOW()')
			 ->and_where('item_is_'.$lang, '=', '1')
			 ->order_by('item_publish_date', 'DESC')
			 ->limit($begin.",".Kohana::$config->load('blog.items_by_page'))
			 ->execute()
			 ->as_array(); 
 
        if($query)
            return $query;
        else
            return array();  
    }
	
	
	public function get_items_section($section, $page = 1, $begin = 0, $lang = LANG)
    {

		if(!isset($section)) throw new HTTP_Exception_404();
		
		$query = DB::select(
			'id_item',
			'item_title_'.$lang,
			'item_url',
			'item_text_'.$lang,
			'item_text_full_'.$lang,
			'item_picture',
			'item_picture_dir',
			'item_publish_date',
			'id_section',
			'section_title_'.$lang,
			'section_url'
		)
		->from($this->_tableItems)
			->join($this->_tableIS)
			->on($this->_tableIS.'.item_id', '=', $this->_tableItems.'.id_item')
			->join($this->_tableSections)
			->on($this->_tableSections.'.id_section', '=', $this->_tableIS.'.section_id')
			 ->where('item_status', '=', '1')
			 ->and_where('item_publish_date', '<=', 'NOW()')
			 ->and_where('section_url', '=', ':section')
			 ->bind(':section', $section)
			 ->order_by('item_publish_date', 'DESC')
			 ->limit($begin.",".Kohana::$config->load('blog.items_by_page'))
			 ->execute()
			 ->as_array(); 
 
        if($query)
            return $query;
        else
            return array();  
    }
	
	public function get_archive($page, $begin = 0, $year = FALSE, $month = FALSE, $day = FALSE, $lang = LANG)
    {

		if($year == 0) throw new HTTP_Exception_404();
		else {
		   $a[0] = DB::expr("YEAR(item_publish_date)");
		   $a[1] = '=';
		   $a[2] = $year;   
		}
		 
		
		if($month != 0) {
		   $b[0] = DB::expr("MONTH(item_publish_date)");
		   $b[1] = '=';
		   $b[2] = $month;   
		}
		else {
		   $b[0] = 'id_item';
		   $b[1] = '!=';
		   $b[2] = 0; 
		}
		
		if($day != 0) {
		   $c[0] = DB::expr("DAY(item_publish_date)");
		   $c[1] = '=';
		   $c[2] = $day;   
		}
		else {
		   $c[0] = 'id_item';
		   $c[1] = '!=';
		   $c[2] = 0; 
		}
		

		$query = DB::select(
			'id_item',
			'item_title_'.$lang,
			'item_url',
			'item_text_'.$lang,
			'item_text_full_'.$lang,
			'item_picture',
			'item_picture_dir',
			'item_publish_date',
			DB::expr("Group_concat(".Kohana::$config->load('database.default.table_prefix').$this->_tableSections.".section_url SEPARATOR '::::') sect_ids, Group_concat(".Kohana::$config->load('database.default.table_prefix').$this->_tableSections.".section_title_".$lang." SEPARATOR '::::') sect_names ")
		)
		->group_by($this->_tableItems.'.id_item', $this->_tableItems.'.item_title_'.$lang)
		->from($this->_tableItems)
			 ->join($this->_tableIS, 'INNER')
			 ->on($this->_tableItems.'.id_item', '=', $this->_tableIS.'.item_id')
			 ->join($this->_tableSections, 'INNER')
			 ->on($this->_tableIS.'.section_id', '=', $this->_tableSections.'.id_section')
			 ->where('item_status', '=', '1')
			 ->and_where($a[0], $a[1], $a[2])
			 ->and_where($b[0], $b[1], $b[2])
			 ->and_where($c[0], $c[1], $c[2])
		//	 ->and_where('item_unpublish_date', '>=', 'NOW()')
			 ->bind(':id', $pagesid)
			 ->order_by('item_publish_date', 'DESC')
			 ->limit($begin.",".Kohana::$config->load('blog.items_by_page'))
			 ->execute()
			 ->as_array(); 
 
        if($query)
            return $query;
        else
			throw new HTTP_Exception_404('The requested item was not found on this server');

    }
    
	
	public function get_entry_id($entryid = NULL, $lang = LANG)
    {

		if(!isset($entryid)) throw new HTTP_Exception_500();

		$columns = array(
				'id_item',
				'item_title_'.$lang,
				'item_url',
				'item_text_'.$lang,
				'item_text_full_'.$lang,
				'item_picture',
				'item_picture_dir',
				'item_publish_date',
				DB::expr("Group_concat(".Kohana::$config->load('database.default.table_prefix').$this->_tableSections.".section_url SEPARATOR '::::') sect_ids, Group_concat(".Kohana::$config->load('database.default.table_prefix').$this->_tableSections.".section_title_".$lang." SEPARATOR '::::') sect_names ")
		);
		
		$query = DB::select_array($columns)
					 ->group_by($this->_tableItems.'.id_item', $this->_tableItems.'.item_title_'.$lang)
					 ->from($this->_tableItems)
					 ->join($this->_tableIS, 'INNER')
					 ->on($this->_tableItems.'.id_item', '=', $this->_tableIS.'.item_id')
					 ->join($this->_tableSections, 'INNER')
					 ->on($this->_tableIS.'.section_id', '=', $this->_tableSections.'.id_section')
					 ->where('item_status', '=', 1)
					 ->and_where('id_item', '=', ':id')					 
					 ->bind(':id', $entryid)
					 ->execute()
					 ->as_array(); 
        if($query)
            return $query[0];	
        else
            throw new HTTP_Exception_404('The requested item was not found on this server');

		
    }
	
	public function get_entry_slug($entryurl = NULL, $lang = LANG)
    {

		if(!isset($entryurl)) throw new HTTP_Exception_500();

		$columns = array(
				'id_item',
				'item_title_'.$lang,
				'item_url',
				'item_text_'.$lang,
				'item_text_full_'.$lang,
				'item_picture',
				'item_picture_dir',
				'item_publish_date',
				DB::expr("Group_concat(".Kohana::$config->load('database.default.table_prefix').$this->_tableSections.".section_url SEPARATOR '::::') sect_ids, Group_concat(".Kohana::$config->load('database.default.table_prefix').$this->_tableSections.".section_title_".$lang." SEPARATOR '::::') sect_names ")
		);
		
		$query = DB::select_array($columns)
					 ->group_by($this->_tableItems.'.id_item', $this->_tableItems.'.item_title_'.$lang)
					 ->join($this->_tableIS, 'INNER')
					 ->on($this->_tableItems.'.id_item', '=', $this->_tableIS.'.item_id')
					 ->join($this->_tableSections, 'INNER')
					 ->on($this->_tableIS.'.section_id', '=', $this->_tableSections.'.id_section')
					 ->from($this->_tableItems)
					 ->where('item_status', '=', 1)
					 ->and_where('item_url', '=', ':slug')
					 ->bind(':slug', $entryurl)
					 ->execute()
					 ->as_array(); 
 
        if($query)
            return $query[0];	
        else
            throw new HTTP_Exception_404('The requested item was not found on this server');

		
    }
	
	public function get_entry_archive($url = NULL, $year = NULL, $month = NULL, $day = NULL, $lang = LANG)
    {

		if((!isset($url)) or (!isset($year)) or (!isset($month)) or (!isset($day))) throw new HTTP_Exception_500();

		$columns = array(
				'id_item',
				'item_title_'.$lang,
				'item_url',
				'item_text_'.$lang,
				'item_text_full_'.$lang,
				'item_picture',
				'item_picture_dir',
				'item_publish_date',
				DB::expr("Group_concat(".Kohana::$config->load('database.default.table_prefix').$this->_tableSections.".section_url SEPARATOR '::::') sect_ids, Group_concat(".Kohana::$config->load('database.default.table_prefix').$this->_tableSections.".section_title_".$lang." SEPARATOR '::::') sect_names ")
		);
		
		$query = DB::select_array($columns)
					 ->group_by($this->_tableItems.'.id_item', $this->_tableItems.'.item_title_'.$lang)
					 ->from($this->_tableItems)
					 ->join($this->_tableIS, 'INNER')
					 ->on($this->_tableItems.'.id_item', '=', $this->_tableIS.'.item_id')
					 ->join($this->_tableSections, 'INNER')
					 ->on($this->_tableIS.'.section_id', '=', $this->_tableSections.'.id_section')
					 ->where('item_status', '=', 1)
					 ->and_where('section_status', '=', 1)
					 ->and_where(DB::expr("YEAR(item_publish_date)"), '=', ':year')
					 ->and_where(DB::expr("MONTH(item_publish_date)"), '=', ':month')
					 ->and_where(DB::expr("DAY(item_publish_date)"), '=', ':day')
					 ->and_where('item_url', '=', ':slug')
					 ->bind(':year', $year)
					 ->bind(':month', $month)
					 ->bind(':day', $day)
					 ->bind(':slug', $url)
					 ->execute()
					 ->as_array(); 
 
        if($query)
            return $query[0];	
        else
            throw new HTTP_Exception_404('The requested item was not found on this server');


		
    }
  
 
}