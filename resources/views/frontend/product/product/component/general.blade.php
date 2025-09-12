<div class="woocommerce-tabs mb30">
    <ul class=" wc-tabs uk-flex uk-flex-middle"  data-uk-switcher="{connect:'#my-id'}">
       <li class="description_tab" id="tab-title-description" role="tab" >
            <a href=""> Chi tiết sản phẩm </a>
       </li>
       {{-- <li class="map_tab" id="tab-title-map_tab" role="tab" >
            <a href="">Bản đồ chỉ đường</a>
       </li> --}}
       <li class="map_tab" id="qrcodetab" role="tab" >
        <a href="">QR CODE</a>
   </li>
    </ul>
    <ul id="my-id" class="uk-switcher">
        <li class="tab-panel">
            <div class="woocommerce-Tabs-panel productContent">
               {!! $product->content !!}
            </div>
        </li>
        {{-- <li class="tab-panel">
            <div class="woocommerce-Tabs-panel ">
                {!! $system['contact_map'] !!}
            </div>
        </li> --}}
        <li class="tab-panel">
            <div class="woocommerce-Tabs-panel uk-text-center ">
                {!! $product->qrcode !!}
            </div>
        </li>
    </ul>
</div>
