<?php

/**
 * @file
 * Contains Drupal\camposlo\Plugin\Mail.
 */

namespace Drupal\camposlo\Plugin\Mail;

use Drupal\Core\Mail\Plugin\Mail\PhpMail;
use Drupal\Core\Mail\MailInterface;
/**
 * Defines a mail backend that captures sent messages in the state system.
 *
 * This class is for running tests or for development.
 *
 * @Mail(
 *   id = "camposlo_mandrill_override",
 *   label = @Translation("Camp Oslo Mandrill override"),
 *   description = @Translation("Try to hackily send mail through mandril instead of using php mail.")
 * )
 */
class MandrillSender extends PhpMail implements MailInterface {

  /**
   * {@inheritdoc}
   */
  public function mail(array $message) {
    try {
      require __DIR__  . '/../../../vendor/autoload.php';
      $config = \Drupal::config('camposlo');
      $api_key = $config->get('mandrill_key');
      $m = new \Mandrill($api_key);
      $message = array(
        'to' => array(
            array(
              'email' => $message['to'],
              'type' => 'to',
            )
        ),
        'headers' => array('Reply-To' => $message['reply-to']),
        'text' => $message['body'],
        'subject' => $message['subject'],
        'from_email' => $message['reply-to'],
      );
      $result = $m->messages->send($message);
      return TRUE;
    }
    catch (Exception $e) {
      \Drupal::logger('camposlo')->error('Problems with the sending through mandrill. Oh well. Life goes on');
      return FALSE;
    }
  }
}
