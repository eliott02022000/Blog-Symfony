<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BlogPostRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(BlogPostRepository $blogPostRepository)
    {
        return $this->render('home/index.html.twig', [
            'tasks' => $blogPostRepository->findAll(),
            'controller_name' => 'HomeController',
        ]);
    }

}
