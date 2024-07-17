const form = document.getElementById("contact-form")

    function email(data) {
        const message = document.getElementById("status-message")
        fetch("", {
            method: "POST",
            body: data,
            headers: {
               'X-Requested-With' : 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(response => {message.innerHTML = response.message})
            .catch(error => {
                error.json().then(response => {
                    message.innerHTML = response.message
                })
            })
    }


    const submitEvent = form.addEventListener("submit", (event) => {
        event.preventDefault();

        const formData = new FormData(form);

        email(formData);
    })