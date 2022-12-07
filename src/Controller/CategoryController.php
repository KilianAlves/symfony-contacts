<?php

namespace App\Controller;

use App\Entity\Category;
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

    #[Route('/category/{id}', name: 'app_category_show', requirements: ['categoryId' => '\d+'])]
    #[ParamConverter('category', options: ['mapping' => ['id' => 'id']])]
    public function show(Category $category) {

        return $this->render('category/show.html.twig', ['category' => $category]);

    }
}
