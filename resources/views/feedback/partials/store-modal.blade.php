{{-- Modal --}}
<div id="newTicket" class="modal fade" role="dialog">
    <div class="modal-dialog">

        {{-- Modal content--}}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Creatie new ticket.</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('report.store') }}">
                    {{-- csrf token --}}
                    {{ csrf_field() }}

                    {{-- Hidden input --}}
                    <input type="hidden" name="naam"  value="{!! auth()->user()->name !!}" />
                    <input type="hidden" name="email" value="{!! auth()->user()->email !!}" />

                    {{-- Category form-group --}}
                    <div class="form-group">
                        <select name="categorie" class="form-control">
                            <option value="">-- Selecteer de categorie --</option>

                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->categorie }} </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Melding form-group --}}
                    <div class="form-group">
                        <textarea name="melding" class="form-control" placeholder="Ticket beschrijving" rows="8"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Invoegen</button>
                </form>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Sluiten</button>
            </div>
        </div>

    </div>
</div>