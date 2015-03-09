<?php

/**
 * @file
 * Contains Drupal\camposlo\Plugin\Block\AboutBlock.
 */

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
    return array(
      '#markup' => '<section id="aboutWrapper"><div class="container">
<div class="row text-center">
<div class="section-heading">
<h2 class="title"><span>Drupal Camp Oslo 2015</span></h2>

<p class="subtitle">Lær mer om Drupal. Se hvordan bedriftene gjør Drupal. Bli oppdatert på de siste trendene. Bli kjent med andre som deg!</p>
</div>
</div>
</div>
</section>',
    );
  }

}
