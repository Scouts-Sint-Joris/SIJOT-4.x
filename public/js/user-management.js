$('#deleteUser').on('show.bs.modal', function(e) {
    var userId   = e.relatedTarget.dataset.user;
    var username = e.relatedTarget.dataset.username;

    $('#confirm-delete').attr('action', '/admin/gebruikers/' + userId);
    $('#username').text(username);
});