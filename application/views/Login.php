<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Форма авторизации
 */
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= __('Authorization');?> | <?= Kohana::$config->load('global.site_title');?></title>
<meta name="description" content="">
<meta name="author" content="">

<link type="text/css" href="<?= URL::base();?>public/default/css/bootstrap.min.css" rel="stylesheet" />
<link type="text/css" href="<?= URL::base();?>public/default/css/font-awesome.min.css" rel="stylesheet" />
<link type="text/css" href="<?= URL::base();?>public/default/css/main.css" rel="stylesheet" />

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="<?= URL::base();?>public/default/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= URL::base();?>public/default/js/sisyphus.min.js"></script>
<script type="text/javascript" src="<?= URL::base();?>public/default/js/main.js"></script>



<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
    <?= HTML::script('http://html5shim.googlecode.com/svn/trunk/html5.js'); ?>
<![endif]-->


</head>

<style>
.mainbox{margin-top:5%;}
.panel-body{padding-top:30px}
.login-group{margin-bottom: 25px}
.mainbox .credits{text-align:center;margin:8px auto;font:normal 0.8em 'Helvetica', Arial, sans-serif;}
</style>

<body>
<div class="container">    
     <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
          <div class="panel panel-info">
               <div class="panel-heading">
                    <div class="panel-title"><?= __('Authorization'); ?></div>
               </div>     
               <div class="panel-body">
						<? if((!empty($errors)) or (!empty($errors_c))) { ?>
                        <div id="login-alert" class="alert alert-danger col-sm-12"><!-- start errors div -->
							<h4><i class="glyphicon glyphicon-exclamation-sign"></i> <?= __('Error');?></h4>
							<?  foreach($errors as $err) echo $err.'<br />';?>
							<?  foreach($errors_c as $err_c) echo $err_c.'<br />';?>
						</div><!-- end of errors div -->
						<? } ?>
                        <form method="post" accept-charset="utf-8" id="loginform" class="form-horizontal" role="form">      
							  <div class="login-group input-group">
                                   <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                   <input id="username" type="text" class="form-control" name="username" pattern=".{4,50}" value="" placeholder="<?= __('Username');?>">                                        
                              </div>
                              <div class="login-group input-group">
                                   <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                   <input id="login-password" type="password" class="form-control" name="password" placeholder="<?= __('Password');?>">
                              </div>
							  <? if($is_captcha) { ?>
							  <div class="login-group input-group col-md-4 col-sm-4 col-xs-12">
                                   <span class="input-group-addon"><i class="glyphicon glyphicon-question-sign"></i></span>
                                   <input id="login-captcha" type="text" class="form-control" name="captcha" placeholder="<?= __('Captcha');?>">
								   <?php echo $captcha; ?>
                              </div>
							  <? } ?>
							  <div>
								  <div class="input-group login-group pull-left col-md-6 col-sm-6 col-xs-12">
									   <div class="checkbox">
											<label class="">
											  <input id="rememberme" type="checkbox" name="rememberme" value="1"> <?= __('Remember_me');?>
											</label>
										</div>
								  </div>
								  <div class="input-group pull-right col-md-6 col-sm-6 col-xs-12">
									   <!-- Button -->
									   <div class="col-sm-12 controls">
											<button id="btn-login" href="#" class="btn btn-success col-md-12 col-sm-12 col-xs-12"><?= __('Enter');?></button>
									   </div>
								  </div>
							  </div>
							  <div class="clearfix"></div>
                              <div class="form-group">
                                   <div class="col-md-12 control">
										<hr />
										<div><a href="#"><?= __('Forget_password');?></a></div>
                                    </div>
                              </div>
							  <?= Form::hidden('back_url', HTML::chars($back_url)); ?>
							  <?= Form::hidden('contact_time', $contact_time); ?>
							  <?= Form::hidden('contact_xhr', $contact_secret); ?>
							  <?= Form::hidden('csrf', Security::token(TRUE)); ?>
                        </form>     
                </div> 
            </div>  
			<p class="credits">&copy; <a href="#">spieler</a></p>	
        </div>
			
</div>

</body>  
</html>