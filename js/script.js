
CRM.$(function($) {
    $(document).ready(function(){

        //Mettre les input de type tél avec le drapeau par defaut
        let inputs = $(".crm_phone.twelve");
        console.log('woo')
        inputs.each(function(el, newInputTel) {
            console.log('another ', $(this).val())
            let value = $(this).val()
            let iti = window.intlTelInput(newInputTel, {
                initialCountry: "fr",
            }).setNumber(value);
        })



         $('body').on('change','.crm_phone.twelve', function() {
            // jQuery(jQuery('#Phone_Block_1 .iti__selected-flag')[4]).attr('title').split(': ')[1] + ' ';
            let currPhone = $(this).val();
            //let phoneNumberFollowedByindic = currPhone.replace(/\+\d+\s/g, '+33 ');
            //$(this).val(phoneNumberFollowedByindic)
            
            // let fieldTelNumber =  jQuery('.kkk').attr('data-intl-tel-input-id');
            // console.log(fieldTelNumber)
            // let indicatifNumber = jQuery(jQuery('.kkk').parents('body').find('.iti__selected-flag > .iti__flag')[fieldTelNumber]).attr('class').split(': ')[1];



           /*  let fieldTelNumber =  jQuery(this).attr('data-intl-tel-input-id');
            // let className = jQuery('.kkk').parents('body').find('.iti__selected-flag > .iti__flag')[5]
            // let className = 'mg';


             let className = jQuery(this).parents('body').find('.iti__selected-flag > .iti__flag')[1]
             
             
             let indicCountry = jQuery(className).attr('class').split('iti__flag ')[1].replace('iti__','');
             
             console.log(className,  ' chekk'); */
             
             //TODO RECUPERER DYNAMIQMEMENT LE INITIAL COUNTRY
            //  console.log(' bra ', jQuery(this).parents('body').find('.iti__selected-flag > .iti__flag').last().attr('class'))
            let className = '';
             if (jQuery(this).parents('body').find('.iti__selected-flag > .iti__flag')) {
                className = jQuery(this).parents('body').find('.iti__selected-flag > .iti__flag').last().attr('class').split('iti__')[2];
            }
            var itichange = window.intlTelInput(this, {
                 initialCountry: className,
            });

            //Recuperer l'indicatif du téléphone 
            let dialCodeCountry = itichange.getSelectedCountryData().dialCode;
            $('[name="custom_field_for_phone_indicatif_country"]').val('+' + dialCodeCountry);
            console.log(itichange.getNumber(), ' and then ', itichange.getExtension(), ' one more ', itichange.getNumber(intlTelInputUtils.numberFormat.E164), 
            ' country data ', itichange.getSelectedCountryData().dialCode)

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
            let value = $('.page-civicrm-contact-add .crm_phone.twelve').val();
            var indicatif = '+33 ';
            let fieldPhone = $('.page-civicrm-contact-add .crm_phone.twelve');
            console.log('mis', value)
            if (!value) {
                indicatif = fieldPhone.on('change', function (id, el) {
                    let currPhone = $(this).val();
                    let phoneNumberFollowedByindic = currPhone.replace(/\+\d+\s/g, indicatif);
                    console.log(' onload ', phoneNumberFollowedByindic)
                    $(this).val(phoneNumberFollowedByindic)
                });

                phoneMouseLeaveEvent (indicatif)
                
            }else {

            //     phoneMouseLeaveEvent(indicatif)
            //    $('.page-civicrm-contact-add .crm_phone.twelve').css('text-indent', '-23px');// Generique pour l'instant à modifier suivant l'indicatifi après
            } 

            //Met la valeur par defaut dans la page update
            jQuery('.crm_phone.twelve').each(function(el,id) {
                let defaultVal = jQuery(id).attr('value');
                if (defaultVal) {
                    // const regex = /\+[0-9]+ /;
                    // const matched = defaultVal.match(regex);
                    // let indicatif = matched[0];
                    // console.log(defaultVal,  ' dd');
                    // defaultVal = defaultVal.replace(indicatif, 0);
                    // defaultVal = defaultVal.replace('00', 0);
                    // defaultVal = indicatif + defaultVal;
                    // let val = jQuery(id).val(defaultVal);
                }
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
    /* let fieldPhone = jQuery('.page-civicrm-contact-add .crm_phone.twelve');
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
    }) */
}
  