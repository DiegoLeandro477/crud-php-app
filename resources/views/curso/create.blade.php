<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 mb-5">
                <div class="border-bottom d-flex justify-content-between align-items-center">
                    <h2>Cadastro de Eletivas</h2>
                    <a href=" {{ route('curso.index') }} " class="btn btn-primary">Voltar</a>
                </div>
                @if(count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                @endif
                <form action="{{ route('curso.store') }}" method="POST" class="col-7">
                    
                    @csrf

                    <div class="form-group mt-3">
                        <label for="name">Nome do curso:</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="Digite o nome do curso aqui.">
                    </div>
                    <div class="form-group mt-3">
                        <label for="description">Descrição do curso:</label>
                        <textarea rows="3" id="description" name="description" class="form-control" placeholder="Descreva o que contem no curso.">{{ old('description') }}</textarea>
                    </div> 
                    <div class="form-group mt-3">
                        <button class="btn btn-primary">Cadastrar Curso</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>