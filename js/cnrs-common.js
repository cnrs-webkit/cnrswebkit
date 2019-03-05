/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function launchMediathequePopin(obj) {
    console.log(obj);
    var htmlPopin = "";
    htmlPopin += "<div class='itemContainer'>";
    htmlPopin += "<div class='imgContainer'><img src='" + obj.link + "' alt='" + obj.post_title + "' /></div>";
    htmlPopin += "<div class='detailsContainer'>";
    htmlPopin += "<h1>" + obj.post_title + "</h1>";
    htmlPopin += obj.share;
    htmlPopin += "<p>" + obj.chapo + "</p>";
    htmlPopin += "<span>© " + obj.credits + "</span>";
    htmlPopin += "</div>";
    htmlPopin += "<div id='popinClose'><a href='#'></a></div>";
    htmlPopin += "</div>";
    var htmlClose = "";
    $("body").addClass("fixed");
    $("#popinOverlay").fadeIn().css("display", "flex");
    $("#popinContainer").append(htmlPopin).fadeIn().css("display", "flex");
    $("#popinClose").click(function (event) {
        closeMediathequePopin();
        event.preventDefault();
        return false;
    });
    $(document).keyup(function (event) {
        if (event.keyCode === 27) {
            closeMediathequePopin();
            event.preventDefault();
        }
        return false;
    });
}
function closeMediathequePopin() {
    $("#popinContainer").empty().fadeOut();
    $("#popinOverlay").fadeOut();
    $("body").removeClass("fixed");
}

function launchEmploiFormPopin(event) {
    displayEmploiForm(event.target.attributes.dataid.value, '#popinContainerform');
    $("body").addClass("fixed");
    $("#popinOverlay").fadeIn().css("display", "flex");
    $("#popinContainer").fadeIn().css("display", "flex");
    $("#popinClose").click(function (event) {
        closeEmploiFormPopin();
        event.preventDefault();
        return false;
    });
    $(document).keyup(function (event) {
        if (event.keyCode === 27) {
            closeEmploiFormPopin();
            event.preventDefault();
            return false;
        }
    });
}
function closeEmploiFormPopin() {
    $("#popinContainer").fadeOut();
    $("#popinContainerform").empty();
    $("#popinOverlay").fadeOut();
    $("body").removeClass("fixed");
}

function populateContact(obj, id) {
    console.log(obj);
    var target = $("a[data-id=" + id + "]").prev(".contactDetails");
    $(target).children(".thumbContainer").html("img " + obj.nom + " " + obj.prenom);
    $(target).children(".detailsContainer").children(".name").html(obj.nom + " " + obj.prenom);
    $(target).children(".detailsContainer").children(".function").html(obj.job);
    $(target).children(".detailsContainer").children("p").html(obj.description);
    $(target).children(".detailsContainer").children("a.contactLink").attr("data-id", id);
}

var contactClick = function () {
    // details contact
    $(".loop-contents-contact article a").unbind();
    $(".loop-contents-contact article a").click(function (event) {
        $(this).prev(".contactDetails").slideToggle(300).css("display", "flex");
        event.preventDefault();
        return false;
    });
    
    $(".contactLink").unbind();
    $(".contactLink").click(function (event) {
        runAjaxQuery({
            action: 'contact_form',
            area: 'contact',
            formid: event.target.attributes.dataid.value,
            target: event.target.attributes.target.value
        });
        event.preventDefault();
        return false;
    });
    
    // close
    $(".closeContact").unbind();
    $(".closeContact").click(function () {
        $(this).parent(".contactDetails").slideToggle(300);
    });
}

$(document).ready(function () {

    // Follow us block Actus
    $("#actualite-social-links").append($('section#sow-social-media-buttons-2').html());

    //Actualités Masonry
    var $grida = $('.loop-contents-actualite').masonry({
        itemSelector: 'article',
        //columnWidth: 400
        columnWidth: 325,
        gutter: 40
    });

    $grida.imagesLoaded().progress(function () {
        $grida.masonry();
    });

// Médiathèque Masonry
    var $gridm = $('.mediasContainer').masonry({
        itemSelector: 'article',
        //columnWidth: 400,
        columnWidth: 350,
        //gutter:2
    });

    $gridm.imagesLoaded().progress(function () {
        $gridm.masonry();
    });

// Links for Actualités
    $("body.page-template-templateactualite .loop-contents-actualite article.type-actualite").click(function () {
        var thisUrl = $(this).attr("data-url");
        window.location.href = thisUrl;
    });

// Popin Mediatheque function
    $("article.mediatheque a").click(function (event) {
        var thisID = jQuery(this).attr("data-id");
        var thisObj = eval("imagepopin_" + thisID);
        launchMediathequePopin(thisObj);
        event.preventDefault();
        return false;
    });

// Popin Emploi function
    $("article.emploi .contactMail a").click(function (event) {
        launchEmploiFormPopin(event);
        event.preventDefault();
        return false;
    });

// Add to calendar function
    $(".addCalendar a").click(function (event) {
        $(this).parent().children("form").submit();
        event.preventDefault();
        return false;
    });

// bouton En savoir plus Publications
    $(".knowMorePubLink").click(function (event) {
        if ($(this).hasClass("deployed")) {
            $(this).prev(".knowMorePub").slideUp();
            $(this).removeClass("deployed");
            $(this).html("En savoir plus");
        } else {
            $(this).prev(".knowMorePub").slideDown();
            $(this).addClass("deployed");
            $(this).html("Fermer");
        }
        event.preventDefault();
        return false;
    });

// partenaires squares
    $(".itemPart").each(function () {
        var thisWidth = $(this).outerWidth();
        $(this).children(".thumbPart").css("height", thisWidth);
    });

    contactClick();

});
