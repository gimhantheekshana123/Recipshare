/**
 * Add a negative letter spacing to Profile Builder email customizer menus.
 */

jQuery( document ).ready(function(){
    jQuery('li a[href$="admin-email-customizer"]').css("letter-spacing", "-0.7px");
    jQuery('li a[href$="user-email-customizer"]').css("letter-spacing", "-0.7px");
});

/*
 * Set the width of the shortcode input based on an element that
 * has the width of its contents
 */
function setShortcodeInputWidth( $inputField ) {
    var tempSpan = document.createElement('span');
    tempSpan.className = "wppb-shortcode-temp";
    tempSpan.innerHTML = $inputField.val();
    document.body.appendChild(tempSpan);

    var tempWidth = jQuery(tempSpan).outerWidth();

    document.body.removeChild(tempSpan);

    $inputField.outerWidth( tempWidth + 18 );
}

jQuery( document ).ready( function() {

    jQuery('.wppb-shortcode.input').each( function() {
        setShortcodeInputWidth( jQuery(this) );
    });

    jQuery('.wppb-shortcode.textarea').each( function() {
        jQuery(this).outerHeight( jQuery(this)[0].scrollHeight + parseInt( jQuery(this).css('border-top-width') ) * 2 );
    });

    jQuery('.wppb-shortcode').on('click', function() {
        this.select();
    });
});


/* make sure that we don;t leave the page without having a title in the Post Title field, otherwise we loose data */
jQuery( function(){
    if( jQuery( 'body').hasClass('post-new-php') ){

        if( jQuery( 'body').hasClass('post-type-wppb-rf-cpt') || jQuery( 'body').hasClass('post-type-wppb-epf-cpt') || jQuery( 'body').hasClass('post-type-wppb-ul-cpt') ){

            if( jQuery('#title').val() == '' ){
                jQuery(window).on('beforeunload',function() {
                    return "This page is asking you to confirm that you want to leave - data you have entered may not be saved";
                });
            }

            /* remove beforeunload event when entering a title or pressing the puclish button */
            jQuery( '#title').on( 'keypress', function() {
                jQuery(window).off('beforeunload');
            });
            jQuery( '#publish').on('click', function() {
                jQuery(window).off('beforeunload');
            });
        }
    }
});


/* show hide fields based on selected options */
jQuery( function(){
    jQuery( '#wppb-rf-settings-args').on('change', '#redirect', function(){
        if( jQuery(this).val() == 'Yes' ){
            jQuery( '.row-url, .row-display-messages', jQuery(this).parent().parent().parent()).css('display', 'flex');
        }
        else{
            jQuery( '.row-url, .row-display-messages', jQuery(this).parent().parent().parent()).hide();
        }
    });

    jQuery( '#wppb-epf-settings-args').on('change', '#redirect', function(){
        if( jQuery(this).val() == 'Yes' ){
            jQuery( '.row-url, .row-display-messages', jQuery(this).parent().parent().parent()).css('display', 'flex');
        }
        else{
            jQuery( '.row-url, .row-display-messages', jQuery(this).parent().parent().parent()).hide();
        }
    });


    jQuery( '#wppb-ul-settings-args').on('click', '#visible-only-to-logged-in-users_yes', function(){

        if (jQuery(this).is(':checked')) {
            jQuery( '.row-visible-to-following-roles').css('display', 'flex');
        }
        else jQuery( '.row-visible-to-following-roles').css('display', 'none');
    });

    jQuery( '#wppb-ul-faceted-args').on('change', '#facet-type', function(){
        if( jQuery(this).val() == 'checkboxes' ){
            jQuery( '.row-facet-behaviour, .row-facet-limit', jQuery(this).parent().parent().parent()).show();
        }else if( jQuery(this).val() == 'select_multiple' ){
            jQuery( '.row-facet-behaviour, .row-facet-limit', jQuery(this).parent().parent().parent()).hide();
            jQuery( '.row-facet-behaviour #facet-behaviour', jQuery(this).parent().parent().parent()).val('expand');
        }
        else{
            jQuery( '.row-facet-behaviour, .row-facet-limit', jQuery(this).parent().parent().parent()).hide();
            jQuery( '.row-facet-behaviour #facet-behaviour', jQuery(this).parent().parent().parent()).val('narrow');
        }
        if( jQuery(this).val() == 'search' ){
            jQuery( '#wppb-ul-faceted-args .row-facet-meta #facet-meta option[value="billing_country"] ').hide();
            jQuery( '#wppb-ul-faceted-args .row-facet-meta #facet-meta option[value="shipping_country"] ').hide();
            jQuery( '#wppb-ul-faceted-args .row-facet-meta #facet-meta option[value="billing_state"] ').hide();
            jQuery( '#wppb-ul-faceted-args .row-facet-meta #facet-meta option[value="shipping_state"] ').hide();
        }
        else {
            jQuery( '#wppb-ul-faceted-args .row-facet-meta #facet-meta option[value="billing_country"] ').show();
            jQuery( '#wppb-ul-faceted-args .row-facet-meta #facet-meta option[value="shipping_country"] ').show();
            jQuery( '#wppb-ul-faceted-args .row-facet-meta #facet-meta option[value="billing_state"] ').show();
            jQuery( '#wppb-ul-faceted-args .row-facet-meta #facet-meta option[value="shipping_state"] ').show()
        }

    });

});

