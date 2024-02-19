<div class="bggroundimg">
    <div class="box">
        <div class="formContainer text-center">
            <h2 class="supmncompte">Supprimer mon compte</h2>

            <button id="openModalBtn" type="button" class="btn btn-danger" data-bs-toggle="modal"
                data-bs-target="#exampleModal"><strong>
                    Supprimer
                </strong></button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Dernière étape avant la suppression</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p id="modalText">Êtes-vous sûr de vouloir supprimer votre compte ?</p>
                        </div>
                        <form action="/quitter" method="POST">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" value="Supprimer" name="deleteAccount"
                                    class="btn btn-danger">Supprimer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




    </div>
</div>





<!-- Modal -->