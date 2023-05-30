<?php
use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', [
    'year' => null,
    '_controller' => 'Crimsoncircle\Controller\LeapYearController::index',
]));
$routes->add('blog', new Routing\Route('/blog', [
    '_controller' => 'Crimsoncircle\Controller\BlogController::create',
]));
$routes->add('optionsAPI', new Routing\Route('/blog/{slug}', [
    'slug' => null,
    '_controller' => 'Crimsoncircle\Controller\BlogController::optionsAPI',
]));

$routes->add('comment', new Routing\Route('/comment', [
    '_controller' => 'Crimsoncircle\Controller\CommentController::create',
]));

$routes->add('APIComments', new Routing\Route('/commet/{id}', [
    'id' => null,
    '_controller' => 'Crimsoncircle\Controller\CommentController::optionsAPI',
]));

$routes->add('listPosts', new Routing\Route('/comment/post/{id}', [
    'id' => null,
    '_controller' => 'Crimsoncircle\Controller\CommentController::commentsByPost',
]));

$routes->add('author', new Routing\Route('/author', [
    '_controller' => 'Crimsoncircle\Controller\AuthorController::create',
]));

$routes->add('listAuthor', new Routing\Route('/authors', [
    '_controller' => 'Crimsoncircle\Controller\AuthorController::getAuthors',
]));

return $routes;

