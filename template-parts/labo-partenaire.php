<?php
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
    $partenaire_data = new CnrswebkitPageItemsList('partenaire', $custom_params);
    if ($partenaire_data->has_items()) {
        ?>
        <div class="tutellesHomeContainer">
            <div class="partContainer">
                <?php
                echo $partenaire_data->get_html_item_list('labopartenaire');
                ?>
            </div>
        </div>
        <?php
    }
}
