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
<title><?= $title_page;?> | <?= $title;?></title>
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="public/default/img/favicon.ico" type="image/x-icon">
<link rel="icon" href="public/default/img/favicon.ico" type="image/x-icon">

<link href='http://fonts.googleapis.com/css?family=PT+Sans&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

<?= HTML::script('public/'. $template .'/js/pace.min.js'); ?>
<?php foreach($styles as $style): ?>
<?= HTML::style('public/'. $template .'/css/'.$style.'.css'); ?>
<?php endforeach; ?>

<!--
<script type="text/javascript"
     src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
    </script>
-->
<?= HTML::script('public/'. $template .'/js/jquery.183.js'); ?>
<?php foreach($scripts as $script): ?>
<?= HTML::script('public/'. $template .'/js/'.$script.'.js'); ?>
<?php endforeach; ?>
<script src="//cdn.jsdelivr.net/typeahead.js/0.9.3/typeahead.min.js"></script>
<?= HTML::script('public/'. $template .'/js/tagmanager.js'); ?>
<script type="text/javascript">
    $(function(){
      // pjax
      $('.nav a').pjax('#main_container');
    })
</script>

<?= HTML::script('public/'. $template .'/editors/ckeditor/ckeditor.js'); ?>
    
<!--[if IE 7]>
<?= HTML::style('public/'. $template .'/css/font-awesome-ie7.min.css'); ?>
<![endif]-->

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
    <?= HTML::script('http://html5shim.googlecode.com/svn/trunk/html5.js'); ?>
<![endif]-->
<script>
$(document).ready(function () {    
    $('#datepicker, #datepicker_end').datetimepicker({
	  language: '<?= I18n::lang(); ?>'
    });

});
       
</script>

</head>

<body>

<div class="container">
	 <div class="row">
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			  <div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><?= HTML::chars($tiny_title); ?></a>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<?= $menu_main; ?>
						<ul class="nav navbar-nav navbar-right">
							<li>
							  <p class="nav_txt">
								<?= __('You_have_logined_as'); ?> <?= SpHTML::anchor(
								   '#userModal',
								   '<i class="icon-user"></i> '.Auth::instance()->get_user()->username,
								   array(
									   'class'=>'serv_link',
									   'data-toggle'=>'modal'
								   )
								   );
								?>
							   </p>
							</li>
							
							<li class="nav_btn"><a href="#" onclick="location.href = '<?= URL::base('http').'/logout/';?>'" class="btn btn-info"><i class="icon icon-signout"></i> <?= __('Logout'); ?></a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid --><div class="clearfix"></div>
		</nav>
	</div>
</div>

<div class="container-fluid">
     <div class="row">
		  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 main columns">
			   <?= $menu_sub; ?>
			   <div id="main_container">
				<?= $content; ?>
			   </div>
		  </div><!--/span-->
    </div><!--/row-->
</div><!--/.fluid-container-->	




</body>

</html>