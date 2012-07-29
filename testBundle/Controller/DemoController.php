<?php
/**
ensemble de tests de symfony
sert de demo, basé sur la démo officielle de symfony
**/

namespace Ludo\Testbundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Ludo\TestBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DemoController extends Controller
{
    /**
     * @Route("/", name="_demo_ludo")
     * @Template()
     */
    public function indexAction()
    {
		$response = $this->forward('LudoTestBundle:Welcome:fancy', array('name' => "ludo", 'color' => 'green'));
		return $response;
        //return array();
    }

    /**
     * @Route("/hello/{name}&{color}", name="_demo_ludo_hello")
     * @Template()
     */
    public function helloAction($name,$color)
    {
        return array('name' => $name,'color' => $color);
    }

    /**
     * @Route("/contact", name="_demo_ludo_contact")
     * @Template()
     */
    public function contactAction()
    {
        $form = $this->get('form.factory')->create(new ContactType());

        $request = $this->get('request');
        if ('POST' == $request->getMethod()) {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $mailer = $this->get('mailer');
                // .. setup a message and send it
                // http://symfony.com/doc/current/cookbook/email.html

                $this->get('session')->setFlash('notice', 'Message sent!');

                return new RedirectResponse($this->generateUrl('_demo'));
            }
        }

        return array('form' => $form->createView());
    }
	
	/**
     * @Route("/{page}", name="_demo_ludo_404")
     * @Template()
     */
    public function notFoundPageAction($page)
    {
			die("page :".$page." not found 404");
	}
	
	/**
     * @Route("/{rep}/*", name="_demo_ludo_404_rep")
     * @Template()
     */
    public function notFoundRepositoryAction($rep)
    {
			die("repository: " .$rep. " not found 404");
	}
}
