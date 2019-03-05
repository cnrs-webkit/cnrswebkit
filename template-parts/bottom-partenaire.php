<?php
$custom_params = new CnrswebkitStdListParams();
$custom_params->where = [
    'key' => 'filtre_partenaires.term_id',
    'value' => 11,
    'compare' => '='
];


$partenaire_data = new CnrswebkitPageItemsList('partenaire', $custom_params);
if ($partenaire_data->has_items()) {
    ?>
    <div class="tutellesContainer">
        <div class="partTitle"><?php _e('partners', 'cnrswebkit') ?></div>
        <?php  // C. SEGUINOT Attention lien codé en dur inexistant !! ?><div class="partKnowMore"><a href="/les-tutelles/"><?php _e('Learn more about our partners', 'cnrswebkit') ?></a></div>
        <div class="partContainer">
            <?php
            echo $partenaire_data->get_html_item_list('bottompartenaire');
            ?>
        </div>
    </div>
    <?php
} 
