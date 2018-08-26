<script type="text/javascript" language="JavaScript" src="<?=BASE_URL?>/js/moment.min.js"></script>
<script type="text/javascript" language="JavaScript" src="<?=BASE_URL?>/js/moment-timezone-with-data.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
<script type="text/javascript">var MEETING_ID = '<?=addslashes($id)?>';</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" /><div class="container" style="margin-top: 24px">
    <div class="row">
        <div class="col-12">
            <h1>Meeting details</h1>
            <hr>
        </div>
    </div>

    <div class="row" id="mview" style="display: none;">
        <div class="col-md-7 order-md-0">
            <label for="meeting-name" class="cols-sm-2 control-label">Meeting name</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control editable" id="meeting-name" data-property="name" placeholder="Internship Day 0" disabled="disabled">
                <div class="input-group-append">
                    <button class="btn btn-success btn-edit-save" style="display: none;" data-target="#meeting-name" type="button">Save <i class="fa fa-check"></i></button>
                    <button class="btn btn-secondary btn-edit" data-target="#meeting-name" type="button"><i class="fa fa-edit"></i></button>                </div>
            </div>

            <label for="meeting-location" class="cols-sm-2 control-label">Location</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control editable" id="meeting-location" data-property="location" placeholder="7601, Labtek V" disabled="disabled">
                <div class="input-group-append">
                    <button class="btn btn-success btn-edit-save" style="display: none;" data-target="#meeting-location" type="button">Save <i class="fa fa-check"></i></button>
                    <button class="btn btn-secondary btn-edit" data-target="#meeting-location" type="button"><i class="fa fa-edit"></i></button>
                </div>
            </div>

            <label for="is_offline" class="cols-sm-2 control-label">Type of meeting</label>
            <div class="input-group mb-3">
                <select class="form-control editable" id="is_offline" data-property="is_offline" disabled="disabled">
                    <option value="1">Offline</option>
                    <option value="0">Online</option>
                </select>
                <div class="input-group-append">
                    <button class="btn btn-success btn-edit-save" style="display: none;" data-target="#is_offline" type="button">Save <i class="fa fa-check"></i></button>
                    <button class="btn btn-secondary btn-edit" data-target="#is_offline" type="button"><i class="fa fa-edit"></i></button>
                </div>
            </div>

            <label for="dtpicker" class="cols-sm-2 control-label" style="margin-top: 16px;">Scheduled date and time</label>
            <div style="overflow:hidden;" id="dtpicker">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="date-show" disabled="disabled">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" id="btn-edit-date" type="button"><i class="fa fa-edit"></i></button>
                    </div>
                </div>

                <div id="date-selector" style="margin-top: 16px; display: none;">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="sch"></div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success" style="margin-top: 16px;" id="btn-date-save">Save <i class="fa fa-check"></i></button>
                    <script type="text/javascript">
                        $(function () {
                            $('#sch').datetimepicker({
                                inline: true,
                                sideBySide: true,
                                timeZone: 'Asia/Jakarta'
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="col-md-5 order-md-1">
            <label for="status" class="cols-sm-2 control-label">Meeting status</label>
            <div class="input-group mb-3">
                <select class="form-control editable" data-property="status" id="status" disabled="disabled">
                    <option value="0">Not started</option>
                    <option value="1">Started</option>
                    <option value="2">Finished</option>
                </select>
                <div class="input-group-append">
                    <button class="btn btn-success btn-edit-save" style="display: none;" data-target="#status" type="button">Save <i class="fa fa-check"></i></button>
                    <button class="btn btn-secondary btn-edit" data-target="#status" type="button"><i class="fa fa-edit"></i></button>
                </div>
            </div>

            <label for="started-on" class="cols-sm-2 control-label">Started on</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="started-on" placeholder="" disabled="disabled">
            </div>

            <label for="finished-on" class="cols-sm-2 control-label">Finished on</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="finished-on" placeholder="" disabled="disabled">
            </div>
        </div>
    </div>
    <div class="loader loader-big"></div>
</div>
<script src="<?=BASE_URL?>/js/meetings-view.js" defer="defer"></script>