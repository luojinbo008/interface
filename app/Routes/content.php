<?php
/**
 * Created by PhpStorm.
 * User: luojinbo
 * Date: 2016/11/23
 * Time: 10:50
 */
$controller = '\\App\\Controllers\\ContentController';
$app->get('/content/getBlogCategoryList.json', $controller . ':getBlogCategoryList');