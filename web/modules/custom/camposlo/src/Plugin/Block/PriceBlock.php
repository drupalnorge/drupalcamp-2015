<?php

/**
 * @file
 * Contains Drupal\camposlo\Plugin\Block\PriceBlock.
 */

namespace Drupal\camposlo\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'PriceBlock' block.
 *
 * @Block(
 *  id = "price_block",
 *  admin_label = @Translation("price_block"),
 * )
 */
class PriceBlock extends BlockBase {


  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $prices = [
      'memberplus' => [
        'price' => 400,
        'text' => $this->t('Camp + membership'),
      ],
      'notmember' => [
        'price' => 300,
        'text' => $this->t('Non-member price'),
      ],
      'member' => [
        'price' => 200,
        'text' => $this->t('Member price'),
      ],
    ];
    $build['price_block'] = [
      '#prices' => $prices,
      '#theme' => 'camposlo-price-block',
    ];

    return $build;
  }

}
