<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                {{ config('constants.app.name') }} © {{ date('Y') }}. Lima, Perú
            </div>
            <div class="col-sm-6">
                <div class="text-sm-right d-none d-sm-block">
                    Soporte: <a href="mailto: {{ config('constants.developer.email') }}" title="{{ config('constants.developer.name') }}">{{ config('constants.developer.name') }}</a>
                </div>
            </div>
        </div>
    </div>
</footer>
