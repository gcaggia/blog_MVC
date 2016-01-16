<?php

require 'controller/controller.php';

try {

    if (isset($_GET['action'])) {

        if($_GET['action'] == 'post') {

            if (isset($_GET['id'])) {

                $idpost = intval($_GET['id']);

                if ($idpost != 0) {
                    fct_controller_post($idpost);
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
        fct_controller_welcome();
    }

} catch(Exception $e) {
    fct_controller_error($e->getMessage());
}