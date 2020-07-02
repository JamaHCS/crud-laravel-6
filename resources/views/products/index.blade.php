<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Index Crud</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" />
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-5">
    <div class="row py-4">
      <h1 class="mx-auto">CRUD de productos - Jama ideal</h1>
    </div>
    <div class="row">
      <div class="mx-auto">
        <div class="mb-5">
          <form action=" {{route('products.store')}} " method="POST">
            <div class="form-row">
              <div class="col-sm-3">
                <input type="text" name="name" id="nameI" class="form-control" placeholder="Nombre" value="{{ old('name') }}" />
              </div>
              <div class="col-sm-7">
                <input type="text" name="description" id="descriptionI" class="form-control" placeholder="description" value="{{ old('description') }}" />
              </div>
              <div class="col-sm-1">
                <input type="number" name="price" id="priceI" class="form-control" placeholder="Precio" />
              </div>
              <div class="col-sm-1">
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

        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Precio</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
            <tr>
              <td>{{$product->id}}</td>

              <td>{{$product->name}}</td>

              <td>{{$product->description}}</td>
              <td>${{$product->price}}</td>

              <td>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning"> Editar </a>
              </td>
              <td>
                <form action=" {{ route ('products.destroy', $product)}} " method="POST">
                  @method('DELETE')
                  @csrf
                  <input type="submit" value="Eliminar" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro de que desea eliminar?')" />
                </form>
              </td>

            </tr>
            @endforeach
          </tbody>
        </table>
        {!! $products->render() !!}
      </div>
    </div>
  </div>
</body>

</html>
