<?php


namespace Estrutura\Controller;


use Estrutura\Configuration\RouterDefine;

class RouterController
{
    private $baseController;

    public function __construct()
    {
        $this->baseController = new BaseController();
        $this->run();
    }

    private function run(){
        $request = $_REQUEST;
        $router = false;
        if(isset($request['router'])){
            $router = "/".$request['router'];
        }else{
            if(isset($_SERVER["REDIRECT_URL"])){
                $router = $_SERVER["REDIRECT_URL"];
            }
        }
        $action = false;
        if(isset($request['action'])){
            $action = $request['action'];
        }
        if(empty($router)){
            $router = "/index";
        }
        $routerDefine = new RouterDefine();
        $found = $routerDefine->getRouter($router);
        if($found){
            if($found['privilegio'] == RouterDefine::ADMIN_USER){
                if(!$this->getBaseController()->getUserSession()){
                    ContainerController::pageAcessoNegado();
                    die;
                }
            }
            $found = explode('.', $found['control']);
            $controller = ContainerController::newController($found[0]);
            if($action){
                $controller->{$action}();
            }else{
                $controller->{$found[1]}();
            }
        }else{
            ContainerController::pageNotFound();
        }
    }

    /**
     * @return BaseController
     */
    public function getBaseController()
    {
        return $this->baseController;
    }

    /**
     * @param BaseController $baseController
     */
    public function setBaseController($baseController)
    {
        $this->baseController = $baseController;
    }

}