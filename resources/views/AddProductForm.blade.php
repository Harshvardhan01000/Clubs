<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container w-50">
        <form action="{{ route('product.store') }}" method="POST" id="form">
            @csrf
            <div class="mb-3">
                <label for="group_id" class="form-label">Club</label>
                <select name="club_id" class="form-select" id="club_id">
                    <option value="">select</option>
                    @foreach ($data as $item)
                        <option value="{{ $item->id }}">{{ $item->club_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">title</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="mb-3">
                <label for="product_title" class="form-label"> product_title</label>
                <input type="text" name="product_title" class="form-control">
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">type</label>
                <input type="text" name="type" class="form-control">
            </div>


            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    @include('cdn')
    <script>
        $(document).ready(function() {

            $('#form').validate({
                rules: {
                    title: {
                        required: true
                    },
                    product_title: {
                        required: true
                    },
                    type: {
                        required: true,
                    },
                    club_id: {
                        required: true,
                    }
                },

                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
</body>

</html>