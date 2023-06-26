<div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="pro-thumbnail">Thumbnail</th>
                <th class="pro-title">Product</th>
                <th class="pro-price">Price</th>
                <th class="pro-quantity">Stock Status</th>
                <th class="pro-subtotal">Add to Cart</th>
                <th class="pro-remove">Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach (Cart::instance('wishlist')->content() as $wishlistItem)
                <tr x-data="{ show: true }" x-show="show">
                    <td class="pro-thumbnail"><a href="{{ route('product.show', $wishlistItem->model->slug) }}"><img
                                class="img-fluid" src="{{ $wishlistItem->model->image }}"
                                alt="{{ $wishlistItem->model->name }}" /></a></td>

                    <td class="pro-title"><a
                            href="{{ route('product.show', $wishlistItem->model->slug) }}">{{ $wishlistItem->model->name }}</a>
                    </td>
                    <td class="pro-price"><span>{{ $wishlistItem->model->price }}</span></td>
                    <td class="pro-quantity"><span class="text-success">In Stock</span></td>
                    <td class="pro-subtotal">
                        <a @click="show = false"  href="#"
                            wire:click="moveToCart('{{ $wishlistItem->rowId }}')" class="btn btn-sqr">Add to Cart</a>
                    </td>
                    <td class="pro-remove">
                        <a @click="show = false"  href="#"
                            wire:click.prevent="removeFromWishlist('{{ $wishlistItem->rowId }}')"><i
                                class="fa fa-trash-o"></i></a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
