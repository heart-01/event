<div class="row">
    <div class="col-md-12">
        <div class="form-group row float-right">
            <label for="serach" class="col-sm-3 col-form-label col-form-label-sm">Search : </label>
            <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" name="serach" id="serach" placeholder="Search By Event">
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <table class="table table-bordered table-hover dataTable dtr-inline text-center" role="grid">
            <thead>
                <tr role="row">
                    <th width="10%" class="sorting hand" tabindex="0" data-sorting_type="desc" data-column_name="event_id" >ID <span id="event_id_icon"><i class="fas fa-arrow-up"></i></span></th>
                    <th width="20%">Event</th>
                    <th width="20%" >Action</th>
                </tr>
            </thead>
            <tbody>
                @include('site/admin/calendarEvent/data-row')
            </tbody>
        </table>
    </div>
</div>
<div class="row" id="pagination-link">
    @include('site/admin/calendarEvent/pagination-link')
</div>