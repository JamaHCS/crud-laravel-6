<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Editar product</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" />
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<style>
  .right {
    display: flex;
    justify-content: flex-end;
  }

  form {
    width: 100%;
  }

</style>
<body>
  <div class="container pt-4">
    <div class="row my-4">
      <h1 class="mx-auto">CRUD de productos - Jama ideal</h1>
    </div>
    <div class="row mb-5">
      <div class="col-6">
        <h3>Editar producto</h3>
      </div>
      <div class="col-6 right">
        <a href="{{ route('products.index') }}" class="btn btn-secondary ml-auto">Regresar</a>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row mt-5">

      <form action="  {{ route('products.update', $product->id) }} " method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
          <div class="col-3">
            <input type="text" name="name" id="nameI" class="form-control" placeholder="Nombre" value="{{ $product->name }}" />
          </div>
          <div class="col-7">
            <input type="text" name="description" id="descriptionI" class="form-control" placeholder="description" value="{{ $product->description }}" />

          </div>
          <div class="col-1">
            <input type="number" name="price" id="priceI" class="form-control" placeholder="Precio" value="{{ $product->price }}" />

          </div>
          <div class="col-1">
            @csrf
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </form>
      @if ($errors->any())
      <div class="alert alert-danger mt-2">
        @foreach ($errors->all() as $error)
        - {{$error}} <br />
        @endforeach
      </div>
      @endif

    </div>
  </div>
</body>
</html>
