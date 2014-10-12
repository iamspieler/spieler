	       <?= $breadcrumbs; ?>
		   <div class="row">
				<div class="service_line">
						<h3 class="pull-left"><?= __('Blog'); ?></h3>
						<h4 class="pull-left"><?= $page_name;?></h4>
						<div class="clearfix"></div>	
				</div>
		   </div>
		   
	       <div class="row">
		    <legend>
				<?= Form::open(URL::base('http').ADMINURL.'/'.$mod_url.'/items/'.$mod_action.'/', array('method' => 'POST', 'name' => 'room_form', 'enctype' => 'multipart/form-data', 'id' => 'my-awesome-dropzone', 'class' => 'dropzone p_form')); ?>  
			    <div class="control-group pull-right submit_group">
					<?= Form::submit('send_form', __('Send'), array('class' => 'btn btn-primary', 'id' => 'send_form')); ?>
					<?= Form::submit('submit_form', __('Submit'), array('class' => 'btn btn-info', 'id' => 'submit_form')); ?>
					<?= Form::input('cancel_form', __('Cancel'), array('type'=>'reset', 'class' => 'btn', 'id' => 'cancel_form', 'onclick' => 'window.location = "'.URL::base(true).Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'"')); ?>
				</div>
				<div class="clearfix"></div>
				<?= $form_title; ?>
				<div class="clearfix"></div>
			      <? if($items_list['item_title_'.Kohana::$config->load('global.site_lang')] != '') { ?><big><i><?= $items_list['item_title_'.Kohana::$config->load('global.site_lang')]; ?></i></big><br /><br /> <? } ?>
			      <div class="clearfix"></div>

				<div class="col-md-8">
					<div class="iblock">
					<h4><?= __('Text');?></h4>
						 <div class="form-group">
							 <?= Form::label('item_title', __('Item_title_ru'), array('class' => '')); ?>
							 <div class="controls">
							  <?= Form::input('item_title_ru', $items_list['item_title_ru'], array('class' => 'form-control', 'id' => 'item_title', 'placeholder' => __('Item_title_ru'), 'required' => '')); ?>
							 </div>
						 </div>
						 <div class="form-group">
						  <?= Form::label('item_url', __('URL'), array('class' => '')); ?>
						  <div class="controls">
						       <?= Form::input('item_url', $items_list['item_url'], array('class' => 'form-control', 'id' => 'item_url', 'placeholder' => __('URL'), 'required' => '')); ?>
						       <div class="clearfix"></div>
						       <?= Form::checkbox('url_change', 1, $url_change, array('id' => 'stop_auto_url')); ?> 
							   <?= Form::label('stop_auto_url', __('Do_not_change_url'), array('class' => 'inline')); ?>
						  </div>
					     </div>
						 <div class="form-group"> 
							<?= Form::label('item_text_ru', __('Item_text_ru'), array('class' => 'control-label')); ?>
							<div class="controls">
								<?= Form::textarea('item_text_ru', SpHTML::unchars($items_list['item_text_ru']), array('class' => 'form-control', 'id' => 'item_text_ru', 'placeholder' => __('Item_text_ru'))); ?>
								<script>
									CKEDITOR.replace( 'item_text_ru',
									 {
										  toolbar: [
										   { name: 'document', items: [ 'Source', ] },
											[ 'NumberedList','BulletedList', '-', 'Subscript','Superscript', 'Blockquote', ],
											['Undo', 'Redo' ],
										   { name: 'basicstyles', items: [ 'Styles', 'Format', 'Bold','Italic','Underline','Strike', ] },
											[ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-'], [ 'Link','Unlink','Anchor' ],
											[ 'PasteFromWord', 'RemoveFormat'],
										   '/',
											[ 'Image', 'Flash', '-', 'Youtube', 'oembed', ],
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
						 
						 <div class="form-group">
							 <?= Form::label('item_title_en', __('Item_title_en'), array('class' => '')); ?>
							 <div class="controls controls-row">
							  <?= Form::input('item_title_en', $items_list['item_title_en'], array('class' => 'form-control', 'id' => 'item_title_en', 'placeholder' => __('Item_title_en'))); ?>
							 </div>
						 </div>
						 
						 <div class="form-group"> 
							<?= Form::label('item_text_en', __('Item_text_en'), array('class' => 'control-label')); ?>
							<div class="controls">
								<?= Form::textarea('item_text_en', SpHTML::unchars($items_list['item_text_en']), array('class' => 'form-control', 'id' => 'item_text_en', 'placeholder' => __('Item_text_en'))); ?>
								<script>
									CKEDITOR.replace( 'item_text_en',
									 {
										  toolbar: [
										   { name: 'document', items: [ 'Source', ] },
											[ 'NumberedList','BulletedList', '-', 'Subscript','Superscript', 'Blockquote', ],
											['Undo', 'Redo' ],
										   { name: 'basicstyles', items: [ 'Styles', 'Format', 'Bold','Italic','Underline','Strike', ] },
											[ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-'], [ 'Link','Unlink','Anchor' ],
											[ 'PasteFromWord', 'RemoveFormat'],
										   '/',
											[ 'Image', 'Flash', '-', 'Youtube', 'oembed', 'autosave'],
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
				   
				</div>
				<div class="col-md-4">
					 <div class="iblock">
					 <h4><?= __('Settings');?></h4>
						<div class="form-group">
						  <?= Form::label('content_cat', __('Sections'), array('class' => 'control-label')); ?>
						  <div class="controls controls-row">
						       <?= Form::select('item_sections', $sections_list, $items_list['sections'], array('id' => 'content_sections', 'title' => __('Choose_section'), 'multiple' => 'multiple', 'class' => 'b_select', 'data-style' => 'btn-info')); ?>
						  </div>
						</div>
						
						<div class="form-group">
							 <?= Form::label('datepicker', __('Item_publish_date'), array('class' => 'control-label')); ?>
							 <div class="controls controls-row">
								<div class="input-append dateinput" id="datepicker">
								   <?= Form::input('item_publish_date', Date::formatted_time($items_list['item_publish_date'], 'd.m.Y H:i:s'), array('class' => 'col-lg-7 col-md-10', 'data-format' => 'dd.MM.yyyy hh:mm:ss')); ?>
								   <span class="add-on col-lg-5 col-md-2"><i class="icon-calendar add_picker"></i></span>
								</div>	       
							 </div>   
						</div> 
						
						<div class="form-group">
							 <?= Form::label('datepicker_end', __('Item_unpublish_date'), array('class' => 'control-label')); ?>
							 <div class="controls controls-row">
								  <div class="input-append dateinput" id="datepicker_end">
									   <?= Form::input('item_unpublish_date', $items_list['item_unpublish_date'], array('class' => 'col-lg-7 col-md-10', 'data-format' => 'dd.MM.yyyy hh:mm:ss')); ?>
									   <span class="add-on col-lg-5 col-md-2"><i class="icon-calendar add_picker"></i></span>
								  </div>	       
							 </div>   
						</div> 
						<div class="clearfix"></div>
						
						<div class="form-group">
							<div class="controls controls-row">
								<?= Form::checkbox('item_activity', 1, $activity_flag, array('class' => '', 'id' => 'item_activity')); ?>
								<?= Form::label('item_activity', __('Activity'), array('class' => 'inline')); ?>
							</div>
						</div>
						<div class="form-group">
							<div class="controls controls-row">
								<?= Form::checkbox('item_main', 0, $ismain_flag, array('class' => '', 'id' => 'item_main')); ?>
								<?= Form::label('item_main', __('Item_main'), array('class' => 'inline')); ?>
							</div>
						</div>
					 </div>

					 <div class="iblock">
					 <h4><?= __('Tags');?></h4>
						<div class="form-group">
							<div class="controls controls-row">
							<?php 
								if(!empty($tags_list)) {
									foreach($tags_list as $tag):
										$tag_array[] = $tag['tag_title_ru'];
									endforeach;
									$tags_pref = 'prefilled: '.json_encode($tag_array).',';
								}
								else {$tags_pref = '';}
							?>
							<script>
								$(function(){

									var tagApi = $("#dsdasd").tagsManager({
										 <?= $tags_pref; ?>
										 hiddenTagListId: 'ew',
										 tagClass: 'tm-tag tm-tag-success'
									});
 
									$("#dsdasd").typeahead({
									  name: 'item_tags',
									  limit: 15,
									  prefetch: '<?= URL::base().ADMINURL; ?>/blog/tagsget'
									}).on('typeahead:selected', function (e, d) {
								 
									  tagApi.tagsManager("pushTag", d.value);
								 
									});
								});
							</script>
							<input type="text" name="tags" autocomplete="off"  placeholder="<?= __('Tags');?>" value="<?= $tags_pref; ?>" id="dsdasd" class="tm-input form-control"/>
							</div>
							<div class="clearfix"></div>
						</div>
						
					 </div>
					 <div class="iblock">
					 <h4><?= __('Photo');?></h4>
						<div class="form-group">
							<div class="controls">
								
								<div class="dropzone-previews"></div>
								<?= Form::label('item_photo', __('Item_photo'), array('class' => '')); ?>
								<?= Form::file('item_photo', array('class' => '', 'accept' => 'image/*', 'id' => 'item_photo')); ?>
								<div class="clearfix"></div>
								<i><?= __('Current_f');?>:<br /> <? if($items_list['item_picture'] != '') { ?><img src="<?= URL::base('http').'media/blog/'.$items_list['item_picture_dir'].'/'.$items_list['item_picture']; ?>" alt="" class="img-responsive" /> <? } else echo __('No'); ?></i>
								
								

								<!--<form action="<?= URL::base('http').ADMINURL.'/'.$mod_url.'/imgupload/'; ?>" class="dropzone"></form> -->
							</div>
						</div>
					 </div>
					 <div class="clearfix"></div>
				</div>
				
				<div class="clearfix"></div>
				
				<div class="control-group pull-right submit_group">
				   <?= Form::submit('send_form', __('Send'), array('class' => 'btn btn-primary', 'id' => 'send_form')); ?>
				   <?= Form::submit('submit_form', __('Submit'), array('class' => 'btn btn-info', 'id' => 'submit_form')); ?>
				   <?= Form::input('cancel', __('Cancel'), array('type' => 'reset', 'class' => 'btn', 'id' => 'cancel_form', 'onclick' => 'window.location = "'.URL::base(true).$mod_url.'"')); ?>
			     </div>
			     <div class="clearfix"></div>
			     <hr>
			      <?= Form::hidden('action_type', $sub_action); ?>
			      <?= Form::hidden('item_id', $item_id); ?>
			      <?= Form::hidden('item_url_old', $items_list['item_url']); ?>
			      <?= Form::hidden('contact_time', $contact_time_cr); ?>
			      <?= Form::hidden('contact_xhr', $contact_secret); ?>
			</legend>    
			 <?= Form::close(); ?> 
		    </div>
	       </div><!--/row-->
		   <script>
		   Dropzone.options.myAwesomeDropzone = { // The camelized version of the ID of the form element

  // The configuration we've talked about above
  autoProcessQueue: true,
  uploadMultiple: true,
  parallelUploads: 100,
  maxFiles: 100,

  // The setting up of the dropzone
  init: function() {
    var myDropzone = this;

    // First change the button to actually tell Dropzone to process the queue.
    this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
      // Make sure that the form isn't actually being sent.
      e.preventDefault();
      e.stopPropagation();
      myDropzone.processQueue();
    });

    // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
    // of the sending event because uploadMultiple is set to true.
    this.on("sendingmultiple", function() {
      // Gets triggered when the form is actually being sent.
      // Hide the success button or the complete form.
    });
    this.on("successmultiple", function(files, response) {
      // Gets triggered when the files have successfully been sent.
      // Redirect user or notify of success.
    });
    this.on("errormultiple", function(files, response) {
      // Gets triggered when there was an error sending the files.
      // Maybe show form again, and notify user of error
    });
	this.on("addedfile", function(file) {

        // Create the remove button
        var removeButton = Dropzone.createElement("<button>Remove file</button>");


        // Capture the Dropzone instance as closure.
        var _this = this;

        // Listen to the click event
        removeButton.addEventListener("click", function(e) {
          // Make sure the button click doesn't submit the form:
          e.preventDefault();
          e.stopPropagation();

          // Remove the file preview.
          _this.removeFile(file);
          // If you want to the delete the file on the server as well,
          // you can do the AJAX request here.
        });

        // Add the button to the file preview element.
        file.previewElement.appendChild(removeButton);
      });
  }

}
		   </script>