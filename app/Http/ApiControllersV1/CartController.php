<?php

namespace App\Http\ApiControllersV1;

use App\Http\Requests\CartUpdateRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of paid carts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return json_success(CartResource::collection(auth()->user()->paidCarts));
    }

    /**
     * Display the specified resource.
     * SEE: There is custom binding of Cart $this->bind()
     *
     * @return \Illuminate\Http\Response
     */
    public function show($cart)
    {
        return json_success(new CartResource($cart));
    }

    /**
     * Update the specified cart in storage.
     * SEE: There is custom binding of Cart $this->bind()
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(CartUpdateRequest $request, $cart)
    {
        if ($cart->is_paid == Cart::UNPAID) {
            $cart->deliver_address = $request->deliver_address ?? '';
            $cart->is_paid = Cart::PAID;
            $cart->save();

            return json_success(new CartResource($cart));
        } else {
            return json_error('There was an error with your order', new CartResource($cart));
        }

    }

    /**
     * Customizing the resolution logic of cart.
     * SEE: https://laravel.com/docs/8.x/routing#customizing-the-resolution-logic
     *
     * @return \Illuminate\Http\Response
     */
    public static function bind($id) {
        return Cart::where('id', $id)->where('user_id', auth()->user()->id)->firstOrFail();
    }
}
