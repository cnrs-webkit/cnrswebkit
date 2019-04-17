<style type="text/css">
  form {
  background: #fff;
  padding: 10px;
  margin: 10px;
  border: 1px solid #dadada;
  }
  .flex_container {
    display:flex;
    flex-wrap: wrap;
   }
  .half_width{
    flex: 0 0 46%; /* fg: 0, fs: 0, fb: 100% */
    margin: 1%;
    padding: 1%;
    clear:none;
    background: rgb(239, 239, 239);	
  }
  .full_width {
    flex: 0 0 96%; /* fg: 0, fs: 0, fb: 100% */
    margin: 1%;
    padding: 1%;
    clear:none;
    background: rgb(239, 239, 239);	
  }
  li {
    margin-left: 20px;
    list-style: disc;
  }
  
</style>

<form method="post">
	<h2><?php _e('CNRS Webkit Post-install/Upgrade Settings :','cnrswebkit'); ?></h2>
    <div class="flex_container">
       <div class ="half_width">
        	<b><?php _e('Load default Pods values','cnrswebkit'); ?></b><br/><br/>
        	<p>
        	Coming soon (only for fresh install)
        	</p>
        	<ul>
        		<li>-----</li>
        		<li>-------</li>
        	</ul>
        	</p>
        </div> 
       <div class ="half_width">
        	<b><?php _e('Load default Content','cnrswebkit'); ?></b><br/><br/>
        	<p>
        	Coming soon. Load default Content: page contact evenement actualité, médiathèque
        	</p>
        	<ul>
        		<li>-----</li>
        		<li>-------</li>
        	</ul>
        	</p>
        </div>
		<div class ="half_width">
        	<b><?php _e('Reorder Pods fields in "template settings"','cnrswebkit'); ?></b><br/><br/>
        	<p>
        		<?php _e('When updating CNRS Webkit theme, and when new field are added to pods "Template settings"; these new fields appears at the end of the list. There is 2 ways to reorder fields inside "Template settings"','cnrswebkit'); ?><br />
        	</p>
        	<ul>
        		<li>
        			<a href="/wp-admin/admin.php?page=pods"><?php _e('Manual reordering of pods : ','cnrswebkit'); ?></a> 
        			<?php /* Translators: additionnal text for "Manual reordering of pods" link */ _e('is achieved by dragging and dropping fields in pods administration','cnrswebkit'); ?>
        			
        		</li>
        		<li><?php _e('Automatic reordering of pods fields: this uses the fields order defined in CNRS Webkit theme. Be aware that <strong>automatic reordering will remove your proper manual ordering !</strong>','cnrswebkit'); ?></li>
        	</ul>
        	</p>
        	<button type="submit" name="Reorder_template_settings_Pods" class="button button-primary button-large" value="Reorder_template_settings_Pods"><?php _e('Automatic reordering of pods fields', 'cnrswebkit'); ?></button>
        </div>       
        <div class ="full_width">
        	<b>TODO (coming soon) ! </b><br/><br/>
        	<p>
        	Mise à jour des traductions des pods à partir des traductions du thème CNRS (sans surcharger/effacer les traduction de l'utilisateur)
        	</p>
        </div>
        </div>

        <?php wp_nonce_field('settings_post_install'); ?>	
    </div>
</form>
