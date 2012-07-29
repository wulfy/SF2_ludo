<?php
/**

**/

namespace Ludo\Testbundle\testRoutingController;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class testRoutingController extends Controller
{
	/**
     * @Route("/", name="index")
     * @Template()
     */
    public function indexAction()
    {
		$response = $this->forward('LudoTestBundle:Welcome:fancy', array('name' => "ludo", 'color' => 'green'));
		return new Response("hello");
        //return array();
    }
	
		/**
     * @Route("/second/", name="index2")
     * @Template()
     */
    public function secondAction()
    {
		return array('name' => "hello",'color' => "red");
    }
	
	/**
     * @Route("/third/", name="index3")
     * 
     */
    public function thirdAction()
    {
		$data = array("name"=>"hello moto","color"=>"orange");
		//LudoTestBundle::ludo.html.twig
		//
		return $this->render('LudoTestBundle:testrouting:second.html.twig',$data);
    }
	
}

