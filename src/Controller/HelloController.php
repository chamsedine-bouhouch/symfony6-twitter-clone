<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    private array $messages = ['Hello', 'Hi', 'Bye!'];
    #[Route('/{limit<\d+>}', name: 'app_index')]
    public function index(int $limit=null): Response
    {
        return new Response(
            implode(' , ', array_slice($this->messages, 0, $limit))
        );
    }
    #[Route('/messages/{id}', name: 'app_show_one', requirements: ['id' => '\d+'])]
    public function showOne(int $id): Response
    {
        // return new Response($this->messages[$id]);
        return $this->render('hello/show_one_html.twig', [
            'message' => $this->messages[$id]
        ]);
    }

    // avoid route collusion 
    #[Route('/messages/500', name: 'showfivehundreds', requirements: ['id' => '\d+'], priority: 2)]
    public function showfivehundreds(): Response
    {
        return new Response(500);
    }
}
