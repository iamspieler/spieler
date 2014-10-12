	       <?= $breadcrumbs; ?>
	       <div class="row-fluid">
		    <form id="formid" name="formwsel" method="post" action="<?= URL::base().Kohana::$config->load('global.site_ap_url').'/'.$mod_url;?>/">
			   <span class="pull-left"><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/add/', '<i class="icon-pencil"></i> '.__('Banner_add') ,$attributes = array('class' => 'not_und','title' => __('Banner_add'))); ?></span>
			   <span class="pull-right"><?= __('Status');?> &nbsp;
			   <select id="selactions" name="group_id" class="" onchange="javascript:document.formwsel.submit();">
				   <option value="0">-- <?= __('All');?> --</option>		      
				   <option value="1"><?= __('Active'); ?></option>
				   <option value="1"><?= __('Pub_waiting'); ?></option>
			   </select>
			   </span>
		    </form>
		    <table class="table table-striped table-hover">
			   <thead>
                                 <tr>
				      <td>ID</td>
				      <td><?= __('Title'); ?></td>
				      <td><?= __('Position'); ?></td>
				      <td><?= __('Pub_start_date'); ?></td>
				      <td><?= __('Pub_end_date'); ?></td>
				      <td><?= __('Clicks'); ?></td>
				      <td><?= __('Activity'); ?></td>
				      <td><?= __('Actions'); ?></td>
				 </tr>
                           </thead>
                           <tbody>
				<?php foreach($banners_list as $banners): ?>
                                <tr>
				    
				     <td><?= $banners['id_banner']; ?></td>
				     <td><?= $banners['banner_title']; ?></td>
				     <td><?= $banners['pos_id']; ?></td>
				     <td><?= Date::formatted_time($banners['banner_start_date'], 'd.m.Y | H:i'); ?></td>
				     <td><?= Date::formatted_time($banners['banner_end_date'], 'd.m.Y | H:i'); ?></td>
				     <td><?= $banners['banner_count']; ?></td>
				     <td><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/edit/'.$banners['id_banner'], $banners['banner_title'],$attributes = array('class' => 'not_und sp_tooltip','title' => __('Edit'))); ?></td>
				     <td><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/edit/'.$banners['id_banner'],'<i class="icon-edit"></i>',$attributes = array('class' => 'not_und sp_tooltip o_pad','title' => __('Edit'))); ?>  <?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/delete/'.$banners['id_banner'],'<i class="icon-remove-circle"></i>',$attributes = array('class' => 'confirm not_und sp_tooltip o_pad','title' => __('Delete'))); ?></td>
				     <td><? if($banners['banner_status'] != 0) echo __('Yes'); else echo __('No');  ?></td>
				</tr>
				<?php endforeach; ?> 
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