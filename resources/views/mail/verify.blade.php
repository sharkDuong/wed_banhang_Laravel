@component('mail::message')

# Xin chào {{ $nameVery }},

Cảm ơn bạn đã đăng ký tài khoản tại {{ config('app.name') }}.

Vui lòng nhấn nút dưới đây để xác nhận địa chỉ email và kích hoạt tài khoản của bạn:

@component('mail::button', ['url' => $url])
Xác nhận email
@endcomponent

Nếu nút không hoạt động, bạn có thể sao chép và dán đường dẫn sau vào trình duyệt:

{{ $url }}

Nếu bạn không thực hiện yêu cầu này, hãy bỏ qua email này.

Trân trọng,

{{ config('app.name') }}

@endcomponent
# Xác nhận tài khoản {{ $nameVery }}!

Để xác nhận tài khoản, vui lòng nhấn vào link bên dưới:

{{ $url }}

Cảm ơn bạn đã đăng ký!
Trân trọng,
Đội ngũ hỗ trợ.