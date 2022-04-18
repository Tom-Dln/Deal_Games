<?php

namespace App\Controller;

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
        $items = $itemRepository->findAllByOrderPublished();
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
}
