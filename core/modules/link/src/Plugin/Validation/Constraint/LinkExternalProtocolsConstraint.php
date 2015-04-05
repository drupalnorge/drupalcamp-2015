<?php

/**
 * @file
 * Contains \Drupal\link\Plugin\Validation\Constraint\LinkExternalProtocols.
 */

namespace Drupal\link\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Defines a protocol validation constraint for links to external URLs.
 *
 * @Plugin(
 *   id = "LinkExternalProtocols",
 *   label = @Translation("No dangerous external protocols", context = "Validation"),
 * )
 */
class LinkExternalProtocolsConstraint extends Constraint {

  public $message = "The path '@uri' is invalid.";

}
