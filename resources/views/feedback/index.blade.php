@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{-- Upper content --}}
            <div class="col-sm-12">
                {{-- Search form --}}
                <div class="pull-left" style="margin-bottom: 15px;">
                    <form class="form-inline" action="" method="POST">
                        {{-- CSRF token --}}
                        {{ csrf_field() }}

                        <input name="name" class="form-control" id="name" type="text" placeholder="Zoekterm (naam)">
                        <button class="btn btn-primary" type="submit">Zoek</button>
                    </form>
                </div>
                {{-- /Search form --}}

                {{-- export & new item button --}}
                <div class="pull-right" style="margin-bottom: 15px;">
                    <a href="" class="btn btn-success">Nieuw ticket</a>
                    <a href="" class="btn btn-default">Exporteren</a>
                </div>
                {{-- /export & new item button --}}
            </div>
            {{-- /Upper content --}}

            {{-- Content --}}
            <div class="col-sm-12">
                @if (count($errors) == 0)
                    <div class="alert alert-danger">
                        Er zijn geen feedback/fout meldingen gemaakt.
                    </div>
                @else
                    <div class="panel panel-default">
                        <div class="panel-heading">Open Feedback tickets:</div>

                        <div class="panel-body">
                            <table class="table table-condensed table-hover">
                                <thead>
                                <tr>
                                    <th>#:</th>
                                    <th>Naam:</th>
                                    <th>Email:</th>
                                    <th>Categorie:</th>
                                    <th>Status:</th>
                                    <th>Creatie datum:</th>
                                    <th></th> {{-- Functions --}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($errors as $error)
                                    <tr>
                                        <td><code>#T{!! $error->id !!}</code></td>
                                        <td>{!! $error->naam !!}</td>
                                        <td>{!! $error->email !!}</td>
                                        <td><span class="label label-info">{!! $error->category->categorie !!}</span></td>
                                        <td>{{-- $error->label->name --}}</td>
                                        <td> {!! $error->created_at !!}</td>

                                        {{-- Functions --}}
                                        <td>
                                            <a href="" class="label label-info">Bekijken</a>
                                            <a href="" class="label label-danger">Sluiten</a>
                                        </td>
                                        {{-- /End functions --}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
            {{-- /content --}}
        </div>
    </div>
@endsection