<div class="modal modal-warning fade in" id="blockUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Blokkeer gebruiker: <span id="username2"></span></h4>
            </div>
            <div class="modal-body">
                <form id="confirm-block" method="POST">
                    @csrf               {{-- Form field protection --}}
                    @method('PATCH')    {{-- Method spoofing --}}
                </form>
                
                <p>
                    Het blokkeren van de gebruiker <span id="username2"></span> heeft als gevolg dat hij de eerst volgende
                    2 weken zich niet meer kan aanmelden.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline" data-dismiss="modal"><i class="fa fa-undo"></i> Annuleren</button>
                <button type="submit" form="confirm-block" class="btn btn-outline"><i class="fa fa-lock"></i> Blokkeren</button>
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div>