<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>santri</title>

    <link rel="stylesheet" href="static/css/w3.css">
    <link rel="stylesheet" href="static/css/santri.css">
    <link rel="stylesheet" href="static/css/toastr.css">

    <link rel="stylesheet" href="static/css-awesome/brands.css">
    <link rel="stylesheet" href="static/css-awesome/fontawesome.css">
    <link rel="stylesheet" href="static/css-awesome/regular.css">
    <link rel="stylesheet" href="static/css-awesome/solid.css">
    <link rel="stylesheet" href="static/css-awesome/svg-with-js.css">
    <link rel="stylesheet" href="static/css-awesome/v4-shims.css">

    <style>
      #login {
        max-width: 95%;
        margin: auto;
        width: 380px;
        margin-top: 5%;
      }

      #logo-cliente {
        max-width: 100%;
        margin: auto;
        width: 700px;    
      }

      #logo-santri {
        max-width: 50%;
        margin: auto;
        width: 380px;    
      }

      table {
        border-collapse: collapse;
        width: 100%;
      }

      th, td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid #ddd;
      }

      tr:nth-child(even) {background-color: #f2f2f2;}
    
    </style>
    </head>
    <body>
    
        <div class="container">
            @yield('content')

            {{-- @if(session()->has('flash'))
                <div class="alert alert-info">
                    {{ session('flash')}}
                </div>
            @endif --}}
        </div>
    </body>
</html>
