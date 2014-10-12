<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Основной шаблон
 */
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $title;?></title>
<meta name="description" content="<?= $description;?>">
<meta name="keywords" content="<?= $keywords;?>">
<meta name="author" content="">
<meta name="google-site-verification" content="39c0AfIifV0PtQlGcYdUv0SOHtzc9i1pAOwxpnnNaYo" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Cache-Control" content="max-age=3600, must-revalidate" />
<base href="<?= URL::base();?>" />


<?php foreach($styles as $style): ?>
<?= HTML::style('public/'. $template .'/css/'.$style.'.css'); ?>
<?php endforeach; ?>



<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script>
$('.to_top').click(function() {  
    $('body,html').animate({scrollTop:0},500);  
    return false;  
 });
</script>
<?php foreach($scripts as $script): ?>
<?= HTML::script('public/'. $template .'/js/'.$script.'.js'); ?>
<?php endforeach; ?>



<link href='http://fonts.googleapis.com/css?family=PT+Serif&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Tinos&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="<?= URL::base(); ?>/public/<?= $template; ?>/img/favicon.ico" type="image/x-icon" />
<link rel="icon" href="<?= URL::base(); ?>/public/<?= $template; ?>/img/favicon.ico" type="image/x-icon" />

<!--[if IE 7]>
<link type="text/css" href="<?= URL::base('http'); ?>public/<?= $template; ?>/css/font-awesome-ie7.min.css" rel="stylesheet" /><![endif]-->

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
    <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->


</head>

<body>
     

		       <?= $content; ?>


</body>

</html>