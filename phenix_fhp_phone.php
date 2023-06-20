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
  if ($formName == 'CRM_Contact_Form_Contact') {
    // Créez un champ de type "hidden".
    // $form->addElement('text', 'custom_field', 'Custom Field test');
    if (class_exists('HTML_QuickForm_hidden')) {

      $hiddenField = new HTML_QuickForm_hidden('custom_field_for_phone_indicatif_country');
      $defalutCountry = codeCountries()[getCivicrmDefaultDomain()];
      
      $hiddenField->setValue($defalutCountry);
      // // Ajoutez le champ "hidden" au formulaire.
      $form->addElement($hiddenField);
    }


    // Add the custom field to the form

  }


  Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/data.js', 100);
  Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/data.min.js', 100);
  Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/intlTelInput-jquery.js', 100);
  Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/intlTelInput-jquery.min.js', 100);
  Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/intlTelInput.js', 100);
  Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/intlTelInput.min.js', 100); 
  Civi::resources()->addScriptFile(E::LONG_NAME,'js/js/utils.js', 100);
  Civi::resources()->addScriptFile(E::LONG_NAME,'js/script.js', 1000);
  
  Civi::resources()->addStyleFile(E::LONG_NAME, 'css/style.css', 15, 'html-header');
  Civi::resources()->addStyleFile(E::LONG_NAME, 'css/css/intlTelInput.min.css', 100000, 'html-header');
}

/**
 * hook_civicrm_pre
 * Sert à modifier la valeur du numéro de tél avant d'enregistrer dans la base (ajout indicatif)
 * 
 */
function phenix_fhp_phone_civicrm_pre($op, $objectName, $id, &$params) {
  
  if (in_array($objectName, ['Individual', 'Organization']) /* && $op == 'edit' */) {
    $phoneNumber = '';
   // unset($params['phone']);
   $indicatif = $params['custom_field_for_phone_indicatif_country'];
   $indicatif = json_decode($indicatif);
     foreach ($params['phone'] as $phone_key => $phone) {
       $phoneNumber = removeZeroIfStartWithZero ($phone['phone']);
    // $phoneNumber = removeZeroIfStartWithZero ($phoneNumber);  
 
      /* if (strpos($phoneNumber, "+") === false) {//Pas encore utile pour l'instant car on a déjà l'idicatif lors de la soumission
        $phoneNumber = str_replace(" ", "", $phoneNumber);
        // Enlever le premier chiffre si c'est 0
        if ($phoneNumber[0] === '0') {
          $phoneNumber = substr($phoneNumber, 1);
        }
        
        // Grouper les chiffres deux par deux depuis la fin
        $numeroTelInverse = '';
        $len = strlen($phoneNumber);
        for ($i = $len - 1; $i >= 0; $i -= 2) {
            $group = $phoneNumber[$i];
            if ($i - 1 >= 0) {
                $group = $phoneNumber[$i - 1] . $group;
            }
            $numeroTelInverse = $group . ' ' . $numeroTelInverse;
        }
        // Ajouter "+33 " au début
        $numeroTelInverse = "+33 " . $numeroTelInverse;
        $params['phone'][1]['phone'] = $numeroTelInverse;
      } else {    // ici c'est fonctionnel (utile)
        $params['phone'][$phone_key]['phone'] = $phoneNumber;
        //do nothing...
      } */

      $current_indicatif = $phone_key - 1;
      $params['phone'][$phone_key]['phone'] = '+' . $indicatif->$current_indicatif . ' ' . $phoneNumber;
    }
  }
}

/**
 * @return numéro de téléphone
 * @param numero de télephone
 * Enleve le prémier 0 si le numéro commence par 0
 */
function removeZeroIfStartWithZero ($phoneNumber) {
  // $is_match = preg_match('/\[0-9 ]+ /', $phoneNumber, $matched);
  $is_match = preg_match(' /^0/', $phoneNumber, $matched);
  
  if ($is_match) {
    $phoneNumber = preg_replace('/^0/', '', $phoneNumber);
  }
  
  return $phoneNumber;
}


/**
 * Sauvegarde des numéro avec l'indicatif
 */
function saveNumeroWithIndicactif () {

}


/**
 * Recupere la langue par defaut de civicrm (domain) s'il n'y a pas par defaut c'est fr
 */
function getCivicrmDefaultDomain () {
  $domains = \Civi\Api4\Domain::get(FALSE)
  ->addSelect('locale_custom_strings')
  ->execute();

  foreach ($domains as $domain) {
    if ($domain['locale_custom_strings']) {
      $defaultDomain = end(array_keys($domain['locale_custom_strings']));
      $defaultDomain = explode('_', $defaultDomain)[0];
      return $defaultDomain;
    }  
  }

  return 'fr';

}


