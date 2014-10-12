	       <?= $breadcrumbs; ?>
	       <div class="row-fluid">
		    
		    <div>
			 <?= Form::open(URL::base('http').$mod_url.'/'.$mod_action.'/', array('method' => 'POST', 'name' => 'contact_form', 'enctype' => 'multipart/form-data', 'id' => 'form_contact', 'class' => 'well p_form form-horizontal')); ?>
			      
			      <legend>
				   <?= __('Choose_comp_fields'); ?>
				   <div class="control-group pull-right">
					<?= Form::submit('send_form', __('Send'), array('class' => 'btn btn-primary', 'id' => 'send_form')); ?>
					<?= Form::submit('submit_form', __('Submit'), array('class' => 'btn btn-info', 'id' => 'submit_form')); ?>
					<?= Form::input('cancel_form', __('Cancel'), array('type'=>'reset', 'class' => 'btn', 'id' => 'cancel_form', 'onclick' => 'window.location = "'.URL::base(true).$mod_url.'"')); ?>
				   </div>
			      </legend>
			      <div class="control-group">
				   <h5 class="span3"><?= __('Field_from_DB'); ?></h5>
				   <h5>
					<?= __('Field_from_file');?>
				   </h5>
			      </div>
			      <? foreach($DB_fields as $field) { ?>
			      <div class="control-group">
				   <?= Form::label($field, __(Text::ucfirst($field)), array('class' => 'control-label')); ?>
				   <div class="controls controls-row">
					<?= Form::select($field, $column_titles, '', array('class' => 'input span4', 'id' => $field)); ?>
				   </div>
			      </div>
			      <? } ?>
			      <div class="control-group pull-right">
				   <?= Form::submit('send_form', __('Send'), array('class' => 'btn btn-primary', 'id' => 'send_form')); ?>
				   <?= Form::submit('submit_form', __('Submit'), array('class' => 'btn btn-info', 'id' => 'submit_form')); ?>
				   <?= Form::input('cancel', __('Cancel'), array('type' => 'reset', 'class' => 'btn', 'id' => 'cancel_form', 'onclick' => 'window.location = "'.URL::base(true).$mod_url.'"')); ?>
			      </div>
			      <div class="clearfix"></div>
			      <hr>
			      <?= Form::hidden('contact_time', $contact_time_cr); ?>
			      <?= Form::hidden('contact_xhr', $contact_secret); ?>
			      <?= Form::hidden('file_name', $file_name); ?>
			      <?= Form::hidden('owner', $owner); ?>
			      <?= Form::hidden('group', $group); ?>
			      <?= Form::hidden('privacy', $privacy); ?>
			 <?= Form::close(); ?> 
		    </div>
	       </div><!--/row-->