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
        <style type="text/css">

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

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/nl_NL/sdk.js#xfbml=1&version=v2.7&appId=737866286226228";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <link href="/css/app.css" rel="stylesheet">
    </head>
    <body>
        {{-- Navbar --}}
        {{-- END navbar --}}

        {{-- Content --}}
        <div class="container">
            <div class="row margin">
                <div class="col-md-offset-2 col-md-8">
                    @if (Session::has('class') && Session::has('message'))
                        <div class="{{ Session::get('class') }}">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a class="label label-info" href="{{ asset('document.pdf') }}">Printbare versie</a>
                            <a class="label label-info" href="{{ asset('uitleg.pdf') }}">PDF: petitie uitleg</a>
                            <a class="label label-danger" href="{{ route('report') }}">Meld een probleem</a>
                            <div class="pull-right">
                                <div class="fb-share-button" data-href="https://manifesto.idevelopment.be" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fmanifesto.idevelopment.be%2F&amp;src=sdkpreparse">Delen</a></div>
                            </div>
                        </div>

                        <div class="panel-body">
                            <p>
                                Mensen met een handicap hebben veel extra uitgaven en verbruiken. <br>
                                Enkele vormen van ondersteuning, zoals bijvoorbeeld sociale tarieven voor nutsvoorzieningen en de erkenning voor het omnio-statuut,
                                zijn echter gekoppeld aan de tegemoetkoming voor personen met een handicap.
                            </p>
                            <p>
                                Deze worden berekend op basis van het 'bruto gezamenlijk belastbaar inkomen' te vinden op het aanslagbiljet voor de personenbelasting van 2 jaar terug.
                            </p>
                            <p>
                                Het maximaal toegelaten inkomen ligt bovendien veel hoger voor een werkende invalide dan voor een niet-werkende invalide.
                                Wij willen met de petitie een krachtig burgerinitiatief starten, zodat het federaal parlement ons voorstel op de agenda zet waarbij wij die
                                ondersteuning voor een gehandicapte los willen koppelen van de uitbetaling van de tegemoetkoming.
                                Bovendien vragen wij dat men zich voor die uitbetaling baseert op de <strong>HUIDIGE</strong> financiële situatie van de gehandicapte en niet op deze van 2 jaar eerder.
                            </p>
                            <p>
                                Daarom willen we minstens <strong>100.000 handtekeningen</strong> verzamelen van Belgische stemgerechtigden, voorzien zijn van uw naam, woonplaats, geboortedatum en email.
                            </p>
                            <p>
                                Alvast bij voorbaat dank!!
                            </p>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Petitie tekenen:

                            <div class="pull-right">
                                {{ $signatures }}/<strong>100.000 Handtekeningen</strong>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="{{ route('signature.insert') }}" method="POST">
                                {{-- CSRF TOKEN --}}
                                {{ csrf_field() }}

                                <div class="form-group {{ $errors->has('naam') ? 'has-error' : '' }}">
                                    <div class="col-md-4">
                                        <input type="text"  value="{{ old('naam') }}" name="naam" class="form-control" placeholder="Uw naam en achternaam">

                                        @if($errors->has('naam'))
                                            <span class="help-block">{{ $errors->first('naam') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('geboortedatum') ? 'has-error' : '' }}">
                                        <div class="col-md-2 {{ $errors->has('dag') ? 'has-error' : '' }}">
                                            <select name="dag" class="form-control">
                                                <option value="">- Dag -</option>

                                                @for ($int = 1; $int < 32; $int++)
                                                    @if ($int < 10)
                                                        <option value="0{!! $int !!}">0{!! $int !!}</option>
                                                    @else
                                                        <option value="{!! $int !!}">{!! $int !!}</option>
                                                    @endif
                                                @endfor
                                            </select>
                                        </div>

                                        <div style="padding-right:0; padding-left:0;" class="col-md-2 {{ $errors->has('maand') ? 'has-error' : '' }}">
                                            <select name="maand" class="form-control">
                                                <option value="" selected>- Maand -</option>
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maart</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">Juli</option>
                                                <option value="08">Augustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>

                                        <div class="col-md-2 {{ $errors->has('jaar') ? 'has-error' : '' }}">
                                            <select name="jaar" class="form-control">
                                                <option value="" selected> - Jaar -</option>
                                                @for ($jaar = 1916; $jaar < 2017; $jaar++)
                                                    <option value="{!! $jaar !!}">{!! $jaar !!}</option>
                                                @endfor
                                            </select>
                                        </div>

                                        <div class="col-md-12">
                                            <span class="help-block"><i>Geboortedatum</i></span>
                                        </div>
                                </div>

                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <div class="col-md-6">
                                        <input type="text" value="{{ old('email') }}" name="email" class="form-control" placeholder="Uw email adres">

                                        @if($errors->has('email'))
                                            <span class="help-block">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('stad') ? 'has-error' : '' }}">
                                    <div class="col-md-6">
                                        <input type="text" value="{{ old('stad') }}" name="stad" class="form-control" placeholder="Uw stad">

                                        @if($errors->has('stad'))
                                            <span class="help-block">{{ $errors->first('stad') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button type="submit" class="btn btn-sm btn-success">Insturen</button>
                                <button type="reset" class="btn btn-sm btn-danger">Reset</button>

                                <span class="pull-right">
                                    <a href="{{ route('disclaimer') }}" class="btn btn-sm btn-default">Disclaimer</a>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- /Content --}}
    </body>
</html>
