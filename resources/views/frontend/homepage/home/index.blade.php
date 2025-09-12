@extends('frontend.homepage.layout')
@section('content')
    <div id="homepage" class="homepage">
        <div class="uk-container uk-container-center">
            <div class="uk-grid uk-grid-medium">
                <div class="uk-width-medium-1-4">
                    @if(count($categories))
                        <div class="panel-product-category mb30">
                            <ul class="uk-list uk-clearfix">
                                @foreach($categories as $key => $val)
                                    @if($key > 0)
                                        @php
                                            $name = $val->languages->first()->pivot->name;
                                            $canonical = write_url($val->languages->first()->pivot->canonical);
                                        @endphp
                                        <li class="menu-dropdown">
                                            <a class="menu-lv1" href="{{ $canonical }}" title="{{ $name }}" >
                                                <span class="image img-cover">
                                                    <img src="{{ $val['image'] }}" alt="">
                                                </span>
                                                {{ $name }} 
                                            </a>
                                            <div class="mega-menu">
                                                <div class="uk-grid uk-grid-medium">
                                                    @foreach ($val->products as $keyAttr => $valAttr)
                                                        <div class="uk-width-medium-1-4 mb20">
                                                            @php
                                                                $name = $valAttr->languages()->first()->pivot->name;
                                                                $canonical = $valAttr->languages()->first()->pivot->canonical;
                                                            @endphp
                                                            <div class="menu-item">
                                                                <a href="{{ write_url($canonical) }}" class="menu-lv2">{{ $name }}</a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="panel-support">
                        <div class="panel-head"><h2 class="heading-1"><span>Hỗ trợ trực tuyến</span></h2></div>
                        <div class="panel-body">
                            <div class="list-support">
                                <div class="support-item">
                                    <h3 class="heading-2"><span>KD1:</span></h3>
                                    <p>
                                        <img src="http://thietbithuanhung.com/public/userfiles/image/9025852_phone_call_icon.png" alt="">
                                        {{ $system['contact_sell_1'] }} <span>(Ms Thanh)</span>
                                    </p>
                                    <p>
                                        <img src="http://thietbithuanhung.com/public/userfiles/image/7044033_zalo_icon.svg" alt="">
                                        {{ $system['contact_sell_1'] }}
                                    </p>
                                </div>
                                <div class="support-item">
                                    <h3 class="heading-2"><span>KD2:</span></h3>
                                    <p>
                                        <img src="http://thietbithuanhung.com/public/userfiles/image/9025852_phone_call_icon.png" alt="">
                                        {{ $system['contact_sell_2'] }}<span>(Mr Cường)</span></p>
                                    <p>
                                        <img src="http://thietbithuanhung.com/public/userfiles/image/7044033_zalo_icon.svg" alt="">
                                        {{ $system['contact_sell_2'] }}
                                    </p>
                                </div>
                                <div class="support-item">
                                    <h3 class="heading-2"><span>KD3:</span></h3>
                                    <p>
                                        <img src="http://thietbithuanhung.com/public/userfiles/image/9025852_phone_call_icon.png" alt="">
                                        {{ $system['contact_sell_3'] }}  <span>(Mr Sơn)</rpan></p>
                                    <p>
                                        <img src="http://thietbithuanhung.com/public/userfiles/image/7044033_zalo_icon.svg" alt="">
                                        {{ $system['contact_sell_3'] }} 
                                    </p>
                                </div>
                                {{-- <div class="support-item">
                                    <h3 class="heading-2"><span>KD4:</span></h3>
                                    <p>
                                        <img src="http://thietbithuanhung.com/public/userfiles/image/9025852_phone_call_icon.png" alt="">
                                        {{ $system['contact_sell_4'] }}<span>(Ms Phương)</span>
                                    </p>
                                    <p>
                                        <img src="http://thietbithuanhung.com/public/userfiles/image/7044033_zalo_icon.svg" alt=""> 
                                        {{ $system['contact_sell_4'] }}
                                    </p>
                                </div>
                                <div class="support-item">
                                    <h3 class="heading-2"><span>KD5:</span></h3>
                                    <p>
                                        <img src="http://thietbithuanhung.com/public/userfiles/image/9025852_phone_call_icon.png" alt="">
                                        {{ $system['contact_sell_5'] }}<span>(Mr Hiệu)</span>
                                    </p>
                                    <p>
                                        <img src="http://thietbithuanhung.com/public/userfiles/image/7044033_zalo_icon.svg" alt=""> 
                                        {{ $system['contact_sell_5'] }}
                                    </p>
                                </div> --}}
                                <div class="support-item">
                                    <p>Email: {{ $system['contact_email'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-medium-3-4">
                    <div class="panel-main-slide">
                        <div class="uk-container uk-container-center">
                            @include('frontend.component.slide')
                        </div>
                    </div>
                    @if(isset($widgets['best-seller-product']))
                        <div class="panel-best-seller-product">
                            <div class="uk-container uk-container-center">
                                <div class="panel-head">
                                    <a href="" class="image img-cover"><img src="{{ $widgets['best-seller-product']['album'][0] }}" alt=""></a>
                                    <div class="name">{{ $widgets['best-seller-product']['name'] }}</div>
                                </div>
                                <div class="panel-body">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            @foreach($widgets['best-seller-product']->object as $key => $product)
                                                <div class="swiper-slide">
                                                    @include('frontend.component.product-item', ['product' => $product])
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @php
                        $slideKeyword = App\Enums\SlideEnum::BANNER;
                    @endphp
                    @if(count($slides[$slideKeyword]['item']))
                        <div class="panel-banner">
                            <div class="uk-container uk-container-center">
                                <div class="panel-body">
                                    <div class="uk-grid uk-grid-medium">
                                        @foreach($slides[$slideKeyword]['item'] as $key => $val )
                                            <div class="uk-width-medium-1-2">
                                                <div class="thumb">
                                                    <a href="" class="image img-cover">
                                                        <img src="{{ $val['image'] }}" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(isset($widgets['product']))
                        <div class="panel-category">
                            @foreach($widgets['product']->object as $key => $val)
                                <div class="category-item">
                                    <div class="uk-container uk-container-center">
                                        <div class="panel-head">
                                            <h2 class="heading-1"><span>{{ $val->languages()->first()->pivot->name }}</span></h2>
                                        </div>
                                        <div class="panel-body">
                                            <div class="uk-grid uk-grid-medium">
                                                @foreach($val->products as $key => $product)
                                                    <div class="uk-width-medium-1-4">
                                                        @include('frontend.component.product-item', ['product' => $product])
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @if(isset($widgets['projects']))
            <div class="panel-project">
                <div class="uk-container uk-container-center">
                    <div class="project-show">
                        <div class="panel-head">
                            <h2 class="heading-1"><span>{{ $widgets['projects']['name'] }}</span></h2>
                        </div>
                        <div class="panel-body">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach($widgets['projects']->object as $key => $val)
                                        @foreach($val->posts as $keyAttr => $valAttr)
                                            <div class="swiper-slide">
                                                <div class="project-item">
                                                    <a href="" class="image">
                                                        <img src="{{ $valAttr->image }}" alt="">
                                                    </a>
                                                    <div class="name">{{ $valAttr->languages()->first()->pivot->name }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                                {{-- <div class="swiper-pagination"></div> --}}
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        @endif
        @if(isset($widgets['posts']->object))
            @foreach($widgets['posts']->object as $key => $val)
            @php
                $catName = $val->languages->first()->pivot->name;
                $catCanonical = write_url($val->languages->first()->pivot->canonical);
            @endphp
            <div class="panel-news">
                <div class="uk-container uk-container-center">
                    <div class="wrapper-news">
                        <div class="panel-head">
                            <div class=" uk-flex uk-flex-middle uk-flex-space-between">
                                <h2 class="heading-2">
                                    <span><?php echo $catName ?></span>
                                </h2>
                                <a href="" class="btn-readmore"><span>Xem thêm</span></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            @if(count($val->posts))
                            <div class="uk-grid uk-grid-medium">
                                @foreach($val->posts  as $post)
                                @php
                                    $name = $post->languages->first()->pivot->name;
                                    $canonical = write_url($post->languages->first()->pivot->canonical);
                                    $createdAt = convertDateTime($post->created_at, 'd/m/Y');
                                    $description = cutnchar(strip_tags($post->languages->first()->pivot->description), 100);
                                    $image = $post->image;
                                @endphp
                                <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-4">
                                    <div class="news-item">
                                        <a href="{{ $canonical }}" class="image img-cover"><img src="{{ $image }}" alt="{{ $name }}"></a>
                                        <div class="info">
                                            <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a></h3>
                                            <div class="description">{!! $description !!}</div>
                                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                <a href="{{ $canonical }}" class="readmore">Chi tiết</a>
                                                <span class="created_at">{{ $createdAt }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
        @php
            $slideKeyword = App\Enums\SlideEnum::BRAND;
        @endphp
        <div class="panel-brand">
            <div class="uk-container uk-container-center">
                @if(count($slides[$slideKeyword]['item']))
                    <div class="panel-head">
                        <h2 class="heading-1"><span>{{ $slides['outstanding-brand']['name'] }}</span></h2>
                    </div>
                    <div class="panel-body">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @foreach($slides[$slideKeyword]['item'] as $key => $val)
                                    <div class="swiper-slide">
                                        <div class="brand-item">
                                            <a href="" class="image img-cover"><img src="{{ $val['image'] }}" alt=""></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
