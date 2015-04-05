<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CategoryRepository;
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
class CategoryController extends Controller
{
    /**
     * @Route("/category/{id}", name="api_Category", defaults={"id"=null}, requirements={"id"="\d+"})
     */
    public function categoryAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var CategoryRepository('AppBundle:Category') */
        $repo = $em->getRepository('AppBundle:Category');
        $category = $repo->findApi($id);

        return new JsonResponse($category);
    }
}