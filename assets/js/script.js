// const form = document.getElementById("contact-form")

//     function email(data) {
//         const message = document.getElementById("status-message")
//         fetch("", {
//             method: "POST",
//             body: data,
//             headers: {
//                'X-Requested-With' : 'XMLHttpRequest'
//             }
//         })
//             .then(response => response.json())
//             .then(response => {message.innerHTML = response.message})
//             .catch(error => {
//                 error.json().then(response => {
//                     message.innerHTML = response.message
//                 })
//             })
//     }


//     const submitEvent = form.addEventListener("submit", (event) => {
//         event.preventDefault();

//         const formData = new FormData(form);

//         email(formData);
//     })


$('.php-email-form').on('submit', e => {
    e.preventDefault();
  
    const name = $("#name-field").val()
    const email = $("#email-field").val()
    const subject = $("#subject-field").val()
    const message = $("#message-field").val();
  
    $.ajax({
        url: 'assets/php/send.php',
        type: 'POST',
        dataType: 'json',
        data: {
          name,
          email,
          subject,
          message,
        },

        success: function(result) {       
        console.log(result)    

        },
        error: function(result) {
            console.log(result)
        }
    })
  })