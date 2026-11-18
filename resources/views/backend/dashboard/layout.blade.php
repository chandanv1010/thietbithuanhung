<!DOCTYPE html>
<html>

<head>
    @include('backend.dashboard.component.head')

</head>

    <body>
        <div id="wrapper">
            @include('backend.dashboard.component.sidebar')

            <div id="page-wrapper" class="gray-bg">
                @include('backend.dashboard.component.nav')
                @include($template)
                @include('backend.dashboard.component.footer')
            </div>
        </div>
        @include('backend.dashboard.component.script')
        <script>
            // Ping 10 phút/lần để phiên không hết hạn khi đang soạn nội dung,
            // đồng thời cập nhật lại _token cho mọi form trên trang.
            (function () {
                var url = @json(route('ajax.dashboard.keepalive'));
                function ping() {
                    fetch(url, { credentials: 'same-origin', headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' } })
                        .then(function (r) { return r.ok && !r.redirected ? r.json() : Promise.reject(r); })
                        .then(function (d) {
                            if (!d || !d.token) return;
                            var m = document.querySelector('meta[name="csrf-token"]');
                            if (m) m.setAttribute('content', d.token);
                            document.querySelectorAll('input[name="_token"]').forEach(function (i) { i.value = d.token; });
                        })
                        .catch(function () {
                            if (window.toastr) toastr.warning('Phiên đăng nhập đã hết hạn. Hãy sao lưu nội dung đang soạn và đăng nhập lại.');
                        });
                }
                setInterval(ping, 10 * 60 * 1000);
            })();
        </script>
    </body>
</html>
