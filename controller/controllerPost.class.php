<?php

require_once 'framework/controller.class.php';
require_once 'model/modelPost.class.php';
require_once 'model/modelComment.class.php';


class controllerPost extends Controller
{
    private $modelPost;
    private $modelComment;

    /**
     * Class Constructor
     */
    public function __construct()
    {
        $this->modelPost    = new ModelPost();
        $this->modelComment = new ModelComment();
    }

    /**
     * Print out a specific post 
     */
    public function index()
    {
        //ctrlRequest attribute is in the mother Class controller
        $idpost = $this->ctrlRequest->requestGetParam("id");
        $post    = $this->modelPost->getSpecificPost($idpost);
        $comment = $this->modelComment->getComments($idpost);

        $this->ctrlGenerateView(array('post' => $post, 'comments' => $comment));
    }

    /**
     * This function add a commont to a post
     */
    public function comment()
    {   

        $author  = $this->ctrlRequest->requestGetParam("author");
        $content = $this->ctrlRequest->requestGetParam("content");
        $idPost  = $this->ctrlRequest->requestGetParam("idpost");

        //Data saving
        $this->modelComment->addComment($author, $content, $idPost);

        //Updating of the view
        $this->ctrlExecuteAction("index");
    }
}