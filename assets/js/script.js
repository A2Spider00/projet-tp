// Lorsque le bouton pour ouvrir le modal est cliqué
openModalBtn.addEventListener("click", () => {
    // Affiche le conteneur du modal en utilisant un style flex
    modalContainer.style.display = "flex"
})
// Lorsque le bouton pour fermer le modal est cliqué
closeBtn.addEventListener("click", () => {
     // Cache le conteneur du modal en utilisant un style none
    modalContainer.style.display = "none"
})
// Lorsque l'utilisateur clique en dehors du contenu du modal
modalContainer.addEventListener("click", (e) => {
    // Vérifie si la cible du clic n'est pas le modal lui-même ni son texte interne
    if(e.target != modal && e.target != modalText){
         // Cache le conteneur du modal en utilisant un style none
        modalContainer.style.display = "none"
    }

})


