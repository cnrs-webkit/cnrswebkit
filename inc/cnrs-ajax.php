<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

add_action('wp_ajax_load_more', 'load_more');
add_action('wp_ajax_nopriv_load_more', 'load_more');
add_action('wp_ajax_contact_form', 'contact_form');
add_action('wp_ajax_nopriv_contact_form', 'contact_form');
add_action('wp_ajax_submit_contact_form', 'submit_contact_form');
add_action('wp_ajax_nopriv_submit_contact_form', 'submit_contact_form');
add_action('wp_ajax_submit_emploi_form', 'submit_emploi_form');
add_action('wp_ajax_nopriv_submit_emploi_form', 'submit_emploi_form');
add_action('wp_ajax_submit_newsletter_form', 'submit_newsletter_form');
add_action('wp_ajax_nopriv_submit_newsletter_form', 'submit_newsletter_form');
add_action('wp_enqueue_scripts', 'cnrsajaxenqueue');

function cnrsajaxenqueue() {
    wp_enqueue_script('cnrswebkit-ajax', get_template_directory_uri() . '/js/cnrs-ajax.js', array('jquery', 'cnrswebkit-init'), '1.0' . '-' . time(), true);
    wp_localize_script('cnrswebkit-ajax', 'adminAjax', admin_url('admin-ajax.php'));
}

function load_more() {
    global $cnrs_global_params;
    $target = filter_input(INPUT_POST, 'target', FILTER_DEFAULT);
    $area = filter_input(INPUT_POST, 'area', FILTER_DEFAULT);
    $page = filter_input(INPUT_POST, 'page', FILTER_DEFAULT);
    $lastmonth = filter_input(INPUT_POST, 'lastmonth', FILTER_DEFAULT);

    switch ($area) {
        case 'evenement';
            $custom_params = new CnrswebkitStdListParams();
            $custom_params->limit = -1;
            $evenement_data = new CnrswebkitPageItemsList('evenement', $custom_params);
            $total_items = $evenement_data->total_items();
            $custom_params->limit = $cnrs_global_params->field('nombre_devenements_page_agenda');
            $custom_params->page = $page;
            $evenement_data = new CnrswebkitPageItemsList('evenement', $custom_params);
            ob_start();
            $evenement_data->get_html_item_list();
            $data_html = ob_get_clean();

            if ($total_items > ($cnrs_global_params->field('nombre_devenements_page_agenda') * $page)) {
                $data_html .= "<script>$('.moreEvents a').attr('page', '" . $page++ . "');</script>";
            } else {
                $data_html .= "<script>$('.moreEvents').hide();</script>";
            }
            break;
        case 'contact';
            $custom_params = new CnrswebkitStdListParams();
            $custom_params->limit = -1;
            $contact_data = new CnrswebkitPageItemsList('contact', $custom_params);
            $total_items = $contact_data->total_items();
            $custom_params->limit = $cnrs_global_params->field('nombre_decontacts_page_contact');
            $custom_params->page = $page;
            $contact_data = new CnrswebkitPageItemsList('contact', $custom_params);
            ob_start();
            $contact_data->get_html_item_list();
            $data_html = ob_get_clean();
           if ($total_items > ($cnrs_global_params->field('nombre_decontacts_page_contact') * $page)) {
                $data_html .= "<script>$('.moreContacts a').attr('page', '" . $page++ . "');</script>";
            } else {
                $data_html .= "<script>$('.moreContacts').hide();</script>";
            }
            $data_html .= "<script>contactClick();</script>";
            break;
        default:
            wp_send_json_error(['message' => 'Unknown Area'], 200);
    }
    $data = [];
    $data['to_html'] = [];
    $data['to_html'][] = [
        'action' => 'append',
        'target' => $target,
        'data' => $data_html
    ];
    wp_send_json_success($data);
    die();
}

