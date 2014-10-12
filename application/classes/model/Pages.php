<?php defined('SYSPATH') or die('No direct script access.');
 
/**
 * Category entity class
 *
 * @author     Novichkov Sergey(Radik) <novichkovsergey@yandex.ru>
 * @copyright  Copyrights (c) 2012 Novichkov Sergey
 *
 * @property  integer $id
 * @property  integer $lft
 * @property  integer $rgt
 * @property  integer $level
 * @property  string  $name
 * @property  string  $description
 */
class Model_Pages extends ORM_Nested_Sets{
 
    /**
     * Use or not scope for multi root's tree
     *
     * @var bool
     */
    protected $use_scope = FALSE;
	protected $_table_name = 'pages';

 
    /**
     * Table columns
     *
     * Field name => Label
     *
     * @var array
     */
    protected  $_table_columns = array(
        'id_page'            => 'id_page',
        'lft'           => 'lft',
        'rgt'           => 'rgt',
        'level'         => 'level',
        'name'          => 'name',
        'description'   => 'description',
    );
	
	
	protected $_primary_key = 'id_page';
 
} // End Model_Category