  <button type="button" class="btn btn-outline-primary mx-5" data-bs-toggle="modal" data-bs-target="#ProductModal"
      id="createProduct">
      Create Product
  </button>
<table class="table">
    <thead>
      <tr>
        <th scope="col">club_id</th>
        <th scope="col">title</th>
        <th scope="col">product_title</th>
        <th scope="col">type</th>
        <th colspan="2">action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
      <tr>
          <td>{{$item->club->club_name}}</td>
          <td>{{$item->title}}</td>
          <td>{{$item->product_title}}</td>
          <td>{{$item->type}}</td>
          <td><button class="btn btn-outline-info editProduct " id="{{$item->id}}">edit</button></td>
              <td><button class="btn btn-outline-danger deleteProduct" id="{{$item->id}}">delete</button></td>
      </tr>  
      @endforeach
      
    </tbody>
  </table>