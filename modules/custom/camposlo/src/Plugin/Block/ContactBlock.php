<?php

/**
 * @file
 * Contains Drupal\camposlo\Plugin\Block\ContactBlock.
 */

namespace Drupal\camposlo\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'ContactBlock' block.
 *
 * @Block(
 *  id = "contact_block",
 *  admin_label = @Translation("contact_block"),
 * )
 */
class ContactBlock extends BlockBase {


  /**
   * {@inheritdoc}
   */
  public function build() {

    return array(
      '#markup' => '<div class="section" id="contact"><!-- heading -->
                      <div class="container">
                      <div class="row text-center">
                      <div class="section-heading">
                      <h2 class="title"><span>Meld deg på!</span></h2>

                      <p class="subtitle"><a class="theme_btn" href="/user/register">Registrer deg</a></p>
                      </div>
                      </div>
                      </div>
                      <!-- End heading --><!-- Contact detail -->

                      <div class="contact-address clearfix bg-parallax2">
                      <div class="container">
                      <div class="row">
                      <div class="col-md-6">
                      <div class="address-wrap clearfix">
                      <h5>Get in touch</h5>

                      <h2>Oslo</h2>
                      <a class="loc fancybox" href="#">View Location</a></div>
                      </div>

                      <div class="col-md-6">
                      <div class="address-wrap clearfix">
                      <h5>Email us at</h5>

                      <h2>post@drupalnorge.no</h2>

                      <h2>+47 98 04 24 06</h2>

                      <ul><li><a href="https://twitter.com/drupal_norge"><i class="fa fa-twitter"></i></a></li><li><a href="https://www.facebook.com/drupalnorge"><i class="fa fa-facebook"></i></a></li>          </ul></div>
                      </div>
                      </div>
                      </div>
                      </div>
                      </div>'
    );
  }

}
