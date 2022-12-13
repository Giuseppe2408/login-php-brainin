let button = document.getElementById('button');
button.addEventListener('click', addUser);


function addUser(event) {
    let nomeVal = document.getElementById('nome').value;
    let cognomeVal = document.getElementById('cognome').value;
    let emailVal = document.getElementById('email').value;
    let passwordVal = document.getElementById('password').value;
    let codice_FiscaleVal = document.getElementById('codice_Fiscale').value;
    let sessoVal = document.getElementById('sesso').value;
    let data_nascitaVal = document.getElementById('data_nascita').value;
    let luogo_nascitaVal = document.getElementById('luogo_nascita').value;




    event.preventDefault();
    //da migliorare
    //validazioni
    if (nomeVal == "" || cognomeVal == "" || emailVal == "" || passwordVal == "" || codice_FiscaleVal == "" || sessoVal == "" || data_nascitaVal == "" || luogo_nascitaVal == "") 
    {
        alert("inserisci tutti i campi per proseguire");
                
    } 
    
    else 
    {
        //chiamata axios se le validazioni sono fatte
        axios.post('php/register.php', 
        {
            //passo i parametri
            nome: nomeVal,
            cognome: cognomeVal,
            email: emailVal,
            password: passwordVal,
            codice_Fiscale: codice_FiscaleVal,
            sesso: sessoVal,
            compleanno: data_nascitaVal,
            luogo_di_nascita: luogo_nascitaVal,
            
        }).then(res => {
            
            
            window.location.href = "/esercitazione_brainin/login.html";
            
            
            
        }).catch(error => {
            console.log(error)
        })
        }
    
}

