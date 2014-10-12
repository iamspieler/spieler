	       <?= $breadcrumbs; ?>
	       <? 
		    $types_list = array(
			"column" => __('Block_column'),
			"main_slider" => __('Block_main_slider'),
			"main_text" => __('Block_main_text')
		    );
		    
		    $block_empty_link = array(
			"" => __('No')
		    );
	       ?>
	       <div class="row-fluid">
		    
		    <div>
			 <?= Form::open(URL::base('http').Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/'.$mod_action.'/', array('method' => 'POST', 'name' => 'blocks_form', 'enctype' => 'multipart/form-data', 'id' => 'form_blocks', 'class' => 'well p_form')); ?>  
			      <legend>
				   <?= $form_title; ?>
				   <div class="control-group pull-right">
					<?= Form::submit('send_form', __('Send'), array('class' => 'btn btn-primary', 'id' => 'send_form')); ?>
					<?= Form::submit('submit_form', __('Submit'), array('class' => 'btn btn-info', 'id' => 'submit_form')); ?>
					<?= Form::input('cancel_form', __('Cancel'), array('type'=>'reset', 'class' => 'btn', 'id' => 'cancel_form', 'onclick' => 'window.location = "'.URL::base('http').Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/"')); ?>
				   </div>
			      </legend>

			      <div class="clearfix"></div>

					<div class="control-group">
					     <?= Form::label('content_title', __('Blocks_title'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::input('block_title', $blocks_list['block_title'], array('class' => 'input span6', 'id' => 'content_title', 'placeholder' => __('Blocks_title'), 'required' => '')); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_type', __('Blocks_type'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::select('block_type', $types_list, $blocks_list['block_type'], array('data-style' => 'btn-info', 'id' => 'content_type', 'placeholder' => __('Blocks_type'), 'required' => '')); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_link', __('Blocks_link'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::select('block_link', Arr::merge($block_empty_link, Model::factory('Pages')->ap_pages_list() ), $blocks_list['block_link'], array('data-style' => 'btn-info', 'id' => 'content_link', 'placeholder' => __('Blocks_link'))); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_link_text', __('Blocks_link_text'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::input('block_link_text', $blocks_list['block_link_text'], array('class' => 'input span6', 'id' => 'content_link_text', 'placeholder' => __('Blocks_link_text'))); ?>
					     </div>
					</div>
					<div class="control-group">
						  <?= Form::label('content_text', __('Blocks_text'), array('class' => 'control-label')); ?>
						  <div class="controls">
						       <?= Form::textarea('block_text', SpHTML::unchars($blocks_list['block_text']), array('class' => 'input span6', 'id' => 'content_text', 'placeholder' => __('Blocks_text'))); ?>
						       <script>
							    CKEDITOR.replace('block_text',
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
					     <?= Form::label('content_pos', __('Blocks_pos'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::input('block_pos', $blocks_list['block_pos'], array('class' => 'input span3', 'maxlength' => '3', 'id' => 'content_pos', 'placeholder' => __('Blocks_pos'), 'required' => '')); ?>
						  <span id="errmsg"></span>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('contact_photo', __('Blocks_photo'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::file('block_photo', array('class' => 'span4', 'accept' => 'image/*', 'id' => 'contact_photo')); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_activity inline', __('Activity'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::checkbox('block_activity', 1, $activity_flag, array('class' => '', 'id' => 'content_activity')); ?>
					     </div>
					</div>
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
			      <?= Form::hidden('block_id', $block_id); ?>
			      <?= Form::hidden('block_photo_old', $blocks_list['block_photo']); ?>
			      <?= Form::hidden('contact_time', $contact_time_cr); ?>
			      <?= Form::hidden('contact_xhr', $contact_secret); ?>
			 <?= Form::close(); ?> 
		    </div>
	       </div><!--/row-->