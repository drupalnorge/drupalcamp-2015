# Site for Drupalcamp Oslo 2015.

Based on Drupal 8, since we are so cutting edge here in the north.

[![Build Status](https://travis-ci.org/drupalnorge/drupalcamp-2015.svg?branch=master)](https://travis-ci.org/drupalnorge/drupalcamp-2015)

## Installing your own instance.
- Install Drupal in a regular way (preferrably with the `minimal` profile).
- Edit settings.php to use `$config_directories['staging'] = 'config/staging';` (near the bottom of the file).
- Set site UUID to the one specified in the config (for example with `drush cset system.site uuid ffb6d131-689a-415d-a300-0af2e090ef1e`)
- Delete all entities of type shortcut (if you installed the `standard` profile). You can do this at admin/config/user-interface/shortcut/manage/default/customize.
- Uninstall the contact module (if you installed the `standard` profile).
- Import all the site config (for example with `drush cim staging`).

## Installing all needed stuff in the theme
- Go to the theme directory.
- run `npm install` (nodejs required).