function contact_form() {
    $form_id = filter_input(INPUT_POST, 'formid', FILTER_DEFAULT);
    $area = filter_input(INPUT_POST, 'area', FILTER_DEFAULT);
    $target = filter_input(INPUT_POST, 'target', FILTER_DEFAULT);

    switch ($area) {
        case 'emploi';
            ob_start();
            include(locate_template('template-parts/emploi_form.php'));
            $data_html = ob_get_clean();
            $data_html .= '<script>
    $("#contact-form-submit-' . $form_id . '").unbind("click");
    $("#contact-form-submit-' . $form_id . '").click(function () {
        runAjaxQuery({
            action: "submit_emploi_form",
            area: "emploi",
            formid: "' . $form_id . '",
            target: "' . $target . '",
            object: $("#object' . $form_id . '").val(),
            nom: $("#nom' . $form_id . '").val(),
            prenom: $("#prenom' . $form_id . '").val(),
            email: $("#email' . $form_id . '").val(),
            message: $("#message' . $form_id . '").val(),
        });
    });
    $("#contact-form-cancel-' . $form_id . '").unbind("click");
    $("#contact-form-cancel-' . $form_id . '").click(function () {
        $("' . $target . '").empty();
        closeEmploiFormPopin();
    });
</script>';
            break;
        case 'contact';
            ob_start();
            include(locate_template('template-parts/contact_form.php'));
            $data_html = ob_get_clean();
            $data_html .= '<script>
    $("#contact-form-submit-' . $form_id . '").unbind("click");
    $("#contact-form-submit-' . $form_id . '").click(function () {
        runAjaxQuery({
            action: "submit_contact_form",
            area: "contact",
            formid: "' . $form_id . '",
            target: "' . $target . '",
            object: $("#object' . $form_id . '").val(),
            nom: $("#nom' . $form_id . '").val(),
            prenom: $("#prenom' . $form_id . '").val(),
            email: $("#email' . $form_id . '").val(),
            message: $("#message' . $form_id . '").val(),
        });
    });
    $("#contact-form-cancel-' . $form_id . '").unbind("click");
    $("#contact-form-cancel-' . $form_id . '").click(function () {
        $("' . $target . '").empty();
    });
</script>';
            break;
        default:
            wp_send_json_error(['message' => 'Unknown Area'], 200);
    }
    $data = [];
    $data['to_html'] = [];
    $data['to_html'][] = [
        'action' => 'html',
        'target' => $target,
        'data' => $data_html
    ];
    wp_send_json_success($data);
    die();
}

function submit_contact_form() {
    $form_id = filter_input(INPUT_POST, 'formid', FILTER_VALIDATE_INT);
    $area = filter_input(INPUT_POST, 'area', FILTER_DEFAULT);
    $target = filter_input(INPUT_POST, 'target', FILTER_DEFAULT);
    $object = trim(filter_input(INPUT_POST, 'object', FILTER_DEFAULT));
    $nom = trim(filter_input(INPUT_POST, 'nom', FILTER_DEFAULT));
    $prenom = trim(filter_input(INPUT_POST, 'prenom', FILTER_DEFAULT));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
    $message = trim(filter_input(INPUT_POST, 'message', FILTER_DEFAULT));
    $data = [];
    $data['to_html'] = [];

    $errors = [];
    if (!$form_id || $form_id == '') {
        $errors[] = __('This contact was not found', 'cnrs_webkit');
    }
    if (!$area || $area == '') {
        $errors[] = __('This contact was not found', 'cnrs_webkit');
    }
    if (!$target || $target == '') {
        $errors[] = __('This target was not found', 'cnrs_webkit');
    }
    if (!$nom || $nom == '') {
        $errors[] = __('You must provide your name', 'cnrs_webkit');
    }
    if (!$prenom || $prenom == '') {
        $errors[] = __('You must provide your fistname', 'cnrs_webkit');
    }
    if (!$email || $email == '') {
        $errors[] = __('You must provide your email address', 'cnrs_webkit');
    }
    if (!$message || $message == '') {
        $errors[] = __('You must provide some message', 'cnrs_webkit');
    } else {
        $message = str_replace('\n', '<br />', $message);
    }

    if (count($errors) > 0) {
        $data['to_html'][] = [
            'action' => 'html',
            'target' => $target . '-errors',
            'data' => implode('<br />', $errors)
        ];
    } else {
        if (!$object || $object == '') {
            /* translators: 1: Firstname Name of author, 2: Site or blog name */
        	$object = sprintf( __('Nouveau message de %1$s depuis le site %2$s',  'cnrswebkit' ), $prenom . ' ' . $nom , get_bloginfo('name') );
         }
        $contact_info = new CnrswebkitRichData($form_id);
        ob_start();
        include(locate_template('template-parts/mailbody-contact.php'));
        $mail_body = ob_get_clean();
//        $to = $contact_info->value('email');
        $to = $email;
        $subject = $object;
        $body = $mail_body;
        $headers = [
            'MIME-Version: 1.0',
            'Content-Type: text/html; charset=UTF-8',
            'X-Mailer: PHP/' . phpversion(),
//            'To: ' . $contact_info->value('prenom') . ' ' . $contact_info->value('nom') . ' <' . $contact_info->value('email') . '>',
            'To: ' . $contact_info->value('prenom') . ' ' . $contact_info->value('nom') . ' <' . $email . '>',
            'From: ' . $prenom . ' ' . $nom . ' <' . $email . '>',
            'Reply-To: ' . $prenom . ' ' . $nom . ' <' . $email . '>'
        ];
        wp_mail($to, $subject, $body, $headers);
        $data['to_html'][] = [
            'action' => 'html',
            'target' => $target,
            'data' => __('Your message has been sent')
        ];
    }
    wp_send_json_success($data);
}

