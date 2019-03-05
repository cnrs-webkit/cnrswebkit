<?php
$custom_params = new CnrswebkitStdListParams();
$custom_params->where = [
    'key' => 'ID',
    'value' => get_the_ID(),
    'compare' => '!='
];
$custom_params->orederby = 'ID DESC';
$custom_params->limit = 3;
$actualite_data = new CnrswebkitPageItemsList('actualite', $custom_params);
if ($actualite_data->has_items()) {
    ?>
    <div class="toRead">
        <header><h1><?php _e('See parent section', 'cnrswebkit') ?></h1></header>
        <div>
            <?php
            echo $actualite_data->get_html_item_list('bottomactualite');
            ?>
        </div>
    </div>
    <?php
}
