@extends('layouts.app')

@section('page-title', 'Creazione prodotto')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-3 mb-3">Creazione nuovo prodotto</h1>
                <form action="{{ route('products.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="name" class="form-control" id="nome" placeholder="Nome prodotto">
                    </div>
                    <div class="form-group">
                        <label for="descrizione">Descrizione</label>
                        <textarea type="text" name="description" class="form-control" id="descrizione" placeholder="Descrizione prodotto"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="prezzo">Prezzo</label>
                        <input type="number" name="price" class="form-control" id="prezzo" placeholder="Prezzo prodotto">
                    </div>
                    <button type="submit" class="btn btn-primary">Salva</button>
                </form>
            </div>
        </div>
    </div>
@endsection
