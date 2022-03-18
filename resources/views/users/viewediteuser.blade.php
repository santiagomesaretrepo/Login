<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ingreso Usuarios</title>
         <!-- libraria de llava para utilizar bootstrap5-->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
       <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

    </head>
    <!--validar mensaje creacion exitosa-->
    @if (session('mensaje'))  
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Registro!</strong>
            <h6>{{ session('mensaje') }}</h6>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif 
      @if ($errors->any()) 
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>ERROR!</strong>
          <h6>AL REGISTRAR ,HAY CAMPOS VACIOS REVISA EL FORMURLARIO</h6>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
   <div class="card">
     <!--Funcion para para consumir el api -->
        <form action="{{route('newuser')}}" method="GET"> 
        @csrf
            <div class="card-body text-center">
                <div class="form-row">
                        <div class="col-md-4 mb-3 mx-auto">
                            <h1>Editar  Usuario</h1>
                        </div>
                        <div class="col-md-4 mb-3 mx-auto">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="col-md-4 mb-3 mx-auto">
                            <label>Pasword</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="col-md-4 mb-3 mx-auto">
                            <button type="submit" class="btn btn-primary">Envíar</button>
                        </div>
                </div>
            </div>
        </form>

   </div>
</html>
