$(function () {
    //Textare auto growth
    // autosize($('textarea.auto-growth'));

    //Datetimepicker plugin
    $('.datetimepicker').bootstrapMaterialDatePicker({
        format: 'dddd DD MMMM YYYY - HH:mm',
        clearButton: true,
        weekStart: 1
    });

    $('.datepicker').bootstrapMaterialDatePicker({
        // format: 'DD/MM/YYYY ',
        format: 'YYYY-MM-DD ',        
        clearButton: true,
        weekStart: 1,
        time: false,
        clearText: 'Limpiar',
        cancelText: 'Cancelar'
    });

    $('.timepicker').bootstrapMaterialDatePicker({
        format: 'HH:mm',
        clearButton: true,
        date: false
    });
});