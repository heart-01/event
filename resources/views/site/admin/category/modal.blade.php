<!-- modal Add -->
<div class="modal fade" id="showAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="font-family: kanit;">
            <div class="modal-header text-white bg-primary">
                <h5 class="modal-title" id="exampleModalLabel"><i class="far fa-calendar-alt mr-2"></i> Create Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?= Form::open(array('route' => 'category.store','id' => 'frmAdd','files' =>true)) ?>
                <div class="form-group">
                    <div class="form-group">
                        <div class="form-group">
                            <?= Form::label('name', '* Category '); ?>
                            <?= Form::text('name', null, ['class' => 'form-control mb-3', 'placeholder' => 'Name Category', 'autocomplete'=> 'off','maxlength' =>'100','pattern' =>'^[ก-๏\sa-zA-Z\d]+$' ,'required']); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>       
                <button type="submit" id="btnfrmAdd" class="btn btn-success text-white"><i class="fas fa-sign-in-alt"></i> Confirm</button>
            </div>
            <?= Form::close() ?>
        </div>
    </div>
</div>

<!-- modal edit -->
<div class="modal fade" id="showEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="font-family: kanit;">
            <div class="modal-header text-white bg-warning">
                <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-pencil-alt"></i> EDIT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= Form::open(array('route' => 'category.update','id' => 'frmEdit','files' =>true)) ?>
                <div class="form-group">
                    <div class="form-group">
                        <?= Form::label('name-edit', '* Category : '); ?>
                        <?= Form::text('name-edit', null, ['class' => 'form-control mb-3', 'placeholder' => 'Name Category', 'autocomplete'=> 'off','maxlength' =>'100','pattern' =>'^[ก-๏\sa-zA-Z\d]+$' ,'required']); ?>                     
                        <?= Form::hidden('category_id-edit', null, ['id' => 'category_id-edit'],); ?> 
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>       
                <button type="submit" id="btnfrmEdit" class="btn btn-success text-white"><i class="fas fa-sign-in-alt"></i> Confirm</button>
            </div>
            <?= Form::close() ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#showAdd').on('shown.bs.modal', function() {
            $('#name').trigger('focus');
        });
    });
</script>
<script src="{{ asset('/js/admin/category/modal.js') }}" type="text/javascript"></script>