
<div class="container" style="margin-top: 24px">
    <div class="row">
        <div class="col-12">
            <h1>Meetings</h1>
            <hr>
        </div>
    </div>

    <a href="<?=BASE_URL?>/meetings/add" class="btn btn-primary">Add meeting</a>

    <!-- START QUIZ CARD-->
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-5 hidden-md-up"></div>
            <div class="loader loader-big"></div>
            <div class="card-columns meetings-card">
                <!-- CARD DISINI -->

            </div>
        </div>
    </div>

    <!-- END QUIZ CARD-->

    <div class="row">
        <div class="col-lg-8">
            <nav aria-label="Quiz Page Navigation">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" onclick="prevPage()">Prev</a></li>
                    <li class="page-item active"><span class="page-link" id="page-no">&nbsp;</span></li>
                    <li class="page-item"><a class="page-link" onclick="nextPage()">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<script src="<?=BASE_URL?>/js/meetings.js" defer="defer"></script>
