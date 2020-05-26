<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form class="form-horizontal" method="POST" action="{{ url('categorias/update')  }}" class="form-horizontal">
    @csrf
<input name="id" type="hidden" value="{{ $categoria->category_id }}">
        <fieldset>
        <!--detectar si la variable exito tiene valor-->
          @if(session("Exito")):
          <div class="alert-success">{{  session("Exito") }}</div>
          
          @endif
        <!-- Form Name -->
        <legend>Editar categoria</legend>
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="nombre">Nombre categoria</label>  
          <div class="col-md-4">
          <input id="nombre" name="categoriaActualizada" type="text" value="{{$categoria->name}}" placeholder="" class="form-control input-md"><br>
             <strong class="text-danger">    {{$errors->first('categoriaActualizada')}}    </strong>
          <span class="help-block"></span>  
          </div>
        </div>
        <!--Buttom-->
        <div class="form-group">
        <label class="cold-md-4 control label" for=""></label>    
        <div>
                <button id="" type="submit" name="" class="btn btn-primary">

        </div>
        </div>
       
        </fieldset>
        </form>
        
</body>
</html>