/*
 * Dialog boxes throughout Profile Builder
 */
jQuery( function() {
    if ( jQuery.fn.dialog ) {
        jQuery('.wppb-modal-box').dialog({
            autoOpen: false,
            modal: true,
            draggable: false,
            minWidth: 450,
            minHeight: 450
        });

        jQuery('.wppb-open-modal-box').on('click', function (e) {
            e.preventDefault();
            jQuery('#' + jQuery(this).attr('href')).dialog('open');
        });
    }
});

/*
 * Private Website Settings page
 */

jQuery( function() {
    if( jQuery( '.wppb-private-website' ).length != 0 ) {

        wppbSelect2.call( jQuery('#private-website-redirect-to-login') );
        wppbSelect2.call( jQuery('#private-website-allowed-pages') );

        wppbDisablePrivatePageOptions(jQuery('#private-website-enable').val());

        jQuery('#private-website-enable').on('change', function () {
            wppbDisablePrivatePageOptions(jQuery(this).val());
        });


        function wppbDisablePrivatePageOptions(value) {
            if (value == 'no') {
                jQuery('#private-website-redirect-to-login').closest('tr').addClass("wppb-disabled");
                jQuery('#private-website-allowed-pages').closest('tr').addClass("wppb-disabled");
                jQuery('#private-website-menu-hide').addClass("wppb-disabled");
                jQuery('#private-website-disable-rest-api').addClass("wppb-disabled");
                jQuery('#private-website-allowed-paths').addClass("wppb-disabled");
            }
            else if (value == 'yes') {
                jQuery('#private-website-redirect-to-login').closest('tr').removeClass("wppb-disabled");
                jQuery('#private-website-allowed-pages').closest('tr').removeClass("wppb-disabled");
                jQuery('#private-website-menu-hide').removeClass("wppb-disabled");
                jQuery('#private-website-disable-rest-api').removeClass("wppb-disabled");
                jQuery('#private-website-allowed-paths').removeClass("wppb-disabled");
            }
        }
    }
});

/*
 * Login Widget trigger html validation
 */
jQuery( function() {
    if( jQuery( ".widgets-php" ).length != 0 ){//should be in the admin widgets page
        jQuery("#wpbody").on("click", ".widget-control-save", function () {
            if (jQuery('.wppb-widget-url-field', jQuery(this).closest('form')).length != 0) {//we are in the PB widget
                jQuery('.wppb-widget-url-field', jQuery(this).closest('form')).each(function () {
                    jQuery(this)[0].reportValidity();//reportValidity is the function that triggers the default html validation
                });
            }
        });
    }
});


/*
 * Advanced Settings page (Toolbox)
 */

