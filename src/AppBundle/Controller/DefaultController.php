<?php

namespace AppBundle\Controller;

use AppBundle\Admin\ArticleAdmin;
use AppBundle\Entity\Article;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="article")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $article = $em->getRepository('AppBundle:Article')->findAll();

        return $this->render('AppBundle:Article:index.html.twig', [
            'article' => $article,
        ]);
    }


    /**
     * @Route("/article/{id}", name="article_id")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('AppBundle:Article')->findOneById($id);

        return $this->render('AppBundle:Article:show.html.twig', [
            'article' => $article,
        ]);
    }


}
