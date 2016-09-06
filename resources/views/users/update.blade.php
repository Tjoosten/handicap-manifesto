@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{-- Sidebar --}}
            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Menu:</div>

                    <div class="list-group">
                        <a href="{{ route('users') }}" class="list-group-item">Login overzicht</a>
                        <a href="{{ url('/register') }}" class="list-group-item">Registreer login</a>
                        <a href="" class="list-group-item">Permissies</a>
                    </div>
                </div>
            </div>
            {{-- /Sidebar --}}

            {{-- Content --}}
            <div class="col-md-9">
                @if (Session::has('class') && Session::has('message'))
                    <div class="{{ Session::get('class') }}">
                        {{ Session::get('message') }}
                    </div>
                @endif


                <div class="panel panel-default">
                    <div class="panel-heading">Profiel configuratie:</div>
                        <div class="panel-body">
                            <form action="{{ route('profile.update') }}" method="POST" class="form-horizontal">
                                {{-- CSRF Token --}}
                                {{ csrf_field()  }}

                                {{-- Name form-group --}}
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name" class="control-label col-sm-3">
                                        Naam: <span class="text text-danger">*</span>
                                    </label>

                                    <div class="col-md-6">
                                        <input type="text" name="name" value="{{ $user->name or old('name') }}" class="form-control" placeholder="Username">

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- Email form-group --}}
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="email" class="control-label col-sm-3">
                                        Email adres: <span class="text-danger">*</span>
                                    </label>

                                    <div class="col-md-6">
                                        <input type="email" name="email" value="{{ $user->email or old('email') }}" class="form-control" placeholder="Your email adres.">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- Password form-group --}}
                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="control-label col-sm-3">
                                        Wachtwoord: {{-- <span class="text-danger">*</span> --}}
                                    </label>

                                    <div class="col-md-6">
                                        <input type="password" placeholder="Wachtwoord" class="form-control" name="password">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- Password confirmation form-group --}}
                                <div class="form-group">
                                    <label for="password_confirmation" class="control-label col-sm-3">
                                        Bevestiging wachtwoord: {{-- <span class="text-danger">*</span> --}}
                                    </label>

                                    <div class="col-md-6">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Wachtwoord bevestiging">
                                    </div>
                                </div>

                                {{-- Submit & Reset button --}}
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-md-6">
                                        <button type="submit" class="btn btn-primary">Aanpassen</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- /Content --}}
        </div>
    </div>
@endsection