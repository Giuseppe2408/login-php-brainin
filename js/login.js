//bottone per invio dati
let buttonLog = document.getElementById('buttonLog');
buttonLog.addEventListener('click', LogUser);

function LogUser(event) {
    let emailVal = document.getElementById('email').value;
    let passwordVal = document.getElementById('password').value;

    event.preventDefault();

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


//parte recupero password 
// const forgot_password = document.getElementById('forgot_password');

// forgot_password.addEventListener('click', createForm);

// function createForm(event) 
// {
//     const container = document.getElementById('email_getpassword');
//     event.preventDefault();
//     container.innerHTML += `
//         <div class="form-group mt-4">
//             <form method="post">
//                 <label>inserisci l'email dove vuoi che inviamo la nuova password</label>
//                 <input type="text" name="email_password" class="form-control" id="email_password" placeholder="email">                
//                 <button id="button_mail" type="submit" class="btn btn-success">invia</button>
//             </form>
//         </div>
    
//     `

    

// }

const button_mail = document.getElementById('forgot_password');

button_mail.addEventListener('click', sendMail);

function sendMail(event) {

    event.preventDefault();
    console.log(document.getElementById('email').value)

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