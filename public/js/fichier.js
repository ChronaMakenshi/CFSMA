window.onload = () => {
    // On boucle sur links
let links =  document.querySelectorAll("[data-delete]")
for (let link of links){
    link.addEventListener("click", function(e){
        // On empêche la navigation
        e.preventDefault()

        // On demande confirmation
        if(confirm("Voulez-vous supprimer un cours ?")){
            // On envoie une requête Ajax vers le href du lien avec la méthode DELETE
            fetch(this.getAttribute("href"), {
                method: "DELETE",
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({"_token": this.dataset.token})
            }).then(
                // On récupère la réponse en JSON
                response => response.json()
            ).then(data => {
                if(data.success)
                    this.parentElement.remove()
                else
                    alert(data.error)
            }).catch(e => {
                window.location.reload(e)
            });
        }
    })
}
}