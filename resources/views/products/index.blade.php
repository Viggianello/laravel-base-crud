@extends('layouts.app')

@section('page-title', 'Lista prodotti')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="mt-3 mb-3">Lista prodotti</h1>
                    <a class="btn btn-primary"
                    href="{{ route('products.create') }}">
                        Nuovo prodotto
                    </a>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Prezzo</th>
                            <th class="text-right">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($prodotti as $prodotto)
                            <tr>
                                <td>{{ $prodotto->id }}</td>
                                <td>{{ $prodotto->name }}</td>
                                <td>{{ $prodotto->price }}</td>
                                <td class="text-right">
                                    <a class="btn btn-info btn-sm"
                                    href="{{ route('products.show', ['product' => $prodotto->id]) }}">
                                        Dettagli
                                    </a>
                                    <a class="btn btn-warning btn-sm" href="{{ route('products.edit', ['product' => $prodotto->id]) }}">
                                        Modifica
                                    </a>
                                    <form action="{{ route('products.destroy', ['product' => $prodotto->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-danger btn-sm" value="Elimina">
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Non è presente nessun prodotto</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
