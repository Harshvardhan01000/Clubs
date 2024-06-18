   <div class="clubData">
      <button type="button" class="btn btn-outline-primary mx-5" data-bs-toggle="modal" data-bs-target="#exampleModal"
          id="createClub">
          create club
      </button>
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
            <th colspan="2">action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($clubs as $item)
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
            <td><button class="btn btn-outline-info edit" id="{{$item->id}}">edit</button></td>
            <td><button class="btn btn-outline-danger delete" id="{{$item->id}}">delete</button></td>
          </tr>  
          @endforeach
          
        </tbody>
      </table> 
   </div>
   