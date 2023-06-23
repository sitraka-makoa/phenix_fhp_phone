<?php

use CRM_Phoneintl_ExtensionUtil as E;

class CRM_Phoneintl_Utils {


/**
 * Ajout champ personnalisé pour stocker temporairement l'indicatif du numéro de téléphone
 */
static public function addCustomField (&$form) {
  if (class_exists('HTML_QuickForm_hidden')) {

    $hiddenField = new HTML_QuickForm_hidden('custom_field_for_phone_indicatif_country');
    $defalutCountry = self::codeCountries()[self::getCivicrmDefaultDomain()];
    
    $hiddenField->setValue($defalutCountry);
    // // Ajoutez le champ "hidden" au formulaire.
    $form->addElement($hiddenField);
  }

  return $form;

}


/**
 * Recupere la langue par defaut de civicrm (domain) s'il n'y a pas par defaut c'est fr
 */
static public function getCivicrmDefaultDomain () {
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

/**
 * @return numéro de téléphone
 * @param numero de télephone
 * Enleve le prémier 0 si le numéro commence par 0
 */
static public function removeZeroIfStartWithZero ($phoneNumber) {
  // $is_match = preg_match('/\[0-9 ]+ /', $phoneNumber, $matched);
  $is_match = preg_match(' /^0/', $phoneNumber, $matched);
  
  if ($is_match) {
    $phoneNumber = preg_replace('/^0/', '', $phoneNumber);
  }
  
  return $phoneNumber;
}

/**
 * Liste de correspondance entre pays et indicatif
 */
static public function codeCountries () {
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


}
