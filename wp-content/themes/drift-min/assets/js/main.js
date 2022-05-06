(function() {
    'use strict';
    var api;
    api = function(x, y) {
        var elm, scrollX, scrollY, newX, newY;
        /* stash current Window Scroll */
        scrollX = window.pageXOffset;
        scrollY = window.pageYOffset;
        /* scroll to element */
        window.scrollTo(x, y);

        /* calculate new relative element coordinates */
        newX = x - window.pageXOffset;
        newY = y - window.pageYOffset;
        /* grab the element */
        elm = document.elementsFromPoint(newX, newY);
        /* revert to the previous scroll location */
        window.scrollTo(scrollX, scrollY);
        /* returned the grabbed element at the absolute coordinates */
        return elm;
    };
    this.document.elementsFromAbsolutePoint = api;
}).call(this);

function fixQuoteSpacing() {
    jQuery(".link_quote").each(function() {
        var this_link = this;
        var rect = jQuery(this).offset();
        var quote_x = rect.left;
        var quote_y = rect.top;
        var quote_y_bottom = rect.top + jQuery(this).height();

        // Check collision with top of element
        var found_issue = false;
        var family = document.elementsFromAbsolutePoint(quote_x, quote_y);
        jQuery(family).each(function() {
            if (!this.isSameNode(this_link) && this.classList.contains("link_quote")) {
                jQuery(this).css("cssText", "margin-top: " + (parseInt(jQuery(this).css("margin-top")) + jQuery(this).height() + 20) + "px !important;");
                found_issue = true;
            }
        });

        if (found_issue) {
            index = -1;
        } // Reset loop
        else {
            // Check collision with bottom of element
            var family = document.elementsFromAbsolutePoint(quote_x, quote_y_bottom);
            jQuery(family).each(function() {
                if (!this.isSameNode(this_link) && this.classList.contains("link_quote")) {
                    jQuery(this).css("cssText", "margin-top: " + (parseInt(jQuery(this).css("margin-top")) + jQuery(this).height() + 20) + "px !important;");
                    found_issue = true;
                }
            });
        }

        if (found_issue) {
            index = -1;
        } // Reset loop
    });

}

(function($) {

    /** Search 8*/
    $(".searchPage_Form_Button").on("click", function() {
        var newSearchBox = $(".searchPage_Form_Box").val();
        $(".orig").val(newSearchBox);
        $(".promagnifier").trigger("click");
    });

    $(".drift_search_link a").click(function() {
        $(".drift_searchForm").slideToggle();
        $("#ajaxsearchlite1 input[type='search']").focus();
        $("#ajaxsearchlite3 input[type='search']").focus();
        $("#ajaxsearchlite4 input[type='search']").focus();
    });


    $(".mob-search").click(function(e) {
        e.preventDefault();
        $(".drift_searchForm").slideDown();
        $("#ajaxsearchlite3 input[type='search']").focus();
        return false;
    });

    $(".seach-mobile-view i").click(function(e) {
        e.preventDefault();
        $(".drift_searchForm").slideDown();
        $("#ajaxsearchlite3 input[type='search']").focus();
        $("#ajaxsearchlite4 input[type='search']").focus();
        return false;
    });

    $(document).on("click", function(event) {
        var $trigger = $(".drift_searchForm, .drift_search_link, .drift_search_link a");
        if ($trigger !== event.target && !$trigger.has(event.target).length) {
            $(".drift_searchForm").slideUp();
        }
    });

    /** Mobile Menu **/
    $(".seach-mobile-view a").click(function(e) {
        e.preventDefault();
        $(".drift_searchForm").slideToggle();
        $("#search-form-1").focus();
        $("#ajaxsearchlite4 input[type='search']").focus();
        return false;
    });

    $(".openMobMenuIcon").on("click", function() {
        $("#myMobileNav").addClass("mob_menu_open");

        $("#myMobileNav > .closebtn").on("click", function() {
            $("#myMobileNav").removeClass("mob_menu_open");
        });

    });

    $('button.navbar-toggle').click(function() {
        $('.only_mobile_show').toggle();
    });

    /** Share */
    $(".share_text em a").each(function() {
        var article_anchor = $(this).children().html();
        var start_issue = article_anchor.includes('ISSUE');
        if (start_issue == true) {
            var i;
            for (i = 1; i < 11; i++) {
                var checkIssueNumber = article_anchor.includes('ISSUE ' + i);
                if (checkIssueNumber == true) {
                    $(this).children().html("ISSUE " + i);
                    $(this).attr("href", "https://www.thedriftmag.com/issues/#Issue " + i);
                }
            }
        } else {
            //	alert("Not found Issue");
        }
    });

    /* On scroll header sticky starts code */
    $(window).scroll(function() {
        if ($(window).scrollTop() >= 1) {
            $('.main_container_custom').addClass('padding_top');
            $('.menu_box_two').addClass('fixed');
            $('#tf-hide-mob').addClass('fixed');
        } else {
            $('.main_container_custom').removeClass('padding_top');
            $('.menu_box_two').removeClass('fixed');
            $('#tf-hide-mob').removeClass('fixed');
        }
    });
    /* On scroll header sticky starts code */


    // var sectionID = $(".sectionID").attr("data-value");
    // setTimeout(function() {
    //     if (sectionID != "") {
    //         $('html, body').animate({
    //             scrollTop: $("#" + sectionID).offset().top
    //         }, 500);
    //     }
    // }, 1000);

    const mobMenuIconEl = document.querySelector(".openMobMenuIcon");
    const mobMenuTarget = document.querySelector("#myMobileNav");

    mobMenuIconEl.addEventListener('click', () => {
        mobMenuTarget.classList.toggle('main-nav-open');
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            $('.td-site-mobile-header').addClass("sticky");
        } else {
            $('.td-site-mobile-header').removeClass("sticky");
        }
    });

    /** MailChimp **/
    $("#mce-EMAIL").on("keyup", function() {
        $(this).addClass("active_email");
    });

    $("#mce-EMAIL").on("focus", function() {
        $("div.mce_inline_error").css("opacity", "0");
        $("div#mce-error-response").css("opacity", "0");
        $("div#mce-success-response").css("opacity", "0");
        $(this).addClass("unfocus_email");
    });

    $("#mce-EMAIL").on("focusout", function() {
        $(this).removeClass("unfocus_email");
        $("div.mce_inline_error").css("opacity", "1");
        $("div#mce-error-response").css("opacity", "1");
        $("div#mce-success-response").css("opacity", "1");
    });

    $("#mce-EMAIL").on("change", function() {
        $(this).removeClass("active_email");
    });

    $(".single .mission_inner a").each(function() {
        var anchorTitle = $(this).attr("title");
        var anchorLink = $(this).attr("href");
        var anchorTarget = "_blank";

        if (anchorTitle != "" && anchorTitle != undefined) {
            $(this).before("<blockquote class='link_quote'><p><a href='" + anchorLink + "'target=" + anchorTarget + ">" + anchorTitle + "</a></p></blockquote>");
        }

        setTimeout(
            function() {
                fixQuoteSpacing();
            }, 1000);
    });


    $(".big-image").parent("figure").addClass("bigfigure");

})( jQuery );