	       <?= $breadcrumbs; ?>
	       <div class="row-fluid">
		    <div>
			 <?= Form::open(URL::base('http').Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/editions/'.$mod_action.'/', array('method' => 'POST', 'name' => 'group_form', 'enctype' => 'multipart/form-data', 'id' => 'form_group', 'class' => 'well p_form')); ?>
			      <div class="alert alert-info hide" id="i_form_saved">
				   <?= __('Autosave_success'); ?>
				   <a href="#" class="close" data-dismiss="alert">&times;</a>
			      </div>
			      
			      <legend>
				   <?= $form_title; ?>
				   <div class="control-group pull-right">
					<?= Form::submit('send_form', __('Send'), array('class' => 'btn btn-primary', 'id' => 'send_form')); ?>
					<?= Form::submit('submit_form', __('Submit'), array('class' => 'btn btn-info', 'id' => 'submit_form')); ?>
					<?= Form::button('cancel', __('Cancel'), array('class' => 'btn', 'id' => 'cancel_form', 'onclick' => 'window.location = "'.URL::base(true).Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/editions/"')); ?>
				   </div>
			      </legend>

			      <div class="clearfix"></div>
			      <div class="control-group">
				   <?= Form::label('content_title', __('Edition_title'), array('class' => 'control-label')); ?>
				   <div class="controls controls-row">
					<?= Form::input('edition_title', $editions_list['edition_title'], array('class' => 'input span6', 'id' => 'content_title', 'placeholder' => __('Edition_title'), 'required' => '')); ?>
				   </div>
			      </div>
			      <div class="control-group">
				   <?= Form::label('content_url', __('URL'), array('class' => 'control-label')); ?>
				   <div class="controls controls-row">
					<?= Form::input('edition_url', $editions_list['edition_url'], array('class' => 'input span6', 'id' => 'content_url', 'placeholder' => __('URL'))); ?>
					<div class="clearfix"></div>
					<?= Form::checkbox('url_change', 1, $url_change, array('id' => 'stop_auto_url')); ?> <?= __('Do_not_change_url');?>
				   </div>
			      </div>
			      <div class="control-group">
				   <?= Form::label('content_photo', __('Edition_picture'), array('class' => 'control-label')); ?>
				   <div class="controls controls-row">
					<small><?= __('Preferred_pict_par');?>: <?= __('width');?> <?= $articles_config['mod_aes_w'];?>px, <?= __('height');?> <?= $articles_config['mod_aes_w'];?>px</small>
					<div class="clearfix"><br /></div>
					<? if(trim($editions_list['edition_picture']) != '') echo HTML::image('media/editions/'.$editions_list['edition_picture'], array('alt' => __('Current_photo')));?>
					<div class="clearfix"><br /></div>
					<?= Form::file('edition_photo', array('class' => 'span4', 'accept' => 'image/*', 'id' => 'content_photo')); ?>
					<div class="clearfix"></div>
				   </div>
			      </div>
			      <div class="control-group">
				   <?= Form::label('content_pos', __('Edition_pos'), array('class' => 'control-label')); ?>
				   <div class="controls controls-row">
					<?= Form::input('edition_pos', $editions_list['edition_pos'], array('class' => 'input span1', 'maxlength' => '10', 'id' => 'content_pos', 'placeholder' => '0')); ?>
				   </div>
			      </div>
			      <div class="control-group">
				   <?= Form::label('content_descr', __('Edition_descr'), array('class' => 'control-label')); ?>
				   <div class="controls">
					<?= Form::textarea('edition_descr', $editions_list['edition_descr'], array('class' => 'input span6', 'id' => 'content_descr', 'placeholder' => __('Edition_descr'))); ?>
					<script>
							    CKEDITOR.replace( 'edition_descr',
								 {
								      toolbar: [
									   { name: 'document', items: [ 'Source', ] },
										[ 'PasteFromWord', 'RemoveFormat'],
										['Undo', 'Redo' ],
									   '/',
									   { name: 'basicstyles', items: [ 'Styles', 'Format', 'Bold','Italic','Underline','Strike', ] },
										[ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-'],
									   '/',
										[ 'Link','Unlink','Anchor' ],
										[ 'Image', 'Flash', '-', 'youtube', 'oembed', ],
										[ 'NumberedList','BulletedList', '-', 'Subscript','Superscript', 'Blockquote', ]
										
										
								      ],
								
								      
								      
								      
								      'filebrowserBrowseUrl':'<?=URL::base(); ?>public/default/editors/ckeditor/kcfinder/browse.php?type=files',
								      'filebrowserImageBrowseUrl':'<?=URL::base(); ?>public/default/editors/ckeditor/kcfinder/browse.php?type=images',
								      'filebrowserFlashBrowseUrl':'<?=URL::base(); ?>public/default/editors/ckeditor/kcfinder/browse.php?type=flash',
								      'filebrowserUploadUrl':'<?=URL::base(); ?>public/default/editors/ckeditor/kcfinder/upload.php?type=files',
								      'filebrowserImageUploadUrl':'<?=URL::base(); ?>public/default/editors/ckeditor/kcfinder/upload.php?type=images',
								      'filebrowserFlashUploadUrl':'<?=URL::base(); ?>public/default/editors/ckeditor/kcfinder/upload.php?type=flash'
								 }
								  
							    );

					     </script>
				   </div>
			      </div>
			      <div class="control-group">
				   <?= Form::label('content_status', __('Edition_status'), array('class' => 'control-label')); ?>
				   <div class="controls controls-row">
					<?= Form::select('edition_status', array(
					    1 => __('Activity_normal'), 
					    2 => __('Activity_non_temp'), 
					    3 => __('Activity_closed'), 
					    0 => __('Activity_inactive')
					), $editions_list['edition_status'], array('id' => 'content_status',  'class' => 'b_select', 'data-style' => 'btn-info', 'required' => '')); ?>
				   </div>
			      </div>
			      
			      <div class="control-group pull-right">
				   <?= Form::submit('send_form', __('Send'), array('class' => 'btn btn-primary', 'id' => 'send_form')); ?>
				   <?= Form::submit('submit_form', __('Submit'), array('class' => 'btn btn-info', 'id' => 'submit_form')); ?>
				   <?= Form::button('cancel', __('Cancel'), array('class' => 'btn', 'id' => 'cancel_form', 'onclick' => 'window.location = "'.URL::base(true).Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/editions/"')); ?>
			      </div>
			      <div class="clearfix"></div>
			      <hr>
			      <?= Form::hidden('action_type', $sub_action); ?>
			      <?= Form::hidden('edition_id', $edition_id); ?>
			      <?= Form::hidden('edition_picture_old', $editions_list['edition_picture']); ?>
			      <?= Form::hidden('edition_url_old', $editions_list['edition_url']); ?>
			      <?= Form::hidden('contact_time', $contact_time_cr); ?>
			      <?= Form::hidden('contact_xhr', $contact_secret); ?>
			 <?= Form::close(); ?> 
		    </div>
	       </div><!--/row-->