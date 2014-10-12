	       <?= $breadcrumbs; ?>
	       <div class="row-fluid">
		    <p class="pull-left"><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/issues/add','<i class="icon-pencil"></i> '.__('Issue_add'),$attributes = array('class' => 'not_und sp_tooltip o_pad','title' => __('Issue_add'))); ?></p>
		    <form id="formid" name="formwsel" method="get" action="<?= URL::base().Kohana::$config->load('global.site_ap_url').'/'.$mod_url;?>/issues/">
			   <span class="pull-right"><?= __('Edition');?> &nbsp;
			   <select id="selactions" name="group_id" class="" onchange="javascript:document.formwsel.submit();">
                               <option value="0">-- <?= __('All');?> --</option>
				 <?php foreach($editions_list_short as $edlist): 
				      
				    
					$sect_active = ((isset($group_active)) and ($group_active == $edlist['id_edition'])) ? 'selected' : '';
				 ?> 			      
					<option value="<?= HTML::chars($edlist['id_edition']); ?>" <?= $sect_active?>><?= HTML::chars($edlist['edition_title']); ?></option>
                                 <?php endforeach; ?> 
                          </select>
						  
						  </span>
		    </form>
		    <table class="table table-striped table-hover table-bordered">
			   <thead>
				 <tr>
				     <td><?= __('ID');?></td>
				     <td><?= __('Issue');?></td>
				     <td><?= __('Published_f');?></td>
				     <td><?= __('Edition');?></td>
				     <td><?= __('Activity');?></td>
				     <td><?= __('Actions');?></td>
				</tr>
			  </thead>
			  <tbody>
				<?php foreach($issues_list as $issue): ?>
				<tr>
				    <td><?= $issue['id_issue']; ?></td>
				    <td><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/issues/edit/'.$issue['id_issue'], $issue['issue_title'],$attributes = array('class' => 'not_und sp_tooltip','title' => __('Edit'))); ?> / <?= $issue['issue_number_year']; ?> (<?= $issue['issue_number_all']; ?>)</td>
				    <td><?= $issue['issue_publish_day']; ?>.<?= $issue['issue_publish_month']; ?>.<?= $issue['issue_publish_year']; ?></td>
				    <td><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/editions/edit/'.$issue['id_edition'], $issue['edition_title'],$attributes = array('class' => 'not_und sp_tooltip','title' => __(''))); ?></td>
				    <td><? if($issue['issue_status'] != 0) echo __('Yes'); else echo __('No');  ?></td>
				    <td><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/issues/edit/'.$issue['id_issue'],'<i class="icon-edit"></i>',$attributes = array('class' => 'not_und sp_tooltip o_pad','title' => __('Edit'))); ?>  <?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/issues/delete/'.$issue['id_issue'],'<i class="icon-remove-circle"></i>',$attributes = array('class' => 'confirm not_und sp_tooltip o_pad','title' => __('Delete'))); ?></td>
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