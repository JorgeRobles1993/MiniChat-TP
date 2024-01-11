// Récupération du formulaire 
const form = document.querySelector('form')

// ecouteur d'événement sur l'envoi du formulaire qui lancera une fonction
form.addEventListener('submit', function (e) {
    
    // 1. Arreter l'envoi du formulaire
    e.preventDefault();
    console.log('J\'arrete le form');   
    // 2. Je récupére la valeur de l'input
    const todoContent = document.querySelector('#messages').value
    console.log(todoContent)
    

    // Préparer les données de la requete
    let formData = new FormData()
    formData.append('messages', todoContent)

    // 3. Je lance ma requête en js à la place du formulaire
    fetch('./process/process_create_ajax.php', {
        method: "POST", 
        body: formData
    }).then((response)=>{
        return response.text();
    }).then((data)=>{
        // 4. Je vide l'input
        document.querySelector('#messages').value ='' 
        getTodos()
        console.log("MOI", response);
    })

})




async function getTodos(){
    const response = await fetch('./process/process_get_all.php');
    const data = await response.json();
    console.log(data);
    let ul = document.querySelector('ul');
    ul.innerHTML ="";
    data.forEach(todo => {

        ul.innerHTML += `
            <li>${todo.messages}</li>
         `
    });

}





// setInterval(() => {
//     getTodos()
// }, 3000);