<?php

/**
 * @file
 * Contains Drupal\camposlo\Plugin\Block\SignupBlock.
 */

namespace Drupal\camposlo\Plugin\Block;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Routing\UrlGeneratorTrait;
use Drupal\Core\Url;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
/**
 * Provides a 'SignupBlock' block.
 *
 * @Block(
 *  id = "signup_block",
 *  admin_label = @Translation("signup_block"),
 * )
 */
class SignupBlock extends BlockBase implements ContainerFactoryPluginInterface {

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
    if ($account->isAnonymous() && !in_array($route_name, array('user.register', 'user.login'))) {
      return AccessResult::allowed();
    }
    return AccessResult::forbidden();
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

                            <p class="subtitle"><a class="btn btn-lg btn-primary" href="' . Url::fromRoute('user.register')->toString() . '">' . $this->t('Register') . '</a></p>
                          </div>
                        </div>
                      </div>
                      <!-- End heading --><!-- Contact detail -->
                    </div>',
    );
  }

}
