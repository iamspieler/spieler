<?php defined('SYSPATH') or die('No direct script access.');
 
class Breadcrumbs {
   
   static function generate($bred_array){
      $bred_generated = array();
      $i = 0;
      foreach($bred_array as $bred){
         $i++;
         if ( ! isset($bred['link']) || $i == count($bred_array))
            $bred_generated[] = $bred['name'];
         else {
	      $tr_slash = ($bred['link'] != URL::base()) ? "/" : "";

	      $bred_generated[] = '<a href="'.$bred['link'].$tr_slash.'">'.HTML::chars($bred['name']).'</a>';
	 }
	    
      }
      $bred_generated = implode('<span class="separator">'. Kohana::$config->load('global.site_br_sep') .'</span>', $bred_generated);
      return $bred_generated;
   }
   
}