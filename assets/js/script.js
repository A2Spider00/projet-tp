openModalBtn.addEventListener("click", () => {
    modalContainer.style.display = "flex"
})

closeBtn.addEventListener("click", () => {
    modalContainer.style.display = "none"
})

modalContainer.addEventListener("click", (e) => {
    if(e.target != modal && e.target != modalText){
        modalContainer.style.display = "none"
    }

})

