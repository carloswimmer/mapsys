$(document).ready(function() {
		$.get('/mapsys/link/call/' + hostIdA(), handleA);
		function hostIdA() {
			return $('#first').val();
		}
		function handleA(data) {
			$(data).each(function(index) {
				$('#link-port-a').append("<option value='" + data[index].id + "'>" + data[index].name + "</option>");
			});
		}

		$.get('/mapsys/link/call/' + hostIdB(), handleB);
		function hostIdB() {
			return $('#host-port-b').val();
		}
		function handleB(data) {
			$(data).each(function(index) {
				$('#link-port-b').append("<option value='" + data[index].id + "'>" + data[index].name + "</option>");
			});
		}
});
