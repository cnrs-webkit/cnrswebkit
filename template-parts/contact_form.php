<div id="contact-form-<?php echo $form_id ?>" class="contact-form">
    <input id="nom<?php echo $form_id ?>" placeholder="<?php _e('Your name', 'cnrswebkit') ?>" />
    <input id="prenom<?php echo $form_id ?>" placeholder="<?php _e('Your firstname', 'cnrswebkit') ?>" />
    <input id="email<?php echo $form_id ?>" placeholder="<?php _e('Your email address', 'cnrswebkit') ?>" />
    <textarea id="message<?php echo $form_id ?>" placeholder="<?php _e('Your message', 'cnrswebkit') ?>"></textarea>
    <button id="contact-form-submit-<?php echo $form_id; ?>"><?php _e('Send', 'cnrswebkit') ?></button>
    <button id="contact-form-cancel-<?php echo $form_id; ?>"><?php _e('cancel', 'cnrswebkit') ?></button>
    <div id="form-container-<?php echo $form_id ?>-errors" class="contact-form-errors"></div>
</div>