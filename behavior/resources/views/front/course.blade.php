@extends('front.master.master-with-sidebar')

@section('title', 'O melhor curso de Laravel do Brasil')

@section('css')
        <style>
            .teste {
                color: purple;
            }
        </style>
@endsection

@section('js')
    <script>
        alert('Teste');
    </script>
@endsection

@section('sidebar')
    @parent {{-- [MASTER] --}}
    <h1 class="teste">Listagem de Artigos</h1>

    <ul>
        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, temporibus.</li>
        <li>Aliquid nemo non enim quisquam tenetur cumque praesentium fuga repellat!</li>
        <li>Possimus laborum sunt quas doloribus assumenda ipsa quia, voluptas facere?</li>
    </ul>
    
@endsection

@section('content')
    <h1>Conteúdo</h1>
@endsection