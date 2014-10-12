	       <?= $breadcrumbs; ?>
	       <div class="row-fluid">
		    <p class="pull-right"><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/editions/add','<i class="icon-pencil"></i> '.__('Edition_add'),$attributes = array('class' => 'not_und sp_tooltip o_pad','title' => __('Edition_add'))); ?></p>
		    <table class="table table-striped table-hover">
			   <thead>
			      <tr>
				  <td><?= __('ID');?></td>
				  <td><?= __('Edition_title');?></td>
				  <td><?= __('URL');?></td>
				  <td><?= __('Actions');?></td>
			      </tr>
                           </thead>
                           <tbody>
			   <?php foreach($editions_list as $edition): ?>
                                <tr>
				    <td><?= HTML::chars($edition['id_edition']); ?></td>
				    <td><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/editions/edit/'.$edition['id_edition'], HTML::chars($edition['edition_title']), $attributes = array('class' => 'not_und','title' => __('Edit'))); ?>  </td>
				    <td><?= HTML::chars($edition['edition_url']); ?></td>
				    <td>
					<?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/editions/edit/'.$edition['id_edition'],'<i class="icon-edit"></i>',$attributes = array('class' => 'not_und sp_tooltip o_pad','title' => __('Edit'))); ?>  
					<?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/editions/delete/'.$edition['id_edition'],'<i class="icon-remove-circle"></i>',$attributes = array('class' => 'confirm not_und sp_tooltip o_pad','title' => __('Delete'))); ?></td>
				</tr>
			   </tbody>
			  <?php endforeach; ?> 
		    </table>

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