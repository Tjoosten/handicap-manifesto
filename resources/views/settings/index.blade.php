@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{-- Flash session --}}
        {{-- /Flash session--}}

        {{-- navigation --}}
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-heading">Menu</div>

                <div class="list-group">
                    <a href="#backup" aria-controls="backup" role="tab" data-toggle="tab" class="list-group-item">Database backup</a>
                    <a href="#application" aria-controls="application" role="tab" data-toggle="tab" class="list-group-item">Applicatie</a>
                </div>
            </div>
        </div>
        {{-- /navigation --}}

        {{-- Content --}}
        <div class="col-sm-9">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="backup">
                    @include('settings.partials.backup')
                </div>

                <div role="tabpanel" class="tab-pane fade in" id="application">
                    @include('settings.partials.application')
                </div>
            </div>
        </div>
        {{-- /Content --}}
    </div>
</div>
@endsection