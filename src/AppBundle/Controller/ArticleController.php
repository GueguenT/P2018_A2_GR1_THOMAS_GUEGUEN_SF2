<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class ApiController
 *
 * @package AppBundle\Controller
 *
 * @Route("/api")
 */
class ArticleController extends Controller
{
    /**
     * @Route("/article/{id}", name="api_Article", defaults={"id"=null}, requirements={"id"="\d+"})
     */
    public function articleAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var ArticleRepository('AppBundle:Article') */
        $repo = $em->getRepository('AppBundle:Article');
        $article = $repo->findApi($id);

        return new JsonResponse($article);
    }
}