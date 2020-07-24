<?php

namespace MediaWiki\Extension\DarkMode;

use OutputPage;
use Skin;
use SkinTemplate;
use Title;

class Hooks {
  /**
   * Handler for PersonalUrls hook.
   * Add a "Dark mode" item to the user toolbar ('personal URLs').
   * @see https://www.mediawiki.org/wiki/Manual:Hooks/PersonalUrls
   * @param array &$personal_urls Array of URLs to append to.
   * @param Title &$title Title of page being visited.
   * @param SkinTemplate $skin
   */
  public static function onPersonalUrls(
    array &$personal_urls,
    Title &$title,
    SkinTemplate $skin
  ) {
    $insertUrls = [
      'darkmode-link' => [
        'text' => $skin->msg('darkmode-link')->text(),
        'href' => 'javascript:;',
        'active' => true,
      ],
    ];

    // https://www.mediawiki.org/wiki/Manual:Hooks/PersonalUrls
    // TODO: Can also see if candidate key is in the array to avoi runtime errors.
    // $beforeKey = $skin->getUser()->isLoggedIn() ? "login" : "anonlogin"
    $targetkey = $skin->getUser()->isLoggedIn() ? "mytalk" : "anontalk";

    $personal_urls = wfArrayInsertAfter(
      $personal_urls,
      $insertUrls,
      $targetkey
    );
  }

  /**
   * Handler for BeforePageDisplay hook.
   * @see https://www.mediawiki.org/wiki/Manual:Hooks/BeforePageDisplay
   * @param OutputPage $output
   * @param Skin $skin Skin being used.
   */
  public static function onBeforePageDisplay($output, $skin) {
    if (isset($_COOKIE["darkmode"])) {
      $output->addBodyClasses(["darkmode"]);
    }

    // FIXME: lookup how the dictionary naming works. ext.DarkMode vs ext.DarkMode.async
    // is just a quick disambiguation i came up with to use these two different
    // addModule methods.

    // addModuleStyles will <link> css while generating html (avoids flash)
    $output->addModuleStyles('ext.DarkMode');
    // addModules will load <script> later which you wouldn't want for css
    $output->addModules('ext.DarkMode.async');
  }
}
