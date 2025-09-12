@php
    $slideKeyword = App\Enums\SlideEnum::MAIN;
@endphp
@if(count($slides[$slideKeyword]['item']))
    <div class="panel-slide page-setup" data-setting="{{ json_encode($slides[$slideKeyword]['setting']) }}">
        <div class="popup">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($slides[$slideKeyword]['item'] as $key => $val )
                        <div class="swiper-slide">
                            <div class="slide-item">
                                {{-- <div class="slide-overlay">
                                    <div class="slide-title">{!! $val['name'] !!}</div>
                                    <div class="slide-description">{!! $val['description'] !!} </div>
                                </div>
                                <div class="subcribe-form">
                                    <form action="" class="uk-form form">
                                        <input type="text" name="email" value="" class="input-text" placeholder="Nhập vào Email Của bạn">
                                        <button type="submit" name="submit" class="btn-send">Subcribe</button>
                                    </form>
                                </div> --}}
                                <span class="image img-cover"><img src="{{ $val['image'] }}" alt="{{ $val['name'] }}"></span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="swiper-container-thumbs">
                <div class="swiper-wrapper pic-list">
                    <?php foreach($slides[$slideKeyword]['item'] as $key => $val){  ?>
                        <div class="swiper-slide">
                            <div class="name">{!! $val['name'] !!}</div>
                        </div>
                    <?php }  ?>
                </div>
            </div>
        </div>        
    </div>
@endif