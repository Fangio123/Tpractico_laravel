@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Hola {{ $user->name }}!
                    <body>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        <nav class="navbar navbar-expand-lg bg-body-tertiary">
                            <div class="container-fluid">
                                <a class="navbar-brand" href="#">Logo</a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Perfil</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route ('vistaUsuarios')}}"><i class="bi bi-person-fill"></i>Usuarios</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('CerrarSesion')}}">CerrarSesion</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>


                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($dashboard_usuarios as $usuario )

                                <tr>
                                    <th scope="row">{{ $usuario->id }}</th>
                                    <td>{{ $usuario->Producto }}</td>
                                    <td>{{ $usuario->Cantidad }}</td>
                                    <td>{{ $usuario->Precio }}</td>
                                    <td>

                                        <a href='{{ route('modificar',$usuario->id)}}'><button class="fas fa-users fa-fw" aria-hidden='true'></button>Editar</a>

                                        <a href="javascript:document.getElementById('delete-{{ $usuario->id }}').submit()"><button class='btn btn-danger btn-sm'>BorrarProducto</button></a>
                                        <form id='delete-{{ $usuario->id }}' action ='{{ route('borrar', $usuario->id)}}' method='POST'>

                                            @method('delete')
                                            @csrf


                                        </form>








                                    <td>

                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="container">
                        <form method="POST" action="{{ route('guardar')}}">
                            @method('POST')
                            @csrf
                            <div class="form-group">
                                <label for="first"></label>
                                <input type="text" class="form-control" id="producto" name="producto" placeholder="Ingrese producto">
                            </div>

                            <div class="form-group">
                                <label for="last"></label>
                                <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Ingrese cantidad">
                            </div>

                            <div class="form-group">
                                <label for="handle"></label>
                                <input type="text" class="form-control" id="precio" name="precio" placeholder="Ingrese precio">
                            </div>

                            <br>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
