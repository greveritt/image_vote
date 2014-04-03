var upVote = function() {
		$('#up').prop('checked', true);
		submitVote();
}

var downVote = function() {
		$('#down').prop('checked', true);
		submitVote();
}

var submitVote = function() {
		$('#rating').submit();
}
