<?php
//Apache konfiguration anpassen
// nicht mehr in htdocs sondern in ein unterordner public
//assets und index.php
//design, layout in html, mit menu, navi, footer header
//autoloader
//namespaces
//index.html
//exeptions
//Datenbanken später
function myFunction(): void
{
    if (isset($_GET['foo'])) {
        echo "alles ok";
    } else {
        throw new \Exception('huhu');
    }

}


try {
    myFunction();



} catch (\Exception $exeption) {
    // todo: backup code
    echo "backup ausgeführt";
}


// https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader-meta.md
function myAutoloader($classname) {

    // todo: make this namespace compatible
    include $classname. '.php';
}

spl_autoload_register('myAutoloader');



$fizzbuzz = new FizzBuzz();

// namespace aufrug

$fizzbuzz2= \FizzBuzz\Engine();