$(document).ready(function(){

	init()

	$(".close-button").click(function(){
		$(this).parent().hide();
	});

})

function init(){
	registerFormatNumber();
	registerDatePicker();
}

function registerFormatNumber(){
	$('.number-format').maskNumber({
		integer: true
	});
}

function registerDatePicker(){
	$.fn.datepicker.dates['en'] = {
		days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
		daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
		daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
		monthsShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
		months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
		today: "Today",
		clear: "Clear",
		format: "mm/dd/yyyy",
		titleFormat: "MM yyyy",
		/* Leverages same syntax as 'format' */
		weekStart: 0
	};

	$('.date-picker').datepicker({
		rtl: App.isRTL(),
		orientation: "left",
		format: 'dd MM yyyy',
		autoclose: true
	});
}

function ajaxModal(url, title = '', margin_top = '10%') {
	$("#ajaxModal").css('margin-top', margin_top);
	$("#ajaxModalContent").html('');
	$("#ajaxModalTitle").html('');
	if (title != '') {
		$("#ajaxModalTitle").html(title);
	}
	$.get(url).done(function (data) {
		$("#ajaxModalContent").html(data);
		$("#ajaxModal").modal('show');
		init();
	});
}

function ajaxModalLarge(url, title = '', margin_top = '10%') {
	$("#ajaxModalLarge").css('margin-top', margin_top);
	$("#ajaxModalLargeContent").html('');
	$("#ajaxModalLargeTitle").html('');
	if (title != '') {
		$("#ajaxModalLargeTitle").html(title);
	}
	$.get(url).done(function (data) {
		$("#ajaxModalLargeContent").html(data);
		$("#ajaxModalLarge").modal('show');
		init();
	});
}

function hapus(url){
    Swal.fire({
    	title: 'Yakin Menghapus ?',
    	text: "data yang dihapus tidak dapat dikembalikan",
    	type: 'warning',
    	showCancelButton: true,
    	confirmButtonColor: '#3085d6',
    	cancelButtonColor: '#d33',
    	confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
    	if (result.value) {
    		window.location.href = url;
    	}
    })
}

function verif(url){
    Swal.fire({
    	title: 'Yakin Verifikasi ?',
    	text: "Akun C-TKI akan berstatus terverifikasi.",
    	type: 'warning',
    	showCancelButton: true,
    	confirmButtonColor: '#3085d6',
    	cancelButtonColor: '#d33',
    	confirmButtonText: 'Ya, Verifikasi!'
    }).then((result) => {
    	if (result.value) {
    		window.location.href = url;
    	}
    })
}

function registerChain(data){
	$(data.id).change(function () {
		let id = $(this).val();
		$(data.target.loading_id).removeClass('hide');
		$.get(data.url + '?element_id=' + data.target.id + '&element_name=' + data.target.name + '&' + data.target.parameter + '=' + id).done(function (payload) {
			$(data.target.loading_id).addClass('hide');
			$(data.target.container_id).html(payload);
		});
	});
}

function normalizeMoney(string) {
	var x = string.replace(/\./gi, '');
	var x = x.replace(/\,/gi, '.');
	return x * 1;
}

function formatNumber(x) {
	//Seperates the components of the number
	var n = x.toString().split(".");
	//Comma-fies the first part
	n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	//Combines the two sections
	return n.join(",");
	//return ret.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}
