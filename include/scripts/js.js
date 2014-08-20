$(function () {
    $('.date').datetimepicker({
        lang: 'ru',
        timepicker: false,
        format: 'Y-m-d'
    });
    $('.timepicker').datetimepicker({
        lang: 'ru',
        step: 10,
        datepicker: false,
        format: 'H:i'
    });

    var $staticDate = $('.date_static');
    $staticDate.datetimepicker({
        lang: 'ru',
        timepicker: false,
        format: 'Y-m-d',
        value: $staticDate.attr('data-date-end'),
        onChangeDateTime:function(dp,$input){
            this.setOptions({
                value: $staticDate.attr('data-date-end')
            });
        }
    });

    $('a[rel=del_interval]').click(function () {
        if (!confirm('вы уверены что хотиту удалить этот временной интервал из задачи?')) {
            return false;
        }
    });


    $('a[rel=del]').click(function () {
        if (!confirm('Вы уверены что хотите удалить задачу проекта?')) {
            return false;
        }
    })

});