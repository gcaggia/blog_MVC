<?php 

require 'model.php';

try {
    if (isset($_GET['id'])) {

        $idPost = intval($_GET['id']);

        if ($idPost != 0) {

            $post = getSpecificPost($idPost);
            $comments = getComments($idPost);
            require 'viewPost.php';

        } else {
            throw new Exception("Bad Post id");
        }

    } else {
        throw new Exception("No Post id");
    }
}
catch (Exception $e) {
    $msgError = $e->getMessage();
    require 'viewError.php';
}


?>