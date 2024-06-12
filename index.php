<?php

$request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : null;
$folder =  '/';
$viewDir = '/php/';
$request_uri = str_replace($folder, '', $request_uri);

if ($request_uri === '/' || $request_uri === '' || $request_uri === 'index.php' || $request_uri === 'index.html' || $request_uri === 'index' || $request_uri === 'home' || $request_uri === 'homepage' || strpos($request_uri, 'home') !== false ) {
	
	$route = 'index.php';
	
} elseif ($request_uri === 'blog/' || $request_uri === 'blog') {
	
	$route = 'blog.php';
	
} elseif (strpos($request_uri, 'admin?') !== false || $request_uri === 'admin/' || $request_uri === 'admin') {
	
	$route = 'admin.php';

} elseif ($request_uri === 'about/' || $request_uri === 'about') {
	$route = 'about.php';
	
} elseif (strpos($request_uri, 'viewer?') !== false || $request_uri === 'viewer/' || $request_uri === 'viewer') {
    $route = 'viewer.php';
} elseif (strpos($request_uri, 'load?') !== false || $request_uri === 'load/' || $request_uri === 'load') {
    $route = 'load.php';
} elseif (strpos($request_uri, 'logout?') !== false || $request_uri === 'logout/' || $request_uri === 'logout') {
    $route = 'logout.php';
} else {
	http_response_code(404);
	$route = '404.php';
	
}
require __DIR__ . $viewDir . $route;

?>