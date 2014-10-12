	       <?= $breadcrumbs; ?>
	       <div class="row-fluid">
		    
		    <div class="profile">
                               <h2><i class="icon-book l_tooltip" title="<?= __('Phone_cell'); ?>"></i> <?= $profile['contact_surname']; ?> <?= $profile['contact_name']; ?> <?= $profile['contact_second_name']; ?></h2>
			       <? if($profile['contact_phone_cell']) echo '<p><i class="icon-mobile-phone l_tooltip" title="'. __('Phone_cell'). '"></i> ' .HTML::chars($profile['contact_phone_cell']). '</p>'; ?>	     
			       <? if($profile['contact_phone_work']) echo '<p><i class="icon-phone l_tooltip" title="'. __('Phone_work'). '"></i> ' .HTML::chars($profile['contact_phone_work']). '</p>';?>
			       <? if($profile['contact_phone_home']) echo '<p><i class="icon-phone-sign l_tooltip" title="'. __('Phone_home'). '"></i> ' .HTML::chars($profile['contact_phone_home']). '</p>';?>
			       <? if($profile['contact_email']) echo '<p><i class="icon-envelope l_tooltip" title="'. __('Email'). '"></i> ' .HTML::chars($profile['contact_email']). '</p>';?>
			       <? if($profile['contact_address']) echo '<p><i class="icon-map-marker l_tooltip" title="'. __('Address'). '"></i> ' .HTML::chars($profile['contact_address']). '</p>';?>
			       <? if($profile['contact_photo']) echo'<p><i class="icon-camera l_tooltip" title="'. __('Photo'). '"></i> '. HTML::chars($profile['contact_photo']). '</p>';?>
			       <? if($profile['contact_bio']) echo'<p><i class="icon-question-sign l_tooltip" title="'. __('Info'). '"></i> '. HTML::chars($profile['contact_bio']) . '</p>';?>
			       <p><i class="icon-tag l_tooltip" title="<?= __('Group'); ?>"></i> <?= SpHTML::anchor($mod_url.'/group/'.$profile['group_url'], $profile['group_title']); ?></p>
			       <p><?= SpHTML::anchor($mod_url.'/edit/'.$profile['id_contact'],__('Edit'),$attributes = array('class' => '','title' => __('Edit'))); ?></p>
			       <a href='javascript: history.go(-1)'><?= __('Back'); ?></a>
		    </div>
	       </div><!--/row-->