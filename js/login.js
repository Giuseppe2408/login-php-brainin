//bottone per invio dati
let buttonLog = document.getElementById('buttonLog');
buttonLog.addEventListener('click', LogUser);

function LogUser(event) {
    
    let emailVal = document.getElementById('email').value;
    let passwordVal = document.getElementById('password').value;
    let validate_mail = document.getElementById('validate_mail');
    let validate_pass = document.getElementById('validate_pass');
    event.preventDefault();

    if (emailVal == "") {
        validate_mail.innerHTML = 'inserisci email'
    } else {
        validate_mail.innerHTML = ''
    }
    if (passwordVal == "") {
        validate_pass.innerHTML = 'inserisci password'
    } else {
        validate_pass.innerHTML = ''
    }


    if (emailVal != "" && passwordVal != ""){

        axios.post('php/login.php', 
            {
                //passo i parametri
                
                email: emailVal,
                password: passwordVal,
                
                
            }).then(res => {
                window.location.href = "/esercitazione_brainin/area_privata.php";
                
            }).catch(error => {
                console.log(error)
        })
    }



    }   
            





    

// parte recupero password

const button_mail = document.getElementById('forgot_password');

button_mail.addEventListener('click', sendMail);

function sendMail(event) {

    event.preventDefault();

    if (document.getElementById('email').value == '' || document.getElementById('email').value == null) {
        alert('inserisci la mail'); 
    } else {
        axios.post('php/sendmail.php', 
        {
            //passo i parametri
            
            email: document.getElementById('email').value,
                       
        }).then(res => {
            alert('la mail è stata inviata')
            
        }).catch(error => {
            console.log(error)
        })
    }

    
}