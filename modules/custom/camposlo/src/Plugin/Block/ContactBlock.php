<?php

/**
 * @file
 * Contains Drupal\camposlo\Plugin\Block\ContactBlock.
 */

namespace Drupal\camposlo\Plugin\Block;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Routing\UrlGeneratorTrait;
use Drupal\Core\Url;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Block\BlockBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'ContactBlock' block.
 *
 * @Block(
 *  id = "contact_block",
 *  admin_label = @Translation("contact_block"),
 * )
 */
class ContactBlock extends BlockBase implements ContainerFactoryPluginInterface {

  use UrlGeneratorTrait;

  /**
   * The route match.
   *
   * @var \Drupal\Core\Routing\RouteMatchInterface
   */
  protected $routeMatch;

  /**
   * Constructs a new UserLoginBlock instance.
   *
   * @param array $configuration
   *   The plugin configuration, i.e. an array with configuration values keyed
   *   by configuration option name. The special key 'context' may be used to
   *   initialize the defined contexts by setting it to an array of context
   *   values keyed by context names.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Routing\RouteMatchInterface $route_match
   *   The route match.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, RouteMatchInterface $route_match) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);

    $this->routeMatch = $route_match;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('current_route_match')
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account) {
    $route_name = $this->routeMatch->getRouteName();
    return ($account->isAnonymous() && !in_array($route_name, array('user.register', 'user.login')));
  }

  /**
   * {@inheritdoc}
   */
  public function build() {

    return array(
      '#markup' => '<div class="section" id="contact"><!-- heading -->
                      <div class="container">
                      <div class="row text-center">
                      <div class="section-heading">
                      <h2 class="title"><span>' . $this->t('Sign up!') . '</span></h2>

                      <p class="subtitle"><a class="btn btn-lg btn-primary" href="/user/register">' . $this->t('Register') . '</a></p>
                      </div>
                      </div>
                      </div>
                      <!-- End heading --><!-- Contact detail -->

                      <div class="contact-address clearfix bg-parallax2">
                      <div class="container">
                      <div class="row">
                      <div class="col-md-6">
                      <div class="address-wrap clearfix">
                      <h5>' . $this->t('Get in touch') . '</h5>

                      <h2>Oslo</h2>
                      <a class="loc fancybox" href="#">' . $this->t('View Location') . '</a></div>
                      </div>

                      <div class="col-md-6">
                      <div class="address-wrap clearfix">
                      <h5>' . $this->t('Email us at') . '</h5>

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
