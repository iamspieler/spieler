	       <?= $breadcrumbs; ?>
	       <div class="row-fluid">
		    
		    <div>
			 <?= Form::open(URL::base('http').$mod_url.'/'.$mod_action.'/', array('method' => 'POST', 'name' => 'contact_form', 'enctype' => 'multipart/form-data', 'id' => 'form_contact', 'class' => 'well p_form')); ?>
			      
			      <legend>
				   <?= __('File_upload'); ?>
				   <div class="control-group pull-right">
					<?= Form::submit('send_form', __('Send'), array('class' => 'btn btn-primary', 'id' => 'send_form')); ?>
					<?= Form::submit('submit_form', __('Submit'), array('class' => 'btn btn-info', 'id' => 'submit_form')); ?>
					<?= Form::input('cancel_form', __('Cancel'), array('type'=>'reset', 'class' => 'btn', 'id' => 'cancel_form', 'onclick' => 'window.location = "'.URL::base(true).$mod_url.'"')); ?>
				   </div>
			      </legend>

			      <div class="clearfix"></div>
			      <div class="control-group">
				   <?= Form::label('file_csv', __('Choose_file'), array('class' => 'control-label')); ?>
				   <div class="controls controls-row">
					<?= Form::file('file_csv', array('class' => 'input span4', 'id' => 'file_csv', 'accept' => '.csv', 'required' => '')); ?>
				   </div>
			      </div>
			      <div class="control-group">
				   <div class="controls controls-row">
					<p><?= __('CSV_only')." <b>".Kohana::$config->load('csv.delimiter')."</b>" ;?></p>
				   </div>
			      </div>
			      <div class="control-group">
				   <?= Form::label('contacts_owner', __('Contacts_owner'), array('class' => 'control-label')); ?>
				   <div class="controls controls-row">
					<?= Form::select('contacts_owner', $owners, '', array('class' => 'input span4', 'id' => 'contacts_owner', 'required' => '')); ?>
				   </div>
			      </div>
			      <div class="control-group">
				   <?= Form::label('contacts_group', __('Group'), array('class' => 'control-label')); ?>
				   <div class="controls controls-row">
					<?= Form::select('contacts_group', $groups, '', array('class' => 'input span4', 'id' => 'contacts_group', 'required' => '')); ?>
				   </div>
			      </div>
			      <div class="control-group">
				   <?= Form::label('contacts_privacy', __('Privacy'), array('class' => 'control-label')); ?>
				   <div class="controls controls-row">
					<?= SpForm::sel_privacy('contacts_privacy', ''); ?>
				   </div>
			      </div>
			      <div class="control-group pull-right">
				   <?= Form::submit('send_form', __('Send'), array('class' => 'btn btn-primary', 'id' => 'send_form')); ?>
				   <?= Form::submit('submit_form', __('Submit'), array('class' => 'btn btn-info', 'id' => 'submit_form')); ?>
				   <?= Form::input('cancel', __('Cancel'), array('type' => 'reset', 'class' => 'btn', 'id' => 'cancel_form', 'onclick' => 'window.location = "'.URL::base(true).$mod_url.'"')); ?>
			      </div>
			      <div class="clearfix"></div>
			      <hr>
			      <?= Form::hidden('contact_time', $contact_time_cr); ?>
			      <?= Form::hidden('contact_xhr', $contact_secret); ?>
			 <?= Form::close(); ?> 
		    </div>
	       </div><!--/row-->