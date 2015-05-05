'use strict';
var system = require('system');
casper.test.begin('The front page is reachable', function(test) {
  casper.start(system.env.TEST_URL, function() {
    // There should be a big fat sign up button in the middle of the screen.
    test.assertExists('#home .btn-primary');
    test.assertSelectorHasText('#home .btn-primary', 'Sign up!');
  }).run(function() {
    test.done();
  });
});
