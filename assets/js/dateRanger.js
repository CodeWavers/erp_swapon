var start = moment().subtract(29, 'days');
var end = moment();

// var start = moment($start);
// var end = moment($end);
var quarter = moment().quarter();

function cb(start, end) {

    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    // console.log(start)
    // console.log(end)
    $('#dtpFromDate').val(start.format('YYYY-MM-DD'));
    $('#dtpToDate').val(end.format('YYYY-MM-DD'));
}

$('#reportrange').daterangepicker({
    // singleDatePicker: true,
    single: true,
    standalone: true,
    // singleDatePicker: true,
    showDropdowns: true,
    startDate: start,
    endDate: end,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10),
    ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
        'This Year': [moment().startOf('year'), moment().endOf('year')],
        'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
        'Current Quarter': [moment().quarter(quarter).startOf('quarter'), moment().quarter(quarter).endOf('quarter')],
        'Last Quarter': [moment().subtract(1, 'quarter').startOf('quarter'), moment().subtract(1, 'quarter').endOf('quarter')],
    }
}, cb);
// console.log(start)
// console.log(end)


cb(start, end);

$('#dtpFromDate').val(start.format('YYYY-MM-DD'));
$('#dtpToDate').val(end.format('YYYY-MM-DD'));
