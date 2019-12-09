// Data Picker Initialization
$('.datepicker').pickadate({

    monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre',
    'Noviembre', 'Diciembre'],
    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
    showMonthsShort: undefined,
    showWeekdaysFull: undefined,
    
    // Buttons
    today: 'Hoy',
    clear: 'Limpiar Selección',
    close: 'Aceptar',
    
    // Accessibility labels
    labelMonthNext: 'Próximo mes',
    labelMonthPrev: 'Mes anterior',
    labelMonthSelect: 'Selecciona un mes',
    labelYearSelect: 'Selecciona un año',

    //Para definir el primer día de la semana, el formato en el que se ve en el input y el formato en el que se guarda en HTML (y luego se manda a la BD)
    firstDay: 1,
    format: 'yyyy/mm/dd',
    formatSubmit: 'yyyy/mm/dd',
    hiddenName: true,

    // Para que se cierre al darle cerrar
    closeOnSelect: false,
    closeOnClear: false

});

//Inicialización del Select de Material Design
$(document).ready(function() {
    $('.mdb-select').materialSelect();
});
