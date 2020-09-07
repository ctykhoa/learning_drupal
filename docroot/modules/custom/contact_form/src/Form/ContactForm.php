<?php

namespace Drupal\contact_form\Form;

use Drupal\Core\Form\FormBase;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Contact block form
 */
class ContactForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'contact_form_id';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['full_name'] = [
      '#type' => 'textfield',
      '#attributes' => [
        'class'=> ['form-data-field']
      ],
      '#title' => 'Your full name',
      '#default_value' => 'Khoa Cao',
      '#placeholder' => 'Khoa Yen',
    ];

    // How many phrases?
    $form['email'] = [
      '#type' => 'textfield',
      '#attributes' => [
        'class'=> ['form-data-field']
      ],
      '#title' => 'Your email',
      '#default_value' => 'example@email.com',
      '#placeholder' => 'khoayen@example.com',
    ];

    // Check.
    $form['check_data'] = [
      '#type' => 'markup',
      '#attributes' => [
        'class'=> ['form-button-field'],
        'id' => 'check-data-button',
      ],
      // "#executes_submit_callback" => FALSE,
      '#markup' => '<button>CHECK</button>',
    ];

    // Submit.
    $form['submit'] = [
      '#type' => 'submit',
      '#attributes' => [
        'class'=> ['form-button-field']
      ],
      '#value' => 'Send us',
    ];
    return $form;
  }

   /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $name = $form_state->getValue('full_name');
    if (strlen($name) < 2) {
      $form_state->setErrorByName('name_error', $this->t('Please enter your full name.'));
    }
    
    $mail = $form_state->getValue('email');
    if (strpos($mail, '@') === false) {
      $form_state->setErrorByName('mail_error', $this->t('Please use a valid email.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $form_state->setRedirect('contact_form.getResult', [
      'user_full_name' => $form_state->getValue('full_name'),
      'user_email' => $form_state->getValue('email'),
    ]);

    // $this->messenger()->addStatus($this->t('Your email is @email', ['@email' => $form_state->getValue('email')]));
  }

}