<?php

require_once 'phenix_fhp_phone.civix.php';
// phpcs:disable
use CRM_PhenixFhpPhone_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function phenix_fhp_phone_civicrm_config(&$config) {
  _phenix_fhp_phone_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function phenix_fhp_phone_civicrm_xmlMenu(&$files) {
  _phenix_fhp_phone_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function phenix_fhp_phone_civicrm_install() {
  _phenix_fhp_phone_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function phenix_fhp_phone_civicrm_postInstall() {
  _phenix_fhp_phone_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function phenix_fhp_phone_civicrm_uninstall() {
  _phenix_fhp_phone_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function phenix_fhp_phone_civicrm_enable() {
  _phenix_fhp_phone_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function phenix_fhp_phone_civicrm_disable() {
  _phenix_fhp_phone_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function phenix_fhp_phone_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _phenix_fhp_phone_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function phenix_fhp_phone_civicrm_managed(&$entities) {
  _phenix_fhp_phone_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Add CiviCase types provided by this extension.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function phenix_fhp_phone_civicrm_caseTypes(&$caseTypes) {
  _phenix_fhp_phone_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Add Angular modules provided by this extension.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function phenix_fhp_phone_civicrm_angularModules(&$angularModules) {
  // Auto-add module files from ./ang/*.ang.php
  _phenix_fhp_phone_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function phenix_fhp_phone_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _phenix_fhp_phone_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function phenix_fhp_phone_civicrm_entityTypes(&$entityTypes) {
  _phenix_fhp_phone_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_themes().
 */
function phenix_fhp_phone_civicrm_themes(&$themes) {
  _phenix_fhp_phone_civix_civicrm_themes($themes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function phenix_fhp_phone_civicrm_preProcess($formName, &$form) {
//
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
//function phenix_fhp_phone_civicrm_navigationMenu(&$menu) {
//  _phenix_fhp_phone_civix_insert_navigation_menu($menu, 'Mailings', [
//    'label' => E::ts('New subliminal message'),
//    'name' => 'mailing_subliminal_message',
//    'url' => 'civicrm/mailing/subliminal',
//    'permission' => 'access CiviMail',
//    'operator' => 'OR',
//    'separator' => 0,
//  ]);
//  _phenix_fhp_phone_civix_navigationMenu($menu);
//}


/**
 * Implements hook_civicrm_tabset().
 * Ajout script et css
 */
function phenix_fhp_phone_civicrm_buildForm($formName, &$form) {
  
  if (in_array($formName, ['CRM_Contact_Form_Inline_Phone', 'CRM_Contact_Form_Contact'])) {
    CRM_PhenixFhpPhone_Utils::addCustomField($form);
  }


  Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/data.js', 100);
  Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/data.min.js', 100);
  Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/intlTelInput-jquery.js', 100);
  Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/intlTelInput-jquery.min.js', 100);
  Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/intlTelInput.js', 100);
  Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/intlTelInput.min.js', 100); 
  Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/utils.js', 100);
  Civi::resources()->addScriptFile(E::LONG_NAME,'js/script.js', 1000);
  
  Civi::resources()->addStyleFile(E::LONG_NAME, 'css/style.css', 1500000, 'html-header');
  Civi::resources()->addStyleFile(E::LONG_NAME, 'css/css/intlTelInput.min.css', 100000, 'html-header');
}

/**
 * hook_civicrm_pre
 * Sert à modifier la valeur du numéro de tél avant d'enregistrer dans la base (ajout indicatif)
 * 
 */
function phenix_fhp_phone_civicrm_pre($op, $objectName, $id, &$params) {

  //Page d'ajout et de modification
  if (in_array($objectName, ['Individual', 'Organization', 'Phone']) /* && $op == 'edit' */) {
    $phoneNumber = '';
    $indicatif = $params['custom_field_for_phone_indicatif_country'];
    $indicatif = json_decode($indicatif);
    
    if (is_array($params['phone']) && sizeof($params['phone']) > 1)  { 
      foreach ($params['phone'] as $phone_key => $phone) {
        $phoneNumber = CRM_PhenixFhpPhone_Utils::removeZeroIfStartWithZero ($phone['phone']);
        $current_indicatif = $phone_key - 1;
        $params['phone'][$phone_key]['phone'] = '+' . $indicatif->$current_indicatif . ' ' . $phoneNumber;
      }
    }else {
      $phone = $params['phone'][1];
      if (isset($phone['phone'])) {
        $phoneNumber = CRM_PhenixFhpPhone_Utils::removeZeroIfStartWithZero ($phone['phone']);
        $current_indicatif = "0";
        if (isset($params['phone'][1]['phone'])) {
          $params['phone'][1]['phone'] = '+' .  reset($indicatif) . ' ' . $phoneNumber;
        }
      }
    }
  }
}