function submit_emploi_form() {
    $form_id = filter_input(INPUT_POST, 'formid', FILTER_VALIDATE_INT);
    $area = filter_input(INPUT_POST, 'area', FILTER_DEFAULT);
    $target = filter_input(INPUT_POST, 'target', FILTER_DEFAULT);
    $object = trim(filter_input(INPUT_POST, 'object', FILTER_DEFAULT));
    $nom = trim(filter_input(INPUT_POST, 'nom', FILTER_DEFAULT));
    $prenom = trim(filter_input(INPUT_POST, 'prenom', FILTER_DEFAULT));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
    $message = trim(filter_input(INPUT_POST, 'message', FILTER_DEFAULT));
    $data = [];
    $data['to_html'] = [];

    $errors = [];
    if (!$form_id || $form_id == '') {
        $errors[] = __('This contact was not found', 'cnrs_webkit');
    }
    if (!$area || $area == '') {
        $errors[] = __('This contact was not found', 'cnrs_webkit');
    }
    if (!$target || $target == '') {
        $errors[] = __('This target was not found', 'cnrs_webkit');
    }
    if (!$nom || $nom == '') {
        $errors[] = __('You must provide your name', 'cnrs_webkit');
    }
    if (!$prenom || $prenom == '') {
        $errors[] = __('You must provide your fistname', 'cnrs_webkit');
    }
    if (!$email || $email == '') {
        $errors[] = __('You must provide your email address', 'cnrs_webkit');
    }
    if (!$message || $message == '') {
        $errors[] = __('You must provide some message', 'cnrs_webkit');
    } else {
        $message = str_replace('\n', '<br />', $message);
    }

    if (count($errors) > 0) {
        $data['to_html'][] = [
            'action' => 'html',
            'target' => $target . '-errors',
            'data' => implode('<br />', $errors)
        ];
    } else {
        if (!$object || $object == '') {
             $object = sprintf( __('Nouveau message de %1$s depuis le site %2$s',  'cnrswebkit' ), $prenom . ' ' . $nom , get_bloginfo('name') );
        }
        $contact_info = new CnrswebkitRichData($form_id);
        ob_start();
        include(locate_template('template-parts/mailbody-emploi.php'));
        $mail_body = ob_get_clean();
        $to = $contact_info->value('email_contact');
//        $to = $email;
        $subject = $object;
        $body = $mail_body;
        $headers = [
            'MIME-Version: 1.0',
            'Content-Type: text/html; charset=UTF-8',
            'X-Mailer: PHP/' . phpversion(),
            'To: ' . $contact_info->value('nom_contact') . ' <' . $contact_info->value('email_contact') . '>',
//            'To: ' . $contact_info->value('nom_contact') . ' <' . $email . '>',
            'From: ' . $prenom . ' ' . $nom . ' <' . $email . '>',
            'Reply-To: ' . $prenom . ' ' . $nom . ' <' . $email . '>'
        ];
        wp_mail($to, $subject, $body, $headers);
        $data['to_html'][] = [
            'action' => 'html',
            'target' => $target,
            'data' => __('Your message has been sent', 'cnrs_webkit')
        ];
    }
    wp_send_json_success($data);
}

function submit_newsletter_form() {
    $data = [];
    $data['to_html'] = [];
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
    if ($email) {
        $custom_params = new CnrswebkitStdListParams();
        $custom_params->where = array(
            relation => 'AND',
        );
        $custom_params->where[] = [
            'key' => 'email',
            'value' => $email,
            'compare' => '='
        ];
        $custom_params->where[] = [
            'key' => 'post_status',
            'value' => ['publish', 'draft'],
            'compare' => 'IN'
        ];
        $custom_params->limit = 1;
        $custom_params->orderby = 'email';
        $previous_registration = new CnrswebkitPageItemsList('newsletter', $custom_params);
        if (!$previous_registration->has_items()) {
            $pod = pods('newsletter');
            $params = array(
                'title' => $email,
                'email' => $email
            );
            $pod->save($params);
            $data['to_html'][] = [
                'action' => 'html',
                'target' => '#NewsletterRegistration',
                'data' => __('Your Email address has been registered', 'cnrs_webkit')
            ];
        } else {
            $data['to_html'][] = [
                'action' => 'html',
                'target' => '#NewsletterResult',
                'data' => __('Your Email address has already been registered', 'cnrs_webkit')
            ];
        }
    } else {
        $data['to_html'][] = [
            'action' => 'html',
            'target' => '#NewsletterResult',
            'data' => __('Adresse email incorrecte', 'cnrs_webkit')
        ];
    }
    wp_send_json_success($data);
}
