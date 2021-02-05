<?php
namespace App\Repositories\Invoices;

use App\Models\invoices\Invoices;
use App\User;
use Carbon\Carbon;

class InvoicesRepository{

    public function inputInvoice($filter, $id = null){
            try {
                /* init for add products */
                $invoice = new Invoices();
                $message = 'success to add invoice';
                if ($id){
                    /* check if product exist */
                    $findInvoice = $this->findInvoiceById($id);
                    if ($findInvoice){
                        $invoice = $this->findInvoiceById($id);
                        $message    = 'success to update invoice';
                    }
                }
                $invoice->products_id   = $filter['products_id'];
                $invoice->user_name     = $filter['name'];
                $invoice->user_email    = $filter['email'];
                $invoice->user_phone    = $filter['phone'];
                $invoice->invoice       = $invoice->generate_invoice;
                $invoice->save();
                return myResponse($message, true);
            }catch (\Exception $e){
                /* we need log $e to monitoring store product */
                return myResponse('sorry, cannot do this action at this time');
            }
    }

    public function deleteInvoice($id){
        try {
            /* check invoice id field */
            if (!$id){
                return myResponse('invoice id is required');
            }
            /* find invoice by id */
            $findInvoice = $this->findInvoiceById($id);
            if (!$findInvoice){
                return myResponse('invoice is not found');
            }
            /* delete invoice */
            $findInvoice->delete();
            return myResponse(' delete invoice successfully');
        }catch (\Exception $e){
            /* need log delete invoice to monitoring delete invoice */
            return myResponse('sorry, cannot delete invoice at this time');
        }
    }

    public function findInvoiceById($id){
        return Invoices::with([])
            ->find($id);
    }

    public function getInvoices($filter = []){
    }
}