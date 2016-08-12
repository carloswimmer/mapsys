$(document).ready(function() {
	if($('#first').val() == '') {
		$('#hole-link-port-a').hide();
		$('#hole-link-port-b').hide();
	}
	$('#first').change(function() {
		$('#hole-link-port-a').fadeIn('slow');
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
		$('#hole-link-port-b').fadeIn('slow');
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
