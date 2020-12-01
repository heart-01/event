<!-- modal Add -->
<div class="modal fade" id="showAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="font-family: kanit;">
            <div class="modal-header text-white bg-primary">
                <h5 class="modal-title" id="exampleModalLabel"><i class="far fa-calendar-alt mr-2"></i> Create Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?= Form::open(array('route' => 'calendarEvent.store','id' => 'frmAdd','files' =>true)) ?>
                <div class="form-group">
                    <div class="form-group">
                        <div class="form-group">
                            <?= Form::label('name', '* Event '); ?>
                            <?= Form::text('name', null, ['class' => 'form-control mb-3', 'placeholder' => 'Name Event', 'autocomplete'=> 'off','maxlength' =>'100','pattern' =>'^[ก-๏\sa-zA-Z\d]+$' ,'required']); ?>
                            <?= Form::label('description', '* Description '); ?>
                            <?= Form::text('description', null, ['class' => 'form-control mb-3', 'placeholder' => 'Description', 'autocomplete'=> 'off','maxlength' =>'100','pattern' =>'^[ก-๏\sa-zA-Z\d]+$' ,'required']); ?>
                            <?= Form::label('category', '* Category  '); ?>
                            <?= Form::select('category', App\EventCategory::pluck('name', 'category_id'), null, ['class' => 'form-control selectpicker mb-3', 'dropupAuto' =>'false', 'data-size' =>'3', 'data-live-search' =>'true', 'placeholder' => 'Select Category' , 'required']); ?>
                            <?= Form::label('eventDateFormTo', '* Event DateForm - DateTo'); ?>
                            <?= Form::text('eventDateFormTo', null, ['class' => 'form-control mb-3', 'placeholder' => 'Event DateForm - DateTo', 'autocomplete'=> 'off', 'pattern' =>'(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-([0-9]{4})( - )(\d{1,2}-\d{1,2}-\d{4})']); ?>
                            <?= Form::label('registerStartEndDate', '* Register Event DateForm - DateTo'); ?>
                            <?= Form::text('registerStartEndDate', null, ['class' => 'form-control mb-3', 'placeholder' => 'Register Event DateForm - DateTo', 'autocomplete'=> 'off', 'pattern' =>'(\d{1,2}-\d{1,2}-\d{4} - \d{1,2}-\d{1,2}-\d{4})']); ?>
                            <?= Form::label('poster', 'Poster And Banner'); ?>
                            <?= Form::file('poster', ['class' =>'mb-3']); ?>
                            <?= Form::label('SurveyRequired', '* SurveyRequired '); ?>
                            <?= Form::select('SurveyRequired', ['1'=>'Available', '0'=>'Unavailable'], null, ['class' => 'form-control selectpicker mb-3', 'dropupAuto' =>'false', 'data-size' =>'3', 'placeholder' => 'Select SurveyRequired' , 'required']); ?>
                            <?= Form::label('certificateAvailable', '* CertificateAvailable '); ?>
                            <?= Form::select('certificateAvailable', ['1'=>'Available', '0'=>'Unavailable'], null, ['class' => 'form-control selectpicker mb-3', 'dropupAuto' =>'false', 'data-size' =>'3', 'placeholder' => 'Select CertificateAvailable' , 'required']); ?>
                            <?= Form::label('organizer', '* Organizer '); ?>
                            <?= Form::text('organizer', null, ['class' => 'form-control mb-3', 'placeholder' => 'Organizer', 'autocomplete'=> 'off','maxlength' =>'100','pattern' =>'^[ก-๏\sa-zA-Z\d]+$' ,'required']); ?>
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
                <?= Form::open(array('route' => 'calendarEvent.update','id' => 'frmEdit','files' =>true)) ?>
                <div class="form-group">
                    <div class="form-group">
                        <?= Form::label('name-edit', '* Event : '); ?>
                        <?= Form::text('name-edit', null, ['class' => 'form-control mb-3', 'placeholder' => 'Name Event', 'autocomplete'=> 'off','maxlength' =>'100','pattern' =>'^[ก-๏\sa-zA-Z]+$' ,'required']); ?>
                        <?= Form::label('description-edit', '* Description '); ?>
                        <?= Form::text('description-edit', null, ['class' => 'form-control mb-3', 'placeholder' => 'Description', 'autocomplete'=> 'off','maxlength' =>'100','pattern' =>'^[ก-๏\sa-zA-Z\d]+$' ,'required']); ?>
                        <?= Form::label('category-edit', '* Category  '); ?>
                        <?= Form::select('category-edit', App\EventCategory::pluck('name', 'category_id'), null, ['class' => 'form-control selectpicker mb-3', 'dropupAuto' =>'false', 'data-size' =>'3', 'data-live-search' =>'true', 'placeholder' => 'Select Category' , 'required']); ?>
                        <?= Form::label('eventDateFormTo-edit', '* Event DateForm - DateTo'); ?>
                        <?= Form::text('eventDateFormTo-edit', null, ['class' => 'form-control mb-3', 'placeholder' => 'Event DateForm - DateTo', 'autocomplete'=> 'off', 'pattern' =>'(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-([0-9]{4})( - )(\d{1,2}-\d{1,2}-\d{4})']); ?>
                        <?= Form::label('registerStartEndDate-edit', '* Register Event DateForm - DateTo'); ?>
                        <?= Form::text('registerStartEndDate-edit', null, ['class' => 'form-control mb-3', 'placeholder' => 'Register Event DateForm - DateTo', 'autocomplete'=> 'off', 'pattern' =>'(\d{1,2}-\d{1,2}-\d{4} - \d{1,2}-\d{1,2}-\d{4})']); ?>
                        <?= Form::label('poster-edit', 'Poster '); ?>
                        <div class="text-center">                            
                            <a id="link-img-edit" href="" data-lity>
                                <img id="img-edit" src="" style="width:100px">
                            </a>
                        </div>
                        <?= Form::file('poster-edit', ['class' =>'mb-3']); ?>
                        <?= Form::label('SurveyRequired-edit', '* SurveyRequired '); ?>
                        <?= Form::select('SurveyRequired-edit', ['1'=>'Available', '0'=>'Unavailable'], null, ['class' => 'form-control selectpicker mb-3', 'dropupAuto' =>'false', 'data-size' =>'3', 'placeholder' => 'Select SurveyRequired' , 'required']); ?>
                        <?= Form::label('certificateAvailable-edit', '* CertificateAvailable '); ?>
                        <?= Form::select('certificateAvailable-edit', ['1'=>'Available', '0'=>'Unavailable'], null, ['class' => 'form-control selectpicker mb-3', 'dropupAuto' =>'false', 'data-size' =>'3', 'placeholder' => 'Select CertificateAvailable' , 'required']); ?>
                        <?= Form::label('organizer-edit', '* Organizer '); ?>
                        <?= Form::text('organizer-edit', null, ['class' => 'form-control mb-3', 'placeholder' => 'Organizer', 'autocomplete'=> 'off','maxlength' =>'100','pattern' =>'^[ก-๏\sa-zA-Z\d]+$' ,'required']); ?>
                        <?= Form::hidden('event_id-edit', null, ['id' => 'event_id-edit'],); ?>                        
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

        // Daterangepicker Add
        $('#eventDateFormTo').daterangepicker({
            drops: 'up',
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });
        $('#eventDateFormTo').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
        });
        $('#eventDateFormTo').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

        $('#registerStartEndDate').daterangepicker({
            drops: 'up',
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });
        $('#registerStartEndDate').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
        });
        $('#registerStartEndDate').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

        // Daterangepicker Edit
        $('#eventDateFormTo-edit').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });
        $('#eventDateFormTo-edit').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
        });
        $('#eventDateFormTo-edit').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

        $('#registerStartEndDate-edit').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });
        $('#registerStartEndDate-edit').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
        });
        $('#registerStartEndDate-edit').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

    });
</script>
<script src="{{ asset('/js/admin/calendarEvent/modal.js') }}" type="text/javascript"></script>