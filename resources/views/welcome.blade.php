<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ingreso Usuarios</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
       <script>
           function  validar(){
              const   nombre = document.getElementById("nombre").value;
              const   usuario = document.getElementById("usuario").value;
              const   pasword = document.getElementById("password").value;
              //const result=numero_uno+numero_dos;
                alert('el usuario es:'+usuario+' la clave es:'+pasword);
           }
       </script>
       <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

    </head>
   <div class="card">

            <div class="card-body text-center">
                <div class="form-row">
                        <div class="col-md-4 mb-3 mx-auto">
                            <h1>!Bienvenido¡</h1>
                            <br>
                            <h2>Sistema Seguridad</h2>
                        </div>
                        <form action="{{route('viewloginuser')}}" method="GET"> 
                        @csrf
                            <div class="col-md-4 mb-3 mx-auto">
                                <button type="submit" class="btn btn-primary">Entrar</button>
                            </div>
                        </form>
                </div>
            </div>
   </div>
</html>
