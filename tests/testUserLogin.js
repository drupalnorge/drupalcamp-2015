// Test that we are able to log in a user on the site.
'use strict';

var system = require('system');
casper.test.begin('It is possible to log in with the predefined admin account', function(test) {
  casper.start(system.env.TEST_URL, function() {
    // Click the big sign up button.
    casper.then(function() {
      this.click('ul.navbar-right a');
    });

    casper.waitForSelector('#user-login-form', function() {
      casper.fill('#user-login-form', {
        // These are set in travis as this. Will not pass if you install with
        // a real password.
        name: 'admin',
        pass: 'secret'
      }, true);
    });

    casper.waitWhileSelector('#user-login-form', function() {
      test.assertSelectorDoesntHaveText('ul.navbar-right a', 'Log in', 'We were sucessfully logged in');
    }, function failedLogin() {
      test.fail('We were not logged in. This test will only pass if the admin password is "secret".');
    });
  }).run(function() {
    test.done();
  });
});
