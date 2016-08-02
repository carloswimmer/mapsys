$(document).ready(function() {
	$('#portPlusOid').change(function() {
		$.get('/mapsys/switchmodel/' + portPlusOidId(), handle);
		function portPlusOidId() {
			return $('#portPlusOid').val();
		}
		function handle(data) {
			$('#oid').val(data.number);
		}
	});
});
