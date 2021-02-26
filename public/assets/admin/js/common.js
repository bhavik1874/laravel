/**
 * Generates the notification on activity
 *
 * @param {str}  message    The message
 * @param {str}  alertType  The alert type
 */
function jGrowlAlert(message, alertType) {

	var header_msg = alertType == 'success' ? 'Success!' : 'Oh Snap!';
	$.jGrowl(message, {
		header: header_msg,
		theme: 'bg-' + alertType
	});
}

/**
 * Selects/deselects all the checkboxes
 *
 * @param {obj}  obj  The checkbox object
 */
function select_all(obj) {

	if (obj.checked) {
		$(".checkbox").each(function() {
			$(this).prop("checked", "checked");
			$(this).parent().addClass("checked");
		});
	} else {
		$('.checkbox').each(function() {
			this.checked = false;
			$(this).parent().removeClass("checked");
		});
	}
}

//validate name field 0-9 A-Z a-z space
$.validator.addMethod("validstring", function(value, element) {
	return /^([a-zA-Z0-9.,&\s]+|)$/.test(value);
});

//validate name field 0-9 A-Z a-z space , .
$.validator.addMethod("validdescription", function(value, element) {
	return /^([a-zA-Z0-9.,&()\s]+|)$/.test(value);
});

//price validate
$.validator.addMethod("validprice", function(value, element) {
	var isValidMoney = /^(\d{0,6}(\.\d{0,2})?|)$/.test(value);
	return this.optional(element) || isValidMoney;
});