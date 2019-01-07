$(document).ready(function () {

    $(document).on('change', '.btn-file :file', function () {
        console.log(this);
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function (event, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = label;

        if (input.length) {
            input.val(log);
        } else {
            if (log) alert(log);
        }

    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            var inp = input.parentNode.parentNode.parentNode.parentNode.className;
            reader.onload = function (e) {
                $('.' + inp + ' #img-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $("#imgInp").change(function () {
        readURL(this);
    });
    $("#imgInp2").change(function () {
        readURL(this);
    });
    $("#imgInp3").change(function () {
        readURL(this);
    });
    $("#imgInp4").change(function () {
        readURL(this);
    });
});