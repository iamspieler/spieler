	       <?= $breadcrumbs; ?>
	       <div class="row-fluid">
		    
		    <div>
			 <?= Form::open(URL::base('http').Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/positions/'.$mod_action.'/', array('method' => 'POST', 'name' => 'group_form', 'enctype' => 'multipart/form-data', 'id' => 'form_group', 'class' => 'well p_form')); ?>

			      <div class="alert alert-info hide" id="i_form_saved">
				   <?= __('Autosave_success'); ?>
				   <a href="#" class="close" data-dismiss="alert">&times;</a>
			      </div>
			      
			      <legend>
				   <?= $form_title; ?>
				   <div class="control-group pull-right">
					<?= Form::submit('send_form', __('Send'), array('class' => 'btn btn-primary', 'id' => 'send_form')); ?>
					<?= Form::submit('submit_form', __('Submit'), array('class' => 'btn btn-info', 'id' => 'submit_form')); ?>
					<?= Form::input('cancel_form', __('Cancel'), array('type'=>'reset', 'class' => 'btn', 'id' => 'cancel_form', 'onclick' => 'window.location = "'.URL::base('http').Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/sections/"')); ?>
				   </div>
			      </legend>

			      <div class="clearfix"></div>
			      <? if($positions_list['section_title'] != '') { ?><big><i><?= $positions_list['section_title']; ?></i></big><br /><br /> <? } ?>
			      <div class="clearfix"></div>
			      
			      <div class="control-group">
				   <?= Form::label('content_title', __('Title'), array('class' => 'control-label')); ?>
				   <div class="controls controls-row">
					<?= Form::input('position_title', SpHTML::unchars($positions_list['section_title']), array('class' => 'input span6', 'id' => 'content_title', 'placeholder' => __('Title'), 'required' => '')); ?>
				   </div>
			      </div>
			      <div class="control-group">
				   <?= Form::label('content_coords', __('Coords'), array('class' => 'control-label')); ?>
				   <div class="controls controls-row">
					<?= Form::input('position_coords', $positions_list['section_coords'], array('class' => 'input span6', 'id' => 'content_coords', 'placeholder' => __('Coords'), 'required' => '')); ?>
				   </div>
			      </div>
			      <div class="control-group">
				   <?= Form::label('content_form', __('Pos_form'), array('class' => 'control-label')); ?>
				   <div class="controls">
					<?= Form::select('position_form', $pos_forms_list, $positions_list['section_form'], array('id' => 'content_form', 'placeholder' => __('Pos_form'), 'data-style' => 'btn-info', 'required' => '')); ?>
				   </div>
			      </div>
			      <div class="control-group">
				   <?= Form::label('content_floor', __('Floor'), array('class' => 'control-label')); ?>
				   <div class="controls">
					<?= Form::select('position_floor', $pos_floors_list, $positions_list['section_floor'], array('id' => 'content_floor', 'placeholder' => __('Floor'), 'data-style' => 'btn-info', 'required' => '')); ?>
				   </div>
			      </div>
			      <div class="control-group">
				   <?= Form::label('content_activity inline', __('Activity'), array('class' => 'control-label')); ?>
				   <div class="controls controls-row">
					<?= Form::checkbox('position_activity', 1, $activity_flag, array('class' => '', 'id' => 'content_activity')); ?>
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
			      <?= Form::hidden('pos_id', $pos_id); ?>
			      <?= Form::hidden('contact_time', $contact_time_cr); ?>
			      <?= Form::hidden('contact_xhr', $contact_secret); ?>
			 <?= Form::close(); ?> 
		    </div>
	       </div><!--/row-->