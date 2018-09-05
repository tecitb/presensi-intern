/**
 * Created by didithilmy on 26/08/18.
 */

$(document).ready(function() {
    loadData().done(function(msg) {
       parseMeeting(msg.meeting);
       parseAttn(msg.attendance);
       getUserDetails(msg.attendance.tec_regno);
       getAbsenceNotices(msg.meeting.id, msg.attendance.tec_regno);
    });
});

var currentUser;


function loadData() {
    console.log("Loading data...");

    return $.ajax({
        method: "GET",
        url: BASE_URL+"/api/attn/details/" + ATTN_ID,
        headers: {"Authorization": "Bearer " + Cookies.get("token")}
    });
}

function parseMeeting(data) {
    $("#meeting-name").text(data.name);
}

function parseAttn(data) {
    $("#attn-notes").val(data.notes);
}

function getUserDetails(tec_regno) {
    $(".card-inp").hide();
    currentUser = null;
    $.ajax({
        method: "GET",
        url: SERVER_URL+"/api/user/regno/" + tec_regno,
        headers: {"Authorization": "Bearer " + Cookies.get("token")}
    }).done(function(msg) {
        if(msg === false) {
            alert("Person not found.");
            return;
        }

        currentUser = msg;

        $(".card-inp").show();

        $("#name").text(msg.name);
        $("#tec_regno").text(msg.tec_regno);
        if(msg.profile_picture_url != undefined) $("#profile-url").css("background-image", "url(" + msg.profile_picture_url + ")");
        else $("#profile-url").css("background-image", "");

        // Now add notes
        var notices = [];
        if(msg.isAdmin == 1) notices.push("This person is an administrator.");
        if(msg.lunas != 1) notices.push("<b class='text-danger'>This person has not fully paid the registration fee.</b>");
        if(msg.is_active != 1) notices.push("<b class='text-danger'>This person is not an active intern.</b>");

        if(notices.length == 0) {
            $("#attn-notices").html("<span class='text-secondary'>No notices.</span>");
        } else {
            $("#attn-notices").html("");
            $.each(notices, function(i, val) {
               $("#attn-notices").append("<div>" + val + "</div>");
            });
        }
    }).fail(function(jqXHR, textStatus) {
        alert("Request failed: " + textStatus);
    });
}

function getAbsenceNotices(meeting_id, tec_regno) {
    $("#abs-notices").html('<div align="center" class="text-secondary card-body">Loading...</div>');

    $.ajax({
        method: "GET",
        url: BASE_URL+"/api/absence/get/" + meeting_id + "/" + tec_regno,
        headers: {"Authorization": "Bearer " + Cookies.get("token")}
    }).done(function(msg) {
        if(msg.success !== true) {
            console.log("Failed retrieving absence data");
            return;
        }

        if(msg.body.length === 0) {
            $("#abs-notices").html('<div align="center" class="text-secondary card-body">No recorded absence notice</div>');
        } else {
            $("#abs-notices").html('');
        }

        $.each(msg.body, function(i, val) {
            var title;
            switch (parseInt(val.type)) {
                case 0:
                    title = "Not attending";
                    break;
                case 1:
                    title = "Coming late at " + moment.unix(val.will_attend).tz("Asia/Jakarta").format("DD/MM/YYYY HH:mm");
                    break;
                case 2:
                    title = "Leaving early at " + moment.unix(val.will_leave).tz("Asia/Jakarta").format("DD/MM/YYYY HH:mm");
                    break;
            }

            var urgency = val.urgency == 0 ? 'NRML' : 'SHORT';
            var content = '<li class="list-group-item d-flex justify-content-between align-items-center">' + title + '<span class="badge badge-primary badge-pill">' + urgency + '</span></li>';

            $("#abs-notices").append(content);
        });
    }).fail(function(jqXHR, textStatus) {
        alert("Request failed: " + textStatus);
    });
}