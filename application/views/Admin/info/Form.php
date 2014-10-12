	       <?= $breadcrumbs; ?>
	       <div class="row-fluid">
		    
		    <div>
			 <?= Form::open(URL::base('http').Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/'.$mod_action.'/', array('method' => 'POST', 'name' => 'pages_form', 'enctype' => 'multipart/form-data', 'id' => 'form_pages', 'class' => 'well p_form')); ?>  
			      <legend>
				   <?= $form_title; ?>
				   <div class="control-group pull-right">
					<?= Form::submit('send_form', __('Send'), array('class' => 'btn btn-primary', 'id' => 'send_form')); ?>
					<?= Form::submit('submit_form', __('Submit'), array('class' => 'btn btn-info', 'id' => 'submit_form')); ?>
					<?= Form::input('cancel_form', __('Cancel'), array('type'=>'reset', 'class' => 'btn', 'id' => 'cancel_form', 'onclick' => 'window.location = "'.URL::base(true).Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'"')); ?>
				   </div>
			      </legend>

			      <div class="clearfix"></div>

					<div class="control-group">
					     <?= Form::label('content_phone', __('Phone'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::input('site_phone', $info_list['site_phone'], array('class' => 'input span6', 'id' => 'content_phone', 'placeholder' => __('Phone'))); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_phone1', __('Phone'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::input('site_phone1', $info_list['site_phone1'], array('class' => 'input span6', 'id' => 'content_phone1', 'placeholder' => __('Phone'))); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_phone2', __('Phone'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::input('site_phone2', $info_list['site_phone2'], array('class' => 'input span6', 'id' => 'content_phone2', 'placeholder' => __('Phone'))); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_email', __('Email'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::input('site_email', $info_list['site_email'], array('class' => 'input span6', 'id' => 'content_email', 'placeholder' => __('Email'))); ?>
					     </div>
					</div>
			      <div class="control-group">
					     <?= Form::label('content_address', __('Address'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::input('site_address', $info_list['site_address'], array('class' => 'input span6', 'id' => 'content_address', 'placeholder' => __('Address'))); ?>
					     </div>
					</div>
			      <div class="control-group">
					     <?= Form::label('content_address_full', __('Address_full'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::input('site_address_full', $info_list['site_address_full'], array('class' => 'input span6', 'id' => 'content_address_full', 'placeholder' => __('Address_full'))); ?>
					     </div>
					</div>
					     
			      
			      

			     
			      <div class="control-group">
				   
			      </div>
			      <div class="control-group pull-right">
				   <?= Form::submit('send_form', __('Send'), array('class' => 'btn btn-primary', 'id' => 'send_form')); ?>
				   <?= Form::submit('submit_form', __('Submit'), array('class' => 'btn btn-info', 'id' => 'submit_form')); ?>
				   <?= Form::input('cancel', __('Cancel'), array('type' => 'reset', 'class' => 'btn', 'id' => 'cancel_form', 'onclick' => 'window.location = "'.URL::base(true).$mod_url.'"')); ?>
			      </div>
			      <div class="clearfix"></div>
			      <hr>
			      <?= Form::hidden('action_type', $sub_action); ?>
			      <?= Form::hidden('contact_time', $contact_time_cr); ?>
			      <?= Form::hidden('contact_xhr', $contact_secret); ?>
			 <?= Form::close(); ?> 
		    </div>
	       </div><!--/row-->