$(document).ready(function (e) {

   // alert(66);
    /*================================*/

    $("#RemoveAll").change(function() {
        if ($(this).is(':checked'))
            $("input:radio.radioR").attr("checked","checked");

        else
            $("input:radio.radioR").removeAttr("checked");
    });
});

   /* $("input.radioMenu").click(function() {


        alert(555);

       /* if ($(this).attr('checked') === "checked"){

            $("input:radio[class*='radioR']").attr("checked","checked");

        }else{

            $("input:radio[class*='radioR']").removeAttr("checked");

        }*/
    });

    /*$(".radioMenu input[type=radio] ").click(function () {

        var itr = $(this).attr("data-itr");

        alert(itr);

        // $('input:radio[name="menu_"+itr+"]').attr('checked',true);
        //$('input:radio[value=pass]').checked = true;

    });

    /*$('.radioMenu').click(function(){
        alert(555);
        var check = true;
        $("input:radio").each(function(){
            var itr = $(this).attr("itr");
            if($("input:radio[name=menu_"+itr+"]:checked").length == 0){
                check = false;
            }
        });

        if(check){
            alert('One radio in each group is checked.');
        }else{
            alert('Please select one option in each question.');
        }
    });

   /* $('.nested input[type=radio]').click(function () {
         alert(66);
        $(this).parent().find('li input[type=radio]').prop('checked', $(this).is(':checked'));
        var sibs = false;
        $(this).closest('ul').children('li').each(function () {
            if ($('input[type=radio]', this).is(':checked')) sibs = true;
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


    /*================================*/
    $('input[type=radio][name=currentStatusOfConnectionCharges]').change(function() {
        if (this.value == 1) {
           $('#currentDiv').css('display' , 'block');
        }
        else if (this.value == 2) {
            $('#currentDiv').css('display' , 'none');
        }
    });


    $('input[type=radio][name=currentStatusMaterials]').change(function() {
        if (this.value == 1) {
            $('#currentDiv2').css('display' , 'block');
        }
        else if (this.value == 2) {
            $('#currentDiv2').css('display' , 'none');
        }
    });







});