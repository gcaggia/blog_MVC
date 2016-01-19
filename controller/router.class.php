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

                //Call Post controller to get specific post
                if($_GET['action'] == 'post') {
                    $idpost = intval($this->getParameter($_GET, "id"));
                    if ($idpost != 0) {
                        $this->ctrlPost->post($idpost);
                    } else {
                        throw new Exception("ID post is not valid");
                    }
                }
                //Call Comment controller in order to save a comment
                else if($_GET['action'] == 'comment') {
                    $author  = $this->getParameter($_POST, "author");
                    $content = $this->getParameter($_POST, "content");
                    $idPost  = $this->getParameter($_POST, "idpost");
                    $this->ctrlPost->comment($author, $content, $idPost);
                }

                else {
                    throw new Exception("Not valid action");
                }
            }

            // No action GET variable, so it's the default page
            else {
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

    private function getParameter($tab, $name)
    {
        if(isset($tab[$name])) {
            return $tab[$name];
        } else {
            throw new Exception("Parameter " . $name . " is missing.");
        }
    }
}