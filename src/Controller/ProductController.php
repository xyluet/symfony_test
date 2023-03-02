<?php

namespace MyApp\Controller;

use Doctrine\Persistence\ManagerRegistry;
use MyApp\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'create_product')]
    public function createProduct(ManagerRegistry $doctrine): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $product = new Product();
        $product->setName("Keyboard");
        $product->setPrice(1000);
        $product->setDecription("A description");

        $entityManager->persist($product);
        $entityManager->flush();

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => "src/Controller/ProductController.php",
        ]);
    }
}
