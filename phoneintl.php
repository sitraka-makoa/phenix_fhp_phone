<?php

require_once 'phoneintl.civix.php';
// phpcs:disable
use CRM_Phoneintl_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function phoneintl_civicrm_config(&$config) {
  _phoneintl_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function phoneintl_civicrm_xmlMenu(&$files) {
  _phoneintl_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function phoneintl_civicrm_install() {
  _phoneintl_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function phoneintl_civicrm_postInstall() {
  _phoneintl_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function phoneintl_civicrm_uninstall() {
  _phoneintl_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function phoneintl_civicrm_enable() {
  _phoneintl_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function phoneintl_civicrm_disable() {
  _phoneintl_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function phoneintl_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _phoneintl_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function phoneintl_civicrm_managed(&$entities) {
  _phoneintl_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Add CiviCase types provided by this extension.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function phoneintl_civicrm_caseTypes(&$caseTypes) {
  _phoneintl_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Add Angular modules provided by this extension.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function phoneintl_civicrm_angularModules(&$angularModules) {
  // Auto-add module files from ./ang/*.ang.php
  _phoneintl_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function phoneintl_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _phoneintl_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function phoneintl_civicrm_entityTypes(&$entityTypes) {
  _phoneintl_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_themes().
 */
function phoneintl_civicrm_themes(&$themes) {
  _phoneintl_civix_civicrm_themes($themes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function phoneintl_civicrm_preProcess($formName, &$form) {
//
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
//function phoneintl_civicrm_navigationMenu(&$menu) {
//  _phoneintl_civix_insert_navigation_menu($menu, 'Mailings', [
//    'label' => E::ts('New subliminal message'),
//    'name' => 'mailing_subliminal_message',
//    'url' => 'civicrm/mailing/subliminal',
//    'permission' => 'access CiviMail',
//    'operator' => 'OR',
//    'separator' => 0,
//  ]);
//  _phoneintl_civix_navigationMenu($menu);
//}


/**
 * Implements hook_civicrm_tabset().
 * Ajout script et css
 */
function phoneintl_civicrm_buildForm($formName, &$form) {
  
  if (in_array($formName, ['CRM_Contact_Form_Inline_Phone', 'CRM_Contact_Form_Contact', 'CRM_Activity_Form_ActivityLinks'])) {
    CRM_Phoneintl_Utils::addCustomField($form);
    
    CRM_Core_Resources::singleton()->addScriptUrl('https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js');

    Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/data.js', 100);
    Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/data.min.js', 100);
    Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/intlTelInput-jquery.js', 100);
    Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/intlTelInput-jquery.min.js', 100);
    Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/intlTelInput.js', 100);
    Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/intlTelInput.min.js', 100); 
    Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/utils.js', 100);
    Civi::resources()->addScriptFile(E::LONG_NAME,'js/script.js', 1000);
    
    Civi::resources()->addStyleFile(E::LONG_NAME, 'css/css/intlTelInput.min.css', 100000, 'html-header');
  }

  Civi::resources()->addStyleFile(E::LONG_NAME, 'css/style.css', 1500000, 'html-header');
}

/**
 * Implements hook_civicrm_pageRun().
 */
function phoneintl_civicrm_pageRun(&$page) {
  // Check if the current page is the search page.

  if ($page instanceof CRM_Search_Page_Search ) {
    CRM_Core_Resources::singleton()->addScriptUrl('https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js');
    Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/data.js', 100);
    Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/data.min.js', 100);
    Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/intlTelInput-jquery.js', 100);
    Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/intlTelInput-jquery.min.js', 100);
    Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/intlTelInput.js', 100);
    Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/intlTelInput.min.js', 100); 
    Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/utils.js', 100);
    Civi::resources()->addScriptFile(E::LONG_NAME,'js/script.js', 1000);
    Civi::resources()->addStyleFile(E::LONG_NAME, 'css/css/intlTelInput.min.css', 100000, 'html-header');
    Civi::resources()->addStyleFile(E::LONG_NAME, 'css/style.css', 1500000, 'html-header');
  }
}



/**
 * hook_civicrm_pre
 * Sert à modifier la valeur du numéro de tél avant d'enregistrer dans la base (ajout indicatif)
 * 
 */
function phoneintl_civicrm_pre($op, $objectName, $id, &$params) {
 
  //Page d'ajout et de modification
  if (in_array($objectName, ['Individual', 'Organization' , 'Phone' ]) /* && $op == 'edit' */) {
    $phoneNumber = '';
    $indicatif = $params['custom_field_for_phone_indicatif_country'];
    
    $indicatif = json_decode($indicatif);
 
    //ajout condition si le nombre de chiffre dans le numéro est inférieur à 7
    if(strlen($params['phone']) > 7) {
      if (is_array($params['phone']) && sizeof($params['phone']) > 1)  { 
        foreach ($params['phone'] as $phone_key => $phone) {
          $phoneNumber = CRM_Phoneintl_Utils::removeZeroIfStartWithZero ($phone['phone']);
          $current_indicatif = $phone_key - 1;
          $params['phone'][$phone_key]['phone'] = '+' . $indicatif->$current_indicatif . ' ' . $phoneNumber;
        }
      }else {
        $phone = $params['phone'][1];
        if (isset($phone['phone'])) {
          $phoneNumber = CRM_Phoneintl_Utils::removeZeroIfStartWithZero ($phone['phone']);
          $current_indicatif = "0";
          if (isset($params['phone'][1]['phone'])) {
            $params['phone'][1]['phone'] = '+' .  reset($indicatif) . ' ' . $phoneNumber;
          }
        }
      }
    }
  }
}