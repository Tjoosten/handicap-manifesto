@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{-- Upper content --}}
            <div class="col-sm-12">
                {{-- Search form --}}
                <div class="pull-left">
                    <form class="form-inline" action="http://localhost:8000/signature/backend/search" method="POST">
                        {{-- CSRF token --}}
                        {{ csrf_field() }}

                        <input name="name" class="form-control" id="name" type="text" placeholder="Zoekterm (naam)">
                        <button class="btn btn-primary" type="submit">Zoek</button>
                    </form>
                </div>
                {{-- /Search form --}}

                {{-- export & new item button --}}
                <div class="pull-right">
                    <a href="" class="btn btn-primary">Nieuw ticket</a>
                    <a href="" class="btn btn-default">Exporteren</a>
                </div>
                {{-- /export & new item button --}}
            </div>
            {{-- /Upper content --}}

            {{-- Content --}}
            <div class="col-sm-12">

            </div>
            {{-- /content --}}
        </div>
    </div>
@endsection