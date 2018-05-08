const button = document.getElementById("submit");

button.addEventListener("click", () => {
	let msgSent = document.getElementById("msgSent");
	let name = document.getElementById("name");
	let email = document.getElementById("email");
	let phone = document.getElementById("phone");
	let message = document.getElementById("message");
	let url = '../functions/mail.php';

	let data = {
		name: name.value,
		email: email.value,
		phone: phone.value,
		message: message.value
	}
	
	if (msgSent.classList.contains("is-visible")){
		msgSent.classList.toggle("is-visible");
	}

	fetch(url, {
		method: 'POST',
		body: JSON.stringify(data),
		headers: new Headers({
			'Content-Type': 'application/json'
		})
	}).then(response => response.json())
	.then(answer => {
		if (answer){
			name.setAttribute("value", "");
			email.setAttribute("value", "");
			phone.setAttribute("value", "");
			message.setAttribute("value", "");
			msgSent.classList.toggle("is-visible");
		}
	})
	.catch(error => console.error('Error:', error))
})



