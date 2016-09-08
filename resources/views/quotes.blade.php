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
    {{-- END navbar --}}

    {{-- Content --}}
    <div class="container">
        <div class="row margin">
            <div class="col-md-offset-2 col-md-8">

                {{-- APC Flash session --}}
                @if (Session::has('message') && Session::has('class'))
                    <div class="{{ Session::get('class') }}">
                        {{ Session::get('message') }}
                    </div>
                @endif
                {{-- /APC Flash session --}}

                <div class="panel panel-default">
                    <div class="panel-heading">Getuigenissen:</div>

                    <div class="panel-body">
                        <p>
                            Als ondersteuning van de actie die wij wensen te ondernemen voor de statuten van personen met
                            handicap zijn we opzoek naar getuigenissen over de onleefbare situatie van
                            mensen die slachtoffer zijn van het huidig system.
                        </p>

                        <p>
                            Vandaar dat wij u vriendelijk willen vragen, als u iemand bent met een handicap. Om uw getuigenis in te sturen.
                        </p>
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('quote.store') }}" method="POST" class="form-horizontal">
                            {{-- CSRF TOKEN --}}
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('naam') ? 'has-error' : '' }}">
                                <div class="col-md-4">
                                    <input type="text" name="naam" class="form-control" placeholder="Uw naam">

                                    @if($errors->has('naam'))
                                        <span class="help-block">* {{ $errors->first('naam') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <div class="col-md-6">
                                    <input type="text" name="email" class="form-control" placeholder="uw email adres">

                                    @if($errors->has('email'))
                                        <span class="help-block">* {{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('getuigenis') ? 'has-error' : '' }}">
                                <div class="col-md-10">
                                    <textarea name="getuigenis" class="form-control" id="" rows="7" placeholder="Uw getuigenis."></textarea>

                                    @if($errors->has('getuigenis'))
                                        <span class="help-block">* {{ $errors->first('getuigenis') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10">
                                    <input type="checkbox" name="publish" value="true"> Mijn getuigenis mag gepubliceerd worden.
                                </div>
                            </div>

                    </div>

                    <div class="panel-footer">
                        <button type="submit" class="btn btn-sm btn-success">Insturen</button>
                        <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                        </form>

                        <span class="pull-right">
                            <a href="{{ route('disclaimer') }}" class="btn btn-sm btn-default">Disclaimer</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- /Content --}}
    </body>
</html>