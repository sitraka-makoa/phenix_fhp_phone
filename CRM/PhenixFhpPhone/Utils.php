<?php

use CRM_PhenixFhpPhone_ExtensionUtil as E;

class CRM_PhenixFhpPhone_Utils {


/**
 * Ajout champ personnalisé pour stocker temporairement l'indicatif du numéro de téléphone
 */
static public function addCustomField (&$form) {
  if (class_exists('HTML_QuickForm_hidden')) {

    $hiddenField = new HTML_QuickForm_hidden('custom_field_for_phone_indicatif_country');
    $defalutCountry = codeCountries()[getCivicrmDefaultDomain()];
    
    $hiddenField->setValue($defalutCountry);
    // // Ajoutez le champ "hidden" au formulaire.
    $form->addElement($hiddenField);
  }
  
  return $form;

}


}
