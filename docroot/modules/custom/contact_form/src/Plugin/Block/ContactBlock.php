<?php

namespace Drupal\contact_form\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
* Provides a contact form block with which you can put your contact here.
 *
 * @Block(
 *   id = "contact_form_block",
 *   admin_label = @Translation("Contact form block"),
 * )
 */
class ContactBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    // Return the form @ Form/ContactBlockForm.php.
    // return 1;
    $output[]['#attached']['library'][] = 'contact_form/contactjs';
    return \Drupal::formBuilder()->getForm('Drupal\contact_form\Form\ContactForm');
  }
  
/**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account) {
    return AccessResult::allowedIfHasPermission($account, 'generate contact block');
  }

    /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {

    $form = parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    // return new JsonResponse(['req'=>'ewfergferatera']);

    $this->setConfigurationValue('loremipsum_block_settings', $form_state->getValue('user_full_name'));
  }

}