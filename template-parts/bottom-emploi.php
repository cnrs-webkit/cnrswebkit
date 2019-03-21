<?php
global $cnrs_global_params; // C. Seguinot added
$custom_params = new CnrswebkitStdListParams();
$custom_params->where = [
    'key' => 'ID',
    'value' => get_the_ID(),
    'compare' => '!='
];
$custom_params->orederby = 'ID DESC';
$custom_params->limit = 2;
$emploi_data = new CnrswebkitPageItemsList('emploi', $custom_params);

$liste_emploi_url= get_permalink($cnrs_global_params->field('pageliste_emploi')['ID']);

if ($liste_emploi_url) {
    $liste_emploi_url = '</h1><a href="'. $liste_emploi_url . '">' . __('Return to recruitment list', 'cnrswebkit') . '</a>';
}

if ($emploi_data->has_items()) {
    ?>
    <div class="nextEvents">
        <header><h1><?php _e('Other recruitment', 'cnrswebkit') ?></h1><?php echo ($liste_emploi_url? $liste_emploi_url: '')?></a></header>
        <?php
        echo $emploi_data->get_html_item_list('bottomemploi');
        ?>  
    </div>
    <?php
}
