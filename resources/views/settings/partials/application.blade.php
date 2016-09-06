<div class="panel panel-default">
    <div class="panel-heading">Applicatie instellingen</div>

    <div class="panel-body">
        <form action="{!! route('settings.application') !!}" method="POST" class="form-horizontal">
            {{-- CSRF Token --}}
            {{ csrf_field() }}

            {{-- Counter form group --}}
            <div class="form-group">
                <label for="counter" class="col-sm-3 control-label">
                    Aantal handtekeningen <span class="text-danger">*</span>
                </label>

                <div class="col-sm-9">
                    <input type="number" value="{!! $signatures !!}" name="counter" class="form-control" placeholder="Aantal handtekeningen" />
                    <span class="help-block">De aantal handtekeningen die nodig zijn voor de petitie.</span>
                </div>
            </div>

            {{-- Form submit & reset button --}}
            <div class="form-group ">
                <label for="#" class="control-label col-md-3"></label>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>