
CRM.$(function($) {
    $(document).ready(function(){

        //Mettre les input de type tél avec le drapeau par defaut
        let inputs = $(".crm_phone.twelve");
        inputs.each(function(el, newInputTel) {
            let iti = window.intlTelInput(newInputTel, {
                initialCountry: "fr",
            });
        })

        $('body').on('change','.crm_phone.twelve', function() {
            // jQuery(jQuery('#Phone_Block_1 .iti__selected-flag')[4]).attr('title').split(': ')[1] + ' ';
            let currPhone = $(this).val();
            let phoneNumberFollowedByindic = currPhone.replace(/\+\d+\s/g, '+33 ');
            $(this).val(phoneNumberFollowedByindic)
            console.log(' change up ', phoneNumberFollowedByindic)
             phoneMouseLeaveEvent ('+33 ')
        });
        
        //Ajouter d'autres numéros
        $('#addPhone').on('click', function() {
            let inputs = $(".crm_phone.twelve");
            inputs.each(function(el, newInputTel) {
                let iti = window.intlTelInput(newInputTel, {
                    initialCountry: "fr",
                });
            })
        })


        $(window).on('load',function(){
            // if (!window.location.search.includes('action=update')) {//si c'est la page de creation
            let value = $('.page-civicrm-contact-add .crm_phone.twelve').val();
            var indicatif = '+33 ';
            let fieldPhone = $('.page-civicrm-contact-add .crm_phone.twelve');
            console.log('mis', value)
            if (!value) {
                indicatif = fieldPhone.on('change', function (id, el) {
                    jQuery(jQuery(this).parents('#Phone_Block_1').find('.iti__selected-flag')[4]).attr('title').split(': ')[1] + ' ';
                    let currPhone = $(this).val();
                    let phoneNumberFollowedByindic = currPhone.replace(/\+\d+\s/g, indicatif);
                    console.log(' onload ', phoneNumberFollowedByindic)
                    $(this).val(phoneNumberFollowedByindic)
                });

                phoneMouseLeaveEvent (indicatif)
                
            }else {

                phoneMouseLeaveEvent(indicatif)
               $('.page-civicrm-contact-add .crm_phone.twelve').css('text-indent', '-23px');// Generique pour l'instant à modifier suivant l'indicatifi après
            } 

            //Met la valeur par defaut dans la page update
            jQuery('.crm_phone.twelve').each(function(el,id) {
                let defaultVal = jQuery(id).attr('value');

                const regex = /\+[0-9]+ /;
                const matched = defaultVal.match(regex);
                let indicatif = matched[0];
                console.log(defaultVal,  ' dd');
                defaultVal = defaultVal.replace(indicatif, 0);
                defaultVal = defaultVal.replace('00', 0);
                defaultVal = indicatif + defaultVal;
                let val = jQuery(id).val(defaultVal);
            })
        })
    })

    // jQuery('#contact-summary .crm-content.crm-contact_phone').text(jQuery('#contact-summary .crm-content.crm-contact_phone').text().replace(/\+\d+\s/g, ''));

});

function replaceIndicatif (indicatif) {
    let fieldPhone = jQuery('.page-civicrm-contact-add .crm_phone.twelve')
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
    phoneNumber = phoneNumber.trimEnd();

    // Reverse the phone number back to its original order
    phoneNumber = phoneNumber.split("").reverse().join("");

    return phoneNumber;
}

function phoneMouseLeaveEvent (indic) {
    let fieldPhone = jQuery('.page-civicrm-contact-add .crm_phone.twelve');
    // let isUpdate = window.location.search.includes('action=update');
    fieldPhone.on('focusout', function (id, el) {
        let phoneNumber = jQuery(this).val();
        // let flag = jQuery(jQuery('#Phone_Block_1 .iti__selected-flag')[4]).attr('title').includes('+33');
        if (phoneNumber) {
                if (phoneNumber.startsWith('+33')) {
                    phoneNumber = phoneNumber.replace('+33', '');
                }
                if (phoneNumber.startsWith('33')) {
                    phoneNumber = phoneNumber.replace('33', '');
                }
                jQuery(this).attr('data-indicatif', indic);
                
                // Reverse the phone number
                phoneNumber = formatTwoByTwo(phoneNumber);
                
                // Remove leading "0" if present
                if (phoneNumber.startsWith("0")) {
                   // phoneNumber = phoneNumber.substr(1);
                }
                
                if (phoneNumber.startsWith("3 3")) {
                    phoneNumber = phoneNumber.replace("3 3", "+33 ")
                } else {
                    if ( !phoneNumber.match(/\+\d+\s/)) {7
                        let fieldTelNumber = jQuery(this).attr('data-intl-tel-input-id');
                        phoneNumber = jQuery(jQuery(this).parents('body').find('.iti__selected-flag')[fieldTelNumber]).attr('title').split(': ')[1] + ' ' + phoneNumber;
                        jQuery(this).css('text-indent', '-23px');
                    }
                }
                jQuery(this).val(phoneNumber);
        }
    })
}
  