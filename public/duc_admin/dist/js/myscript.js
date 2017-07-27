$("div.alert").delay(3000).slideUp();

function enterDel(msg){
	if (window.confirm(msg)) {
		return true;
	}
	return false;
}