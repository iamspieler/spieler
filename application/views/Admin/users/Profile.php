	       <?= $breadcrumbs; ?>
	       <div class="row-fluid">
		    
		    <div class="profile">
                               <h2><i class="icon-book l_tooltip" title="<?= __('Login'); ?>"></i> <?= $profile['username']; ?></h2>
			       <? if($profile['user_off_name']) echo '<p><i class="icon-user l_tooltip" title="'. __('Phone_cell'). '"></i> ' .HTML::chars($profile['user_off_name']). '</p>'; ?>	     
			       <? if($profile['email']) echo '<p><i class="icon-envelope l_tooltip" title="'. __('Email'). '"></i> ' .HTML::chars($profile['email']). '</p>';?>
			       <? if($profile['last_login']) echo '<p><i class="icon-unlock l_tooltip" title="'. __('Last_login'). '"></i> ' .HTML::chars(date("H:i d.m.Y", $profile['last_login'])). '</p>';?>

			       <p><?
				   if((Auth::instance()->logged_in('admin')) or (Auth::instance()->logged_in('root'))) echo  SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/edit/'.$profile['id'],__('Edit'),$attributes = array('class' => '','title' => __('Edit'))); 
				   ?>
			       </p>
			       <a href='javascript: history.go(-1)'><?= __('Back'); ?></a>
		    </div>
	       </div><!--/row-->