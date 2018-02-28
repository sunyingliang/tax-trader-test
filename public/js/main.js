$(function () {
    // Initialization
    attachEvent();
});

/*
 * Global settings
 * */
var URL = 'http://localhost/api/integer/calculate';
var MESSAGE_INVALID = 'Only positive integers are allowed';
var MESSAGE_PROCESSING = 'Please wait while a process is running';

/*
 * Attach essential events
 * */
function attachEvent() {
    // Attach event for button `#btn_odds`
    $('#btn_odds').click(function (e) {
        if (!validate()) {
            messageShow(MESSAGE_INVALID);
            return false;
        }
        if ($(this).attr('data') > 0) {
            messageShow(MESSAGE_PROCESSING);
            return false;
        }
        $(this).attr('data', 1);
        var data = {
            value: $('#ipt_num').val().trim(),
            type: "odd"
        };
        // post data by ajax
        var request = post(URL, data);
        request.done(function (data, status, ajXhr) {
            if (data.response.status != 'success') {
                messageShow(data.response.message);
                return;
            }
            messageHide();
            $('#span_result').html(data.response.data.value);
        }).fail(function (xhr, status, error) {
            messageShow('Status: ' + status + '<br>Message: ' + error);
        }).always(function(){
            $('#btn_odds').attr('data', 0);
        });
    });

    // Attach event for button `#btn_evens`
    $('#btn_evens').click(function (e) {
        if (!validate()) {
            messageShow(MESSAGE_INVALID);
            return false;
        }
        if ($(this).attr('data') > 0) {
            messageShow(MESSAGE_PROCESSING);
            return false;
        }
        $(this).attr('data', 1);
        var data = {
            value: $('#ipt_num').val().trim(),
            type: "even"
        };
        // post data by ajax
        var request = post(URL, data);
        request.done(function (data, status, ajXhr) {
            if (data.response.status != 'success') {
                messageShow(data.response.message);
                return;
            }
            messageHide();
            $('#span_result').html(data.response.data.value);
        }).fail(function (xhr, status, error) {
            messageShow('Status: ' + status + '<br>Message: ' + error);
        }).always(function(){
            $('#btn_evens').attr('data', 0);
        });
    });

    // Attach event for button `#btn_sum`
    $('#btn_sum').click(function (e) {
        if (!validate()) {
            messageShow(MESSAGE_INVALID);
            return false;
        }
        if ($(this).attr('data') > 0) {
            messageShow(MESSAGE_PROCESSING);
            return false;
        }
        $(this).attr('data', 1);
        var data = {
            value: $('#ipt_num').val().trim(),
            type: "sum"
        };
        // post data by ajax
        var request = post(URL, data);
        request.done(function (data, status, ajXhr) {
            if (data.response.status != 'success') {
                messageShow(data.response.message);
                return;
            }
            messageHide();
            $('#span_result').html(data.response.data.value);
        }).fail(function (xhr, status, error) {
            messageShow('Status: ' + status + '<br>Message: ' + error);
        }).always(function(){
            $('#btn_sum').attr('data', 0);
        });
    });

    // Attach event for input `#ipt_num`
    $('#ipt_num').change(function (e) {
        resetMsgAndResult();
    });
}


/*
 * Utils
 * */
function post(url, data, context, headerOptions) {
    return $.ajax({
        aysnc: true,
        url: url,
        type: 'post',
        data: data,
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        dataType: 'json',
        context: context,
        headers: headerOptions || {}
    });
}

function messageShow(message) {
    $('#tt_message').html(message).show();
}

function messageHide() {
    $('#tt_message').hide();
}

function resetMsgAndResult() {
    $('#tt_message').empty();
    $('#span_result').empty();
}

function validate() {
    var num = $('#ipt_num').val().trim();
    return !isNaN(num) && isFinite(num) && +num > 0;
}
