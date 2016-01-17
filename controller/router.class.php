<?php 

require_once 'controller/controllerWelcome.class.php';
require_once 'controller/controllerPost.class.php';
require_once 'view/view.class.php';

class router 
{

    private $ctrlWelcome;
    private $ctrlPost;


    /**
     * Class Constructor
     */
    public function __construct()
    {
        $this->ctrlWelcome = new controllerWelcome();
        $this->ctrlPost    = new controllerPost();
    }

    public function routerRequest()
    {
        try {
            if (isset($_GET['action'])) {

                if($_GET['action'] == 'post') {

                    if (isset($_GET['id'])) {

                        $idpost = intval($_GET['id']);

                        if ($idpost != 0) {
                            $this->ctrlPost->post($idpost);
                        } else {
                            throw new Exception("ID post is not valid");
                        }

                    } else {
                        throw new Exception("ID post is not defined");
                    }

                } else {
                    throw new Exception("Not valid action");
                }

            // No action GET variable, so it's the default page
            } else {
                $this->ctrlWelcome->welcome();
            }

        } catch(Exception $e) {
            $this->routerError($e->getMessage());
        }
    }

    private function routerError($msgError)
    {
        $view = new View("viewError");
        $view->generate(array('msgError' => $msgError));
    }
}