<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
          .error{
            color: rgb(236, 124, 124);
          }
        </style>
</head>

<body>
  <div class="container-fluid bg-light p-2">
    <div class="container w-50 bg-white shadow rounded-3">
      <div class="text-center my-3 text-secondary">
        <h1>Create Club</h1>
      </div>
        <form action="{{ route('club.store') }}" method="POST" id="form" enctype='multipart/form-data'>
            @csrf

            <div class="mb-3">
                <label for="group_id" class="form-label">Group Id</label>
                <input type="number" name="group_id" class="form-control">
            </div>

            <div class="mb-3">
                <label for="business_name" class="form-label">business_name</label>
                <input type="text" name="business_name" class="form-control">
            </div>

            <div class="mb-3">
                <label for="club_number" class="form-label"> club_number</label>
                <input type="number" name="club_number" class="form-control">
            </div>

            <div class="mb-3">
                <label for="club_name" class="form-label">club_name</label>
                <input type="text" name="club_name" class="form-control">
            </div>

            <div class="mb-3">
                <label for="club_state" class="form-label">club_state</label>
                <input type="text" name="club_state" class="form-control">
            </div>

            <div class="mb-3">
                <label for="club_description" class="form-label">club_description</label>
                <textarea name="club_description" class="form-control" cols="30" rows="10"></textarea>
            </div>

            <div class="mb-3">
                <label for="club_slug" class="form-label">club_slug</label>
                <input type="text" name="club_slug" class="form-control">
            </div>

            <div class="mb-3">
                <label for="website_title" class="form-label">website_title</label>
                <input type="text" name="website_title" class="form-control">
            </div>

            <div class="mb-3">
                <label for="website_link" class="form-label">website_link</label>
                <input type="text" name="website_link" class="form-control">
            </div>

            <div class="mb-3">
                <label for="club_logo" class="form-label">club_logo</label>
                <input type="file" name="club_logo" class="form-control club_banner">
            </div>

            <div class="mb-3">
                <label for="club_banner" class="form-label">club_banner</label>
                <input type="file" name="club_banner" class="form-control club_banner">
            </div>
            <div class="text-center">
              <button type="submit" id="submit" class="btn btn-primary my-3">Submit</button>
            </div>
        </form>
    </div>
  </div>
   
    @include('cdn')
    <script>
        $(document).ready(function() {
            $('#form').validate({
                rules: {
                    group_id: {
                        required: true
                    },
                    business_name: {
                        required: true,
                    },
                    club_number: {
                        required: true,
                    },
                    club_name: {
                        required: true
                    },
                    club_state: {
                        required: true
                    },
                    club_description: {
                        required: true
                    },
                    club_slug: {
                        required: true
                    },
                    website_title: {
                        required: true
                    },
                    website_link: {
                        required: true,
                      url:true
                    },
                    club_logo: {
                        required: true,
                        extension:'png|jpg|jpeg'
                    },
                    club_banner: {
                        required: true,
                        extension:'png|jpg|jpeg'
                    },
                },

                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
</body>

</html>
