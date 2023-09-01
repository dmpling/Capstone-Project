$(document).ready(function() {
	// Disable dates before today
	var today = new Date().toISOString().split('T')[0];
	$('#date').attr('min', today);

	// Disable times that are already booked
	$('option').each(function() {
		var time = $(this).val();
		if (isBooked(time)) {
			$(this).