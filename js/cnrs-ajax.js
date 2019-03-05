/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* global adminAjax */
console.log('CNRS Ajax loaded');

/* Ajax main tool */
var runAjaxQuery = function (params) {
    $.ajax({
        url: adminAjax,
        method: "POST",
        data: params,
        success: function (ajax_return) {
            if (ajax_return.success) {
                console.log("Success");
                if (ajax_return.hasOwnProperty('data')) {
                    if (ajax_return.data.hasOwnProperty('to_html')) {
                        if (Object.keys(ajax_return.data.to_html).length > 0) {
                            console.log("HTML");
                            $.each(ajax_return.data.to_html, function (key, value) {
                                switch (value.action) {
                                    case 'html':
                                        $(value.target).html(value.data);
                                        break;
                                    case 'append':
                                        $(value.target).append(value.data);
                                        break;
                                    case 'prepend':
                                        $(value.target).prepend(value.data);
                                        break;
                                }
                            });
                        }
                    }
                    if (ajax_return.data.hasOwnProperty('to_js')) {
                        if (Object.keys(ajax_return.data.to_js).length > 0) {
                            $.each(ajax_return.data.to_js, function (key, value) {
                                $('body').append('<script>' + value.data + '</script>');
                            });
                        }
                    }
                }
            }
        },
        error: function (data) {
            console.log("Error");
        }
    });
};

$(".moreEvents a").click(function (event) {
    /* $(".moreEvents a").hide(); Unactivated C. SEGUINOT*/
    runAjaxQuery({
        action: 'load_more',
        area: 'evenement',
        target: event.target.attributes.target.value,
        page: parseInt(event.target.attributes.page.value) + 1
    });
});

$(".moreContacts a").click(function (event) {
    $(".moreContacts a").hide();
    runAjaxQuery({
        action: 'load_more',
        area: 'contact',
        target: event.target.attributes.target.value,
        page: parseInt(event.target.attributes.page.value) + 1
    });
    
});

var displayEmploiForm = function (formid, target) {
    runAjaxQuery({
        action: 'contact_form',
        area: 'emploi',
        formid: formid,
        target: target
    });
}

$('#XXNewsletterRegistration button').click(function () {
    runAjaxQuery({
        action: 'submit_newsletter_form',
        email: $('#NewsletterRegistration input').val()
    });
});