jQuery( function() {
    if( jQuery('body.profile-builder_page_profile-builder-toolbox-settings').length != 0 ) {

        wppbSelect2.call( jQuery('#toolbox-bypass-ec') );

        wppbSelect2.call( jQuery('#toolbox-restricted-emails'), {
            tags: true,
        });

        jQuery('.wppb-toolbox-switch').on('click', function () {
            if (jQuery(this).prop('checked'))
                jQuery('.wppb-toolbox-accordion').css('display','flex');
            else
                jQuery('.wppb-toolbox-accordion').hide();
        });

        jQuery('#toolbox-send-credentials-hide').on('click', function () {
            if (jQuery(this).prop('checked'))
                jQuery('#wppb-toolbox-send-credentials-text').hide();
            else
                jQuery('#wppb-toolbox-send-credentials-text').css('display','flex');
        });

        jQuery('#toolbox-redirect-if-empty-required').on('click', function () {
            if (jQuery(this).prop('checked'))
                jQuery('#wppb-toolbox-redirect-if-empty-required-url').css('display','flex');
            else
                jQuery('#wppb-toolbox-redirect-if-empty-required-url').hide();
        });


        if (jQuery('.wppb-toolbox-switch').prop('checked'))
            jQuery('.wppb-toolbox-accordion').css('display','flex');

        if (jQuery('#toolbox-send-credentials-hide').prop('checked'))
            jQuery('#wppb-toolbox-send-credentials-text').hide();

        if (jQuery('#toolbox-redirect-if-empty-required').prop('checked'))
            jQuery('#wppb-toolbox-redirect-if-empty-required-url').css('display','flex');
    }
});

// Fix for Select2 search not focusing
jQuery(document).on('select2:open', function() {
    let allSelect2Found = document.querySelectorAll('.select2-container--open .select2-search__field');
    allSelect2Found[allSelect2Found.length - 1].focus();
});

/**
 * Add Link to PB Docs next to page/setting titles
 * */
