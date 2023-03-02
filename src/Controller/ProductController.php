<?php

namespace MyApp\Controller;

use MyApp\Entity\Product;
use MyApp\Entity\Category;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'create_product')]
    public function createProduct(ManagerRegistry $doctrine): JsonResponse
    {
        $category = new Category();
        $category->setName("Computer Peripherals");

        $product = new Product();
        $product->setName("Keyboard");
        $product->setPrice(1000);
        $product->setDecription("A description");
        $product->setCategory($category);

        $entityManager = $doctrine->getManager();
        $entityManager->persist($product);
        $entityManager->persist($category);
        $entityManager->flush();

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => "src/Controller/ProductController.php",
        ]);
    }

    #[Route('/product/{id}', name: 'product_show')]
    public function show(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $product = $entityManager->getRepository(Product::class)->find(3);

        $category = $entityManager->getRepository(Category::class)->find(1);
        $category->addProduct($product);

        $entityManager->flush();

        return $this->json($product);
    }

    #[Route('/product/edit/{id}', name: 'product_edit')]
    public function update(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);

        $entityManager->remove($product);
        $entityManager->flush();

        return $this->json($product);
    }
}
