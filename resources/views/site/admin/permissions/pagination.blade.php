<div class="row">
    <div class="col-md-12">
        <div class="form-group row float-right">
            <label for="serach" class="col-sm-3 col-form-label col-form-label-sm">Search : </label>
            <div class="col-sm-9">
                <input type="text" class="form-control form-control-sm" name="serach" id="serach" placeholder=" By StudentID or Name">
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <table class="table table-bordered table-hover dataTable dtr-inline text-center" role="grid">
            <thead>
                <tr role="row">
                    <th width="5%" class="sorting hand" tabindex="0" data-sorting_type="desc" data-column_name="id" >ID <span id="id_icon"><i class="fas fa-arrow-up"></i></span></th>
                    <th width="10%">Name</th>
                    <th width="10%">School</th>
                    <th width="10%">FOS</th>
                    <th width="10%">TEL</th>
                    <th width="15%" >Action</th>
                </tr>
            </thead>
            <tbody>
                @include('site/admin/permissions/data-row')
            </tbody>
        </table>
    </div>
</div>
<div class="row" id="pagination-link">
    @include('site/admin/permissions/pagination-link')
</div>