<?php
require __DIR__ . '/../../require.php';

$html = '<!doctype html>
<html lang="en">
<head>
  <include file="views/includes/head">
  <title>Home</title>
</head>
<body>
<!--* 
   Welcome to the Shesh framework!
   
   Shesh is a simple mvc framework that has multiple custom elements, created with regexes and php.
   It also uses doctrine dbal and ORM.
 *-->
</body>
</html>';

$pageFilter = new \Elements\PageFilter($html);
echo $pageFilter->filter();

