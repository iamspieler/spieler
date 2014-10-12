	       <?= $breadcrumbs; ?>
	       <div class="row-fluid">
		    <!--<form id="formid" name="formwsel" method="post" action="<?= URL::base().$mod_url;?>/group/">
			 <select id="selactions" name="group_url" class="pull-right" onchange="javascript:document.formwsel.submit();">
                                 <option value="">-- Группы --</option>
				 <?php foreach($roles_list as $roles): ?> 			      
					<option value="<?= HTML::chars($roles['id']); ?>"><?= HTML::chars(__($roles['name_native'])); ?></option>
                                 <?php endforeach; ?> 
                          </select>
		    </form>-->
		    <table class="table table-striped table-hover">
			   <thead>
                                 <tr>
				      <td></td>
				      <td>Логин</td>
				      <td>Имя</td>
				      <td>Последний вход</td>
				 </tr>
                           </thead>
                           <tbody>
				<?php foreach($users_list as $user): ?>
                                <tr>
				     <td><?= SpHTML::anchor(Kohana::$config->load('global.site_ap_url').'/'.$mod_url.'/profile/'.$user['id'],'<i class="icon-info-sign icon-large"></i>',$attributes = array('class' => 'not_und sp_tooltip','title' => __('View_more'))); ?></td>
				     <td><?= $user['username']; ?></td>
				     <td><?= $user['user_off_name']; ?></td>
				     <td><?= $last_login = (trim($user['last_login']) != "") ? date("H:i d.m.Y", $user['last_login']) : '---'; ?></td>
				</tr>
				<?php endforeach; ?> 
		    </table>


		    <?= $pagination; ?>
	      </div><!--/row-->