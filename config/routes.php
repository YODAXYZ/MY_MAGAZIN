<?php
    return array(
        'product/([0-9]+)' => 'product/view/$1', // actionView в ProductController

        'catalog'=>'catalog/index',


        'category/([0-9]+)' => 'catalog/category/$1',

        'user/reqister' => 'user/register',
        'user/login' => 'user/login',
        'user/logout'=>'user/logout',

        'cabinet/edit' => 'cabinet/edit',
        'cabinet' => 'cabinet/index',

        '' => 'site/index'
    );
?>