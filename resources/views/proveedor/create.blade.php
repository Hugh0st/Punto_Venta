@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nuevo Proveedor</h1>
    <form action="{{ route('proveedores.store') }}" method="POST">@csrf
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>UPC</label>
            <input type="text" name="upc" class="form-control" required>
        </div>
        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection