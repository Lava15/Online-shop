<?php

namespace App\Http\Controllers\Api\V1;

use App\Domain\Client\Models\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\CartRequest;
use App\Http\Resources\V1\CartResource;
use App\Http\Responses\CollectionResponse;
use App\Http\Responses\MessageResponse;
use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller
{
    public function add(CartRequest $request): Responsable
    {
        $validated = $request->validated();

        Cart::query()->updateOrCreate(
            [
                'user_id' => auth()->id(),
                'product_id' => $validated['product_id'],
                'variant_id' => $validated['variant_id'] ?? null,
            ], [
                'quantity' => $validated['quantity']
            ]
        );

        return new MessageResponse(
            message: 'Item added to cart',
            status: Response::HTTP_CREATED,
        );
    }

    public function update(CartRequest $request, Cart $cart): Responsable
    {

        if ( $request->validated()['quantity'] === 0) {
            $cart->delete();
            return new MessageResponse(
                message: 'Item removed from cart',
                status: Response::HTTP_OK
            );
        } else {
            $cart->update($request->only('quantity'));

            return new MessageResponse(
                message: 'Cart updated',
                status: Response::HTTP_OK,
            );
        }
    }

    public function view(): Responsable
    {
        $cartItems = Cart::where('user_id', auth()->id())->get();
        return new CollectionResponse(
            data: CartResource::collection($cartItems),
            status: Response::HTTP_OK
        );
    }

    public function remove(Cart $cart): Responsable
    {
        $cart->delete();

        return new MessageResponse(
            message: 'Item removed from cart',
            status: Response::HTTP_NO_CONTENT
        );
    }
}
