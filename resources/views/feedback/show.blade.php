@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{-- Tab menu --}}
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                        Rapport
                    </a>
                </li>

                <li role="presentation">
                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                        Updates/Commentaar
                    </a>
                </li>
            </ul>
            {{-- /Tab menu --}}

            {{-- Tab content --}}
            {{-- /Tab content --}}
        </div>
    </div>
@endsection