<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>GasAPP</title>
        <script
                src="https://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous"></script>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

       {{-- <script>
            window.addEventListener('load',function () {
                $.get('skills',function (r) {
                    console.log(r);
                })
            })
        </script>--}}

    </head>
    <body>
        <div id="app">
            <div class="row">
                <div class="col-md-5">

                </div>
            </div>

        </div>

        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://unpkg.com/vue@2.5.16/dist/vue.js"></script>
        <script src="/js/app.js" ></script>
    </body>
</html>
