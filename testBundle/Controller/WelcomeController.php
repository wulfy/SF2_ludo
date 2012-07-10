<?php

namespace Ludo\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WelcomeController extends Controller
{
    public function indexAction()
    {
        /*
         * The action's view can be rendered using render() method
         * or @Template annotation as demonstrated in DemoController.
         *
         */
        return $this->render('AcmeDemoBundle:Welcome:index.html.twig');
    }
	
	public function fancyAction()
	{
		$request = $this->getRequest();
		
		$name = $request->get("name");
		$color = $request->get("color");
		$data = array("name"=>$name,"color"=>$color);
		return $this->render('LudoTestBundle:Welcome:welcome.html.twig',$data);
	}
}
