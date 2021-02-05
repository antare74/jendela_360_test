<?php

namespace App\Http\Controllers\Admin\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Products\InputProduct;
use App\Http\Requests\Invoices\InputInvoices;
use App\Repositories\Invoices\InvoicesRepository;
use App\Repositories\Products\ProductsRepository;

class DashboardController extends Controller
{

    protected $productsRepository;
    protected $invoicesRepository;
    public function __construct()
    {
        $this->productsRepository = new ProductsRepository();
        $this->invoicesRepository = new InvoicesRepository();
    }

    public function indexDashboard(Request $request){
        $productFilter = $request->only('name', 'price', 'stock');
//        $invoiceFilter = $request->only();
        $products = $this->productsRepository->getProducts($productFilter);
        return view('pages.admin.dashboard', compact('products'));
    }

    public function inputProduct(InputProduct $request, $id = null){
        $filter = $request->only('name', 'price', 'stock', 'id');
        $inputProduct = $this->productsRepository->inputProduct($filter, $id);
        if (!$inputProduct['status']){
            mySession($inputProduct['status'], $inputProduct['message']);
        }
        return back();
    }

    public function deleteProduct($id = null){
        $inputProduct = $this->productsRepository->deleteProduct($id);
        if (!$inputProduct['status']){
            mySession($inputProduct['status'], $inputProduct['message']);
        }
        return back();
    }

    public function deleteInvoice($id = null){
        $deleteInvoice = $this->invoicesRepository->deleteInvoice($id);
        if (!$deleteInvoice['status']){
            mySession($deleteInvoice['status'], $deleteInvoice['message']);
        }
        return back();
    }

    public function inputInvoice(InputInvoices $request, $id = null){
        $filter = $request->only('name', 'email', 'products_id', 'phone');
        $inputInvoice = $this->invoicesRepository->inputInvoice($filter, $id);
        if (!$inputInvoice['status']){
            mySession($inputInvoice['status'], $inputInvoice['message']);
        }
        return back();
    }

    public function editInvoice($id = null){
        $invoice = $this->invoicesRepository->findInvoiceById($id);
        if (!$invoice){
            mySession('invoice not fount');
            return back();
        }
        $products = $this->productsRepository->getProducts();
        return view('pages.admin.edit-invoice', compact('invoice', 'products'));
    }

    public function editProduct($id = null){
        $products = $this->productsRepository->findProductsById($id);
        if (!$products){
            mySession('product not fount');
            return back();
        }
        return view('pages.admin.edit-product', compact( 'products'));
    }
}
