// Récupération du formulaire 
const form = document.querySelector('form')

// ecouteur d'événement sur l'envoi du formulaire qui lancera une fonction
form.addEventListener('submit', function (e) {
    
    // 1. Arreter l'envoi du formulaire
    e.preventDefault();
    console.log('J\'arrete le form');   
    // 2. Je récupére la valeur de l'input
    const todoContent = document.querySelector('#messages').value
    const todouser = document.querySelector('#username').value
    const todoip = document.querySelector('#user_ip').value

    
    // Préparer les données de la requete
    let formData = new FormData()
    formData.append('messages', todoContent);
    formData.append('user_name', todouser);
    formData.append('user_ip', todoip);
    
    // 3. Je lance ma requête en js à la place du formulaire
    fetch('./process/process-create-ajax.php', {
        method: "POST", 
        body: formData
    }).then((response)=>{    
        console.log("response", response);
        return response.text();
    }).then((data)=>{
    
        console.log("data", data);
    
        // 4. Je vide l'input
        document.querySelector('#messages').value ='' 
        getTodos()
        
    })
    
})



async function getTodos(){
    const response = await fetch('./process/process-get-all.php');
    const data = await response.json();
    console.log(data);
    let ul = document.querySelector('ul');
    ul.innerHTML ="";
    data.forEach(todo => {
        
        ul.innerHTML += `
        <li class="border border-3 border-black rounded-pill p-3 m-2">  <i class="fa-regular fa-comment fa-2xl"></i><span class="fw-bold"> 
        ${todo.user_name}:  </span> ${todo.messages} ${todo.user_ip} </li>
        `
    });
    
}





setInterval(() => {
    getTodos()
}, 3000);
