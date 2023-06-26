<div>
    <div class="row">
        @if (Cart::instance('default')->count())

            <div class="col-lg-12">
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="pro-thumbnail">Thumbnail</th>
                                <th class="pro-title">Product</th>
                                <th class="pro-price">Price</th>
                                <th class="pro-quantity">Quantity</th>
                                <th class="pro-subtotal">Total</th>
                                <th class="pro-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::instance('default')->content() as $index => $cart_item)
                                <tr x-data="{ show: true }" x-show="show">
                                    <td class="pro-thumbnail"><a href="#"><img class="img-fluid"
                                                src="{{ $cart_item->model->image }}"
                                                alt="{{ $cart_item->model->name }}" /></a>
                                    </td>
                                    <td class="pro-title"><a
                                            href="{{ route('product.show', $cart_item->model->slug) }}">{{ $cart_item->model->name }}</a>
                                    </td>
                                    <td class="pro-price"><span>{{ $cart_item->price }}</span></td>
                                    <td class="pro-quantity">
                                        <div class="pro-qty"><input type="text" value="{{ $cart_item->qty }}"></div>
                                    </td>
                                    <td class="pro-subtotal">
                                        <span>{{ $cart_item->model->price * $cart_item->qty }}</span>
                                    </td>
                                    <td class="pro-remove"><a href="#"
                                            wire:click.prevent="removeFromCart('{{ $cart_item->rowId }}')"
                                            x-on:click="show = false"><i class="fa fa-trash-o"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Cart Update Option -->
                <div class="cart-update-option d-block d-md-flex justify-content-between">
                    <div class="apply-coupon-wrapper">
                        @if (!session()->has('coupon'))
                            <form action="#" wire:submit.prevent="applyDiscount" method="post"
                                class=" d-block d-md-flex">
                                <input type="text" wire:model.defer="couponCode" placeholder="Enter Your Coupon Code"
                                    required />
                                <button type="submit" class="btn btn-sqr">Apply Coupon</button>
                            </form>
                        @else
                            <button type="reset" class="btn btn-sqr" wire:click.prevent="removeCoupon()">Remove
                                Coupon</button>
                        @endif
                    </div>
                </div>
            </div>
    </div>
    <div class="row">
        <div class="col-lg-5 ml-auto">
            <!-- Cart Calculation Area -->
            <div class="cart-calculator-wrapper">
                <div class="cart-calculate-items">
                    <h6>Cart Totals</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>Sub Total</td>
                                <td>{{ $cartSubTotal }}</td>
                            </tr>
                            @if ($cartShipping)
                                <tr>
                                    <td>Shipping</td>
                                    <td>{{ $cartShipping }}</td>
                                </tr>
                            @endif
                            @if ($cartTax)
                                <tr>
                                    <td>Tax</td>
                                    <td>{{ $cartTax }}</td>
                                </tr>
                            @endif
                            @if ($cartDiscount)
                                <tr>
                                    <td>Discount</td>
                                    <td>{{ $cartDiscount }}</td>
                                </tr>
                            @endif
                            <tr class="total">
                                <td>Total</td>
                                <td class="total-amount">{{ $cartTotal }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                @if (Cart::instance('default')->count())
                    <livewire:frontend.button.proceed-checkout-button-component />
                @endif
            </div>
        </div>
    </div>
@else
    <div class="empty-cart">
        <h3>Cart is empty</h3><br />
        <a href="{{ route('shop.index') }}" class="btn btn-sqr">Go to shop</a>
    </div>
@endif
</div>
