@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Globale info:</div>

                    {{-- Ticket info --}}
                    <div class="panel-body">
                        <h4>Raporterings info:</h4>

                        <table>
                            <tbody>
                            <tr>
                                <td style="width: 150px;"><strong>Gecreerd door:</strong></td>
                                <td>{{ $item->naam }}</td>
                            </tr>
                            <tr>
                                <td style="width: 150px;"><strong>Persoon email:</strong></td>
                                <td>{{ $item->email }}</td>
                            </tr>
                            <tr>
                                <td style="width: 150px;"><strong>Categorie:</strong></td>
                                <td>{{ $item->category->categorie }}</td>
                            </tr>
                            </tbody>
                        </table>

                        <h4 style="margin-top: 20px;">Gebruikers feedback:</h4>
                        {{ $item->melding }}
                    </div>
                </div>
                {{-- /Ticket info --}}
            </div>

            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Ticket Info.</div>

                    <ul class="list-group">
                        <li class="list-group-item">
                            Ticket ID: <span class="pull-right"><strong><code>#T{{ $item->id }}</code></strong></span>
                        </li>
                        <li class="list-group-item">
                            Gecreerd op:

                            <span class="pull-right">
                                <strong>{{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</strong>
                            </span>
                        </li>
                        <li class="list-group-item">
                            Update op:

                            <span class="pull-right">
                                <strong>{{ Carbon\Carbon::parse($item->updated_at)->format('d-m-Y') }}</strong>
                            </span>
                        </li>
                    </ul>
                </div>

                <div class="btn-group">
                    <a href="" class="btn btn-default">GitHub Push</a>
                    <a href="" class="btn btn-default">Sluit ticket</a>
                </div>
            </div>
        </div>
    </div>
@endsection