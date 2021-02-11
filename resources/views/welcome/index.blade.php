@extends('layouts.app')

@php
    use App\Enums\UtilEnum;
    extract($params);
@endphp

@push('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-multiselect.min.css') }}">
@endpush

@section('content')
<section class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <div class="card-heading">
                <h4 class="card-title">Listado de usuarios registrados</h4>
            </div>
        </div>
        <div class="card-filters">
            <form action="?" method="GET" class="form-searching" role="form">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group {{ class_active(${config('searchzy.keyword')}) }}">
                            <label class="block">Buscar</label>
                            {!! Form::text(config('searchzy.keyword'), ${config('searchzy.keyword')}, [
                                'class'       => 'form-control ',
                                'placeholder' => 'Buscar a un usuario por su nombre, dni, telefono, correo electrónico, titulo o descripción de sus posts'
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group {{ class_active($rol_id) }}">
                            <label class="block">Rol</label>
                            {!! Form::select('rol_id[]', UtilEnum::$ARR_ROLES, $rol_id, [
                                'id'       => 'rol_id',
                                'class'    => 'form-control',
                                'multiple' => 'multiple',
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="label-invisible">Buscar</label>
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-search"></i> Buscar
                            </button>
                            <a href="{{ url()->current() }}" title="Limpiar" class="btn btn-default">
                                <i class="fa fa-eraser"></i> Limpiar
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">

            @if ($oUsuarios->count())

                @include('layouts.base.pagination', ['collect' => $oUsuarios, 'class' => 'top', 'appends' => $params])

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Usuario</th>
                                <th>DNI</th>
                                <th>Celular</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Nro de Posts</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($oUsuarios as $i => $oUsuario)
                                <tr>
                                    <td>{{ $i + $oUsuarios->firstItem() }}</td>
                                    <td>@include('searchzy::highlight', ['text' => $oUsuario->name])</td>
                                    <td>@include('searchzy::highlight', ['text' => $oUsuario->code])</td>
                                    <td>@include('searchzy::highlight', ['text' => $oUsuario->phone])</td>
                                    <td>@include('searchzy::highlight', ['text' => $oUsuario->email])</td>
                                    <td>{{ UtilEnum::$ARR_ROLES[$oUsuario->role_id] ?? '--' }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="collapse" aria-expanded="false" data-target="#accordion-{{ $i }}">{{ $oUsuario->posts_count }} Posts</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <div id="accordion-{{ $i }}" class="collapse">

                                            @if ($oUsuario->posts->count())

                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Post de {{ $oUsuario->name }}</th>
                                                            <th>Categoria</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($oUsuario->posts as $i => $oPost)
                                                            <tr>
                                                                <td>
                                                                    <div>
                                                                        <small>
                                                                            <strong>
                                                                                @include('searchzy::highlight', ['text' => $oPost->title])
                                                                            </strong>
                                                                        </small>
                                                                    </div>
                                                                    <div>
                                                                        <small>@include('searchzy::highlight', ['text' => $oPost->description])</small>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <small>{{ UtilEnum::$ARR_CATEGORIES[$oPost->category_id] ?? '--' }}</small>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            @else

                                                @include('layouts.base.empty')

                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @include('layouts.base.pagination', ['collect' => $oUsuarios, 'class' => 'bottom', 'appends' => $params])

            @else

                @include('layouts.base.empty')

            @endif
        </div>
    </div>
</section>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/bootstrap-multiselect.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#rol_id').multiselect();
        });
    </script>
@endpush
