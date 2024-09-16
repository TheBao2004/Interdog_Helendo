

@if (session('alert_msg') && session('alert_type'))
    <div class="alert alert-{{ session('alert_type') }}">{{ session('alert_msg') }}</div>
@endif
