<div class="blog-post__content-banner">
    <a href="{{ $banner->link }}">
    <img class="desktop-banner-image" src="{{ $banner->getFirstMediaUrl('desktop') }}" />
    <img class="mobile-banner-image" src="{{ $banner->getFirstMediaUrl('mobile') }}" />
    </a>
</div>
