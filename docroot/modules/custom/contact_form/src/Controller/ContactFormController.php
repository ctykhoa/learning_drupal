<?php
/**
 * @file
 * Contains \Drupal\contact_form\Controller\HelloController.
 */

namespace Drupal\contact_form\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ContactFormController
{
  public function content()
  {
    return [
      '#theme' => 'contact-form',
      '#vars' => [],
      '#attached' => [
        'library' => [
          'contact_form/contactjs',
        ],
      ],
      '#cache' => ['max-age' => 0],
    ];

  }

  public function showResult(Request $request)
  {
    $name = $_GET['user_full_name'];
    $email = $_GET['user_email'];

    return [
      '#theme' => 'user-info',
      '#vars' => [],
      '#attached' => [
        'library' => [
          'contact_form/contactjs',
        ],
      ],
      '#name' => $name,
      '#email' => $email,
      '#cache' => ['max-age' => 0],
    ];


  }

  public function handleUserData(Request $request)
  {
    return new JsonResponse(['req' => 'Khoa']);
  }
}
