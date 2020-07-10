@extends('layouts.app')

@section('page-title', 'Dettaglio prodotto')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-3 mb-3">Dettaglio prodotto</h1>
                <ul>
                    <li>ID: {{ $product->id }}</li>
                    <li>Nome: {{ $product->name }}</li>
                    <li>Descrizione: {{ $product->description }}</li>
                    <li>Prezzo: {{ $product->price }}</li>
                </ul>

                <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-danger btn-sm" value="Elimina">
                </form>
            </div>
        </div>
    </div>
@endsection
