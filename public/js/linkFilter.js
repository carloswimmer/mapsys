$(document).ready(function() {
	if($('#first').val() == '') {
		$('#link-port-a').prop('disabled', true);
		$('#link-port-b').prop('disabled', true);
	}
	$('#first').change(function() {
		$('#link-port-a').prop('disabled', false);
		$.get('/mapsys/link/call/' + hostId(), handle);
		function hostId() {
			return $('#first').val();
		}
		function handle(data) {
			$('#link-port-a').empty();
			$(data).each(function(index) {
				$('#link-port-a').append("<option value='" + data[index].id + "'>" + data[index].name + "</option>");
			});
		}
	});

	$('#host-port-b').change(function() {
		$('#link-port-b').prop('disabled', false);
		$.get('/mapsys/link/call/' + hostId(), handle);
		function hostId() {
			return $('#host-port-b').val();
		}
		function handle(data) {
			$('#link-port-b').empty();
			$(data).each(function(index) {
				$('#link-port-b').append("<option value='" + data[index].id + "'>" + data[index].name + "</option>");
			});
		}
	});

});
