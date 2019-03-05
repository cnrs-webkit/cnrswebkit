jQuery(document).ready(function ($) {
    if ($.hasOwnProperty('wp')) {
        $.wp.wpColorPicker.prototype.options = {
            palettes: ['#4f35dd', '#fc4246', '#22d1a3', '#42b5fc', '#fdd539']
        };
    }
    $("#publish").click(function () {
        if (jQuery('#pods-form-ui-pods-meta-date-de-debut').length) {
            var dateDebut = jQuery('#pods-form-ui-pods-meta-date-de-debut').val();
            var dateCompareDebut = dateDebut.substring(6, 10) + dateDebut.substring(3, 5) + dateDebut.substring(0, 2) + dateDebut.substring(12, 16);
            var dateFin = jQuery('#pods-form-ui-pods-meta-date-de-fin').val();
            var dateCompareFin = dateFin.substring(6, 10) + dateFin.substring(3, 5) + dateFin.substring(0, 2) + dateFin.substring(12, 16);
            if (dateCompareFin < dateCompareDebut) {
                jQuery('.pods-form-ui-row-name-date-de-fin').find('td').prepend('<div class="pods-validate-error-message">La date de fin doit être supérieure à la date de début.</div>');
                jQuery('html,body').animate({scrollTop: jQuery("#pods-form-ui-pods-meta-date-de-debut").offset().top}, 'slow');
                return false;
            }
        }
    });
    $('#menu-posts').hide();
});
	