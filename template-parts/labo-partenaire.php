<?php
// TODO why not use $cnrs_global_params instead of pods ???
if ($pods->field('partenaires_du_laboratoire')) {
    $partenaires = [];
    foreach ($pods->field('partenaires_du_laboratoire') as $partenaire) {
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
        <div class="tutellesHomeContainer">
            <div class="partContainer">
                <?php
                echo $partenaires_data->get_html_item_list('labopartenaire');
                ?>
            </div>
        </div>
        <?php
    }
}
