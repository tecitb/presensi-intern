<script type="text/javascript" language="JavaScript" src="<?=BASE_URL?>/js/moment.min.js"></script>
<script type="text/javascript" language="JavaScript" src="<?=BASE_URL?>/js/moment-timezone-with-data.min.js"></script>
<script type="text/javascript">var MEETING_ID = '<?=addslashes($id)?>';</script>
<style type="text/css">
    .img-circle {
        width: 80px;
        height: 80px;
        overflow: hidden;
        border-radius: 100%;
        background-image: url('<?=BASE_URL?>/img/avatar.png');
        background-size: cover;
    }
    .card-inp {
        display: none;
    }
</style>

<div class="container" style="margin-top: 24px">
    <div class="row">
        <div class="col-md-12">
            <h3>Record attendance</h3>
            <h5>on meeting: <span id="meeting-name"></span></h5>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="margin-top: 16px;">
                <div class="card-header">Person lookup</div>
                <div class="card-body">
                    <label for="attn-tec_regno">Registration number</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" id="attn-tec_regno" aria-describedby="basic-addon3">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="btn-lookup">Lookup</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-inp" style="margin-top: 16px;">
                <div class="card-header">Entry authorization</div>
                <div class="card-body">
                    <label for="attn-notes">Additional notes</label>
                    <textarea id="attn-notes" class="form-control"></textarea>
                    <div style="margin-top: 32px;">
                        <button type="button" id="btn-cancel" class="btn btn-secondary">Cancel</button>
                        &nbsp;
                        <button type="button" id="btn-grant" class="btn btn-success">Grant entry</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-inp" style="margin-top: 16px;" id="person-card">
                <div class="card-header">Person details</div>
                <div class="card-body" style="background: #fbfbfb">
                    <div class="img-circle" id="profile-url">
                    </div>
                    <h4 style="margin-top: 16px; margin-bottom: 0;" id="name"></h4>
                    <h5 style="margin: 0;" id="tec_regno"></h5>
                </div>
                <div class="card-body" id="attn-notices">

                </div>
            </div>
            <div class="card card-inp" style="margin-top: 16px;">
                <div class="card-header">Absence notices</div>
                <div>
                    <ul class="list-group list-group-flush" id="abs-notices">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Cras justo odio
                            <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Dapibus ac facilisis in
                            <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Morbi leo risus
                            <span class="badge badge-primary badge-pill">1</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?=BASE_URL?>/js/meetings-view-attn-record.js"></script>