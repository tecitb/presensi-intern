<script type="text/javascript" language="JavaScript" src="<?=BASE_URL?>/js/moment.min.js"></script>
<script type="text/javascript" language="JavaScript" src="<?=BASE_URL?>/js/moment-timezone-with-data.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" /><div class="container" style="margin-top: 24px">
    <div class="row">
        <div class="col-12">
            <h1>Add a new meeting</h1>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7 order-md-0">
            <div class="form-group">
                <label for="meeting-name" class="cols-sm-2 control-label">Meeting name</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control" id="meeting-name" placeholder="Internship Day 0">
                        <div class="invalid-feedback">
                            Invalid name
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="meeting-location" class="cols-sm-2 control-label">Location</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control" id="meeting-location" placeholder="7601, Labtek V">
                        <div class="invalid-feedback">
                            Invalid location
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="type" class="cols-sm-2 control-label">Type of meeting</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <select class="form-control" id="is_offline">
                            <option value="1">Offline</option>
                            <option value="0">Online</option>
                        </select>
                        <div id="email-feedback" class="invalid-feedback">
                            Invalid type
                        </div>
                    </div>
                </div>
            </div>

            <label for="dtpicker" class="cols-sm-2 control-label" style="margin-top: 16px;">Scheduled date and time</label>
            <div style="overflow:hidden; margin-top: 8px;" id="dtpicker">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="sch"></div>
                        </div>
                    </div>
                </div>
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
    <button class="btn btn-primary" style="margin-top: 16px;" id="btn-submit">Submit</button>
    <div style="width: 30px;">
        <div class="loader loader-small" style="display: none;"></div>
    </div>
</div>
<script src="<?=BASE_URL?>/js/meetings-add.js" defer="defer"></script>