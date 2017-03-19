<?php

/**
 * @file
 * Contains Drupal\camposlo\Plugin\Block\IntroBlock.
 */

namespace Drupal\camposlo\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'IntroBlock' block.
 *
 * @Block(
 *  id = "intro_block",
 *  admin_label = @Translation("intro_block"),
 * )
 */
class IntroBlock extends BlockBase {


  /**
   * {@inheritdoc}
   */
  public function build() {
    return array(
      '#markup' => '<section id="introWrapper"><div class="view view-about view-id-about view-display-id-block view-dom-id-2f3f04d40a8a067f2c65f5fdcf915b72">


      <div class="attachment attachment-before">
      <div class="view view-about view-id-about view-display-id-attachment_1">



      <div class="view-content">
      <!-- Intro navigation -->
<div class="intro-nav">
    <div class="container">
        <div class="row">
            <ul class="aboutintro-nav clearfix"><li class="active"><a href="#" class="intro-node">Utvikler: Noe for deg!</a></li>                                  <li class=""><a href="#" class="intro-node">De siste teknologiene</a></li>                                  <li class="active"><a href="#" class="intro-node">Drupal som salgsverktøy</a></li>                            </ul></div>
    </div>
</div>
<!-- End intro navigation -->    </div>






</div>    </div>

      <div class="view-content">
       <!-- About Intro slider -->
<div class="intro-container">
    <div id="intro-inner" class="slider">

        <ul class="flex-direction-nav"><li><a class="flex-prev" href="#"><i class="fa fa-caret-left"></i></a></li>
              <li><a class="flex-next" href="#"><i class="fa fa-caret-right"></i></a></li>
        </ul><div class="flex-viewport" style="overflow: hidden; position: relative;"></div><div class="flex-viewport" style="overflow: hidden; position: relative;"><ul class="slides" style="width: 1400%; transition-duration: 0s; -webkit-transition-duration: 0s; -webkit-transform: translate3d(-650px, 0px, 0px);"><li class="pane clone" style="width: 650px; float: left; display: block;">
    <div class="details">
        <h3 class="name"><span>Utvikler: Noe for deg!</span></h3>
        <p>I løpet av de neste månedene lanseres Drupal 8, basert på en rekke teknologier som til sammen utgjør verdens beste high-end Open Source CMS. Som utvikler kan du jobbe med ryddig kode, god struktur og versjonskontroll på en skikkelig måte. Vi påstår også at Drupal har det det beste utviklermiljøet av de store Open Source-prosjektene.</p>
    </div>
</li><li class="pane clone flex-active-slide" style="width: 650px; float: left; display: block;">
    <div class="details">
        <h3 class="name"><span>Drupal som salgsverktøy</span></h3>
        <p>En god nettside selger dine produkter og din bedrift for deg. Drupal gir deg fleksibilitet til å bygge nettstedet som passer din bedrift og dine produkter. Og ikke minst: Muligheten til å gi deg en effektiv workflow med innholdet.</p>
    </div>
</li>
                          <li class="pane" style="width: 650px; float: left; display: block;">
    <div class="details">
        <h3 class="name"><span>Utvikler: Noe for deg!</span></h3>
        <p>I løpet av de neste månedene lanseres Drupal 8, basert på en rekke teknologier som til sammen utgjør verdens beste high-end Open Source CMS. Som utvikler kan du jobbe med ryddig kode, god struktur og versjonskontroll på en skikkelig måte. Vi påstår også at Drupal har det det beste utviklermiljøet av de store Open Source-prosjektene.</p>
    </div>
</li>                          <li class="pane" style="width: 650px; float: left; display: block;">
    <div class="details">
        <h3 class="name"><span>De siste teknologiene</span></h3>
        <p>Drupal 8: HTML5, SASS/compass, dependency injection, rask theming med Twig, innebygd Web Services, ekte mobile first. Med Drupals fleksible løsninger for opprettelse av felter i Core, kategoriseringer på kryss av innholdstyper, effektiv brukerhåndtering, samt høy sikkerhet er Drupal et nøye gjennomtenkt valg for mange av verdens store bedrifter.</p>
    </div>
</li>                          <li class="pane" style="width: 650px; float: left; display: block;">
    <div class="details">
        <h3 class="name"><span>Drupal som salgsverktøy</span></h3>
        <p>En god nettside selger dine produkter og din bedrift for deg. Drupal gir deg fleksibilitet til å bygge nettstedet som passer din bedrift og dine produkter. Og ikke minst: Muligheten til å gi deg en effektiv workflow med innholdet.</p>
    </div>
</li>                    <li class="pane clone" style="width: 650px; float: left; display: block;">
    <div class="details">
        <h3 class="name"><span>Utvikler: Noe for deg!</span></h3>
        <p>I løpet av de neste månedene lanseres Drupal 8, basert på en rekke teknologier som til sammen utgjør verdens beste high-end Open Source CMS. Som utvikler kan du jobbe med ryddig kode, god struktur og versjonskontroll på en skikkelig måte. Vi påstår også at Drupal har det det beste utviklermiljøet av de store Open Source-prosjektene.</p>
    </div>
</li><li class="pane clone" style="width: 650px; float: left; display: block;">
    <div class="details">
        <h3 class="name"><span>Drupal som salgsverktøy</span></h3>
        <p>En god nettside selger dine produkter og din bedrift for deg. Drupal gir deg fleksibilitet til å bygge nettstedet som passer din bedrift og dine produkter. Og ikke minst: Muligheten til å gi deg en effektiv workflow med innholdet.</p>
    </div>
</li></ul></div></div>
</div>
<!-- End About Intro slider -->    </div>






</div>  </section>',
    );
  }

}
