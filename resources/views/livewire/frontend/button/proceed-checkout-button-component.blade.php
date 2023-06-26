<div x-data="{ showButton: @entangle('showButton') }">
    <a x-show="showButton" href="{{ route('checkout.index') }}" class="btn btn-sqr d-block">Proceed Checkout</a>
    <a href="{{ route('shop.index') }}" class="btn btn-sqr d-block bg-dark">Continue Shopping</a>
</div>
