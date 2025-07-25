'use strict';

document.addEventListener('DOMContentLoaded', function () {
		//Маска телефона
		if (document.getElementById('phone_field4')) {
			const element = document.getElementById('phone_field4');
			const maskOptions = {
				mask: '+{7} (000) 000-00-00',
			};
	
			IMask(element, maskOptions);
		}
	
		//маска телефона в резюме
		if (document.getElementById('resume-field-2')) {
			const element = document.getElementById('resume-field-2');
			const maskOptions = {
				mask: '+{7} (000) 000-00-00',
			};
	
			IMask(element, maskOptions);
		}
});