$(".delete").click(function () {
    var id = $(this).attr('value');
    if (confirm('Are you sure to remove this flower ?')) {
        $.ajax({
            url: '/cms/delete/' + id,
            type: 'GET',
            data: {id: id},
            error: function () {
                alert('Something is wrong');
            },
            success: function (data) {
                alert("Record removed successfully");
                window.location.reload();
            }
        });
    }
});
