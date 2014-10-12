<?php
// http://blogocms.ru/2011/05/kohana-uskoryaem-orm/

class ORM extends Kohana_ORM
{
public function list_columns()
{
    $cache_lifetime=360000; // 100 �����
    $cache_key = $this->_table_name ."structure";
    if ($result = Kohana::cache($cache_key, NULL, $cache_lifetime)) {
        $_columns_data = $result;
    }
 
 
    if( !isset($_columns_data)) {
        $_columns_data = $this->_db->list_columns($this->_table_name);
        Kohana::cache($cache_key, $_columns_data, $cache_lifetime);
    }
 
    return $_columns_data;
}
} 
 
?>