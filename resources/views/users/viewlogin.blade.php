<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Usuario Logueado</title>
         <!-- libraria de llava para utilizar bootstrap5-->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
   <div class="card">

            <div class="card-body text-center">
                <div class="form-row">
                        <div class="col-md-4 mb-3 mx-auto">
                            <h1>!Bienvenido¡</h1>                         
                                <form action="{{route('viewediteuser')}}" method="GET"> 
                                @csrf
                                    <div class="col-md-4 mb-3 mx-auto">
                                        <button type="submit" class="btn btn-secondary">Editar Usuario</button>
                                        <input type="text" value="$obteneremail->name">
                                    </div>
                                </form>
                            <br>
                            <h2>{{$obteneremail->name}}</h2>
                        </div>

                </div>
            </div>
   </div>
</html>
