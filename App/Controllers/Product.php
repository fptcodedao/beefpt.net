<?php 
namespace App\Controllers;

use \Core\View;
use \App\Models\All;

/**
 * Product Controllers
 */
class Product extends \Core\Controller
{
	
	public function indexAction()
	{
		$product = All::getProduct();
		View::renderTemplate('Product/index.html',[
			'products' => $product
		]);
	}
	public function showAction()
	{
		$id = $this->route_params['id'];
		/**
		 * @param int Id San Pham
		 * @return Array Product
		 */
		$product = All::getProduct($id);
		$product = $product[0];

		$slide = All::Imgproduct($id);
		array_push($slide, [
			'url' => $product['images'],
			'alt' => $product['name']
		]);
		// var_dump($slide);
		/**
		 * View Product
		 */
		View::renderTemplate('Product/show.html',[
			'title' => $product['name'],
			'images' => $product['images'],
			'short_desc' => $product['short_desc'],
			'detail' => $product['detail'],
			'oil_price' => $product['oil_price'],
			'sell_price' => $product['sell_price'],
			'in_stock' => $product['in_stock'],
			'namcate' => $product['namcate'],
			'star' => $product['star'],
			'slide' => $slide
		]);
	}
	public static function ascAction()
	{
		$product = All::getProduct(false, 'asc');
		View::renderTemplate('Product/index.html',[
			'products' => $product
		]);
	}
	public static function pricedAction()
	{
		$product = All::getProduct(false, 'descmoney');
		View::renderTemplate('Product/index.html',[
			'products' => $product
		]);
	}
	public static function priceaAction()
	{
		$product = All::getProduct(false, 'ascmoney');
		View::renderTemplate('Product/index.html',[
			'products' => $product
		]);
	}
}
?>