	       <?= $breadcrumbs; ?>
	       <div class="row-fluid">
		    <form id="formid" name="formwsel" method="get" action="<?= URL::base().Kohana::$config->load('global.site_ap_url').'/'.$mod_url;?>/">
			   <span class="pull-left"><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/add/', '<i class="icon-pencil"></i> '.__('Feedback_add') ,$attributes = array('class' => 'not_und','title' => __('News_add'))); ?></span>
			   <span class="pull-right"><?= __('Section');?> &nbsp;
			   <select id="selactions" name="status" class="" onchange="javascript:document.formwsel.submit();">
                               <option value="">-- <?= __('All');?> --</option>		       
			       <option value="1" <? if($group_active == 1) echo "selected" ; ?>><?= __('Activity_normal'); ?></option>
			       <option value="0" <? if($group_active == 0) echo "selected" ; ?>><?= __('Activity_inactive'); ?></option>
                          </select>
						  
						  </span>
		    </form>
		    <table class="table table-striped table-hover table-bordered">
			   <thead>
				 <tr>
				     <td><?= __('ID');?></td>
				     <td><?= __('Title');?></td>
				     <td><?= __('Author');?></td>
				     <td><?= __('Question_date');?></td>
				     <td><?= __('Answer_date');?></td>
				     <td><?= __('Activity');?></td>
				     <td><?= __('Actions');?></td>
				</tr>
			  </thead>
			  <tbody>
				<?php foreach($fb_list as $fb): ?>
				<tr>
				    <td><?= $fb['id_fb']; ?></td>
				    <td><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/edit/'.$fb['id_fb'], $fb['fb_title'],$attributes = array('class' => 'not_und sp_tooltip','title' => __('Edit'))); ?></td>
				    <td><?= $fb['fb_author']; ?></td>
				    <td><?= Date::formatted_time($fb['fb_post_date'], 'd.m.Y | H:i'); ?></td>
				    <td><?= Date::formatted_time($fb['fb_answer_date'], 'd.m.Y | H:i'); ?></td>
				    <td><? if($fb['fb_status'] != 0) echo __('Yes'); else echo __('No');  ?></td>
				    <td><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/edit/'.$fb['id_fb'],'<i class="icon-edit"></i>',$attributes = array('class' => 'not_und sp_tooltip o_pad','title' => __('Edit'))); ?>  <?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/delete/'.$fb['id_fb'],'<i class="icon-remove-circle"></i>',$attributes = array('class' => 'confirm not_und sp_tooltip o_pad','title' => __('Delete'))); ?></td>
				</tr>
				<?php endforeach; ?> 
			 </tbody>
		    </table>

		    <?= $pagination; ?>
	      </div><!--/row-->
	      
	      <!-- delete confirm dialog -->
	      <div class="jqmConfirm" id="confirm">
                   <div id="ex3b" class="jqmConfirmWindow">
                        <div class="jqmConfirmTitle clearfix">
                             <h1>Внимание</h1>
                                   <a href="#" class="jqmClose"><em>Закрыть</em></a>
                        </div> 
                        <div class="jqmConfirmContent">
                             <p class="jqmConfirmMsg"></p>
                             <p>Продолжить?</p>
                        </div>
  
                        <button type="submit" value="no" class="confirm_button decline" />Нет</button>
                        <button type="submit" value="yes" class="confirm_button accept" />Да</button>
                   </div>
              </div>