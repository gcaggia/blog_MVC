<?php 

class View
{
    //file relative to the view
    private $file;

    //title of the view (define inside the view file with $title variable)
    private $title;

    public function __construct($action, $controller = "")
    {   
        $file = "view/";

        if ($controller != "") {
            $file .= $controller . "/";
        }

        //define the name of the view from the action
        $this->file =  $file . $action . ".php";
    }

    /**
     * Generate and print the view
     */
    public function generate($data)
    {

        // Generation of the content part for the view
        $content = $this->generateFile($this->file, $data);

        $webRoot = Configuration::get("webRoot", "/");

        // Genration of the view using the template
        $view = $this->generateFile('view/template.php', 
            array( 'title'   => $this->title, 
                   'content' => $content,
                   'webRoot' => $webRoot
                 ));

        //print the view to the browser
        echo $view;
    }

    /**
     * generate a view file and return it
     */
    private function generateFile($file, $data)
    {
        if (file_exists($file)) {

            //Transform the $data argument from an associatif array to variables
            extract($data);

            //start of output temporisation
            ob_start();

            //include the view so it's generate html code
            require $file;

            //return the output temporisation and clean it
            return ob_get_clean();

        } else {
            throw new Exception("File " . $file . " not found...");
        }
    }

    // clean a value to insert to a html page
    private function cleanValue($value) {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
    }
}