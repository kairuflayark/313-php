function update_session_value(value) {
        $.ajax({
            type: "POST",
            url: 'session.php', // change url as your 
            data: 'select_amount=' + value,
            dataType: 'json',
            success: function (data) {

            }
        });
    }