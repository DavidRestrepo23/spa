$(document).on('click', '.pagination a', function(ev){
    ev.preventDefault();
    var page  = $(this).attr('href').split('page=')[1];
    var url = "http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']";
    getproducts(page);
});

function getproducts(page){
    var path = window.location.pathname;
    console.log(path);
    $.ajax({
        url: path+'?page=' + page,
        success: function(data){
            $(".posts").html(data);
            $(".render").hide();
            location.hash = page; 
        }
    });
}



