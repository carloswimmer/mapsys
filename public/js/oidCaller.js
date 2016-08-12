$(document).ready(function() {
	if($('#port').val() == '') {
		$('#hole-oid').hide();
	}
	$('#port').change(function() {
		$('#hole-oid').fadeIn('slow');
		$.get('/mapsys/switchmodel/' + portId(), handle);
		function portId() {
			return $('#port').val();
		}
		function handle(data) {
			//$('#oid').val(data.number);
			$('#portPlusOid').empty();
			$(data).each(function(index) {
				$('#portPlusOid').append("<option value='" + data[index].id + "'>" + data[index].number + "</option>");
			});
		}
	});
});
