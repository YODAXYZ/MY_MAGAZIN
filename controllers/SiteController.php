<?php
    include_once ROOT . '/models/Category.php';
    include_once ROOT . '/models/Product.php';
    class SiteController
    {
        function actionIndex()
        {
            $categories = Category::getCategoriesList();

            $latesProduct = Product::getLatestProducts(3);

            require_once (ROOT . '/views/site/index.php');

            return true;
        }

    }
