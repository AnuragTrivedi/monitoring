$(document).ready(function () {
    $('#state').change(function () { //any select change on the dropdown with id state trigger this code
        $("#constituency > option").remove(); //first of all clear select items
        var state_id = $('#state').val(); // here we are taking state id of the selected one.
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>users/get_constituencies/" + state_id, //here we are calling our user controller and get_cities method with the state_id
            success: function (constituencies) //we're calling the response json array 'cities'
            {
                $.each(constituencies, function (id, constituency) //here we're doing a foeach loop round each city with id as the key and city as the value
                {
                    var opt = $('<option />'); // here we're creating a new select option with for each city
                    opt.val(id);
                    opt.text(constituency);
                    $('#constituency').append(opt); //here we will append these new select options to a dropdown with the id 'cities'
                });
            }

        });

    });
});

