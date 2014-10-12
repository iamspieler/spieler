	       <?= $breadcrumbs; ?>
	       <div class="row-fluid">
		    <form id="formid" name="formwsel" method="post" action="<?= URL::base().Kohana::$config->load('global.site_ap_url').'/'.$mod_url;?>/">
			   <span class="pull-left"><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/add/', '<i class="icon-pencil"></i> '.__('News_add') ,$attributes = array('class' => 'not_und','title' => __('News_add'))); ?></span>
			   <span class="pull-right"><?= __('Section');?> &nbsp;
			   <select id="selactions" name="group_id" class="" onchange="javascript:document.formwsel.submit();">
                               <option value="0">-- <?= __('No');?> --</option>
				 <?php foreach($sections_list_short as $sections): 
					$sect_active = ((isset($group_active)) and ($group_active == $sections['id_section'])) ? 'selected' : '';
				 ?> 			      
					<option value="<?= HTML::chars($sections['id_section']); ?>" <?= $sect_active?>><?= HTML::chars($sections['section_title']); ?></option>
                                 <?php endforeach; ?> 
                          </select>
						  
						  </span>
		    </form>
		    <table class="table table-striped table-hover">
			   <thead>
                                 <tr>
				      <td>ID</td>
				      <td>Дата</td>
				      <td>Заголовок</td>
				      <td>Категория</td>
				      <td>Активность</td>
				      <td>Действия</td>
				 </tr>
                           </thead>
                           <tbody>
				<?php foreach($news_list as $news): ?>
                                <tr>
				    
				     <td><?= $news['id_news']; ?></td>
				     <td><?= Date::formatted_time($news['news_date'], 'd.m.Y | H:i'); ?></td>
				     <td><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/edit/'.$news['id_news'], $news['news_title'],$attributes = array('class' => 'not_und sp_tooltip','title' => __('Edit'))); ?></td>
				     <td><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/section/'.$news['section_url'], $news['section_title'],$attributes = array('class' => 'not_und sp_tooltip','title' => __('View_more'))); ?></td>
				     <td><? if($news['news_status'] != 0) echo __('Yes'); else echo __('No');  ?></td>
				     <td><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/edit/'.$news['id_news'],'<i class="icon-edit"></i>',$attributes = array('class' => 'not_und sp_tooltip o_pad','title' => __('Edit'))); ?>  <?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/delete/'.$news['id_news'],'<i class="icon-remove-circle"></i>',$attributes = array('class' => 'confirm not_und sp_tooltip o_pad','title' => __('Delete'))); ?></td>
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