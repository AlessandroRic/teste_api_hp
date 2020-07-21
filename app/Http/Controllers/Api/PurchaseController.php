<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PurchaseResource;
use App\Product;
use Illuminate\Http\Request;
use App\Purchase;
use Illuminate\Support\Facades\Validator;

class PurchaseController extends Controller
{
    private $purchase;

    public function __construct(Purchase $purchase)
    {
        $this->purchase = $purchase;
    }

    public function sale(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'products_id' => 'required',
            'quantity' => 'required',
            'owner' => 'required',
            'card_number' => 'required',
            'date_expiration' => 'required',
            'flag' => 'required',
            'cvv' => 'required',
            ]);
        if ($validator->fails()) {
            return response()->json('Favor completar todos os dados requeridos', 400);
        }

        $data = $request->all();

        $number=preg_replace('/\D/', '', $data['card_number']);
        $number_length=strlen($number);
        $parity=$number_length % 2;
        $total=0;
        for ($i=0; $i<$number_length; $i++) {
            $digit=$number[$i];
            if ($i % 2 == $parity) {
            $digit*=2;
            if ($digit > 9) {
                $digit-=9;
            }
            }
            $total+=$digit;
        }
        if($total % 10 != 0) {
            return response()->json('Cartao Invalido', 400);
        } 

        $data = $request->all();
        $product = Product::find($data['products_id']);
        $sale['products_id'] = $data['products_id'];
        $sale['total_price'] = $data['quantity']*$product->price;
        $sale['quantity'] = $data['quantity'];
        $this->purchase->create($sale);
        
        return new PurchaseResource($data);
    }
}
