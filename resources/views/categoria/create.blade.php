@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nueva Categoría</h1>
    <form action="{{ route('categorias.store') }}" method="POST">@csrf
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Proveedor</label>
            <select name="proveedor_id" class="form-control">
                <option value="">-- Selecciona --</option>
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection