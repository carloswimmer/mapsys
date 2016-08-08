$(document).ready(function() {
	$('#first').change(function() {
		$.get('/mapsys/link/' + hostId(), handle);
		function hostId() {
			return $('#first').val();
		}
		function handle(data) {
			return data;
		}
	});
});
