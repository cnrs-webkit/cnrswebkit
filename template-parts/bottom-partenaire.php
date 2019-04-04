<?php
global $event_with_partners;
global $cnrs_global_params;
if ( isset($event_with_partners) && (true === $event_with_partners )  ) {
    // $current_item->value('partenaires')
    return;
}
$nb_partenaires = (false === $cnrs_global_params->field('partenaires_du_laboratoire')) ? 0: 
    count($cnrs_global_params->field('partenaires_du_laboratoire'));
    $nb_tutelles = (false === $cnrs_global_params->field('tutelles_du_laboratoire')) ? 0: 
    count($cnrs_global_params->field('tutelles_du_laboratoire'));

// TODO Faut-il utiliser les Pods pour si peu ??

// Load laboratory supervisors 
if ($nb_tutelles) {
    $tutelles = [];
    foreach ($cnrs_global_params->field('tutelles_du_laboratoire') as $tutelle) { 
        $tutelles[] = $tutelle['ID'];
    }
    $custom_params = new CnrswebkitStdListParams();
    $custom_params->where = [
        'key' => 't.ID',
        'value' => $tutelles,
        'compare' => 'IN'
    ];
    $tutelles_data = new CnrswebkitPageItemsList('partenaire', $custom_params);
} 

// Load laboratory partners 
if ($nb_partenaires) {
    $partenaires = [];
    foreach ($cnrs_global_params->field('partenaires_du_laboratoire') as $partenaire) {
        $partenaires[] = $partenaire['ID'];
    }
    $custom_params = new CnrswebkitStdListParams();
    $custom_params->where = [
        'key' => 't.ID',
        'value' => $partenaires,
        'compare' => 'IN'
    ];
    $partenaires_data = new CnrswebkitPageItemsList('partenaire', $custom_params);
} 

$nb_logos = $nb_partenaires + $nb_tutelles; 
if ( 0 === $nb_logos ) {
    return; 
}

$first=true;

if ($nb_tutelles && $tutelles_data->has_items()) {
    // Adjust $width so that logo have same size in both tutellescontainer
    $width = (string) floor(1056*$nb_tutelles/$nb_logos);// 1056 px= full width 
    $logo_width = (string) floor(1000/$nb_tutelles)/10; 
    ?>
    <div class="tutellesContainer <?php echo ($first? '':' notfirst');?>" style="max-width:<?php echo $width; ?>px; float:left;">
        <div class="partTitle"><?php echo($cnrs_global_params->pod_data['fields']['tutelles_du_laboratoire']['label']); ?></div>
        <div class="partContainer">
            <?php
            echo $tutelles_data->get_html_item_list('bottompartenaire', $logo_width);
            ?>
        </div>
    </div>
    <?php
    $first=false; 
}

if ($nb_partenaires && $partenaires_data->has_items()) {
    // Adjust $width so that logo have same size in both tutellescontainer
    $width = (string) floor(1056*$nb_partenaires/$nb_logos); // 1056 px= full width 
    $logo_width = (string) floor(1000/$nb_partenaires)/10;
    ?>
    <div class="tutellesContainer<?php echo ($first? '':' tutellesContainernotfirst');?>" style="max-width:<?php echo $width; ?>px; float:left;">
        <div class="partTitle"><?php echo($cnrs_global_params->pod_data['fields']['partenaires_du_laboratoire']['label']); ?></div>
        <div class="partContainer">
            <?php
            echo $partenaires_data->get_html_item_list('bottompartenaire', $logo_width);
            ?>
        </div>
    </div>
    <?php
}

if ($nb_logos) {
    // TODOTODO erreur polylang activé: get_permalink($cnrs_global_params->field('pagetutelles_et_partenaires')['ID']); récupère la page dans la langue de la page courant, ien si elle n'existe pas!!
    
    $pagetutelles_et_partenaires_url = get_pod_page('pagetutelles_et_partenaires');
    $is_page_tutelles_et_partenaires = ($pagetutelles_et_partenaires_url === get_the_permalink() );
    
    if ($pagetutelles_et_partenaires_url && !$is_page_tutelles_et_partenaires) {
        // TODO message = tutelle ou partenaires ou les 2!!!
        $pagetutelles_et_partenaires_url = '<a href="'. $pagetutelles_et_partenaires_url . '">' . __('Learn more about our partners', 'cnrswebkit') . '</a>';
        ?>
        <div class="partKnowMore"><?php echo $pagetutelles_et_partenaires_url;?></div>
        <?php
    } 
} 

?> 

