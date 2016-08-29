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
                <div class="panel panel-default">
                    <div class="panel-heading">Logins:</div>

                    <div class="panel-body">
                        {{-- Overview table --}}
                        <table class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Gebruikersnaam:</th>
                                    <th>Email adres:</th>
                                    <th>Permissie profiel:</th>
                                    <th>Acties:</th> {{-- Functions --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td> <code> #U{{ $user->id }} </code> </td>
                                        <td> {!! $user->name !!} </td>
                                        <td> {!! $user->email !!} </td>
                                        <td> <span class="label label-info">Admin</span> </td>

                                        <td>
                                            <a class="label label-danger" href="{{ route('users.destroy', ['id' => $user->id]) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                                @if(count($users) >= 15)
                                    {{ $users->render() }}
                                @endif
                            </tbody>
                        </table>
                        {{-- /Overview table --}}
                    </div>
                </div>
            </div>
            {{-- /Content --}}
        </div>
    </div>
@endsection