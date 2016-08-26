<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Petitie: Een eerlijk statuut voor personen met een handicap.</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>

            .margin {
                margin-top: 30px;
            }
        </style>
        <link href="/css/app.css" rel="stylesheet">
    </head>
    <body>
        {{-- Navbar --}}
        {{-- /Navbar --}}

        <div class="container">
            <div class="row margin">
                <div class="col-md-offset-2 col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">Meld een probleem:</div>

                        <div class="panel-body">
                            <form action="" class="form-horizontal" method="POST">
                                {{-- CSRF Token --}}
                                {{ csrf_field() }}

                                {{-- Name form-group --}}
                                <div class="form-group">

                                </div>

                                {{-- Email form-group --}}
                                <div class="form-group">

                                </div>

                                {{-- Category form-group --}}
                                <div class="form-group">

                                </div>

                                {{-- Description form-group --}}
                                <div class="form-group">

                                </div>
                        </div>

                        <div class="panel-footer">
                            <button type="submit" class="btn btn-sm btn-success"></button>
                            <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>