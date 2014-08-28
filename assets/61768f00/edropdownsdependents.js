// el codigo JS del widget
var DropDowns = function(options) {

    // esta funcion envia por ajax un comando POST asincrono
    var ajaxcmd = function(action, postdata, callback) {

        var result = false;

        jQuery.ajax({
            url: action,
            type: 'post',
            async: false,
            data: postdata,
            cache:false,
            beforeSend: function() {
                imageChargingEDropDownDenpendents('show');
            },
            success: function(data, textStatus, jqXHR) {
                imageChargingEDropDownDenpendents('remove');

                result = data;
                if (callback != null)
                    callback(true, data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                imageChargingEDropDownDenpendents('remove');

                callback(false, jqXHR.responseText);
                return false;
            },
        });

        return result;
    }

    // codigo que se ejecuta
    // cuando el widget inicia:
    // preparamos los controles:
    $('#' + options.firstField).change(function() {

        var id = $('#' + options.firstField + ' option:selected').val();
        var idDropDownListTarget = $('#' + options.dropDownListTarget + ' option:selected').val();

        if (idDropDownListTarget == '') {
            var firstEmptyOption = $('#' + options.dropDownListTarget + ' option:first').html();
        }

        var datosPost = 'action=dropdowns' + '&id=' + id + '&targetModel=' + options.targetModel + '&targetField=' + options.targetField + '&targetTitle=' + options.targetTitle;

        // enviamos la cosa al action via ajax
        ajaxcmd(options.action, datosPost, function(ok, respuesta) {
            if (ok == true) {
                $('#' + options.dropDownListTarget).html(respuesta);
                if (idDropDownListTarget == '') {
                    $('#' + options.dropDownListTarget).prepend("<option value=''>" + firstEmptyOption + "</option>");
                }
            } else {
                console.log('Error EdropDownList');
            }
        });
    });

    function imageChargingEDropDownDenpendents(type) {

        if (options.showImageCharging == true) {

            if (type == 'show') {
                $('#' + options.firstField).after(options.imageCharging);
            } else if (type == 'remove') {
                $("img#image-charging-edropdownlist").remove();
            }
        }
    }
};