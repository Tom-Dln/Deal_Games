<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\ItemRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="app_front")
     */
    public function index(ItemRepository $itemRepository, Request $request, PaginatorInterface $paginatorInterface): Response
    {
        $items = $itemRepository->findAllItemsOrderByPublished();
        dump($items);
        $items = $paginatorInterface->paginate(
            $items, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            6 /*limit per page*/
        );

        return $this->render('front/index.html.twig', [
            'items' => $items,
        ]);
    }
    /**
     * @Route("/categorie/{title}", name="app_category")
     */
    public function category(Category $category, ItemRepository $itemRepository, CategoryRepository $categoryRepository, Request $request, PaginatorInterface $paginatorInterface, ?string $param): Response
    {
        // $category = $categoryRepository->findBy(['title' => $param]);

        // dd($category);

        $items = $itemRepository->findItemsByCategoryOrderByPublished($category->getTitle());
        $items = $paginatorInterface->paginate(
            $items, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            6 /*limit per page*/
        );

        // dd($items);

        return $this->render('front/index.html.twig', [
            'items' => $items,
        ]);
    }
}
