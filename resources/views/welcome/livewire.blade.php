@extends('layouts.app')

@php
    use App\Enums\UtilEnum;
    extract($params);
@endphp

@push('stylesheets')
    @livewireStyles
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-multiselect.min.css') }}">
@endpush

@section('content')
<section class="content-wrapper">
    @livewire('user-pagination')
</section>
@endsection

@push('scripts')
    @livewireScripts
    <script type="text/javascript" src="{{ asset('js/bootstrap-multiselect.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#rol_id').multiselect();
        });
    </script>
@endpush