jQuery(document).ready( function () {
    // email customizer
    jQuery('.wp-admin.profile-builder_page_user-email-customizer .wrap h2.cozmoslabs-page-title').append('<a href="https://www.cozmoslabs.com/docs/profile-builder/modules/user-email-customizer/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help" style="margin-left: 5px"></a>');
    jQuery('.wp-admin.profile-builder_page_admin-email-customizer .wrap h2.cozmoslabs-page-title').append('<a href="https://www.cozmoslabs.com/docs/profile-builder/modules/admin-email-customizer/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help" style="margin-left: 5px"></a>');

    // roles editor
    jQuery('.wp-admin.post-type-wppb-roles-editor .wrap h1.wp-heading-inline').append('<a href="https://www.cozmoslabs.com/docs/profile-builder/general-settings/roles-editor/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help" style="margin-left: 5px"></a>');

    // manage form fields
    jQuery('.wp-admin.profile-builder_page_manage-fields .wrap > h2').append('<a href="https://www.cozmoslabs.com/docs/profile-builder/manage-user-fields/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help" style="margin-left: 5px"></a>');
    jQuery('html').on('wpbFormMetaLoaded', function() {
        // conditional logic
        jQuery('.wp-admin.profile-builder_page_manage-fields .update_container_wppb_manage_fields ul.mb-list-entry-fields li.row-conditional-logic-enabled .mb-right-column label').append('<a href="https://www.cozmoslabs.com/docs/profile-builder/manage-user-fields/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs#Conditional_Logic" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help" style="margin-left: 10px"></a>');
        // visibility
        jQuery('.wp-admin.profile-builder_page_manage-fields .update_container_wppb_manage_fields ul.mb-list-entry-fields li.row-visibility .mb-right-column').append('<a href="https://www.cozmoslabs.com/docs/profile-builder/add-ons/field-visibility/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs#Visibility" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help" style="margin-left: 10px"></a>');
        // user role visibility
        jQuery('.wp-admin.profile-builder_page_manage-fields .update_container_wppb_manage_fields ul.mb-list-entry-fields li.row-user-role-visibility .mb-right-column .wck-checkboxes').append('<a href="https://www.cozmoslabs.com/docs/profile-builder/add-ons/field-visibility/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs#User_Role_Visibility" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help"></a>');
        // location visibility
        jQuery('.wp-admin.profile-builder_page_manage-fields .update_container_wppb_manage_fields ul.mb-list-entry-fields li.row-location-visibility .mb-right-column .wck-checkboxes').append('<a href="https://www.cozmoslabs.com/docs/profile-builder/add-ons/field-visibility/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs#Location_Visibility" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help"></a>');
        // admin approval
        jQuery('.wp-admin.profile-builder_page_manage-fields .update_container_wppb_manage_fields ul.mb-list-entry-fields li.row-edit-profile-approved-by-admin .mb-right-column .wck-checkboxes label').append('<a href="https://www.cozmoslabs.com/docs/profile-builder/add-ons/edit-profile-approved-by-admin/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help" style="margin-left: 10px"></a>');
    });

    // register forms
    jQuery('.wp-admin.post-type-wppb-rf-cpt .wrap h1.wp-heading-inline').append('<a href="https://www.cozmoslabs.com/docs/profile-builder/modules/multiple-registration-forms/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help" style="margin-left: 5px"></a>');

    // edit profile forms
    jQuery('.wp-admin.post-type-wppb-epf-cpt .wrap h1.wp-heading-inline').append('<a href="https://www.cozmoslabs.com/docs/profile-builder/modules/multiple-edit-profile-forms/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help" style="margin-left: 5px"></a>');

    // user-listing
    jQuery('.wp-admin.post-type-wppb-ul-cpt .wrap h1.wp-heading-inline').append('<a href="https://www.cozmoslabs.com/docs/profile-builder/modules/user-listing/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help" style="margin-left: 5px"></a>');
    // ul settings
    jQuery('.wp-admin.post-type-wppb-ul-cpt #wppb_ul_page_settings').prepend('<a href="https://www.cozmoslabs.com/docs/profile-builder/modules/user-listing/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs#User_Listing_Settings" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help"></a>');
    // ul faceted menus
    jQuery('.wp-admin.post-type-wppb-ul-cpt #wppb_ul_faceted_settings').prepend('<a href="https://www.cozmoslabs.com/docs/profile-builder/modules/user-listing/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs#Faceted_Menus" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help"></a>');
    // ul search settings
    jQuery('.wp-admin.post-type-wppb-ul-cpt #wppb_ul_search_settings').prepend('<a href="https://www.cozmoslabs.com/docs/profile-builder/modules/user-listing/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs#Search_Settings" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help"></a>');
    // ul themes
    jQuery('.wp-admin.post-type-wppb-ul-cpt #wppb-ul-themes-settings .inside').prepend('<a href="https://www.cozmoslabs.com/docs/profile-builder/modules/user-listing/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs#Themes" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help"></a>');
    // ul all users template
    jQuery('.wp-admin.post-type-wppb-ul-cpt #wppb-ul-templates .inside').prepend('<a href="https://www.cozmoslabs.com/docs/profile-builder/modules/user-listing/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs#The_All-Userlisting_Template" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help"></a>');
    // ul single user template
    jQuery('.wp-admin.post-type-wppb-ul-cpt #wppb-single-ul-templates .inside').prepend('<a href="https://www.cozmoslabs.com/docs/profile-builder/modules/user-listing/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs#The_Single-Userlisting_Template" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help"></a>');

    // custom redirects
    jQuery('.wp-admin.profile-builder_page_custom-redirects .wrap h2.cozmoslabs-page-title').append('<a href="https://www.cozmoslabs.com/docs/profile-builder/modules/custom-redirects/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help" style="margin-left: 5px"></a>');
    // cr individual user
    jQuery('.wp-admin.profile-builder_page_custom-redirects #wppb_custom_redirects_user .inside').prepend('<a href="https://www.cozmoslabs.com/docs/profile-builder/modules/custom-redirects/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs#Individual_User_Redirects" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help"></a>');
    // cr user role based
    jQuery('.wp-admin.profile-builder_page_custom-redirects #wppb_custom_redirects_role .inside').prepend('<a href="https://www.cozmoslabs.com/docs/profile-builder/modules/custom-redirects/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs#User_Role_based_Redirects" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help"></a>');
    // cr global
    jQuery('.wp-admin.profile-builder_page_custom-redirects #wppb_custom_redirects_global .inside').prepend('<a href="https://www.cozmoslabs.com/docs/profile-builder/modules/custom-redirects/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs#Global_Redirects" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help"></a>');
    // cr default wp pages
    jQuery('.wp-admin.profile-builder_page_custom-redirects #wppb_custom_redirects_default_wp_pages .inside').prepend('<a href="https://www.cozmoslabs.com/docs/profile-builder/modules/custom-redirects/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs#Redirect_Default_WordPress_Forms_and_Pages" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help"></a>');

    // social connect
    jQuery('.wp-admin.profile-builder_page_wppb-social-connect .wrap h2.cozmoslabs-page-title').append('<a href="https://www.cozmoslabs.com/docs/profile-builder/add-ons/social-connect/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help" style="margin-left: 5px"></a>');

    // multi-step forms
    jQuery('.wp-admin.profile-builder_page_manage-fields #wppb-msf-side .inside').prepend('<a href="https://www.cozmoslabs.com/docs/profile-builder/add-ons/multi-step-forms/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help"></a>');

    // labels edit
    jQuery('.wp-admin.profile-builder_page_pb-labels-edit .wrap h2.cozmoslabs-page-title').append('<a href="https://www.cozmoslabs.com/docs/profile-builder/add-ons/labels-edit/?utm_source=wpbackend&utm_medium=pb-documentation&utm_campaign=PBDocs" target="_blank" data-code="f223" class="wppb-docs-link dashicons dashicons-editor-help" style="margin-left: 5px"></a>');
});


