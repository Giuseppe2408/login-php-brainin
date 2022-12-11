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
        
        
    } else if(codice_FiscaleVal.length != 16) 
    {
        alert("inserisci il codice fiscale correttamente!")
    } else if (passwordVal.length < 8) 
    {
        alert("la password deve contenere almeno 8 caratteri");
    }
    
    else 
    {
        //chiamata axios se le validazioni sono fatte
        axios.post('php/register.php', 
        {
            nome: nomeVal,
            cognome: cognomeVal,
            email: emailVal,
            password: passwordVal,
            codice_Fiscale: codice_FiscaleVal,
            sesso: sessoVal,
            compleanno: data_nascitaVal,
            luogo_di_nascita: luogo_nascitaVal,
            
        }).then(res => {
            
            alert("registrazione avvenuta con successo");
            //faccio svuotare i campi degli input
            nomeVal = "";
            cognomeVal = "";
            emailVal = "";
            passwordVal = "";
            codice_FiscaleVal = "";
            sessoVal = "";
            data_nascitaVal = "";
            luogo_nascitaVal = "";
            
        }).catch(error => {
            console.log(error)
        })
        }
    
}