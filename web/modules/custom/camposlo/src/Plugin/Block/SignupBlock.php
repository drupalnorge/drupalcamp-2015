<?php

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
   * The current user.
   *
   * @var \Drupal\Core\Session\AccountInterface
   */
  protected $account;

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
    // Abuse this to get current account. Seemed so convenient.
    $this->account = $account;
    return AccessResult::allowed();
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $logged_in = TRUE;
    if (!$this->account || $this->account->isAnonymous()) {
      $logged_in = FALSE;
    }
    return [
      '#theme' => 'camposlo-register-block',
      '#register_link' => [
        '#type' => 'link',
        '#url' => Url::fromRoute('user.register'),
        '#title' => $this->t('Register'),
        '#attributes' => [
          'class' => [
            'btn btn-primary btn-lg',
          ],
        ],
      ],
      '#session_link' => [
        '#type' => 'link',
        '#url' => Url::fromRoute('camposlo.submit_session_controller_index'),
        '#title' => $this->t('Submit session'),
        '#attributes' => [
          'class' => [
            'btn btn-primary btn-lg',
          ],
        ],
      ],
      '#logged_in' => $logged_in,
    ];
  }

}
