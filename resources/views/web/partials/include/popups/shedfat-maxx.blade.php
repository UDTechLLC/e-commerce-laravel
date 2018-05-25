<div class="popUp" data-modal="shedfat-maxx"><!-- popUp--open -->
    <div class="popUp__wrapper">
        <button type="button" class="popUp__close" data-dismiss="modal">×</button>
        <h2 class="popUp__title">MEMORIAL DAY SPECIAL</h2>
        <div class="popUp__img-info">
            <div class="popUp__img">
                <img src="{{asset($product->getFirstMediaUrl('products'))}}"
                     alt="product_icon">
            </div>
            <div class="popUp__info">
                <div class="popUp__name">{{ $product->title }}</div>
                <p class="popUp__description">{{ $product->description }}</p>

                <div class="popUp__productPriceBlock">

                    <div class="product-price-block">
                        <div class="product-price has-old-price">
                            <div class="product-amount product-amount--old">
                                <span class="currency">$</span>
                                <span>{{ $product->old_amount }}</span>
                            </div>
                            <div class="product-amount">
                                <span class="currency">$</span>
                                <span>{{ $product->amount }}</span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="btns-add-to-thanks flex flex-a--center flex-j--between">
                    <add-to-cart
                        product-slug="shedfat-max-additional"
                    >
                    </add-to-cart>
                    <a href="#" class="no-thanks">NO, THANKS</a>

                </div>
            </div>
        </div>
    </div>
</div>
