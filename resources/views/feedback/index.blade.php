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
                                    {{-- Set label info --}}
                                    @if ($error->status === 0)
                                        <?php
                                            $labelClass = 'label-danger';
                                            $labelName  = 'Gesloten';
                                            $tableClass = 'danger';
                                        ?>
                                    @elseif ($error->status === 1)
                                        <?php
                                            $labelClass = 'label-success';
                                            $labelName  = 'Open';
                                            $tableClass = 'success'
                                        ?>
                                    @endif
                                    {{-- /Set label info --}}

                                    <tr class="{{ $tableClass }}">
                                        <td><code>#T{!! $error->id !!}</code></td>
                                        <td>{!! $error->naam !!}</td>
                                        <td>{!! $error->email !!}</td>
                                        <td><span class="label label-info">{!! $error->category->categorie !!}</span></td>

                                        <td>
                                            <span class="label {{ $labelClass }}"> {{ $labelName }} </span>
                                        </td>

                                        <td> {!! $error->created_at !!}</td>

                                        {{-- Functions --}}
                                        <td>
                                            <a href="{{ route('feedback.show', ['id' => $error->id]) }}" class="label label-info">Bekijken</a>

                                            @if ($error->status === 1)
                                                <a href="{{ route('feedback.status', ['fid' => $error->id, 'status' => 'close']) }}" class="label label-danger">Sluiten</a>
                                            @elseif ($error->status === 0)
                                                <a href="{{ route('feedback.status', ['fid' => $error->id, 'status' => 'open']) }}" class="label label-danger">Heropenen</a>
                                            @endif
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