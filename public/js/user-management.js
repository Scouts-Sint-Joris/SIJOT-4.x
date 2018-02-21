$('#deleteUser').on('show.bs.modal', function(e) {
    var userId   = e.relatedTarget.dataset.user;
    var username = e.relatedTarget.dataset.username;

    $('#confirm-delete').attr('action', '/admin/gebruikers/' + userId);
    $('#username').text(username);
});

$('#blockUser').on('show.bs.modal', function (e) {
    var userId2   = e.relatedTarget.dataset.user;
    var username2 = e.relatedTarget.dataset.username;

    $('#confirm-block').attr('action', '/admin/restrictie/' + userId2);
    $('#username2').text(username2);
});