/**
 * Initialize Select2
 *
 * */
jQuery(document).ready(function() {
    if (typeof jQuery.fn.select2 === 'function') {
        if (jQuery('.wppb-select2').is('#toolbox-restricted-words-data')) {
            jQuery('.wppb-select2').select2({
                tags: true,
            });
        }
        else jQuery('.wppb-select2').select2();
    }
});


/**
 * Form Designs Feature --> Admin UI
 *
 *  - Activate new Design
 *  - Preview Modal
 *  - Modal Image Slider controls
 *
 * */

jQuery( document ).ready(function(){

    jQuery('.wppb-forms-design-preview').click(function (e) {
        let themeID = e.target.id.replace('-info', '');
        displayDesignPreviewModal(themeID);
    });

    jQuery('.wppb-slideshow-button').click(function (e) {
        let themeID = jQuery(e.target).data('theme-id'),
            direction = jQuery(e.target).data('slideshow-direction'),
            currentSlide = jQuery('#modal-' + themeID + ' .wppb-forms-design-preview-image.active'),
            changeSlideshowImage = window[direction+'SlideshowImage'];

        changeSlideshowImage(currentSlide,themeID);
    });

});

function displayDesignPreviewModal( themeID ) {
    jQuery('#modal-' + themeID).dialog({
        resizable: false,
        height: 'auto',
        width: 1200,
        modal: true,
        closeOnEscape: true,
        open: function () {
            jQuery('.ui-widget-overlay').bind('click',function () {
                jQuery('#modal-' + themeID).dialog('close');
            })
        },
        close: function () {
            let allImages = jQuery('.wppb-forms-design-preview-image');

            allImages.each( function() {
                if ( jQuery(this).is(':first-child') && !jQuery(this).hasClass('active') ) {
                    jQuery(this).addClass('active');
                }
                else if ( !jQuery(this).is(':first-child') ) {
                    jQuery(this).removeClass('active');
                }
            });

            jQuery('.wppb-forms-design-sildeshow-previous').addClass('disabled');
            jQuery('.wppb-forms-design-sildeshow-next').removeClass('disabled');
        }
    });
    return false;
}

function nextSlideshowImage( currentSlide, themeID ){
    if ( currentSlide.next().length > 0 ) {
        currentSlide.removeClass('active');
        currentSlide.next().addClass('active');

        jQuery('#modal-' + themeID + ' .wppb-forms-design-sildeshow-previous').removeClass('disabled');

        if ( currentSlide.next().next().length <= 0 )
            jQuery('#modal-' + themeID + ' .wppb-forms-design-sildeshow-next').addClass('disabled');

    }
}

function previousSlideshowImage( currentSlide, themeID ){
    if ( currentSlide.prev().length > 0 ) {
        currentSlide.removeClass('active');
        currentSlide.prev().addClass('active');

        jQuery('#modal-' + themeID + ' .wppb-forms-design-sildeshow-next').removeClass('disabled');

        if ( currentSlide.prev().prev().length <= 0 )
            jQuery('#modal-' + themeID + ' .wppb-forms-design-sildeshow-previous').addClass('disabled');

    }
}


