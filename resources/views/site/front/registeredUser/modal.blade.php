<!-- modal Add -->
<div class="modal fade" id="showRegisterEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="font-family: kanit;">
            <div class="modal-header text-white bg-success">
                <h5 class="modal-title" id="exampleModalLabel"><i class="far fa-calendar-alt mr-2"></i> Register Event</h5>
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