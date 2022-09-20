
const burgerMenu = document.querySelector('#burgerMenu');
const burgerBtn = document.querySelector('.burger');
const burgerClose = document.querySelector('.burger-close');
const sidebarMenu = document.querySelector('.sidebar');
const sidebarMenuLink = document.querySelectorAll('.header-nav__link');

let showBurger = true;


sidebarMenuLink.forEach(e => {
    e.addEventListener('click',  e =>{
        burgerMenu.classList.remove('active');
        showBurger = true;
    })
})
if (burgerBtn) {
    burgerBtn.addEventListener('click', () => {
        document.querySelector('.burger-menu').classList.add('show')
        console.log('wertyuio');
    })
}
if (burgerClose) {
    burgerClose.addEventListener('click', () => {
        document.querySelector('.burger-menu').classList.remove('show')
    })
}


$('img').each(function(e){
    let alt = $(this).attr('alt');
    if(alt && alt.length > 0){
        $(this).attr({'title': alt});
    }
})



function burgerMnuShow(){
    console.log(12345)
    if(showBurger){
        burgerMenu.classList.add('active');
        showBurger = false;
    }else{
        burgerMenu.classList.remove('active');
        showBurger = true;
    }
}

$(document).ready(function (){
    $('#fixed-button').hover(function (){
        if (window.innerWidth > 600){
            $('#fixed-button .top-circles').fadeIn(500);
        }

    });
    $('#fixed-button .request').click(function (e){
        e.preventDefault();
        if ($('#fixed-button .top-circles').is(":hidden")){
            $('#fixed-button .top-circles').fadeIn(500);
        }else{
            if (window.innerWidth > 600){
                $('#fixed-button .top-circles').fadeOut(500);
            }
        }
    });
    $(document).mouseup( function(e){ // событие клика по веб-документу
        var div = $( "#fixed-button" ); // тут указываем ID элемента
        if ( !div.is(e.target) // если клик был не по нашему блоку
            && div.has(e.target).length === 0 ) { // и не по его дочерним элементам
            $('#fixed-button .top-circles').fadeOut(500);
        }
    });
})
