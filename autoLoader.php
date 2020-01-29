<?php

spl_autoload_register(function($class) {
    
    // get the differece in folders between the location of autoloader 
    // and the file that called autoloader
    $lastdirectories = subtstr(getcwd(), strlen(__DIR__));
    
    echo 'getcwd = : ' . getcwd() . '<br>';
    echo '__DIR__ = : ' . __DIR__ . '<br>';
    echo 'last directories = : ' . $lastdirectories . '<br>';
    
    // count the number of slashes (folder depth)
    $numberoflastdirectirores = substr_count($lastdirectories, '/');
    
    echo 'number of directries different: ' . $numberoflastdirectirores . '<br>';
    
    // this is the list of possible locations that classes are found in this app
    $directories = ['businessService', 'businessService/model', 'database', 
        'presentation', 'presentation/handlers', 'presentation/views', 'utility'];
    
    // look inside each directory for the desired class
    foreach($directories as $d) {
        echo 'looking in directory ' . $d . '<b>';
        $currentdirectory = $d;
        for ($x = 0; $x < $numberoflastdirectirores; $x++) {
            $currentdirectory = "../" . $currentdirectory;
        }
        $classfile = $currentdirectory . '/' . $class . 'php';
        
        echo 'going to checi if ' . $classfile . ' is readable<br>';
        if (is_readable($classfile)) {
            if (require $d . '/' .$class . '.php') {
                break;
            }
        } else {
            echo $classfile . 'was NOT readable<br>';
        }
    }
});