<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'app_category')]
    public function index(categoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findBy([],['name' => 'ASC']);
        return $this->render('category/index.html.twig', [
            'categories' => $categories,
        ]);
    }
}
