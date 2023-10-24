<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>


            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">name</th>
                            <th scope="col">email</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($usuarios as $vistausuarios )

                        <tr>
                            <th scope="row">{{ $vistausuarios->id }}</th>
                            <td>{{ $vistausuarios->name }}</td>
                            <td>{{ $vistausuarios->email }}</td>

                            <td>






                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="container">
            <form method="POST" action="{{ route('guardarusu')}}">
                @method('POST')
                @csrf
                <div class="form-group">
                    <label for="name"></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese nombre">
                </div>

                <div class="form-group">
                    <label for="email"></label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Ingrese email">
                </div>
                <div class="form-group">
                    <label for="password"></label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="Ingrese contraseña">
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>
</body>
</html>
