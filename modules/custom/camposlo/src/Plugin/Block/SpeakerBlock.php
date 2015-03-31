<?php

/**
 * @file
 * Contains Drupal\camposlo\Plugin\Block\SpeakerBlock.
 */

namespace Drupal\camposlo\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'SpeakerBlock' block.
 *
 * @Block(
 *  id = "speaker_block",
 *  admin_label = @Translation("Featured speakers"),
 * )
 */
class SpeakerBlock extends BlockBase {


  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = array();

    // Find all nodes of the type featured_speaker.
    $rows = db_query('SELECT * FROM {node} n WHERE n.type=:type', array(
      ':type' => 'featured_speaker',
    ));
    $has_output = FALSE;
    $output = '<div class="row">';
    foreach ($rows as $row) {
      $featured_node = node_load($row->nid);
      $sessions = $featured_node->get('field_session')->getValue();
      foreach ($sessions as $session) {
        $session_node = node_load($session['target_id']);
        $nid = $session['target_id'];
        // Find the user that owns this node.
        $session_user = $session_node->getOwner();
        $user_name_value = $session_user->get('name')->getValue();
        $user_name = $user_name_value[0]['value'];
        $user_uid_value = $session_user->get('uid')->getValue();
        $uid = $user_uid_value[0]['value'];
        // Of course, we should check if the user has a picture. And basically
        // every other kinds of values here. But since we are the ones creating
        // the featured speakers nodes anyway, we will instead make sure that
        // they are actually populated in a presentable way.
        $picture_value = $session_user->get('user_picture')->getValue();
        $file = file_load($picture_value[0]['target_id']);
        $uri = $file->get('uri')->getValue();
        $img_vars = array(
          '#theme' => 'image_style',
          '#uri' => $uri[0]['value'],
          '#style_name' => 'original',
        );
        $img_output = drupal_render($img_vars);
        $has_output = TRUE;
      }
      // Make it into some output.
      // @todo Use theme hooks instead of this hacky stuff.
      $output .= '<div class="speaker-list-item col-md-3 col-xs-6">
                    <div class="speaker-wrap">
                      <div class="speaker-inner">
                        <div class="image-wrap">' .
                          $img_output . '
                        </div>
                        <div class="active-wrapper">
                          <div class="text-wrapper">
                            <div class="text-inner">
                              <a class="btn left btn-primary" href="/node/' . $nid . '">' . $this->t('View session') . '</a>
                              <a class="right btn btn-primary" href="/user/' . $uid . '">' . $this->t('View speaker') . '</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="speaker-caption"><h4>' . $user_name . '</h4>
                      </div>
                    </div>
                  </div>';

    }
    $output .= '</div>';
    if (!$has_output) {
      return FALSE;
    }

    return array(
      '#markup' => $output,
    );
  }

}
