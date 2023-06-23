
CRM.$(function($) {
    $(document).ready(function(){

        //Empecher de taper d'autres caractères sur le champ telephone
        $('body').on('keypress','.crm_phone.twelve', function(event) {
            var inputValue = event.which;
            // Vérifiez si le caractère pressé est un chiffre, "-", "(" ou ")"
            if (!(inputValue >= 48 && inputValue <= 57) && // Chiffres
                !(inputValue === 45) && // -
                !(inputValue === 40) && // (
                !(inputValue === 41) && // )
                !(inputValue === 32)) { // Espace
              event.preventDefault();
            }
        });

        //page synthese lors du click sur le drapeau se ne s'affiche pas à cause du overflow hidden donc on le replace par inherit
        $('body #crm-phone-content').css('overflow', 'inherit')

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
                preferredCountries:["fr"]
            })
            if (iti.getSelectedCountryData()) {
                allNumeros[el] = iti.getSelectedCountryData().dialCode
            }
            i++;
        })
        $('[name="custom_field_for_phone_indicatif_country"]').val(JSON.stringify(allNumeros));


        $('body').on('countrychange','.crm_phone.twelve', function() {
            let className = '';
            if ($(this).parents('.iti.iti--allow-dropdown').find('.iti__selected-flag > .iti__flag')) {
                className = $(this).parents('.iti.iti--allow-dropdown').find('.iti__selected-flag > .iti__flag').last().attr('class').split('iti__')[2];
            }
            let itichange = window.intlTelInput(this, {
                initialCountry: className,
                autoPlaceholder:"aggressive",
                preferredCountries:["fr"]
            })
            $(this).attr('value','')
            // itichange.setPlaceholderNumberType("FIXED_LINE");

            inputs.each(function(el, newInputTel) {
                if (!$(newInputTel).val().includes('+')) {

                    let className = '';
                    if ($(newInputTel).parents('.iti.iti--allow-dropdown').find('.iti__selected-flag > .iti__flag')) {
                        className = $(newInputTel).parents('.iti.iti--allow-dropdown').find('.iti__selected-flag > .iti__flag').last().attr('class').split('iti__')[2];
                    }
                    let itiget = window.intlTelInput(this, {
                        initialCountry: className,
                        preferredCountries:["fr"]
                    })
                    if (itiget.getSelectedCountryData()) {
                        allNumeros[el] = itiget.getSelectedCountryData().dialCode
                    }
                    $('[name="custom_field_for_phone_indicatif_country"]').val(JSON.stringify(allNumeros));
                }
            })
            
         }); 


        $('body #crm-phone-content').on('keyup','.crm_phone.twelve', function() {
            checkFrenchNumber  (this)
        })
        $('body #phone-block').on('keyup','.crm_phone.twelve', function() {
            checkFrenchNumber  (this)
        })
        $('body .contact_information-section').on('keyup','.crm_phone.twelve', function() {
            checkFrenchNumber  (this)
        })

         allNumeros = {0:'+33'};
         $('body').on('change','.crm_phone.twelve', function() {
            // $($('#Phone_Block_1 .iti__selected-flag')[4]).attr('title').split(': ')[1] + ' ';
            let currPhone = $(this).val();
           
            let className = '';
            if ($(this).parents('.iti.iti--allow-dropdown').find('.iti__selected-flag > .iti__flag')) {
                className = $(this).parents('.iti.iti--allow-dropdown').find('.iti__selected-flag > .iti__flag').last().attr('class').split('iti__')[2];
            }

            checkFrenchNumber  (this)

            $(this).attr('value','')
            let itichange = window.intlTelInput(this, {
                initialCountry: className,
            })
            let valueChange = $(this).val();
            itichange.setNumber(valueChange);
            
            let inputs = $(".crm_phone.twelve");
            inputs.each(function(el, newInputTel) {
                if (!$(newInputTel).val().includes('+')) {

                    let className = '';
                    if ($(newInputTel).parents('.iti.iti--allow-dropdown').find('.iti__selected-flag > .iti__flag')) {
                        className = $(newInputTel).parents('.iti.iti--allow-dropdown').find('.iti__selected-flag > .iti__flag').last().attr('class').split('iti__')[2];
                    }
                    let itiget = window.intlTelInput(this, {
                        initialCountry: className,
                        preferredCountries:["fr"]
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
                preferredCountries:["fr"]
            })
        })


        //Page de synthese pour formattage numéro
        $('.crm-summary-row .crm-content.crm-contact_phone').each(function(id, el) {
            const regex = /\+[0-9]+ /;
            const matched = $(el).html().match(regex);
            if (matched) {
                let indicatif = matched[0];
                $(el).html($(el).html().replace(indicatif, '0'));
            }

            //Permet d'afficher le dropdown du champ telelphone lors du clique sur le drapeau
            $('.crm-summary-phone-block #crm-phone-content').css('overflow', 'inherit')
            $('.crm-summary-block #crm-phone-content').css('overflow', 'inherit')
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
                        if ($(newInputTel).parents('.iti.iti--allow-dropdown').find('.iti__selected-flag > .iti__flag')) {
                            className = $(newInputTel).parents('.iti.iti--allow-dropdown').find('.iti__selected-flag > .iti__flag').last().attr('class').split('iti__')[2];
                        }
                        let itiget = window.intlTelInput(this, {
                            initialCountry: className,
                            preferredCountries:["fr"]
                            
                        })
                        if (itiget.getSelectedCountryData()) {
                            currval = $(newInputTel).val().trim().replace(/^0/, ''); // Supprimer les espaces de début et de fin, puis retirer le zéro initial
                            $(newInputTel).val('+' + itiget.getSelectedCountryData().dialCode + ' ' + currval)
                        }
                    
                    }

                }
                
            })

        })

        $('.iti.iti--show-flags .crm_phone.twelve').css('padding-left', '52px');
    })

    // jQuery('#contact-summary .crm-content.crm-contact_phone').text(jQuery('#contact-summary .crm-content.crm-contact_phone').text().replace(/\+\d+\s/g, ''));

});
  
/**
 * check le numéro si français ça doit contenir 10 chiffres
 * 
 */
 function checkFrenchNumber  (element) {

    let className = '';
    if ($(element).parents('.iti.iti--allow-dropdown').find('.iti__selected-flag > .iti__flag')) {
        className = $(element).parents('.iti.iti--allow-dropdown').find('.iti__selected-flag > .iti__flag').last().attr('class').split('iti__')[2];
    }

    if (className == 'fr') {
        //Pour les numéro français c'est 10 chiffres
        var regex = /\d/g  // Expression régulière pour un numéro de téléphone à 10 chiffres
        let numero = jQuery(element).val();
        if (numero.match(regex)&& numero.match(regex).length === 10) {
            jQuery(element).css('border-color', '#c2cfd8');
            // Ajoutez ici votre code à exécuter si le numéro est valide
        }else {
            jQuery(element).css('border-color', 'red');
        }
    }
    
}