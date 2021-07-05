<?php
namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Frontend\Principal_model;
use App\Models\Frontend\Productgroup_model;
use App\Models\Frontend\Product_model;

class Product extends BaseController
{
	// Show all Brands
	public function index() {
		$data['page_title'] = 'Product - Sahabat Abadi Sejahtera';
		$principal = new Principal_model();
		$data['principal'] = $principal->showAll();
		return view('frontend/product/index',$data);
	}

	// Show all Products with default selected Category (All)
	public function brand() {
		$principal = $this->request->uri->getSegment(2);
		$data['page_title'] = 'Product - Sahabat Abadi Sejahtera';
		
		$productgroup = new Productgroup_model();
		$product = new Product_model();
		$data['productgroup'] = $productgroup->where('md_principal_id',$principal)->findAll();
		$data['product'] = $product->where('md_principal_id',$principal)->findAll();
		return view('frontend/product/brand',$data);
	}
	
	// Show all Products with specific selected Category (ex: LED)
	public function group() {
		$principal = $this->request->uri->getSegment(2);
		$productgroup = $this->request->uri->getSegment(3);
		$data['page_title'] = 'Product - Sahabat Abadi Sejahtera';
		
		$model = new Product_model();
		$data['product'] = $model->findCategory($principal,$productgroup);
		return view('frontend/product/brand',$data);
	}

	// public function getProduct() 
	// {

	// }

	//--------------------------------------------------------------------

}
