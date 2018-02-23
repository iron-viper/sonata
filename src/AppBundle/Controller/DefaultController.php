<?php

namespace AppBundle\Controller;


use AppBundle\Component\Client;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/test", name="test")
     */
    public function testAction()
    {
        $client = new Client();
        $crawler = $client->request('GET', 'https://github.com/login');

// select the form and fill in some values
        $form = $crawler->selectButton('Log in')->form();
        $form['login'] = 'symfonyfan';
        $form['password'] = 'anypass';

// To upload a file, the value should be the absolute file path
        $form['file'] = __FILE__;

// submit that form
        $crawler = $client->submit($form);


        return new Request("123");

    }
}
