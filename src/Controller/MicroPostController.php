<?php

namespace App\Controller;

use App\Entity\MicroPost;
use App\Repository\MicroPostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MicroPostController extends AbstractController
{
    #[Route('/micro/post', name: 'app_micro_post')]
    public function index(MicroPostRepository $posts): Response
    {
        // dd($posts->findAll());
        // dd($posts->find(1));
        // dd($posts->findOneBy(['title'=>'welcome EN']));
        // dd($posts->findBy(['title'=>'welcome EN']));

        // $microPost = new MicroPost();
        // $microPost->setTitle('welcome from controller');
        // $microPost->setCreated(new \DateTime);
        // $posts->save( $microPost,true);

        // $microPost = $posts->find(4);
        // $microPost->setTitle('welcome from controller updated');
        // $posts->save( $microPost,true);

        // $microPost = $posts->find(4);
        //  $posts->remove( $microPost,true);


        return $this->render('micro_post/index.html.twig', [
            'posts' => $posts->findAll()
        ]);
    }

    #[Route('/micro/post/{post}', name: 'app_micro_post_show')]
    public function showOne(MicroPost $post):Response
    {
        return $this->render('micro_post/show.html.twig', [
            'post' => $post
        ]);
    }
}