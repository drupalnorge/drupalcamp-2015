// Test that we are able to create a user on the site.
'use strict';

var newUser = 'test' + Math.floor(Math.random() * 1000);
var pass = newUser + 'pass';

var system = require('system');
casper.test.begin('It is possible to register an account', function(test) {
  casper.start(system.env.TEST_URL, function() {
    // Click the big sign up button.
    casper.then(function() {
      this.click('#home .btn-primary')
    });
    // Wait for the form to appear.
    casper.waitForSelector('#user-register-form', function() {
      test.assertExists('#user-register-form', 'Found user registration form');
      casper.fill('#user-register-form', {
        mail: newUser + '@example.com',
        name: newUser
      });
      casper.click('#edit-submit');
    });

    // Check that we are presented a message about the fact that we will get
    // info via mail.
    casper.waitWhileSelector('#user-register-form', function() {
      test.assertExists('.messages');
      test.assertSelectorHasText('.messages', 'sent to your');
    });
  }).run(function() {
    test.done();
  });
});
