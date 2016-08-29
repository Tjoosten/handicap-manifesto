@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                {{-- Search box --}}
                <div style="margin-bottom: 15px;" class="pull-left">
                    <form action="" method="POST" class="form-inline">
                        <input type="text" id="name" name="name" placeholder="Zoekterm" class="form-control">
                        <button type="submit" class="btn btn-primary">Zoek</button>
                    </form>
                </div>
                {{-- /Search box --}}

                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Exporteer <span class="caret"></span>
                        </button>

                        <ul style="right: 0; left: auto;" class="dropdown-menu">
                            <li><a href="{{ route('export.excel') }}">Excel bestand</a></li>
                            <li><a href="{{ route('export.excel.2007') }}">Excel2007 bestand</a></li>
                            <li><a href="{{ route('export.csv') }}">CSV Bestand</a></li>
                            <li><a href="{{ route('export.pdf') }}">PDF Bestand</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                {{-- Signatures --}}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Handtekeningen overzicht:

                        <div class="pull-right">
                            @if (count($signatures) > 0 && count($signatures) === 1)
                                <span class="label label-success">{{ count($signatures) }} Handtekening</span>
                            @elseif (count($signatures) === 0)
                                <span class="label label-danger">{{ count($signatures) }} Handtekeningen</span>
                            @else
                                <span class="label label-success">{{ count($signatures) }} Handtekeningen</span>
                            @endif
                        </div>
                    </div>

                    <div class="panel-body">
                        <table class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Naam:</th>
                                    <th>Geboortedatum:</th>
                                    <th>Stad:</th>
                                    <th>Email:</th>
                                    <th>Getekend op:</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($signatures as $signature)
                                    <tr>
                                        <td> <code>#S{!! $signature->id !!}</code></td>
                                        <td> {{ $signature->naam }}</td>
                                        <td> {{ $signature->geboortedatum }}</td>
                                        <td> {{ $signature->stad }}</td>
                                        <td> {{ $signature->email }} </td>
                                        <td> {{ $signature->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- /Signaturs  --}}
            </div>
        </div>
    </div>
@endsection