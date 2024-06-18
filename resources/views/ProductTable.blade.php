<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <div >
   <a href="{{route('product.create')}}" class="btn btn-outline-success m-3">Create Product</a></div>

<div class="container border w-50 rounded-3">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">club_id</th>
            <th scope="col">title</th>
            <th scope="col">product_title</th>
            <th scope="col">type</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
          <tr>
              <td>{{$item->club_id}}</td>
              <td>{{$item->title}}</td>
              <td>{{$item->product_title}}</td>
              <td>{{$item->type}}</td>
              <td><button class="btn btn-outline-info edit" id="{{$item->id}}">edit</button></td>
              <td><button class="btn btn-outline-danger delete" id="{{$item->id}}">delete</button></td>
          </tr>  
          @endforeach
          
        </tbody>
      </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>