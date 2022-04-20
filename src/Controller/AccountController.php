<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Category;
use App\Repository\ItemRepository;
use App\Repository\CategoryRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/mon-compte")
 */
class AccountController extends AbstractController
{
    /**
     * @Route("/", name="app_account")
     */
    public function index(): Response
    {
        return $this->render('account/index.html.twig');
    }

    /**
     * @Route("/informations", name="app_account_profil")
     */
    public function show(): Response
    {
        return $this->render('account/show.html.twig');
    }

    /**
     * @Route("/informations/modifier", name="app_account_profil_edit")
     */
    public function edit(): Response
    {
        return $this->render('account/edit.html.twig', [
            'controller_name' => 'AccountController',
        ]);
    }

    /**
     * @Route("/annonces", name="app_account_items")
     */
    public function items(ItemRepository $itemRepository, CategoryRepository $categoryRepository, Request $request, PaginatorInterface $paginatorInterface, ?string $param): Response
    {
        $user = $this->getUser();
        // dd($user);
        $items = $itemRepository->findItemsByUserOrderByPublished($this->getUser());
        $items = $paginatorInterface->paginate(
            $items, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            6 /*limit per page*/
        );

        return $this->render('front/index.html.twig', [
            'items' => $items,
            'front_index_title' => 'Mes Annonces',
        ]);
    }
}
