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
document.getElementsByTagName("main")[0].style.display = "none";
window.addEventListener("load", function () {
    document.getElementsByTagName("main")[0].style.display = "block";
    document.querySelector('.loader').style.display = "none";
})

$('document').ready(function () {
    $("main").hide();
    $(window).on({
        load: function () {
            $('loader').hide();
            $('main').show();
        }
    })
})


// jQuery(window).load(function(){
//     jQuery(".loader").fadeOut(1800);
// });