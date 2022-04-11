$(document).ready(function() {
    $('#search-key').on('keyup', function() {
        var word = $(this).val().toLowerCase();
        $('.search-job').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(word) > -1);
        })
    })
});


document.getElementById('client_radio').onclick = function() {
    console.log("hi");
    document.getElementById('register_btn').disabled = false;
}
document.getElementById('freelancer_radio').onclick = function() {
    document.getElementById('register_btn').disabled = false;
}