$(document).ready(function () {
    $('#country-dd').change(function (e) {
        e.preventDefault();
        var idCountry = this.value;
        $("#state-dd").html('');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: baseurl + '/ajax/fetch-states',
            type: "POST",
            data: {
                country_id: idCountry,
            },
            dataType: 'json',
            success: function (result) {
                $('#state-dd').html('<option value="" disabled selected>Select State</option>');
                if (result.length != 0) {
                    $.each(result, function (key, value) {
                        $("#state-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            }
        });
    });

    // city 
    $('#state-dd').on('change', function () {
        var idState = this.value;
        $("#city-dd").html('');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: baseurl + '/ajax/fetch-cities',
            type: "POST",
            data: {
                state_id: idState,
            },
            dataType: 'json',
            success: function (res) {
                $('#city-dd').html('<option value="" disabled selected>Select City</option>');
                if (res.length != 0) {
                    $.each(res, function (key, value) {
                        $("#city-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            }
        });
    });
    
    var contactFlag = false;
    $('#phone').keyup(function () {
        var regex = /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$/;
        var ccon = $(this).val();
        if (regex.test(ccon)) {
            contactFlag = true;
        }
        else {
            contactFlag = false;
        }
    }).keyup;

    $('#formStudRegi').submit(function (e) {
        if(contactFlag==true){
            return;
        }
        else{
            e.preventDefault();
            $('#phone').focus();
        }
    });
    $('#formStudEdit').submit(function (e) {
        if(contactFlag==true){
            return;
        }
        else{
            e.preventDefault();
            $('#phone').focus();
        }
    });
});

