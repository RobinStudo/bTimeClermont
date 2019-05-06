<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Service\EventService;

class EventController extends AbstractController
{
    private $eventService;

    public function __construct( EventService $eventService ){
        $this->eventService = $eventService;
    }

    /**
     * @Route("/events", name="event_list")
     */
    public function list(){
        return $this->render( 'event/list.html.twig', array(
            'events' => $this->eventService->getAll(),
        ));
    }

    /**
     * @Route("/event/add", name="event_add")
     */
    public function add(){
        return new Response('Event Add');
    }

    /**
     * @Route("/event/{id}", name="event_show",
     *     requirements = { "id" = "\d+" }
     * )
     */
    public function show( $id ){
        return $this->render( 'event/show.html.twig', array(
            'event' => $this->eventService->get( $id ),
        ));
    }

    /**
     * @Route("/event/{id}/join", name="event_join",
     *     requirements = { "id" = "\d+" }
     * )
     */
    public function join( $id ){
        return new Response('Event join : ' . $id );
    }
}
