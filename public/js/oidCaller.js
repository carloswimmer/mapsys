$(document).ready(function() {
	$('#port-plus-oid').change(function() {
		$.get('/mapsys/switchmodel/' + portPlusOidId(), handle);
		function portPlusOidId() {
			return $('#port-plus-oid').val();
		}
		function handle(data) {
			$('#oid').val(data.number);
		}
	});
});
