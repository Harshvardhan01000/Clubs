<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      .img_control{
        height: 40px;
        width: 100%;
      }
    </style>
</head>
<body>
  <div >
   <a href="{{route('club.create')}}" class="btn btn-outline-success m-3">Create Club</a>
   <a href="{{route('product.index')}}" class="btn btn-outline-success m-3">Show Product</a>
  </div>
   

  <table class="table">
    <thead>
      <tr>
        <th scope="col">group_id</th>
        <th scope="col">business_name</th>
        <th scope="col">club_number</th>
        <th scope="col">club_name</th>
        <th scope="col">club_state</th>
        <th scope="col">club_description</th>
        <th scope="col">club_slug</th>
        <th scope="col">website_title</th>
        <th scope="col">website_link</th>
        <th scope="col">club_logo</th>
        <th scope="col">club_banner</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
      <tr>
        <td scope="col">{{$item->group_id}}</td>
        <td scope="col">{{$item->business_name}}</td>
        <td scope="col">{{$item->club_number}}</td>
        <td scope="col">{{$item->club_name}}</td>
        <td scope="col">{{$item->club_state}}</td>
        <td scope="col">{{$item->club_description}}</td>
        <td scope="col">{{$item->club_slug}}</td>
        <td scope="col">{{$item->website_title}}</td>
        <td scope="col">{{$item->website_link}}</td>
        <td scope="col"><img src="upload/category/club_logo/{{$item->club_logo}}" alt="" class="img_control"> </td>
        <td scope="col"><img src="upload/category/club_banner/{{$item->club_banner}}" alt="" class="img_control"> </td>
      </tr>  
      @endforeach
      
    </tbody>
  </table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>