<?php
class Router{
    private $routes;
    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include ($routesPath);

    }
    // This method return request string
    private function getURI()
    {
        if(!empty($_SERVER['REQUEST_URI']))
        {
            return trim($_SERVER['REQUEST_URI'],'/');
        }
    }
    public function run()
    {
        //Get string request
         $uri =  $this->getURI();
        // Check request in routes.php
        foreach ($this->routes as $uriPattern=>$path)
        {
            //If there are coincidences which controller and action process request
            if(preg_match("~$uriPattern~",$uri))
            {
                $internalRoute = preg_replace("~$uriPattern~",$path,$uri);//$path-replacement,$uri-string
                $segments = explode('/',$internalRoute);
                $controllerName = ucfirst(array_shift($segments). 'Controller' );
                $actionName = 'action' . ucfirst(array_shift($segments));
                $parameters = $segments;


                //Include file class-controller
                $controllersFile  = ROOT.'/controllers/'.$controllerName.'.php';
                if(file_exists($controllersFile))
                {
                    include_once($controllersFile) ;
                }
                // Create object, call method
                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject,$actionName),$parameters);
                if($result!=false)
                {
                    break;
                }
            }
        }


    }

}
