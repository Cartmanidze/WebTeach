<?php
return array(
    'test/([0-9]+)/([0-9])+/page-([0-9]+)'=>'test/view/$1/$2/$3',
    'test/([0-9]+)/page-([0-9]+)'=>'test/view/$1/$2',
    'test'=>'test/index',
    'catalog'=>'catalog/index',
    'category/([0-9]+)/page-([0-9]+)'=>'catalog/category/$1/$2',//actionCategory в CatalogController
    'category/([0-9]+)'=>'catalog/category/$1',
    'user/login'=>'user/login',// actionLogin в UserController
    'user/register'=>'user/register',
    ''=>'site/index');