{{ Form::open(array('url' => 'store/addtocart')) }}
                         {{ Form::hidden('quantity', 1) }}
                         {{ Form::hidden('id', $product->id) }}
                         <button type="submit" class="cart-btn">
                             <span class="price">{{ $product->price }}</span>
                             {{ HTML::image('img/white-cart.gif', 'Add to cart') }}
                             Add to cart
                         </button>
{{ Form::close() }}