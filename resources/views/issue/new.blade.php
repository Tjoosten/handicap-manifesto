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

            .form-control::-moz-placeholder {
                color: #7b858a;
            }
            .form-control:-ms-input-placeholder {
                color: #7b858a;
            }
            .form-control::-webkit-input-placeholder {
                color: #7b858a;
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
                            <form action="{{ route('report.store') }}" class="form-horizontal" method="POST">
                                {{-- CSRF Token --}}
                                {{ csrf_field() }}

                                {{-- Name form-group --}}
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="uw naam" name="naam" />
                                    </div>
                                </div>

                                {{-- Email form-group --}}
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="uw email adres" name="email" />
                                    </div>
                                </div>

                                {{-- Category form-group --}}
                                <div class="form-group">
                                    <div class="col-sm-5">
                                        <select name="categorie" class="form-control">
                                            <option value="">-- selecteer de categorie --</option>

                                            @foreach($statusses as $status)
                                                <option value="{{ $status->id }}">{{ $status->categorie }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Description form-group --}}
                                <div class="form-group">
                                    <div class="col-sm-8">
                                        <textarea name="melding" class="form-control" placeholder="Beschrijving van het probleem" rows="7"></textarea>
                                    </div>
                                </div>
                        </div>

                        <div class="panel-footer">
                            <button type="submit" class="btn btn-sm btn-success">Report</button>
                            <button type="reset" class="btn btn-sm btn-danger">Reset</button>

                            <div class="pull-right">
                                <a href="{{ route('home') }}" class="btn btn-sm btn-primary">Ga terug</a>
                                <a href="{{ route('disclaimer') }}" class="btn btn-sm btn-default">Disclaimer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>