<?php

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

    return [
      '#theme' => 'camposlo-contact-block',
    ];
  }

}
