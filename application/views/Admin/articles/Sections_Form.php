	       <?= $breadcrumbs; ?>
	       <div class="row-fluid">
		    <div>
			 <?= Form::open(URL::base('http').Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/sections/'.$mod_action.'/', array('method' => 'POST', 'name' => 'group_form', 'enctype' => 'multipart/form-data', 'id' => 'form_group', 'class' => 'well p_form')); ?>
			      <div class="alert alert-info hide" id="i_form_saved">
				   <?= __('Autosave_success'); ?>
				   <a href="#" class="close" data-dismiss="alert">&times;</a>
			      </div>
			      
			      <legend>
				   <?= $form_title; ?>
				   <div class="control-group pull-right">
					<?= Form::submit('send_form', __('Send'), array('class' => 'btn btn-primary', 'id' => 'send_form')); ?>
					<?= Form::submit('submit_form', __('Submit'), array('class' => 'btn btn-info', 'id' => 'submit_form')); ?>
					<?= Form::submit('cancel_form', __('Cancel'), array('class' => 'btn', 'id' => 'cancel_form', 'onclick' => 'window.location = "'.URL::base(true).$mod_url.'"')); ?>
				   </div>
			      </legend>

			      <div class="clearfix"></div>
			      <div class="control-group">
				   <?= Form::label('content_title', __('Section_title'), array('class' => 'control-label')); ?>
				   <div class="controls controls-row">
					<?= Form::input('section_title', $sections_list['section_title'], array('class' => 'input span6', 'id' => 'content_title', 'placeholder' => __('Section_title'), 'required' => '')); ?>
				   </div>
			      </div>
			      <div class="control-group">
				   <?= Form::label('content_url', __('URL'), array('class' => 'control-label')); ?>
				   <div class="controls controls-row">
					<?= Form::input('section_url', $sections_list['section_url'], array('class' => 'input span6', 'id' => 'content_url', 'placeholder' => __('URL'))); ?>
					<div class="clearfix"></div>
					<?= Form::checkbox('url_change', 1, $url_change, array('id' => 'stop_auto_url')); ?> <?= __('Do_not_change_url');?>
				   </div>
			      </div>
			      <div class="control-group">
				   <?= Form::label('section_descr', __('Section_descr'), array('class' => 'control-label')); ?>
				   <div class="controls">
					<?= Form::textarea('section_descr', $sections_list['section_descr'], array('class' => 'input span6', 'id' => 'group_description', 'placeholder' => __('Info'))); ?>
				   </div>
			      </div>
			      
			      <div class="control-group pull-right">
				   <?= Form::submit('send_form', __('Send'), array('class' => 'btn btn-primary', 'id' => 'send_form')); ?>
				   <?= Form::submit('submit_form', __('Submit'), array('class' => 'btn btn-info', 'id' => 'submit_form')); ?>
				   <?= Form::button('cancel', __('Cancel'), array('class' => 'btn', 'id' => 'cancel_form', 'onclick' => 'window.location = "'.URL::base(true).$mod_url.'"')); ?>
			      </div>
			      <div class="clearfix"></div>
			      <hr>
			      <?= Form::hidden('action_type', $sub_action); ?>
			      <?= Form::hidden('section_id', $section_id); ?>
			      <?= Form::hidden('section_url_old', $sections_list['section_url']); ?>
			      <?= Form::hidden('contact_time', $contact_time_cr); ?>
			      <?= Form::hidden('contact_xhr', $contact_secret); ?>
			 <?= Form::close(); ?> 
		    </div>
	       </div><!--/row-->