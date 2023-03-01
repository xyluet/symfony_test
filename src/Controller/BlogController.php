<?php

namespace MyApp\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends AbstractController
{
  public function list(): Response
  {
    $number = random_int(0, 100);

    return new Response('<html>' . $number . '</html>');
  }
}
