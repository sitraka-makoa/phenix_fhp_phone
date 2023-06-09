
CRM.$(function($) {
    $(document).ready(function(){

        $(window).on('load',function(){
            // if (!window.location.search.includes('action=update')) {//si c'est la page de creation
            let value = $('.page-civicrm-contact-add [name="phone[1][phone]"]').val();
            var indicatif = '+33 ';
            let fieldPhone = $('.page-civicrm-contact-add [name="phone[1][phone]"]');
            if (!value) {
                indicatif = fieldPhone.on('change', function (id, el) {
                    jQuery(jQuery('#Phone_Block_1 .iti__selected-flag')[4]).attr('title').split(': ')[1] + ' ';
                    let currPhone = fieldPhone.val();
                    let phoneNumberFollowedByindic = currPhone.replace(/\+\d+\s/g, indicatif);
                    fieldPhone.val(phoneNumberFollowedByindic)
                });

                phoneMouseLeaveEvent (indicatif)
                
            }else {

                phoneMouseLeaveEvent(indicatif)
                console.log('else empty value...')
                let phoneVal = $('.page-civicrm-contact-add [name="phone[1][phone]"]').val();
                phoneVal = phoneVal.replace('+33 ', '0');
                $('.page-civicrm-contact-add [name="phone[1][phone]"]').val(phoneVal)
            } 
        })
    })

    jQuery('#contact-summary .crm-content.crm-contact_phone').text(jQuery('#contact-summary .crm-content.crm-contact_phone').text().replace(/\+\d+\s/g, ''));

});

function replaceIndicatif (indicatif) {
    let fieldPhone = jQuery('.page-civicrm-contact-add [name="phone[1][phone]"]')
    let currPhone = fieldPhone.val();
    let phoneNumberFollowedByindic = currPhone.replace(/\+\d+\s/g, indicatif);
    fieldPhone.val(phoneNumberFollowedByindic)
}

/**
 * Formater le numéro de tel français deux par deux
 */
function formatTwoByTwo (phoneNumber) {

    //remove the indicatif first 
    let matchedIndicatif = phoneNumber.match(/\+\d+\s/)
    if (matchedIndicatif) {
        let indicatif = matchedIndicatif[0];
        phoneNumber = phoneNumber.replace(indicatif, '')
    }

    phoneNumber = phoneNumber.split("").reverse().join("");

    // Add a blank space every two characters
    phoneNumber = phoneNumber.replace(/(\d{2})(?=\d)/g, "$1 ");

    // Reverse the phone number back to its original order
    phoneNumber = phoneNumber.split("").reverse().join("");

    return phoneNumber;
}

function phoneMouseLeaveEvent (indic) {
    let fieldPhone = jQuery('.page-civicrm-contact-add [name="phone[1][phone]"]');
    let isUpdate = window.location.search.includes('action=update');
    fieldPhone.on('focusout', function (id, el) {
        let phoneNumber = jQuery('.page-civicrm-contact-add [name="phone[1][phone]"]').val();
        let flag = jQuery(jQuery('#Phone_Block_1 .iti__selected-flag')[4]).attr('title').includes('+33');
        if (phoneNumber) {
                if (phoneNumber.startsWith('+33')) {
                    phoneNumber = phoneNumber.replace('+33', '');
                }
                if (phoneNumber.startsWith('33')) {
                    phoneNumber = phoneNumber.replace('33', '');
                }
                
                // Reverse the phone number
                phoneNumber = formatTwoByTwo(phoneNumber);
                
                // Remove leading "0" if present
                if (phoneNumber.startsWith("0") && !isUpdate) {
                    phoneNumber = phoneNumber.substr(1);
                }
                
                if (phoneNumber.startsWith("3 3")) {
                    phoneNumber = phoneNumber.replace("3 3", "+33 ")
                } else {
                    if ( !phoneNumber.match(/\+\d+\s/)) {
                        phoneNumber = jQuery(jQuery('#Phone_Block_1 .iti__selected-flag')[4]).attr('title').split(': ')[1] + ' ' + phoneNumber;
                    }
                }
                jQuery(this).val(phoneNumber);
        }
    })
}
  