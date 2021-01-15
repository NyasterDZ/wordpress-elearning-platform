function hk_dataset_script_fun(table_name, primary_key) {
    var table_name = table_name;
    var primary_key = primary_key;
    var fields_name = 'user_login, user_email,user_login_status';
    var splited_flieds = fields_name.split(',');
    var datatable_field_row = [];
    var datatable_field = [];

    for (i = 0; i < splited_flieds.length; i += 1) {
        row_fileds = {
            'db': splited_flieds[i],
            'dt': splited_flieds[i]
        };
        datatable_field_row.push(row_fileds);
    }

    for (i = 0; i < splited_flieds.length; i += 1) {
        row_fileds = {
            'data': splited_flieds[i]
        };
        datatable_field.push(row_fileds);
    }

    // Do not delete
    var dataset_val = datatable_field_row;

    jQuery('#hk_user_status_dt').DataTable({
        "processing": false,
        "serverSide": true,
        "ajax": {
            "url": hk_localization_sc.adminUrlHk,
            "type": "POST",
            "dataType": 'json',
            "data": {
                "table_name": table_name,
                "primary_key": primary_key,
                "data_collection": dataset_val,
                'action': 'hk_dataset_results'
            }
        },
        "columns": [
            {data: "user_login"},
            {data: "user_email"},
            {data: "user_registered"},
            {
                "className": "action-cls",
                "data": null,
                "render": function (data, type, full, meta) {
                    var status = full.user_login_status;
                    if (status == "1") {
                        return '<p class="online-users"></p>';
                    } else if (status == "0") {
                        return '<p class="offline-users"></p>';
                    } else if (status == "3") {
                        return '<p class="away-users"></p>';
                    } else {
                        return '<p class="offline-users"></p>';
                    }
                }
            }]
    });
}

jQuery(document).ready(function () {
    document.addEventListener("visibilitychange", function () {
        if (document.hidden == "1") {
            jQuery.ajax({
                url: hk_localization_sc.adminUrlHk,
                type: "POST",
                data: {
                    "status": "3",
                    "action": "change_user_status"
                },
            });
        }

        // Once retuen browser is minimize and user is away page 
        if (document.hidden == "0") {
            jQuery.ajax({
                url: hk_localization_sc.adminUrlHk,
                type: "POST",
                data: {
                    "status": "1",
                    "action": "change_user_status"
                },
            });
        }
    }, false);
});

jQuery(document).ready(function () {
    jQuery(document).on('heartbeat-tick', function (e, data) {
        jQuery('#hk_user_status_dt').DataTable().ajax.reload();
    });
    wp.heartbeat.interval('fast');

});
