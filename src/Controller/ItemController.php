<?php

namespace App\Controller;

use App\Entity\Item;
use App\Form\ItemType;
use App\Repository\ItemRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/item")
 */
class ItemController extends AbstractController
{
    /**
     * @Route("/", name="app_item_index", methods={"GET"})
     */
    public function index(ItemRepository $itemRepository): Response
    {
        return $this->render('item/index.html.twig', [
            'items' => $itemRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_item_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ItemRepository $itemRepository): Response
    {
        $this->denyAccessUnlessGranted("ROLE_USER");

        $item = new Item();
        $form = $this->createForm(ItemType::class, $item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $item->setPublished(new DateTime('now'));
            $itemRepository->add($item);
            $this->addFlash("success", "Félicitations ! Votre annonce \"" . $item->getTitle() . "\" a bien été publiée !");
            return $this->redirectToRoute('app_front', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('item/new.html.twig', [
            'item' => $item,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_item_show", methods={"GET"})
     */
    public function show(Item $item): Response
    {
        return $this->render('item/show.html.twig', [
            'item' => $item,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_item_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Item $item, ItemRepository $itemRepository): Response
    {
        $this->denyAccessUnlessGranted("ITEM_EDIT", $item);

        $form = $this->createForm(ItemType::class, $item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $itemRepository->add($item);
            $this->addFlash("success", "Félicitations ! Votre annonce \"" . $item->getTitle() . "\" a bien été modifiée !");
            return $this->redirectToRoute('app_front', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('item/edit.html.twig', [
            'item' => $item,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_item_delete", methods={"POST"})
     */
    public function delete(Request $request, Item $item, ItemRepository $itemRepository): Response
    {
        $this->denyAccessUnlessGranted("ITEM_DELETE", $item);

        if ($this->isCsrfTokenValid('delete'.$item->getId(), $request->request->get('_token'))) {
            $this->addFlash("success", "Votre annonce \"" . $item->getTitle() . "\" a bien été supprimée !");
            $itemRepository->remove($item);
        }

        return $this->redirectToRoute('app_front', [], Response::HTTP_SEE_OTHER);
    }
}
