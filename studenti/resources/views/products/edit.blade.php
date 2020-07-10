@extends('layouts.app')

@section('page-title', 'Modifica prodotto')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-3 mb-3">Modifica prodotto</h1>
                @if ($errors->any())
                   <div class="alert alert-danger">
                       <ul>
                           @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                           @endforeach
                       </ul>
                   </div>
                @endif

                <form action="{{ route('products.update', ['product' => $product->id]) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="name" class="form-control" id="nome" placeholder="Nome prodotto" value="{{ old('name', $product->name) }}">
                        @error ('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="descrizione">Descrizione</label>
                        <textarea type="text" name="description" class="form-control" id="descrizione" placeholder="Descrizione prodotto">{{ old('description', $product->description) }}</textarea>
                        @error ('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="prezzo">Prezzo</label>
                        <input type="number" name="price" class="form-control" id="prezzo" placeholder="Prezzo prodotto" value="{{ old('price', $product->price) }}">
                        @error ('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Salva</button>
                </form>
            </div>
        </div>
    </div>
@endsection
