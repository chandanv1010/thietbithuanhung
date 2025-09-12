<div id="header" class="pc-header uk-visible-large">
    <!-- <div class="upper">
        <div class="uk-container uk-container-center">
            <a href="" class="image img-cover">
                <img src="https://legitech.vn/public/frontend/resources/img/Group%20112.png" alt="">
            </a>
        </div>
    </div> -->
    <div class="middle">
        <div class="uk-container uk-container-center">
            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                <div class="logo">
                    <a href="/"><img src="{{ $system['homepage_logo'] }}" alt="Logo"></a>
                </div>
                <div class="wrapper">
                    <div class="uk-flex uk-flex-middle">
                        <div class="header-search">
                            <form action="{{ write_url('tim-kiem') }}" class="uk-form form">
                                <input type="text" name="keyword" placeholder="Từ khóa tìm kiếm" value="" class="input-text">
                                <button type="submit" value="" name="">
                                    <img src="https://legitech.vn/public/frontend/resources/img/icon_search.png" alt="">
                                </button>
                            </form>
                        </div>
                        <div class="header-select">
                            <select name="view-product" style="display: none;">
                                <option>Sản phẩm đã xem</option>
                            </select>
                            <div class="nice-select" tabindex="0">
                                <span class="current">Sản phẩm đã xem</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-hotline">
                    <div class="uk-flex uk-flex-middle">
                        <img src="https://legitech.vn/public/frontend/resources/img/phone-background.png" alt="Hotline">
                        <span>{{ $system['contact_hotline'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lower" data-uk-sticky >
        <div class="uk-container uk-container-center">
            <div class="uk-grid uk-grid-medium uk-flex uk-flex-middle">
                <div class="uk-width-large-1-5">
                    @if(count($categories))
                    <div class="header-category">
                        <div class="name">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                            <span> Danh mục sản phẩm</span>
                        </div>
                        <div class="category-dropdown">
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
                    </div>
                    @endif
                </div>
                <div class="uk-width-large-4-5">
                    @include('frontend.component.navigation')
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mobile-header uk-hidden-large">
    <div class="mobile-upper">
        <div class="uk-container uk-container-center">
            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                <div class="mobile-logo">
                    <a href="." title="{{ $system['seo_meta_title'] }}">
                        <img src="{{ $system['homepage_logo'] }}" alt="Mobile Logo">
                    </a>
                </div>
                <div class="mobile-widget">
                    <div class="uk-flex uk-flex-middle">
                        <a href="#mobileCanvas" class="mobile-menu-button" data-uk-offcanvas>
                            <svg xmlns="http://www.w3.org/2000/svg" 
                            width="100%" height="100%" preserveAspectRatio="none" 
                            viewBox="0 0 1536 1896.0833" class="" fill="rgb()"> <path d="M1536 1344v128q0 26-19 45t-45 19H64q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19H64q-26 0-45-19T0 960V832q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19H64q-26 0-45-19T0 448V320q0-26 19-45t45-19h1408q26 0 45 19t19 45z"></path> </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="mobileCanvas" class="uk-offcanvas offcanvas" >
    <div class="uk-offcanvas-bar" >
        @if(isset($menu['mobile']))
		<ul class="l1 uk-nav uk-nav-offcanvas uk-nav uk-nav-parent-icon" data-uk-nav>
			@foreach ($menu['mobile'] as $key => $val)
            @php
                $name = $val['item']->languages->first()->pivot->name;
                $canonical = write_url($val['item']->languages->first()->pivot->canonical, true, true);
            @endphp
			<li class="l1 {{ (count($val['children']))?'uk-parent uk-position-relative':'' }}">
                <?php echo (isset($val['children']) && is_array($val['children']) && count($val['children']))?'<a href="#" title="" class="dropicon"></a>':''; ?>
				<a href="{{ $canonical }}" title="{{ $name }}" class="l1">{{ $name }}</a>
				@if(count($val['children']))
				<ul class="l2 uk-nav-sub">
					@foreach ($val['children'] as $keyItem => $valItem)
                    @php
                        $name_2 = $valItem['item']->languages->first()->pivot->name;
                        $canonical_2 = write_url($valItem['item']->languages->first()->pivot->canonical, true, true);
                    @endphp
					<li class="l2">
                        <a href="{{ $canonical_2 }}" title="{{ $name_2 }}" class="l2">{{ $name_2 }}</a>
                    </li>
					@endforeach
				</ul>
				@endif
			</li>
			@endforeach
		</ul>
		@endif
	</div>
</div>