/**
 * Hide/Show Roles Selector
 *
 * */
jQuery(document).ready(function() {
    let input = jQuery('input#wppb-auth-enable'),
        rolesSelector = jQuery('#wppb-auth-roles-selector');

    input.click(function (e) {
        rolesSelector.toggle();
    });

});


/**
 * Reposition the Update/Publish button/section on scroll in Admin Dashboard --> PB CPTs
 */
jQuery( function() {
    // delay the repositioning to allow the admin notices to be displayed
    if(jQuery('body').is('[class*="post-type-wppb"]') && jQuery('#side-sortables #submitdiv').length > 0 )
        setTimeout(function() {
            wppbRepositionUpdateButton();
        }, 1000);
});

function wppbRepositionUpdateButton() {
    let elementOffset = jQuery('#side-sortables').offset().top,
        mobileScreen  = window.matchMedia("(max-width: 1401px)"),
        breakPoint = 0,
        formWidth = '';

    if (mobileScreen.matches)
        breakPoint = elementOffset + 115; // 115px buttons container height
    else breakPoint = elementOffset - 32; // 32px admin bar height

    jQuery(window).on('scroll', function() {
        if ( jQuery(window).scrollTop() >= (breakPoint) ) {
            jQuery('#side-sortables').addClass('cozmoslabs-publish-metabox-fixed');

            if (mobileScreen.matches) {
                formWidth = jQuery('#poststuff').outerWidth();
                jQuery('.cozmoslabs-publish-metabox-fixed #publishing-action').css({
                    'width': formWidth + 'px',
                });
            }
        }
        else {
            jQuery('.cozmoslabs-publish-metabox-fixed #publishing-action').css({
                'width': 'unset',
            });

            jQuery('#side-sortables').removeClass('cozmoslabs-publish-metabox-fixed');
        }
    });

    jQuery(window).on('resize', function() {
        if (mobileScreen.matches) {
            formWidth = jQuery('#poststuff').outerWidth();

            jQuery('.cozmoslabs-publish-metabox-fixed #publishing-action').css({
                'width': formWidth + 'px',
            });
        }
        else {
            jQuery('.cozmoslabs-publish-metabox-fixed #publishing-action').css({
                'width': 'unset',
            });
        }
    });
}


/**
 * Reposition the Publish Box/Button in Admin Dashboard --> Custom Pages
 *
 * */

jQuery( document ).ready(setTimeout(function () {
    let smallMediumScreen  = window.matchMedia("(max-width: 1401px)"),
        largeScreen  = window.matchMedia("(min-width: 1402px)"),
        pageBody = jQuery('body');

    if (pageBody.is('[class*="profile-builder_page"], [class*="admin_page_profile-builder"]')) {
        if (largeScreen.matches)
            wppbRepositionPagePublishBox();
        else wppbRepositionPagePublishButton();

        jQuery(window).on('scroll resize', function() {
            if (largeScreen.matches)
                wppbRepositionPagePublishBox();
            else wppbRepositionPagePublishButton();
        });
    }

}, 1000));


/**
 *  Reposition Publish Box (large screens)
 *
 * */
function wppbRepositionPagePublishBox() {
    let topBox = jQuery('.cozmoslabs-wrap .cozmoslabs-nav-tab-wrapper'),
        buttonWrapper = jQuery('.cozmoslabs-wrap div.submit, #side-sortables #page-save-metabox');

    if ( topBox.length > 0 && buttonWrapper.length > 0 ) {

        let cozmoslabsWrapper = jQuery('.cozmoslabs-wrap');

        cozmoslabsWrapper.removeClass('cozmoslabs-publish-button-fixed');
        cozmoslabsWrapper.addClass('cozmoslabs-publish-box-fixed');

        let bannerHeight = jQuery('.cozmoslabs-banner').outerHeight(),
            topBoxOffsetTop = topBox.offset().top;

        let cozmoslabsWrapperWidth = cozmoslabsWrapper.outerWidth();

        if (cozmoslabsWrapperWidth < 1200)
            cozmoslabsWrapper.css({
                'margin': '30px 10px',
            });

        // set initial position
        wppbSetPagePublishBoxPosition();

        // position the Publish Box
        function wppbSetPagePublishBoxPosition() {
            let distanceToTop = wppbCalculateDistanceToTop(topBox);

            if (distanceToTop < 50) {
                let buttonOffsetLeft = buttonWrapper.offset().left;

                buttonWrapper.css({
                    'position': 'fixed',
                    'top': '50px',
                    'left': buttonOffsetLeft,
                    'box-shadow': '0 3px 10px 0 #aaa',
                });
            } else {
                buttonWrapper.css({
                    'position': 'absolute',
                    'left': 'auto',
                    'box-shadow': 'none',
                });

                if ( buttonWrapper.hasClass('submit') ) {
                    buttonWrapper.css({
                        'top': topBoxOffsetTop - bannerHeight - 62 + 'px', // 32px is the admin bar height + 30px cozmoslabs-wrap margin top
                    });
                } else {
                    buttonWrapper.css({
                        'top': 0,
                    });
                }

            }
        }
    }

}



