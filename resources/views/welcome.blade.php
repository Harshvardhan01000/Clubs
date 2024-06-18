<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .img_control {
            height: 40px;
            width: 100%;
        }

        .error {
            color: rgb(250, 170, 170);
            /* font-style: italic;
            font-size: 10px; */
        }

        ul {
            list-style: none;
        }

        * {
            margin: 10px
        }

        /* HTML: <div class="loader"></div> */
        .loader {
            width: 50px;
            padding: 8px;
            aspect-ratio: 1;
            border-radius: 50%;
            background: #25b09b;
            --_m:
                conic-gradient(#0000 10%, #000),
                linear-gradient(#000 0 0) content-box;
            -webkit-mask: var(--_m);
            mask: var(--_m);
            -webkit-mask-composite: source-out;
            mask-composite: subtract;
            animation: l3 1s infinite linear;
        }

        @keyframes l3 {
            to {
                transform: rotate(1turn)
            }
        }
    </style>
</head>

<body>
    <h1>this is a Clubs project</h1>
    <div>this is a ajax base application</div>
    <ul class="d-flex">
        <li><button id="club" class="btn btn-outline-primary mx-5">club</button></li>
        <li><button id="product" class="btn btn-outline-primary mx-5">product</button></li>
    </ul>
    {{-- @include('club'); --}}
    <div id="parent">

    </div>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Club</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form data-act={{ route('club.store') }} method="POST" id="form"
                        enctype='multipart/form-data'>
                        <input type="hidden" id="id" value="">
                        <input type="hidden" id="_method" name="_method" value="post">

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="group_id" class="form-label">Group Id</label>
                                <input type="number" id="group_id" name="group_id" class="form-control">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="business_name" class="form-label">business_name</label>
                                <input type="text" id="business_name" name="business_name" class="form-control">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="club_number" class="form-label"> club_number</label>
                                <input type="number" id="club_number" name="club_number" class="form-control">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="club_name" class="form-label">club_name</label>
                                <input type="text" id="club_name" name="club_name" class="form-control">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="club_state" class="form-label">club_state</label>
                                <input type="text" id="club_state" name="club_state" class="form-control">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="club_slug" class="form-label">club_slug</label>
                                <input type="text" id="club_slug" name="club_slug" class="form-control">
                            </div>

                            <div class="mb-3 col-12">
                                <label for="club_description" class="form-label">club_description</label>
                                <textarea id="club_description" name="club_description" class="form-control" cols="30" rows="10"></textarea>
                            </div>


                            <div class="mb-3 col-6">
                                <label for="website_title" class="form-label">website_title</label>
                                <input type="text" id="website_title" name="website_title" class="form-control">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="website_link" class="form-label">website_link</label>
                                <input type="text" id="website_link" name="website_link" class="form-control">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="club_logo" class="form-label">club_logo</label>
                                <input type="file" id="club_logo" name="club_logo"
                                    class="form-control club_banner">
                            </div>

                            <div class="mb-3 col-6">
                                <label for="club_banner" class="form-label">club_banner</label>
                                <input type="file" id="club_banner" name="club_banner"
                                    class="form-control club_banner">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" id="submit" class="btn btn-primary my-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-lg" id="ProductModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Club</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form data-act={{ route('product.store') }} method="POST" id="Productform"
                        enctype='multipart/form-data'>
                        @csrf
                        <input type="hidden" id="Prod_id" value="">
                        <input type="hidden" class="_method" name="_method" value="post">
                        <div class="mb-3">
                            <label for="group_id" class="form-label">Club</label>
                            <select name="club_id" class="form-select" id="club_id">
                                <option value="">select</option>
                                @foreach ($clubs as $item)
                                    <option value="{{ $item->id }}">{{ $item->club_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="product_title" class="form-label"> product_title</label>
                            <input type="text" name="product_title" id="product_title" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">type</label>
                            <input type="text" name="type" id="type" class="form-control">
                        </div>


                        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('cdn')
    <script src="asset/Welcome.js"></script>
    <script src="asset/product.js"></script>
</body>

</html>
