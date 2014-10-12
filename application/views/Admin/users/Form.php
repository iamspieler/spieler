	       <?= $breadcrumbs; 
	       error_reporting(0);
	       ?>
	       <div class="row-fluid">
		    
		    <div>
			 <?= Form::open(URL::base('http').Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/'.$mod_action.'/', array('method' => 'POST', 'name' => 'contact_form', 'enctype' => 'multipart/form-data', 'id' => 'form_contact', 'class' => 'well p_form')); ?>

			      <div class="alert alert-info hide" id="i_form_saved">
				   <?= __('Autosave_success'); ?>
				   <a href="#" class="close" data-dismiss="alert">&times;</a>
			      </div>
			 
			      <? if(isset($message_alert)) { ?>
			      <div class="alert">
				   <button type="button" class="close" data-dismiss="alert">&times;</button>
				   <strong>Предупреждение!</strong> <?= $message_alert; ?>
			      </div>
			      <? } ?>
			      
			      <legend>
				   <?= $form_title; ?>
				   <div class="control-group pull-right">
					<?= Form::submit('send_form', __('Send'), array('class' => 'btn btn-primary', 'id' => 'send_form')); ?>
					<?= Form::submit('submit_form', __('Submit'), array('class' => 'btn btn-info', 'id' => 'submit_form')); ?>
					<?= Form::input('cancel_form', __('Cancel'), array('type'=>'reset', 'class' => 'btn', 'id' => 'cancel_form', 'onclick' => 'window.location = "'.URL::base(true).$mod_url.'"')); ?>
				   </div>
			      </legend>

			      <div class="clearfix"></div>
			      <div class="control-group">
				   <?= Form::label('user_username', __('Username'), array('class' => 'control-label')); ?>
				   <div class="controls controls-row">
					<?= Form::input('username', $users_list['username'], array('class' => 'input span6', 'id' => 'user_username', 'pattern' => '.{4,70}', 'placeholder' => __('Username'), 'required' => '')); ?>
				   </div>
			      </div>
			      <div class="control-group">
				   <?= Form::label('user_off_name', __('Off_name'), array('class' => 'control-label')); ?>
				   <div class="controls controls-row">
					<?= Form::input('user_off_name', $users_list['user_off_name'], array('class' => 'input span6', 'id' => 'user_off_name', 'pattern' => '.{3,250}',  'placeholder' => __('Off_name'))); ?>
				   </div>
			      </div>
			      <div class="control-group">
				   <?= Form::label('user_email', __('Email'), array('class' => 'control-label')); ?>
				   <div class="controls controls-row">
					<?= Form::input('email', $users_list['email'], array('class' => 'input span6', 'id' => 'user_email', 'placeholder' => __('Email'), 'required' => '')); ?>
				   </div>
			      </div>
			      <div class="control-group">
				   <?= Form::label('user_password', __('Password'), array('class' => 'control-label')); ?>
				   <div class="controls controls-row">
					<?= Form::password('password', '', array('class' => 'input span6', 'id' => 'user_password', 'pattern' => '.{6,50}', 'placeholder' => __('Password'))); ?>
				   </div>
			      </div>
			      <div class="control-group">
				   <?= Form::label('user_password_confirm', __('Password_confirm'), array('class' => 'control-label')); ?>
				   <div class="controls controls-row">
					<?= Form::password('password_confirm', '', array('class' => 'input span6', 'id' => 'user_password_confirm', 'pattern' => '.{6,50}', 'placeholder' => __('Password_confirm'))); ?>
				   </div>
			      </div>
			      <div class="control-group">
				   <?= Form::label('users_roles_list', __('Group'), array('class' => 'control-label')); ?>
				   <div class="controls controls-row">
					<?= Form::select('user_role[]', ORM::factory('role')->find_all()->as_array('id', 'name'), $user_roles, array('id' => 'contact_group', 'data-style' => 'btn-info')); ?>
				   </div>
			      </div>


			      <div class="control-group pull-right">
				   <?= Form::submit('send_form', __('Send'), array('class' => 'btn btn-primary', 'id' => 'send_form')); ?>
				   <?= Form::submit('submit_form', __('Submit'), array('class' => 'btn btn-info', 'id' => 'submit_form')); ?>
				   <?= Form::input('cancel', __('Cancel'), array('type' => 'reset', 'class' => 'btn', 'id' => 'cancel_form', 'onclick' => 'window.location = "'.URL::base(true).$mod_url.'"')); ?>
			      </div>
			      <div class="clearfix"></div>
			      <hr>
			      <?= Form::hidden('action_type', $sub_action); ?>
			      <?= Form::hidden('user_id', $user_id); ?>
			      <?= Form::hidden('contact_time', $contact_time_cr); ?>
			      <?= Form::hidden('contact_xhr', $contact_secret); ?>
			 <?= Form::close(); ?> 
		    </div>
	       </div><!--/row-->