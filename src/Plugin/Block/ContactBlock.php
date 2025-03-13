<?php
namespace Drupal\mmej_formulaire\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;
/**
 * Fournit un bloc de formulaire de contact.
 *
 * @Block(
 *   id = "contact_block",
 *   admin_label = @Translation("Bloc de formulaire de contact")
 * )
 */
class ContactBlock extends BlockBase {
  /**
   * Génère le contenu du bloc.
   */
  public function build() {
    return \Drupal::formBuilder()->getForm('Drupal\mmej_formulaire\Form\ContactForm');
  }
}
?>