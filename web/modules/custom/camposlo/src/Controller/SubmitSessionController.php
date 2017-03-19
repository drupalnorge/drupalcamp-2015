<?php

/**
 * @file
 * Contains Drupal\camposlo\Controller\SubmitSessionController.
 */

namespace Drupal\camposlo\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class SubmitSessionController.
 *
 * @package Drupal\camposlo\Controller
 */
class SubmitSessionController extends ControllerBase {
  /**
   * Index.
   *
   * @return string
   *   Return some markup
   */
  public function index() {
    $config = \Drupal::config('system.site');
    $mail = $config->get('mail');
    $text = $this->t('To submit a session, please send an email to the camp committee. You can reach us at @mail or by clicking the button below.', [
      '@mail' => $mail,
    ]);
    $button = '<a class="btn btn-primary btn-lg" href="mailto:' . $mail . '">' . $this->t('Send session proposal') . '</a>';
    $markup = "<p>$text</p><p>$button</p>";
    return [
      '#type' => 'markup',
      '#markup' => $markup,
    ];
  }

}
