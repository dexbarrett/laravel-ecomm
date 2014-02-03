@extends('layouts.main')

@section('promo')
            <section id="promo-alt">
                <div id="promo1">
                    <h1>The brand new MacBook Pro</h1>
                    <p>With a special price, <span class="bold">today only!</span></p>
                    <a href="#" class="secondary-btn">READ MORE</a>
                    {{ HTML::image('img/macbook.png', 'MacBook Pro') }}
                </div><!-- end promo1 -->
                <div id="promo2">
                    <h2>The iPhone 5 is now<br>available in our store!</h2>
                    <a href="">Read more {{ HTML::image('img/right-arrow.gif', 'Read more') }}</a>
                    {{ HTML::image('img/iphone.png', 'iPhone') }}
                </div><!-- end promo2 -->
                <div id="promo3">
                    {{ HTML::image('img/thunderbolt.png', 'Thunderbolt') }}
                    <h2>The 27"<br>Thunderbolt Display.<br>Simply Stunning.</h2>
                    <a href="#">Read more {{ HTML::image('img/right-arrow.gif', 'Read more') }}</a>
                </div><!-- end promo3 -->
            </section><!-- promo-alt -->
@stop

@section('content')
<h2>{{ $category->name }}</h2>
                <hr>

                <aside id="categories-menu">
                    <h3>CATEGORIES</h3>
                    <ul>
                        @foreach($catnav as $cat)
                            <li>{{ HTML::link('/store/category/' . $cat->id, $cat->name) }}</li>
                        @endforeach 
                    </ul>
                </aside><!-- end categories-menu -->

                <div id="listings">
                    @foreach($products as $product)
                    <div class="product">
                        <a href="/store/view/{{ $product->id }}">
                            {{ HTML::image($product->image, $product->title,
                             array('class' => 'feature', 'width' => '240', 'height' => '127')) }}
                        </a>

                        <h3><a href="/store/view/{{ $product->id }}">{{ $product->title }}</a></h3>

                        <p>{{ $product->description }}</p>

                        <h5>Availability: <span class="{{ $product->getInStockClass() }}">
                            {{ $product->getInStock() }}</span></h5>

                        <p>
                            @include('store.partials.addtocart')
                        </p>
                    </div>
                    @endforeach
                </div>
@stop

@section('pagination')
    <section id="pagination">
        {{ $products->links() }}
    </section>
@stop