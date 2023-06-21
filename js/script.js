
CRM.$(function($) {
    $(document).ready(function(){

        //Mettre les input de type tél avec le drapeau par defaut
        let inputs = $(".crm_phone.twelve");
        console.log('woo')
        var iti = '';
        inputs.each(function(el, newInputTel) {
            let value = $(this).val()
            
            var iti = window.intlTelInput(newInputTel, {
                initialCountry: "fr",
            })
            let allNumeros = {0:'+33'};
            console.log(newInputTel, ' combien de champ')
            if (iti.getSelectedCountryData()) {
                console.log(el, iti.getSelectedCountryData().dialCode, ' dey')
                allNumeros[el] = iti.getSelectedCountryData().dialCode
            }
            $('[name="custom_field_for_phone_indicatif_country"]').val(JSON.stringify(allNumeros));
        })


        $('body').on('countrychange','.crm_phone.twelve', function() {
            let className = '';
            if (jQuery(this).parents('body').find('.iti__selected-flag > .iti__flag')) {
                className = jQuery(this).parents('body').find('.iti__selected-flag > .iti__flag').last().attr('class').split('iti__')[2];
            }

            $(this).attr('value','')
            
         }); 

         let allNumeros = {0:'+33'};
         $('body').on('change','.crm_phone.twelve', function() {
            // jQuery(jQuery('#Phone_Block_1 .iti__selected-flag')[4]).attr('title').split(': ')[1] + ' ';
            let currPhone = $(this).val();
           
            let className = '';
            if (jQuery(this).parents('.iti.iti--allow-dropdown').find('.iti__selected-flag > .iti__flag')) {
                className = jQuery(this).parents('.iti.iti--allow-dropdown').find('.iti__selected-flag > .iti__flag').last().attr('class').split('iti__')[2];
            }
            console.log(className, ' vis')

            $(this).attr('value','')
            let itichange = window.intlTelInput(this, {
                initialCountry: className,
            })
            let valueChange = $(this).val();
            itichange.setNumber(valueChange);
            
            let inputs = jQuery(".crm_phone.twelve");
            inputs.each(function(el, newInputTel) {
                let className = '';
                if (jQuery(newInputTel).parents('.iti.iti--allow-dropdown').find('.iti__selected-flag > .iti__flag')) {
                    className = jQuery(newInputTel).parents('.iti.iti--allow-dropdown').find('.iti__selected-flag > .iti__flag').last().attr('class').split('iti__')[2];
                }
                console.log(className, ' current li')
                let itiget = window.intlTelInput(this, {
                   initialCountry: className,
                })
                if (itiget.getSelectedCountryData()) {
                    console.log(el, itiget.getSelectedCountryData().dialCode, ' wasup')
                    allNumeros[el] = itiget.getSelectedCountryData().dialCode
                }
                $('[name="custom_field_for_phone_indicatif_country"]').val(JSON.stringify(allNumeros));
            })


        });

        
        
        //Ajouter d'autres numéros
        $('#addPhone').on('click', function() {
            let inputs = $(".crm_phone.twelve:last")[0];
            let last = 0;
            let itichange = window.intlTelInput(inputs, {
                initialCountry: 'fr',
            })
        })


         $(window).on('load',function(){
            let value = $('.page-civicrm-contact-add .crm_phone.twelve').val();
            var indicatif = '+33 ';
            let fieldPhone = $('.page-civicrm-contact-add .crm_phone.twelve');
            console.log('mis', value)
            if (!value) {
              /*   indicatif = fieldPhone.on('change', function (id, el) {
                    let currPhone = $(this).val();
                    let phoneNumberFollowedByindic = currPhone.replace(/\+\d+\s/g, indicatif);
                    console.log(' onload ', phoneNumberFollowedByindic)
                    $(this).val(phoneNumberFollowedByindic)
                });

                phoneMouseLeaveEvent (indicatif) */
                
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



        //Page de synthese pour formattage numéro
        jQuery('.crm-summary-row .crm-content.crm-contact_phone').each(function(id, el) {
            console.log( ' huh')
            const regex = /\+[0-9]+ /;
            const matched = $(el).html().match(regex);
            if (matched) {
                let indicatif = matched[0];
                console.log(indicatif, ' test', jQuery(el).html())
                $(el).html($(el).html().replace(indicatif, '0'));
            }
        });

        jQuery('.iti.iti--show-flags .crm_phone.twelve').css('padding-left', '52px');
    })

    // jQuery('#contact-summary .crm-content.crm-contact_phone').text(jQuery('#contact-summary .crm-content.crm-contact_phone').text().replace(/\+\d+\s/g, ''));

});
  