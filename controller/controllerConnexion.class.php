<?php 

require_once 'framework/controller';
require_once 'model/modelUser.php';

/**
* Connexion controller class used to connect an user
*/
class ControllerConnexion extends Controller
{
    private $modelUser;

    function __construct()
    {
        $this->modelUser = new ModelUser();
    }

    public function index()
    {
        $this->ctrlGenerateView();
    }

    public function login()
    {
        if ($this->ctrlRequest->requestParamExist("login") 
            && $this->ctrlRequest->requestParamExist("password")) {
            
            $login    = $this->ctrlRequest->requestGetParam("login");
            $password = $this->ctrlRequest->requestGetParam("password");

            if($this->modelUser->checkUser($login, $password)) {

               $user = $this->modelUser->getUser($login, $password);

               $this->ctrlRequest->requestGetSession()
                                 ->sessionSetAttribut("idUser", $user->idUser );
               $this->ctrlRequest->requestGetSession()
                                 ->sessionSetAttribut("login",  $user->login  );

                $this->ctrlRedirection("admin");

            } else {

                $this->ctrlGenerateView(
                    array('msgError' => 'IncorretLogin or passwor'),
                    "index"
                );
                
            }

        } else {
            throw new Exception("Error : login or password undefined...");
            
        }
    }

    public function logout()
    {
        $this->ctrlRequest->requestGetSession()->sessionDestroy();
        $this->ctrlRedirection("welcome");
    }
}
