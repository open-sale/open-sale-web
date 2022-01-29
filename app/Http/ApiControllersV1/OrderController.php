<?php

namespace App\Http\ApiControllersV1;

use App\Http\Requests\OrderStoreRequest;
use App\Http\Resources\OrderResource;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\OrderStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            // Get current cart or create new
            $user_id = auth()->user()->id;
            $cart = Cart::unpaid()->where('user_id', $user_id)->firstOrCreate(
                ['user_id' => $user_id]
            );

            // Update the product or create new in current cart
            $product = Product::find($request->product_id);
            $order = Order::updateOrCreate(
                [
                    'product_id' => $product->id,
                    'cart_id' => $cart->id,
                ],
                [
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'quantity' => $request->quantity,
                    'amount' => $product->price * $request->quantity,
                ]
            );

            // Update cart amount
            $cart->amount = Order::ofCart($cart)->sum('amount');
            $cart->save();

            DB::commit();

            return json_success(new OrderResource($order), Response::HTTP_CREATED);
        } catch (\Exception $e) {
            DB::rollBack();
            return json_error('There was an error with your order.', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $order)
    {
        // get current cart
        $cart = auth()->user()->unpaidCart;

        // validate if product exists in current cart
        $order = Order::ofCart($cart)->where('product_id', $order->id)->firstOrFail();

        if ($order->delete()) {
            return json_success([], 'The order is deleted successfully', Response::HTTP_OK);
        } else {
            return json_error('There was an error with your order.', 'Try again, please.');
        }
    }
}
