<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TagRepository;
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
class TagController extends Controller
{
    /**
     * @Route("/tag/{id}", name="api_Tag", defaults={"id"=null}, requirements={"id"="\d+"})
     */
    public function tagAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var TagRepository('AppBundle:Tag') */
        $repo = $em->getRepository('AppBundle:Tag');
        $tag = $repo->findApi($id);

        return new JsonResponse($tag);
    }
}