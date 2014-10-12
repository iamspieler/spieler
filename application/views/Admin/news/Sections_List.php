	       <?= $breadcrumbs; ?>
	       <div class="row-fluid">
			<p class="pull-right"><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/sections/add','<i class="icon-pencil"></i> '.__('Add_section'),$attributes = array('class' => 'not_und sp_tooltip o_pad','title' => __('Add_section'))); ?></p>
		    <table class="table table-striped table-hover">
			   <thead>
                 <tr>
				      <td><?= __('ID');?></td>
				      <td><?= __('Section_title');?></td>
				      <td><?= __('URL');?></td>
					  <td></td>
				 </tr>
                           </thead>
                           <tbody>
				<?php foreach($sections_list as $section): ?>
                                <tr>
				     <td><?= HTML::chars($section['id_section']); ?></td>
				     <td><?= HTML::chars($section['section_title']); ?></td>
				     <td><?= HTML::chars($section['section_url']); ?></td>
					 <td><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/sections/edit/'.$section['id_section'],'<i class="icon-edit"></i>',$attributes = array('class' => 'not_und sp_tooltip o_pad','title' => __('Edit'))); ?>  <?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/sections/delete/'.$section['id_section'],'<i class="icon-remove-circle"></i>',$attributes = array('class' => 'confirm not_und sp_tooltip o_pad','title' => __('Delete'))); ?></td>
				</tr>
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