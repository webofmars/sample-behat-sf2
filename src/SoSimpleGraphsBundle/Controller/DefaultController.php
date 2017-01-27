<?php

namespace SoSimpleGraphsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SoSimpleGraphsBundle:Default:index.html.twig');
    }
}
