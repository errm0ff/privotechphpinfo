<?php
require_once 'Router.php';

$router = new Router('/'); // Adjust base path as needed

// Define your routes
$router->addRoute('/', 'home.php', 'GET');
$router->addRoute('/home', 'homepage.php', 'GET');
$router->addRoute('/about', 'aboutus.php', 'GET');
$router->addRoute('/web-design-options', 'webdesign.php', 'GET');
$router->addRoute('/lite-package', 'litepackage.php', 'GET');
$router->addRoute('/pro-package', 'propackage.php', 'GET');
$router->addRoute('/ready-made', 'readymade.php', 'GET');
$router->addRoute('/micro-package', 'micropackage.php', 'GET');
$router->addRoute('/logo-design', 'logodesign.php', 'GET');
$router->addRoute('/seo-services', 'seo.php', 'GET');
$router->addRoute('/cms-systems', 'cms.php', 'GET');
$router->addRoute('/our-grojects', 'ourgrojects.php', 'GET');
$router->addRoute('/frequently-asked-questions', 'faq.php', 'GET');
$router->addRoute('/terms-and-conditions', 'termscond.php', 'GET');
$router->addRoute('/contact', 'contact-us.php', 'GET');
$router->addRoute('/error404', '404errorpage.php', 'GET');

// Handle the request
$router->handleRequest();
?>