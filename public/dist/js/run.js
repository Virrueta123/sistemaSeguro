jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-zñÑ ]+$/i.test(value);
}, "Solo se permiten letras en este campo");
jQuery.validator.addMethod("noespeciales", function(value, element) {
    return this.optional(element) || /^[0-9a-zñÑ ]+$/i.test(value);
}, "no se permiten caracteres especiasl");
$.validator.setDefaults({
	highlight: function(element){
		$(element)
		.closest(".form-group")
		.addClass("has-error")
	},
	unhighlight: function(element) {
		$(element)
		.closest(".form-group")
		.removeClass("has-error")
		.addClass("has-success")
	}
}) 

const sweetAlert = function(message,type,time=2500){
	Swal.fire({
		position: 'center',
		icon: type,
		title: message,
		showConfirmButton: false,
		timer: time
	}) 
}