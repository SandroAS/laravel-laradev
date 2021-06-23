@extends('template.master.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('course.store') }}" method="post" autocomplete="off">
                    @csrf

                    <div class="form-group">
                        <label for="name">Curso:</label>
                        <input type="text" name="name" class="form-control" placeholder="Insira o nome do curso">
                    </div>
                    <div class="form-group">
                        <label for="tutor">Tutor:</label>
                        <input type="text" name="tutor" class="form-control" placeholder="Insira o nome do tutor do curso">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" class="form-control" placeholder="Insira o e-mail do tutor do curso">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection