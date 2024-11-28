<?php

require_once 'MainController.php';
require_once 'app/model/MainModel.php';

class CategoryController extends MainController
{
    public function __construct()
    {
        parent::__construct(); // Nếu `MainController` có constructor
    }
    public static function categoryController()
    {
        $ProductModel = new ProductModel();
        $CateModel = new CategoryModel();
        $BannerModel = new BannerModel();

        // $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $id = $_GET['id'];

        //get product name

        $products = $ProductModel->getProductByCategory($id);
        $category = $CateModel->getCategoryById($id);
        $cateName = $category['cate_name'];
        $banners = $BannerModel->getBanner();
        require_once 'app/view/category.php';
    }
}