/**
 *  Reposition Publish Button (small/medium screens)
 *
 * */
function wppbRepositionPagePublishButton() {
    let buttonWrapper = jQuery('.cozmoslabs-wrap div.submit, #side-sortables #page-save-metabox'),
        button = jQuery('.cozmoslabs-wrap div.submit input[type="submit"], .cozmoslabs-wrap #page-save-metabox input[type="submit"]'),
        cozmoslabsWrapper = jQuery('.cozmoslabs-wrap');

    if ( buttonWrapper.length > 0 ) {
        cozmoslabsWrapper.removeClass('cozmoslabs-publish-box-fixed');

        // set initial position
        wppbSetPagePublishButtonPosition();
    }

    // position the Publish Button
    function wppbSetPagePublishButtonPosition() {
        buttonWrapper.css({
            'position': 'unset',
        });

        if (wppbElementInViewport(buttonWrapper)) {
            cozmoslabsWrapper.removeClass('cozmoslabs-publish-button-fixed');

            button.css({
                'max-width': 'unset',
                'margin-left': 'unset',
            });
        } else  {
            cozmoslabsWrapper.addClass('cozmoslabs-publish-button-fixed');

            button.css({
                'max-width': buttonWrapper.outerWidth() + 'px',
                'margin-left': '-10px',
            });
        }
    }
}


/**
 *  Calculate the distance to Top for a specific element
 *
 * */
function wppbCalculateDistanceToTop(element) {
    let scrollTop = jQuery(window).scrollTop(),
        elementOffset = element.offset().top;

    return elementOffset - scrollTop;
}


/**
 *  Check if a specific element is visible on screen
 *
 * */
function wppbElementInViewport(element) {
    let elementTop = element.offset().top,
        elementBottom = elementTop + element.outerHeight(),
        viewportTop = jQuery(window).scrollTop(),
        viewportBottom = viewportTop + jQuery(window).height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
}



/**
 *  Display initially hidden admin notices, after the scripts have loaded
 *
 * */
jQuery( document ).ready(function(){

    let noticeTypes = [
        ".error",
        ".notice"
    ];

    noticeTypes.forEach(function(notice){
        let selector = "body[class*='builder_page_'] " + notice + ", " + "body[class*='post-type-wppb-'] " + notice;

        jQuery(selector).each(function () {
            jQuery(this).css('display', 'block');
        });
    });

});


/**
 *  Function that copies the shortcode from an input
 *
 * */
jQuery(document).ready(function() {
    jQuery('.wppb-shortcode_copy').click(function (e) {

        e.preventDefault();

        navigator.clipboard.writeText(jQuery(this).val());

        // Show copy message
        var copyMessage = jQuery(this).next('.wppb-copy-message');
        copyMessage.fadeIn(400).delay(2000).fadeOut(400);

    })
});


/**
 *  Function that copies the shortcode from a text
 *
 * */
jQuery(document).ready(function() {
    jQuery('.wppb-shortcode_copy-text').click(function (e) {

        e.preventDefault();

        navigator.clipboard.writeText(jQuery(this).text());

        // Show copy message
        var copyMessage = jQuery(this).next('.wppb-copy-message');
        copyMessage.fadeIn(400).delay(2000).fadeOut(400);

    })
});