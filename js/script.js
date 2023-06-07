
CRM.$(function($) {
    // if (!window.location.search.includes('action=update')) {//si c'est la page de creation
        let value = $('.page-civicrm-contact-add [name="phone[1][phone]"]').val();
        if (!value) {
            $('.page-civicrm-contact-add [name="phone[1][phone]"]').on('mouseleave', function (id, el) {
                let phoneNumber = $(this).val();
                console.log(phoneNumber, 'fired')
                if (phoneNumber) {
                    if ( !(/\+\s?33/.test(phoneNumber))) {//si le numero ne contient pas +33

                        // Reverse the phone number
                        phoneNumber = formatTwoByTwo(phoneNumber);
                        
                        // Remove leading "0" if present
                        if (phoneNumber.startsWith("0")) {
                            phoneNumber = phoneNumber.substr(1);
                        }
                        
                        console.log( 'checkl')
                        if (phoneNumber.startsWith("3 3")) {
                            // phoneNumber = "+" + phoneNumber;
                            phoneNumber = phoneNumber.replace("3 3", "+33 ")
                        } else {
                            phoneNumber = "+33 " + phoneNumber;
                        }
                        // Check if the phone number starts with "33" or "+33"
                        $(this).val(phoneNumber);
                    }else {//
                        if (!phoneNumber.includes("+33 ")) {
                            phoneNumber = phoneNumber.replace("+33", "");
                            phoneNumber = formatTwoByTwo(phoneNumber);
                            phoneNumber = "+33 " + phoneNumber;
                            $(this).val(phoneNumber);
                        }
                    }
                }
            })
        }else {

            let phoneVal = $('.page-civicrm-contact-add [name="phone[1][phone]"]').val();
            phoneVal = phoneVal.replace('+33 ', '0');
            console.log(phoneVal)
            $('.page-civicrm-contact-add [name="phone[1][phone]"]').val(phoneVal)
        }
    
});

function formatTwoByTwo (phoneNumber) {
    phoneNumber = phoneNumber.split("").reverse().join("");

    // Add a blank space every two characters
    phoneNumber = phoneNumber.replace(/(\d{2})(?=\d)/g, "$1 ");

    // Reverse the phone number back to its original order
    phoneNumber = phoneNumber.split("").reverse().join("");

    return phoneNumber;
}