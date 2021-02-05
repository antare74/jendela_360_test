<?php
namespace App\Repositories\Products;

use App\Models\Products\Products;

class ProductsRepository{

    public function inputProduct($filter, $id = null){
        try {
            /* init for add products */
            $products   = new Products();
            $message    = 'success to add product';
            if ($id){
                /* check if product exist */
                $findProduct = $this->findProductsById($id);
                if ($findProduct){
                    $products = $this->findProductsById($id);
                    $message    = 'success to update product';
                }
            }
            $products->name     = $filter['name'];
            $products->price    = $filter['price'];
            $products->stock    = $filter['stock'];
            $products->save();
            return myResponse($message, true);
        }catch (\Exception $e){
            /* we need log $e to monitoring store product */
            return myResponse('sorry, cannot add new product at this time');
        }
    }

    public function deleteProduct($id){
        try {
            /* check product id field */
            if (!$id){
                return myResponse('product id is required');
            }
            /* find product by id */
            $findProduct = $this->findProductsById($id);
            if (!$findProduct){
                return myResponse('product is not found');
            }
            /* delete product */
            $findProduct->delete();
            return myResponse(' delete product successfully');
        }catch (\Exception $e){
            /* need log delete product to monitoring delete product method */
            return myResponse('sorry, cannot delete product at this time');
        }
    }

    public function findProductsById($id){
        return Products::with([])
            ->find($id);
    }

    public function getProducts($filter = []){
        return Products::with(['invoices'])
        ->get();
    }
}