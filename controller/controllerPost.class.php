<?php

require_once 'model/modelPost.class.php';
require_once 'model/modelComment.class.php';
require_once 'view/view.class.php';

class controllerPost
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

    public function post($idpost)
    {
        $post    = $this->modelPost->getSpecificPost($idpost);
        $comment = $this->modelComment->getComments($idpost);
        $view    = new view('viewPost');
        $view->generate(array('post' => $post, 'comments' => $comment));
    }

    /**
     * This function add a commont to a post
     */
    public function comment($author, $content, $idPost)
    {
        //Data saving
        $this->modelComment->addComment($author, $content, $idPost);

        //Updating of the view
        $this->post($idPost);
    }
}