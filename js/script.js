
CRM.$(function($) {
    $(document).ready(function(){

        //Mettre les input de type tél avec le drapeau par defaut
        let inputs = $(".crm_phone.twelve");
        // console.log('woo')
        var iti = '';
        let i = 0;
        let allNumeros = {0:'+33'};
        inputs.each(function(el, newInputTel) {
            let value = $(this).val()
            
            var iti = window.intlTelInput(newInputTel, {
                initialCountry: "fr",
            })
            /// TODO PEUT ETRE AJOUTER UNE CONDITION SI LE CHAMP N'EST PAS CACHEE
            if (iti.getSelectedCountryData()) {
                allNumeros[el] = iti.getSelectedCountryData().dialCode
            }
            i++;
        })
        $('[name="custom_field_for_phone_indicatif_country"]').val(JSON.stringify(allNumeros));


        $('body').on('countrychange','.crm_phone.twelve', function() {
            let className = '';
            if (jQuery(this).parents('body').find('.iti__selected-flag > .iti__flag')) {
                className = jQuery(this).parents('body').find('.iti__selected-flag > .iti__flag').last().attr('class').split('iti__')[2];
            }

            $(this).attr('value','')
            
         }); 

         allNumeros = {0:'+33'};
         $('body').on('change','.crm_phone.twelve', function() {
            // jQuery(jQuery('#Phone_Block_1 .iti__selected-flag')[4]).attr('title').split(': ')[1] + ' ';
            let currPhone = $(this).val();
           
            let className = '';
            if (jQuery(this).parents('.iti.iti--allow-dropdown').find('.iti__selected-flag > .iti__flag')) {
                className = jQuery(this).parents('.iti.iti--allow-dropdown').find('.iti__selected-flag > .iti__flag').last().attr('class').split('iti__')[2];
            }

            $(this).attr('value','')
            let itichange = window.intlTelInput(this, {
                initialCountry: className,
            })
            let valueChange = $(this).val();
            itichange.setNumber(valueChange);
            
            let inputs = jQuery(".crm_phone.twelve");
            inputs.each(function(el, newInputTel) {
                if (!$(newInputTel).val().includes('+')) {

                    let className = '';
                    if (jQuery(newInputTel).parents('.iti.iti--allow-dropdown').find('.iti__selected-flag > .iti__flag')) {
                        className = jQuery(newInputTel).parents('.iti.iti--allow-dropdown').find('.iti__selected-flag > .iti__flag').last().attr('class').split('iti__')[2];
                    }
                    let itiget = window.intlTelInput(this, {
                        initialCountry: className,
                    })
                    if (itiget.getSelectedCountryData()) {
                        allNumeros[el] = itiget.getSelectedCountryData().dialCode
                    }
                    $('[name="custom_field_for_phone_indicatif_country"]').val(JSON.stringify(allNumeros));
                }
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
            // let value = $('.page-civicrm-contact-add .crm_phone.twelve').val();
            // var indicatif = '+33 ';
            // let fieldPhone = $('.page-civicrm-contact-add .crm_phone.twelve');


            //Met la valeur par defaut dans la page update
            jQuery('.crm_phone.twelve').each(function(el,id) {
                let defaultVal = jQuery(id).attr('value');
                if (defaultVal) {
                    // const regex = /\+[0-9]+ /;
                    // const matched = defaultVal.match(regex);
                    // let indicatif = matched[0];
                    // defaultVal = defaultVal.replace(indicatif, 0);
                    // defaultVal = defaultVal.replace('00', 0);
                    // defaultVal = indicatif + defaultVal;
                    // let val = jQuery(id).val(defaultVal);
                }
            })
        }) 



        //Page de synthese pour formattage numéro
        jQuery('.crm-summary-row .crm-content.crm-contact_phone').each(function(id, el) {
            const regex = /\+[0-9]+ /;
            const matched = $(el).html().match(regex);
            if (matched) {
                let indicatif = matched[0];
                $(el).html($(el).html().replace(indicatif, '0'));
            }
            
            //Permet d'afficher le dropdown du champ telelphone lors du clique sur le drapeau
            $('.crm-summary-phone-block #crm-phone-content').css('overflow', 'inherit')
        });


        //on submit phone page synthese 
        $('body').on('click', '.crm-button_qf_Phone_upload', function (){
            let currval = $('[name="phone[1][phone]"]').val();
            let defaultValueJSON = $('[name="custom_field_for_phone_indicatif_country"]').val();
            $('[name="phone[1][phone]"]').val(currval);      //this is a dirty way cause i can't add a custom field to store the "indicatif"
           
            let inputs = $(".crm_phone.twelve");
            inputs.each(function(el, newInputTel) {
                let phoneNumber  = $(newInputTel).val()
                const regex = /\+[0-9]+ /;
                const matched = currval.match(regex);
                // let indicatif = matched[0] + ' ';
                if (phoneNumber && !matched) {
                    
                    if (!$(newInputTel).val().includes('+')) {

                        let className = '';
                        if (jQuery(newInputTel).parents('.iti.iti--allow-dropdown').find('.iti__selected-flag > .iti__flag')) {
                            className = jQuery(newInputTel).parents('.iti.iti--allow-dropdown').find('.iti__selected-flag > .iti__flag').last().attr('class').split('iti__')[2];
                        }
                        let itiget = window.intlTelInput(this, {
                            initialCountry: className,
                        })
                        if (itiget.getSelectedCountryData()) {
                            currval = $(newInputTel).val().trim().replace(/^0/, ''); // Supprimer les espaces de début et de fin, puis retirer le zéro initial
                            $(newInputTel).val('+' + itiget.getSelectedCountryData().dialCode + ' ' + currval)
                        }
                    
                    }

                }
                
            })

        })

        jQuery('.iti.iti--show-flags .crm_phone.twelve').css('padding-left', '52px');
    })

    // jQuery('#contact-summary .crm-content.crm-contact_phone').text(jQuery('#contact-summary .crm-content.crm-contact_phone').text().replace(/\+\d+\s/g, ''));

});
  