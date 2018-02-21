<div class="modal modal-danger fade in" id="deleteUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Verwijder gebruiker: <span id="username"></span></h4>
            </div>

            <div class="modal-body">
                <form method="POST" id="confirm-delete">
                    @csrf               {{-- Form field protection --}}
                    @method('DELETE')   {{-- Method spoofing --}}
                </form>  

                <p>
                    Het verwijderen van de login voor <span id="username"></span> heeft al gevolg dat hij/zij 
                    niet meer kan inloggen op de website.
                </p>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-outline" data-dismiss="modal"><i class="fa fa-undo"></i> Annuleren</button>
                <button type="submit" form="confirm-delete" class="btn btn-outline"><i class="fa fa-check"></i> Verwijderen</button>
            </div>
        </div> <!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>