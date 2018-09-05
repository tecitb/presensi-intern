<script type="text/javascript" language="JavaScript" src="<?=BASE_URL?>/js/moment.min.js"></script>
<script type="text/javascript" language="JavaScript" src="<?=BASE_URL?>/js/moment-timezone-with-data.min.js"></script>
<script type="text/javascript">
    const ATTN_ID = '<?=addslashes($id)?>';
</script>
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
            <h3>Attendance</h3>
            <h5>on meeting: <span id="meeting-name"></span></h5>
        </div>
    </div>
    <hr>
    <div class="row">
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
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-inp" style="margin-top: 16px;">
                <div class="card-header">Entry authorization</div>
                <div class="card-body">
                    <label for="attn-notes">Additional notes</label>
                    <textarea id="attn-notes" class="form-control"></textarea>
                    <div style="margin-top: 32px;">&nbsp;
                        <button type="button" id="btn-update" class="btn btn-success">Update notes</button>
                        &nbsp;
                        <button type="button" id="btn-delete" class="btn btn-danger">Delete record</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?=BASE_URL?>/js/meetings-view-attn-edit.js"></script>