function codeCountries () {
  return $codes = array(
    'af' => '+93',
    'al' => '+355',
    'dz' => '+213',
    'as' => '+1',
    'ad' => '+376',
    'ao' => '+244',
    'ai' => '+1',
    'aq' => '+672',
    'ag' => '+1',
    'ar' => '+54',
    'am' => '+374',
    'aw' => '+297',
    'au' => '+61',
    'at' => '+43',
    'az' => '+994',
    'bs' => '+1',
    'bh' => '+973',
    'bd' => '+880',
    'bb' => '+1',
    'by' => '+375',
    'be' => '+32',
    'bz' => '+501',
    'bj' => '+229',
    'bm' => '+1',
    'bt' => '+975',
    'bo' => '+591',
    'ba' => '+387',
    'bw' => '+267',
    'br' => '+55',
    'io' => '+246',
    'vg' => '+1',
    'bn' => '+673',
    'bg' => '+359',
    'bf' => '+226',
    'bi' => '+257',
    'kh' => '+855',
    'cm' => '+237',
    'ca' => '+1',
    'cv' => '+238',
    'ky' => '+1',
    'cf' => '+236',
    'td' => '+235',
    'cl' => '+56',
    'cn' => '+86',
    'cx' => '+61',
    'cc' => '+61',
    'co' => '+57',
    'km' => '+269',
    'ck' => '+682',
    'cr' => '+506',
    'hr' => '+385',
    'cu' => '+53',
    'cw' => '+599',
    'cy' => '+357',
    'cz' => '+420',
    'cd' => '+243',
    'dk' => '+45',
    'dj' => '+253',
    'dm' => '+1',
    'do' => '+1',
    'tl' => '+670',
    'ec' => '+593',
    'eg' => '+20',
    'sv' => '+503',
    'gq' => '+240',
    'er' => '+291',
    'ee' => '+372',
    'et' => '+251',
    'fk' => '+500',
    'fo' => '+298',
    'fj' => '+679',
    'fi' => '+358',
    'fr' => '+33',
    'pf' => '+689',
    'ga' => '+241',
    'gm' => '+220',
    'ge' => '+995',
    'de' => '+49',
    'gh' => '+233',
    'gi' => '+350',
    'gr' => '+30',
    'gl' => '+299',
    'gd' => '+1',
    'gu' => '+1',
    'gt' => '+502',
    'gg' => '+44',
    'gn' => '+224',
    'gw' => '+245',
    'gy' => '+592',
    'ht' => '+509',
    'hn' => '+504',
    'hk' => '+852',
    'hu' => '+36',
    'is' => '+354',
    'in' => '+91',
    'id' => '+62',
    'ir' => '+98',
    'iq' => '+964',
    'ie' => '+353',
    'im' => '+44',
    'il' => '+972',
    'it' => '+39',
    'ci' => '+225',
    'jm' => '+1',
    'jp' => '+81',
    'je' => '+44',
    'jo' => '+962',
    'kz' => '+7',
    'ke' => '+254',
    'ki' => '+686',
    'kw' => '+965',
    'kg' => '+996',
    'la' => '+856',
    'lv' => '+371',
    'lb' => '+961',
    'ls' => '+266',
    'lr' => '+231',
    'ly' => '+218',
    'li' => '+423',
    'lt' => '+370',
    'lu' => '+352',
    'mo' => '+853',
    'mk' => '+389',
    'mg' => '+261',
    'mw' => '+265',
    'my' => '+60',
    'mv' => '+960',
    'ml' => '+223',
    'mt' => '+356',
    'mh' => '+692',
    'mq' => '+596',
    'mr' => '+222',
    'mu' => '+230',
    'yt' => '+262',
    'mx' => '+52',
    'fm' => '+691',
    'md' => '+373',
    'mc' => '+377',
    'mn' => '+976',
    'me' => '+382',
    'ms' => '+1',
    'ma' => '+212',
    'mz' => '+258',
    'mm' => '+95',
    'na' => '+264',
    'nr' => '+674',
    'np' => '+977',
    'nl' => '+31',
    'nc' => '+687',
    'nz' => '+64',
    'ni' => '+505',
    'ne' => '+227',
    'ng' => '+234',
    'nu' => '+683',
    'kp' => '+850',
    'mp' => '+1',
    'no' => '+47',
    'om' => '+968',
    'pk' => '+92',
    'pw' => '+680',
    'pa' => '+507',
    'pg' => '+675',
    'py' => '+595',
    'pe' => '+51',
    'ph' => '+63',
    'pn' => '+64',
    'pl' => '+48',
    'pt' => '+351',
    'pr' => '+1',
    'qa' => '+974',
    're' => '+262',
    'ro' => '+40',
    'ru' => '+7',
    'rw' => '+250',
    'bl' => '+590',
    'sh' => '+290',
    'kn' => '+1',
    'lc' => '+1',
    'mf' => '+590',
    'pm' => '+508',
    'vc' => '+1',
    'ws' => '+685',
    'sm' => '+378',
    'st' => '+239',
    'sa' => '+966',
    'sn' => '+221',
    'rs' => '+381',
    'sc' => '+248',
    'sl' => '+232',
    'sg' => '+65',
    'sx' => '+1',
    'sk' => '+421',
    'si' => '+386',
    'sb' => '+677',
    'so' => '+252',
    'za' => '+27',
    'kr' => '+82',
    'ss' => '+211',
    'es' => '+34',
    'lk' => '+94',
    'sd' => '+249',
    'sr' => '+597',
    'sj' => '+47',
    'sz' => '+268',
    'se' => '+46',
    'ch' => '+41',
    'sy' => '+963',
    'tw' => '+886',
    'tj' => '+992',
    'tz' => '+255',
    'th' => '+66',
    'tg' => '+228',
    'tk' => '+690',
    'to' => '+676',
    'tt' => '+1',
    'tn' => '+216',
    'tr' => '+90',
    'tm' => '+993',
    'tc' => '+1',
    'tv' => '+688',
    'vi' => '+1',
    'ug' => '+256',
    'ua' => '+380',
    'ae' => '+971',
    'gb' => '+44',
    'us' => '+1',
    'uy' => '+598',
    'uz' => '+998',
    'vu' => '+678',
    'va' => '+39',
    've' => '+58',
    'vn' => '+84',
    'wf' => '+681',
    'eh' => '+212',
    'ye' => '+967',
    'zm' => '+260',
    'zw' => '+263',
  );
}