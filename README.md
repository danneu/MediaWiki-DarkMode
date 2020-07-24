# DarkMode

A MediaWiki extension that adds a cookie-based dark-mode toggle.

This was a quick hack + release to share with some people.

![screenshot](/screenshot.jpg)

## Install

1. Clone and rename this repo into your wiki's extensions: `extensions/DarkMode`
   I'm not sure if folder name actually matters. Too lazy to check right now.
2. Add to LocalSettings.php: `wfLoadExtension('DarkMode');`

## Background

I'm new to MediaWiki and unfamiliar with APIs but I wanted a dark-mode off the bat.

Their docs link to some sort of example/reference impl: https://www.mediawiki.org/wiki/Extension:DarkMode,
but it's missing such basic features that I believe it was meant to be a hello world.

## Features

I've implemented these features/changes so far:

-   Adds a i18n'ed dark-mode toggle to global navbar.
-   The user's dark-mode setting is saved in a cookie.
-   Avoids white flash of bgcolor.
-   Removed the toggle between "dark mode" and "default mode". It's just "dark mode" now with a small decoration to indicate state.

## Customization

-   `resources/ext.DarkMode.less`: This is the CSS file that's toggled. Change it.
    For now it just inverts colors except for images.
-   `resources/ext.DarkMode.js`: Controls the onClick logic and sets/removes the cookie.

## TODO

-   Support customization, like allowing operator to supply their own darkmode.css path.
-   Get a better idea of MediaWiki best practices and reconsider my impl.
-   Learn more about MediaWiki extensions so I can remove some of my guesswork.

## License

MIT
