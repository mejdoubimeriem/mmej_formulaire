<?php

namespace Drupal\mmej_formulaire\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Formulaire de contact personnalisé.
 */
class ContactForm extends FormBase {

  /**
   * Identifiant unique du formulaire.
   */
  public function getFormId() {
    return 'mmej_contact_form';
  }

  /**
   * Construire le formulaire.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['nom'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Nom'),
      '#required' => TRUE,
    ];

    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email'),
      '#required' => TRUE,
    ];

    $form['message'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Message'),
      '#required' => TRUE,
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Envoyer'),
    ];

    // Attacher le template personnalisé.
    $form['#theme'] = 'contact_form_template';

    // Attacher le fichier CSS.
    $form['#attached']['library'][] = 'mmej_formulaire/global-styling';

    return $form;
  }

  /**
   * Gérer la soumission du formulaire.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    \Drupal::messenger()->addMessage($this->t('Merci @name, votre message a été envoyé !', ['@name' => $form_state->getValue('nom')]));
  }

}