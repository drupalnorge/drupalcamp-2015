<?php

namespace Drupal\camposlo\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'AboutBlock' block.
 *
 * @Block(
 *  id = "about_block",
 *  admin_label = @Translation("about_block"),
 * )
 */
class AboutBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#markup' => '<section id="aboutWrapper"><div class="container">
<div class="row text-center">
<div class="section-heading">
<h2 class="title"><span>Drupal Camp Oslo 2015</span></h2>

<p class="subtitle">' . $this->t('Learn more about Drupal.') . ' ' .
      $this->t('See how companies are doing Drupal.') . ' ' .
      $this->t('Get updated on the latest trends.') . ' ' .
      $this->t('Meet other people like you!') . '</p>
</div>
</div>
</div>
</section>',
    ];
  }

}
