<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{

    public function __construct(private readonly EntityManagerInterface $em){}


    #[Route('/boutique', name: 'shop_index')]
    public function index(): Response
    {
        $products = $this->em->getRepository(Product::class)->findAll();
        return $this->render('product/index.html.twig', compact('products'));
    }
}
