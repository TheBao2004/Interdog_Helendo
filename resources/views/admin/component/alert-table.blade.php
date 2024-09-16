

@if (session('alert_table') && session('alert_type'))
    <div class="alert alert-{{ session('alert_type') }}">{{ session('alert_table') }}</div>
@endif
