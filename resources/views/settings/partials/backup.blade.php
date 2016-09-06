<div class="panel panel-default">
    <div class="panel-heading">Database Instellingen:</div>

    <div class="panel-body">
        <form action="" method="POST" class="form-horizontal">
            {{-- CSRF Token --}}
            {{ csrf_field() }}

            {{-- Database connection form-group --}}
            <div class="form-group {{ $errors->has('database') ? ' has-error' : '' }}">
                <label for="database" class="col-sm-3 control-label">Database connection:</label>
                <div class="col-sm-8">
                    <select name="database" id="database" class="form-control">
                        <option value="" selected>-- connection --</option>
                        <option value="mysql">Mysql</option>
                    </select>
                    <span class="help-block">The name of the connection to the databases that should be part of the backup.</span>
                </div>
            </div>

            {{-- Store all backups form-group --}}
            <div class="form-group {{ $errors->has('keepAllBackupsForDaysAll') ? ' has-error' : '' }}">
                <label for="store" class="col-md-3 control-label">Store all backups</label>
                <div class="col-md-8">
                    <input type="number" name="keepAllBackupsForDaysAll" class="form-control" value="{{ $StoreAllBackups }}">
                    <span class="help-block">The amount of days that all backups must be kept.</span>
                </div>
            </div>

            {{-- Keep daily backups form-group --}}
            <div class="form-group {{ $errors->has('keepAllBackupsForDaysAll') ? ' has-error' : '' }}">
                <label for="keep" class="col-md-3 control-label">Keep daily backups</label>
                <div class="col-md-8">
                    <input type="number" name="keepAllBackupsForDays" class="form-control" value="{{ $KeepDailyBackups }}">
                    <span class="help-block">The amount of days that all daily backups must be kept.</span>
                </div>
            </div>


            {{-- Weekly backup form-group --}}
            <div class="form-group {{ $errors->has('keepAllBackupsForDays') ? ' has-error' : '' }}">
                <label for="weekly" class="col-md-3 control-label">Weekly backups</label>
                <div class="col-md-8">
                    <input type="number" name="keepWeeklyBackupsForWeeks" class="form-control" value="{{ $WeeklyBackups }}">
                    <span class="help-block">The amount of weeks of which one weely backup must be kept</span>
                </div>
            </div>

            {{-- Montly backups form-group --}}
            <div class="form-group {{ $errors->has('keepWeeklyBackupsForWeeks') ? ' has-error' : '' }}">
                <label for="monthly" class="col-md-3 control-label">Monthly Backups</label>
                <div class="col-md-8">
                    <input type="number" name="keepMonthlyBackupsForWeeks" class="form-control" value="{{ $MonthlyBackups }}">
                    <span class="help-block">The amount of days that all daily backups must be kept.</span>
                </div>
            </div>

            {{-- Keep yearly backups form-group --}}
            <div class="form-group {{ $errors->has('keepMonthlyBackupsForWeeks') ? ' has-error' : '' }}">
                <label for="yearly" class="col-md-3 control-label">Keep yearly backups</label>
                <div class="col-md-8">
                    <input type="number" name="keepAllBackupsYearly" class="form-control" value="{{ $KeepYearlyBackups }}">
                    <span class="help-block">The ampunt of days that all yearly backups must be kept.</span>
                </div>
            </div>

            {{-- SUbmit and rest form-group --}}
            <div class="form-group {{ $errors->has('keepAllBackupsYearly') ? ' has-error' : '' }}">
                <label for="#" class="control-label col-md-3"></label>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>