			<?= $breadcrumbs; ?>
			
			<div class="row-fluid">
				<div class="service_line">
						<h3><?= __('Blog'); ?></h3>
						<h4><?= $page_name;?></h4>
						<div class="clearfix"></div>
						
				</div>
			</div>
	        <div class="row-fluid">
		    <span class="pull-right"><?= SpHTML::anchor(URL::base('http').ADMINURL.'/'.$mod_url.'/sections/add/', '<i class="icon-pencil"></i>'.__('Section_add') ,$attributes = array('class' => 'not_und','title' => __('Section_add'))); ?></span>
		    <div class="clearer"></div>
		    <table class="table table-striped table-hover">
			   <thead>
                    <tr>
				      <td><?= __('ID'); ?></td>
				      <td><?= __('Title'); ?></td>
				      <td><?= __('Items'); ?></td>
				      <td><?= __('Count'); ?></td>
				      <td><?= __('Actions'); ?></td>
					</tr>
                           </thead>
                           <tbody>
				<?php foreach($sections_list as $section): ?>
                                <tr>
				    
				     <td><?= $section['id_section']; ?></td>
				     <td><?= SpHTML::anchor(URL::base('http').ADMINURL.'/'.$mod_url.'/sections/edit/'.$section['id_section'], $section['section_title'],$attributes = array('class' => 'not_und sp_tooltip','title' => __('Edit'))); ?></td>
				     <td><?= SpHTML::anchor(URL::base('http').ADMINURL.'/'.$mod_url.'items/section/'.$section['id_section'], __('View'),$attributes = array('class' => 'not_und sp_tooltip','target' => '_blank','title' => __('View'))); ?></td>
				     <td><?= $section['section_count']; ?></td>
					 <td><?= SpHTML::anchor(URL::base('http').ADMINURL.'/'.$mod_url.'/sections/edit/'.$section['id_section'],'<i class="icon-edit"></i>',$attributes = array('class' => 'not_und sp_tooltip o_pad','title' => __('Edit'))); ?>  <?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/sections/delete/'.$section['id_section'],'<i class="icon-remove-circle"></i>',$attributes = array('class' => 'confirm not_und sp_tooltip o_pad','title' => __('Delete'))); ?></td>
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