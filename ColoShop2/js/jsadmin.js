//SIDEBAR MENU
// $('#hamburguer').click(function(e){
//     e.preventDefault();
// 		$("#nav-icon").toggleClass('open');
//     $("#wrapper").toggleClass("toggled");
// });

$('#hamburguer').click(function(e){
    e.preventDefault();
    $('ul.sub-menu').removeClass('in');
		$("#nav-icon").toggleClass('open');
    $("#wrapper").toggleClass("toggled");
});

$('.sidebar-nav a[data-toggle="collapse"]').on('click',function(){
		$("#nav-icon").addClass('open');
    $("#wrapper").addClass("toggled");
});
