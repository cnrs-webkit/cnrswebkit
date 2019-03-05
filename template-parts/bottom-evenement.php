<?php
global $cnrs_global_params; // C. Seguinot added
$custom_params = new CnrswebkitStdListParams();
$custom_params->where = [
    'relation' => 'AND', // C. Seguinot relation -> 'relation'
    [
        'key' => 'date_de_debut',
        'value' => strftime('%Y-%m-%d %H:%M:%S'),
        'compare' => '>='
    ],
    [
        'key' => 'ID',
        'value' => get_the_ID(),
        'compare' => '!='
    ]
];
$custom_params->limit = 2;
$evenement_data = new CnrswebkitPageItemsList('evenement', $custom_params);
// C. Seguinot remove aganda harcoded URL
$liste_evenement_url= get_permalink($cnrs_global_params->field('pageliste_evenement')['ID']);
if ($liste_evenement_url) {
	$liste_evenement_url = '</h1><a href="'. $liste_evenement_url . '">' . __('Return to Events list', 'cnrswebkit') . '</a>';
}
if ($evenement_data->has_items()) {
    ?>
    <div class="nextEvents">
        <header><h1><?php _e('Next events', 'cnrswebkit') ?></h1><?php echo ($liste_evenement_url? $liste_evenement_url: '')?></header>
        <?php
        echo $evenement_data->get_html_item_list('bottomevenement');
        ?>  
    </div>
    <?php
}
