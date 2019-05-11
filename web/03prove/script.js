function update_session_value(id, value) {
        $.ajax({
            type: "POST",
            url: 'session.php', // change url as your 
            data: id + "=" + value,
            success: function (data) {

            }
        });
    }