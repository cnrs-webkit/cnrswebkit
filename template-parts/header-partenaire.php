<?php
/**
* Template used to add mini logo in the header, below Site branding and Site description 
*/

global $cnrs_global_params;

if ( empty($cnrs_global_params->field('logo_partenaires_header') ) ){
    return; 
}

// TODO Faut-il utiliser les Pods pour si peu ??

// Load laboratory partners for header
$partenaires = [];
foreach ($cnrs_global_params->field('logo_partenaires_header') as $partenaire) {
    $partenaires[] = $partenaire['ID'];
}
$custom_params = new CnrswebkitStdListParams();
$custom_params->where = [
    'key' => 't.ID',
    'value' => $partenaires,
    'compare' => 'IN'
];
$partenaires_data = new CnrswebkitPageItemsList('partenaire', $custom_params);

if ($partenaires_data->has_items()) {
    ?>
    <div class="headerTutellesContainer">
        <div class="partContainer">
            <?php
            echo $partenaires_data->get_html_item_list('headerpartenaire');
            ?>
        </div>
    </div>
    <?php
} 
