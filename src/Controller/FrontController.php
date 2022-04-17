<?php

namespace App\Controller;

use App\Repository\ItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="app_front")
     */
    public function index(ItemRepository $itemRepository): Response
    {
        $items = $itemRepository->findAll();
        dump($items);

        return $this->render('front/index.html.twig', [
            'items' => $items,
        ]);
    }
}
