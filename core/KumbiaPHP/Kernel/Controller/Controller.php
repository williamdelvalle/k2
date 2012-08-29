<?php

namespace KumbiaPHP\Kernel\Controller;

use KumbiaPHP\Di\Container\ContainerInterface;
use KumbiaPHP\Kernel\Request;
use KumbiaPHP\Kernel\Response;

/**
 * Description of Controller
 *
 * @author manuel
 */
class Controller
{

    /**
     *
     * @var ContainerInterface; 
     */
    private $container;
    protected $view = 'index';
    protected $template = 'default';
    protected $limitParams = TRUE;
    protected $parameters;

    /**
     * @Service(container,$container)
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     *
     * @return object
     */
    protected function get($id)
    {
        return $this->container->get($id);
    }

    /**
     *
     * @return Request 
     */
    protected function getRequest()
    {
        return $this->container->get('request');
    }

    protected function setView($view, $template = FALSE)
    {
        $this->view = $view;
        if ($template !== FALSE) {
            $this->setTemplate($template);
        }
    }

    protected function setTemplate($template)
    {
        $this->template = $template;
    }

    protected function getView()
    {
        return $this->view;
    }

    protected function getTemplate()
    {
        return $this->template;
    }

    /**
     * Sirve para enviar al servicio de template "view" una respuesta
     * especifica con los parametros pasados a este metodo.
     * @param Response $response
     * @param array $params
     * @return type 
     */
    protected function render(Response $response, array $params = array())
    {
        //por ahora no funciona el metodo ya que es el ControllerResolver
        //quien está buscando la vista y el template, tarea que debe hacer
        //es la lib View. pendiente con esto.
        //return $this->get('view')->render($this->template, $this->view, $params);
    }

}