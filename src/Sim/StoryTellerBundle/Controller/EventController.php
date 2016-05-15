<?php

namespace Sim\StoryTellerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Event controller
 *
 * @Route("/Event")
 */
class EventController extends Controller
{

    /**
     * List Events for a story
     *
     * @return array
     * @Route("/", name="Events")
     * @Method("GET")
     */
    public function IndexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SimStoryTellerBundle:Event')->findAll();

        return array(
            'entities' => $entities,
        );
    }

}
