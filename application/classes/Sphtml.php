<?php defined('SYSPATH') OR die('No direct script access.');

class SpHTML extends Kohana_HTML {


	public static function anchor($uri, $title = NULL, array $attributes = NULL, $protocol = NULL, $index = TRUE)
	{
		if ($title === NULL)
		{
			// Use the URI as the title
			$title = $uri;
		}

		if ($uri === '')
		{
			// Only use the base URL
			$uri = URL::base($protocol, $index);
		}
		else
		{
			if (strpos($uri, '://') !== FALSE)
			{
				if (HTML::$windowed_urls === TRUE AND empty($attributes['target']))
				{
					// Make the link open in a new window
					$attributes['target'] = '_blank';
				}
			}
			elseif ($uri[0] !== '#')
			{
				// Make the URI absolute for non-id anchors
				$uri = URL::site($uri, $protocol, $index)."/";
			}
		}

		// Add the sanitized link to the attributes
		//$attributes['href'] = LANG . '/'. $uri;
		$attributes['href'] = $uri;
		return '<a'.HTML::attributes($attributes).'>'.$title.'</a>';
	}
	
	public static function str_2lower($str) {
	     return HTML::chars(strtolower($str));
	}
	
	public static function space_del($str, $pattern = "") {
	     return HTML::chars(str_replace(" ", $pattern, $str));
	}
	
	public static function unchars($str) {
	     return html_entity_decode($str, ENT_QUOTES, 'utf-8');
	}
	
	public static function ent($value)
	{
	        $value = str_replace("\n", "", $value);
		$value = str_replace("\r\n", "", $value);
		return htmlentities( (string) $value, ENT_QUOTES, Kohana::$charset);
	}
	
	public static function typo($text) {
	     // http://ibnteo.klava.org/php/typograph
	       //$text = html_entity_decode($text, ENT_QUOTES, 'utf-8');
	       $arr = array(
		   // Убираем символ троеточия
		   '/…/u' => '...',
		   // Кавычки «ёлочки» &laquo; &raquo;
		   '/(^|[\s;\(\[-])"/' => '$1«',
		   '/"([\s-\.!,:;\?\)\]\n\r]|$)/' => '»$1',
		   '/([^\s])"([^\s])/' => '$1»$2',
		   // Длинное тире &mdash;
		   '/(^|\n|["„«])--?(\s)/u' => '$1—$2',
		   '/(\s)--?(\s)/' => ' —$2',
		   // Непереносимый проблел после коротких слов &nbsp;
		   '/([\s][a-zа-яё]{1,2})[ ]/iu' => '$1 '
	       );
	       foreach ($arr as $key=>$val) {
		   $text = preg_replace($key, $val, $text);
	       }
	       // Вложенные кавычки &bdquo; &ldquo;
	       while (preg_match('/(«[^«»]*)«/mu', $text)) {
		   $text = preg_replace('/(«[^«»]*)«/mu', '$1„', $text);
		   $text = preg_replace('/(„[^„“«»]*)»/mu', '$1“', $text);
	       }
	       return $text;
	}
	
	public static function translit($string) {
	       $replace=array(
		       "'"=>"",
		       "`"=>"",
		       "а"=>"a","А"=>"a",
		       "б"=>"b","Б"=>"b",
		       "в"=>"v","В"=>"v",
		       "г"=>"g","Г"=>"g",
		       "д"=>"d","Д"=>"d",
		       "е"=>"e","Е"=>"e",
		       "ж"=>"zh","Ж"=>"zh",
		       "з"=>"z","З"=>"z",
		       "и"=>"i","И"=>"i",
		       "й"=>"y","Й"=>"y",
		       "к"=>"k","К"=>"k",
		       "л"=>"l","Л"=>"l",
		       "м"=>"m","М"=>"m",
		       "н"=>"n","Н"=>"n",
		       "о"=>"o","О"=>"o",
		       "п"=>"p","П"=>"p",
		       "р"=>"r","�"=>"r",
		       "с"=>"s","С"=>"s",
		       "т"=>"t","Т"=>"t",
		       "у"=>"u","У"=>"u",
		       "ф"=>"f","Ф"=>"f",
		       "х"=>"h","Х"=>"h",
		       "ц"=>"c","Ц"=>"c",
		       "ч"=>"ch","Ч"=>"ch",
		       "ш"=>"sh","Ш"=>"sh",
		       "щ"=>"sch","Щ"=>"sch",
		       "ъ"=>"","Ъ"=>"",
		       "ы"=>"y","Ы"=>"y",
		       "ь"=>"","Ь"=>"",
		       "э"=>"e","Э"=>"e",
		       "ю"=>"yu","Ю"=>"yu",
		       "я"=>"ya","Я"=>"ya",
		       "і"=>"i","І"=>"i",
		       "ї"=>"yi","Ї"=>"yi",
		       "Ё"=>"yo","ё"=>"yo",
		       "є"=>"e","Є"=>"e"
	       );
	       return $str=iconv("UTF-8","UTF-8//IGNORE",strtr($string,$replace));
	}
	
	
	
	public static function wysiwyg($name, $value = '', $css = '', $height = '260', $width = '98%')
	{
		$url_base = URL::base();

		include_once(DOCROOT.'public/default/editors/ckeditor/ckeditor.php');
		include_once(DOCROOT.'public/default/editors/ckeditor/kcfinder/browse.php');

		$CKEditor = new CKEditor();
		$CKEditor->basePath = $url_base . 'public/default/editors/ckeditor/';

		$CKEditor->config['height'] = $height . 'px';
		$CKEditor->config['width']  = $width;

		$config['uiColor'] = '#efefef';

		$config['contentsCss'] = $css;

		// Кнопки (добавляем/убираем)
		$config['toolbar'] = array(
			array('Source','-', 'Maximize', 'ShowBlocks'),
			array('Cut','Copy','Paste','PasteText','PasteFromWord'),
			array('Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'),
			array('Link','Unlink','Anchor'),
			array('Image','Table','HorizontalRule','SpecialChar','PageBreak'),
			'/',
			array('Format', 'Bold','Italic','Underline','Strike',),
			array('JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','NumberedList','BulletedList'),
			array('Outdent','Indent','-','TextColor','BGColor','-','Subscript','Superscript'),
			array('uiColor')
		);

		ob_start();
		$CKEditor->editor($name, $value, $config);
		return ob_get_clean();
	}     

} // End html
