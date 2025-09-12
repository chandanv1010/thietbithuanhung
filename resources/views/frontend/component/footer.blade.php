
<footer class="footer">
    <div class="footer-top">
        <div class="uk-container uk-container-center">
            <div class="top-container">
                <div class="top-body">
                    <div class="uk-grid uk-grid-medium">
                        <div class="uk-width-1-1 uk-width-large-2-4 top-wrap">
                            <div class="top-col">
                                <div class="col-heading">
                                    <h2>{{ $system['homepage_company'] }}</h2>
                                </div>
                                <div class="col-body footer-description">
                                    <p>
                                        <strong>Trụ sở</strong>: {{ $system['contact_address'] }}               
                                    </p>
                                    <p>
                                        <strong>Điện thoại</strong>: {{ $system['contact_phone'] }} | <strong>Hotline</strong>: {{ $system['contact_hotline'] }}
                                    </p>
                                    <p>
                                        <i class="fa fa-globe"></i>
                                        <strong>Website</strong>: www.thietbithuanhung.com
                                    </p>
                                    <a>
                                        <strong>Email</strong>: {{ $system['contact_email'] }}                     
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-medium-2-4">
                            <div class="uk-grid uk-grid-medium">
                                @foreach($menu['footer-menu'] as $key => $val)
                                    @php
                                        $name = $val['item']->languages->first()->pivot->name;
                                    @endphp
                                    <div class="uk-width-large-1-2">
                                        <div class="footer-menu">
                                            <div class="ft-heading">{{ $name }}</div>
                                            @if(count($val['children']))
                                            <ul class="uk-list uk-clearfix">
                                                @foreach($val['children'] as $item)
                                                @php
                                                    $name = $item['item']->languages->first()->pivot->name;
                                                    $canonical = write_url($item['item']->languages->first()->pivot->canonical);
                                                @endphp
                                                <li>
                                                    <a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- <div class="uk-width-1-1 uk-width-large-1-3 top-wrap">
                            <div class="top-col">
                                <div class="col-heading">
                                    Địa chỉ nhận hàng và tài liệu                         
                                </div>
                                <div class="col-body footer-description">
                                    <h2>{{ $system['homepage_company'] }}</h2>
                                    <p>
                                        Địa chỉ: {{ $system['contact_address'] }}               
                                    </p>
                                    <p>
                                        Hotline: {{ $system['contact_sell_phone'] }}
                                    </p>
                                    <a>
                                        Email: {{ $system['contact_email'] }}
                                    </a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="middle">
        <div class="uk-container uk-container-center">
            <div class="footer-information">
                @if(isset($menu['footer-menu']))
                <div class="uk-grid uk-grid-large">
                    <div class="uk-width-medium-1-3">
                        <div class="introduce-company">
                            <a href="" class="image img-cover"><img src="{{ $system['homepage_logo'] }}" alt=""></a>
                            <div class="text-introduce">
                                {!! $system['homepage_short_intro'] !!}
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-medium-2-3">
                        <div class="uk-grid uk-grid-medium">
                            @foreach($menu['footer-menu'] as $key => $val)
                                @php
                                    $name = $val['item']->languages->first()->pivot->name;
                                @endphp
                                <div class="uk-width-large-1-3">
                                    <div class="footer-menu">
                                        <div class="ft-heading">{{ $name }}</div>
                                        @if(count($val['children']))
                                        <ul class="uk-list uk-clearfix">
                                            @foreach($val['children'] as $item)
                                            @php
                                                $name = $item['item']->languages->first()->pivot->name;
                                                $canonical = write_url($item['item']->languages->first()->pivot->canonical);
                                            @endphp
                                            <li><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a></li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div> -->
    <div class="copyright uk-text-center">
       <div class="uk-container uk-container-center">
            {{ $system['homepage_copyright'] }}
       </div>
    </div>
</footer>
<div class="bottom-support-online">
    <div class="support-content">
        <a href="tel:0905620486" class="phone-call-now" rel="nofollow">
            <i style="background:#d92329" class="fa fa-phone rotate" aria-hidden="true"></i>
            <div class="animated infinite zoomIn kenit-alo-circle" style="border-color:#d92329"></div>
            <div class="animated infinite pulse kenit-alo-circle-fill" style="background-color:#d92329"></div>
            <span style="background:#d92329">Gọi ngay: {{ $system['contact_hotline'] }}</span>
        </a>
        <a class="mes" href="https://zalo.me/{{ $system['contact_hotline'] }}" target="_blank">
            <i style="background:#d92329" class="fa fa-comments"></i>
            <span style="background:#d92329">Chat qua Zalo</span>
        </a>
        <a class="mes" href="{{ $system['social_facebook'] }}" target="_blank">
            <i style="background:#d92329" class="fa fa-facebook"></i>
            <span style="background:#d92329">Chat qua Messenger</span>
        </a>
    </div>
    <a class="btn-support">
        <i style="background:#d92329" class="fa fa-bell" aria-hidden="true"></i>
        <div class="animated infinite zoomIn kenit-alo-circle" style="border-color:#d92329"></div>
        <div class="animated infinite pulse kenit-alo-circle-fill" style="background-color:#d92329"></div>
    </a>
</div>
<div class="fix-bottom uk-position-fixed uk-hidden-large">
    <div class="uk-grid uk-grid-collapse">
        <div class="uk-width-1-4">
            <div class="fix-item">
                <a href="tel:{{ $system['contact_hotline'] }}" class="btn btn-main" target="_blank">
                    <div class="icon"><i class="fa fa-phone rotate"></i></div>
                    <div class="text">Gọi điện</div>
                </a>
            </div>
        </div>
        <div class="uk-width-1-4">
            <div class="fix-item">
                <a href="" class="btn btn-main" target="_blank">
                    <div class="icon"><i class="fa fa-comments"></i></div>
                    <div class="text">Nhắn tin</div>
                </a>
            </div>
        </div>
        <div class="uk-width-1-4">
             <div class="fix-item">
                <a href="https://zalo.me/{{ $system['contact_hotline'] }}" class="btn btn-main" target="_blank">
                    <div class="image img-cover"><i class="fa fa-comments"></i></div>
                    <div class="text">Zalo</div>
                </a>
            </div>
        </div>
        <div class="uk-width-1-4">
            <div class="fix-item">
                <a href="{{ $system['social_facebook'] }}" class="btn btn-main" target="_blank">
                    <div class="image img-cover"><i class="fa fa-facebook"></i></div>
                    <div class="text" style="word-break: break-all;">Facebook</div>
                </a>
            </div>
        </div>
    </div>
</div>