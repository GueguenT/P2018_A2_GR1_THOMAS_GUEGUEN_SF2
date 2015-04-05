<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Core\User\User;

/**
 * Class ApiController
 *
 * @package AppBundle\Controller
 *
 * @Route("/api")
 */
class UserController extends Controller
{
    /**
     * @Route("/user/{id}", name="api_User", defaults={"id"=null}, requirements={"id"="\d+"})
     */
    public function userAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var UserRepository('AppBundle:User') */
        $repo = $em->getRepository('AppBundle:User');
        $user = $repo->findApi($id);

        return new JsonResponse($user);
    }
}