<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;

class SiteController extends AbstractController
{

    private $categorieRepo;

    function __construct(CategoryRepository $categorieRepo)
    {
        $this->categorieRepo = $categorieRepo;
    }
    /**
     * @Route("/", name="app_site")
     */
    public function index(): Response
    {

        $categories = $this->categorieRepo->findAll();
        return $this->render('site/index.html.twig', [

            'categories' => $categories
        ]);
    }
}
