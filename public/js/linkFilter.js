$(document).ready(function() {
	$('#first').change(function() {
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
