# enable php-fpm
cat ~/.phpenv/versions/$(phpenv version-name)/etc/php-fpm.conf.default
sudo cp ~/.phpenv/versions/$(phpenv version-name)/etc/php-fpm.conf.default ~/.phpenv/versions/$(phpenv version-name)/etc/php-fpm.conf
sudo a2enmod rewrite actions fastcgi alias
echo "cgi.fix_pathinfo = 1" >> ~/.phpenv/versions/$(phpenv version-name)/etc/php.ini
~/.phpenv/versions/$(phpenv version-name)/sbin/php-fpm
# configure apache virtual hosts
sudo cp -f ci/travis-ci-apache /etc/apache2/sites-available/default
sudo sed -e "s?%TRAVIS_BUILD_DIR%?$(pwd)?g" --in-place /etc/apache2/sites-available/default
sudo service apache2 restart
# Install Drupal
cd drupal
php -d sendmail_path=`which true` ~/.composer/vendor/bin/drush.php si minimal --db-url="mysql://$DB_USERNAME@127.0.0.1/$DATABASE" --account-pass=secret --keep-config -y
drush cset system.site uuid ffb6d131-689a-415d-a300-0af2e090ef1e -y
echo "\$config_directories['staging'] = 'config/staging';" | sudo tee -a sites/default/settings.php
drush cim staging -y
# Set the testing email interface as default mail interface.
drush cset system.mail interface.default test_mail_collector -y
# Disable honeypot time limit, since we are going to be a bot later.
drush cset honeypot.settings time_limit 0 -y
