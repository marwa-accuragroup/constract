$(document).ready(function (e) {
    // alert('in js');
    /*================================*/

    $('.nested input[type=checkbox]').click(function () {
        //   alert(66);
        $(this).parent().find('li input[type=checkbox]').prop('checked', $(this).is(':checked'));
        var sibs = false;
        $(this).closest('ul').children('li').each(function () {
            if ($('input[type=checkbox]', this).is(':checked')) sibs = true;
        })
        $(this).parents('ul').prev().prop('checked', sibs);
    });
    /*================================*/

    $(document).on('click', '.removeItem', function () {
        $(this).parent().parent().remove();
    });

    $(document).on('click', '.removeItemEdit', function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var tableName = $(this).attr('data-tableName');
        $.post(url, {tableName: tableName, id: id, _token: CSRF_TOKEN}, function (data) {
            location.reload();
        });
        $(this).parent().parent().remove();
    });



    /*================================*/
    $('.addItem').click(function () {

        var itr = $(this).attr('data-itr');
        var name = $(this).attr('data-name');

       // alert(itr);
        $(".itemContiner"+itr).append('<tr>'
            + '<td><input type="text" class="form-control" name="'+name+'[]" ></td>'
            + '<td><a class="btn sbold red  removeItem">  <i class="ft-trash-2"></i></a></td> </tr>');

    });

    /*================================*/
    $('.addImg').click(function () {
        var name = $(this).attr('data-name');
        $("#imgContiner_"+name).append('<tr>'
            + '<td><input type="file"  name="'+name+'[]" ></td>'
            + '<td><a class="btn sbold red  removeItem">  <i class="ft-trash-2"></i></a></td> </tr>');

    });


});