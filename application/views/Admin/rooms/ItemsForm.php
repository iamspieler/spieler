	       <?= $breadcrumbs; ?>
	       <div class="row-fluid">
		    
		    <div>
			 <?= Form::open(URL::base('http').Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/items/'.$mod_action.'/', array('method' => 'POST', 'name' => 'room_form', 'enctype' => 'multipart/form-data', 'id' => 'form_room', 'class' => 'well p_form')); ?>  
			      <legend>
				   <?= $form_title; ?>
				   <div class="control-group pull-right">
					<?= Form::submit('send_form', __('Send'), array('class' => 'btn btn-primary', 'id' => 'send_form')); ?>
					<?= Form::submit('submit_form', __('Submit'), array('class' => 'btn btn-info', 'id' => 'submit_form')); ?>
					<?= Form::input('cancel_form', __('Cancel'), array('type'=>'reset', 'class' => 'btn', 'id' => 'cancel_form', 'onclick' => 'window.location = "'.URL::base(true).Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'"')); ?>
				   </div>
			      </legend>

			      <div class="clearfix"></div>
			      <? if($items_list['item_title'] != '') { ?><big><i><?= $items_list['item_title']; ?></i></big><br /><br /> <? } ?>
			      <div class="clearfix"></div>
			      
			      <ul class="nav nav-tabs" id="FormTabs">
				  <li class="active"><a href="#tabm" data-toggle="tab"><i class="icon-edit"></i> <?= __('Content');?></a></li>
				  <li><a href="#tabseo" data-toggle="tab"><i class="icon-globe"></i> <?= __('SEO');?></a></li>
				  <li><a href="#tabphoto" data-toggle="tab"><i class="icon-picture"></i> <?= __('Photo');?></a></li>
				  <li><a href="#tabset" data-toggle="tab"><i class="icon-wrench"></i> <?= __('Settings');?></a></li>
			      </ul>
			      <div id="myTabContent" class="tab-content">
				   <div class="tab-pane fade in active" id="tabm">
					<div class="control-group">
					     <?= Form::label('content_title', __('Item_title'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::input('item_title', $items_list['item_title'], array('class' => 'input span6', 'id' => 'content_title', 'placeholder' => __('Item_title'), 'required' => '')); ?>
					     </div>
					</div>
					<div class="control-group">
						  <?= Form::label('content_cat', __('Item_type'), array('class' => 'control-label')); ?>
						  <div class="controls controls-row">
						       <?= Form::select('room_type', $rooms_list, $items_list['room_id'], array('id' => 'content_author_list', 'data-style' => 'btn-info')); ?>
						  </div>
					</div>
					     <div class="control-group"> 
						  <?= Form::label('content_text', __('Item_text'), array('class' => 'control-label')); ?>
						  <div class="controls">
						       <?= Form::textarea('item_text', SpHTML::unchars($items_list['item_text']), array('class' => 'input span6', 'id' => 'content_text', 'placeholder' => __('Item_text'))); ?>
						       <script>
							    CKEDITOR.replace( 'item_text',
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
				   </div>
				   <div class="tab-pane fade" id="tabset">
					<div class="control-group">
					     <?= Form::label('datepicker', __('Item_book_date'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						
						  <div class="input-append" id="datepicker" >
						       <?= Form::input('item_book_date', Date::formatted_time($items_list['item_start_date'], 'd.m.Y H:i:s'), array('class' => 'input span12', 'data-format' => 'dd.MM.yyyy hh:mm:ss')); ?>
						       <span class="add-on"><i class="icon-calendar add_picker"></i></span>
						  </div>	       
					     </div>   
					</div> 
					<div class="control-group">
					     <?= Form::label('datepicker2', __('Item_book_enddate'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						
						  <div class="input-append" id="datepicker2" >
						       <?= Form::input('item_book_enddate', Date::formatted_time($items_list['item_end_date'], 'd.m.Y H:i:s'), array('class' => 'input span12', 'data-format' => 'dd.MM.yyyy hh:mm:ss')); ?>
						       <span class="add-on"><i class="icon-calendar add_picker"></i></span>
						  </div>	       
					     </div>   
					</div> 
					<div class="control-group">
						  <?= Form::label('content_author', __('Pages_author'), array('class' => 'control-label')); ?>
						  <div class="controls controls-row">
						       <?= Form::select('room_author_id', $authors_list, Auth::instance()->get_user()->id, array('id' => 'content_author_list', 'data-style' => 'btn-info')); ?>
						       <div class="clearfix"></div>
						       <?= Form::input('room_author', $rooms_list['room_author'], array('class' => 'input span6', 'id' => 'content_author', 'placeholder' => __('Pages_author'))); ?>
						  </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_activity inline', __('Activity'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::checkbox('room_activity', 1, $activity_flag, array('class' => '', 'id' => 'content_activity')); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_pos', __('Room_pos'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::input('room_pos', $rooms_list['room_pos'], array('class' => 'input span3', 'id' => 'content_pos')); ?>
					     </div>
					</div>
					<div class="control-group">
					     <?= Form::label('content_cost', __('Room_cost'), array('class' => 'control-label')); ?>
					     <div class="controls controls-row">
						  <?= Form::input('room_cost', $rooms_list['room_cost'], array('class' => 'input span3', 'id' => 'content_cost')); ?>
						  <?= Form::input('room_cost_old', $rooms_list['room_cost_old'], array('class' => 'input span3', 'id' => 'content_cost')); ?>
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
			      <?= Form::hidden('room_id', $room_id); ?>
			      <?= Form::hidden('room_url_old', $rooms_list['room_url']); ?>
			      <?= Form::hidden('contact_time', $contact_time_cr); ?>
			      <?= Form::hidden('contact_xhr', $contact_secret); ?>
			 <?= Form::close(); ?> 
		    </div>
	       </div><!--/row-->