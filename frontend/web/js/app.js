$(document).ready(function (){
    const tabsBtn   = document.querySelectorAll(".tabs__nav-btn");
    const tabsItems = document.querySelectorAll(".tabs__item");
    const opportunitiesItem = document.querySelectorAll('.opportunities-nav__item');
    const videoPlay = document.querySelector("#videoPlay");
    const welcomeSlick = document.querySelector(".welcome-slick");
    const welcomeSoc = document.querySelector(".welcome-soc");
    const welcomeVideo = document.querySelector(".welcome-video");
    const bgWelcome = document.querySelector("#bg-welcome");
    const video = document.querySelector('#videoImg');
    const modalVideo = document.querySelector('#modalVideo');
    const modal = document.querySelector('#myModal');

    if(modal){
        modal.addEventListener('click', e => {
            modalVideo.src = ''
        })
    }
    if(video){
        video.addEventListener('click', function () {
            modalVideo.src = 'https://www.youtube.com/embed/DANvLUJv1yk?autoplay=1'
        })
    }
    let onOff = true
    let numImgSlick = 3

    if(tabsBtn){tabsBtn.forEach(onTabClick);}
    if(opportunitiesItem){opportunitiesItem.forEach(e => {
        e.addEventListener('click', accordionOnClick)
    })}

    /*function videoShow(){
        welcomeSlick.style.display = 'none';
        videoPlay.style.display = 'none';
        welcomeSoc.style.display = 'none!important';
        welcomeVideo.style.display = 'block';
        bgWelcome.style.background = '#000'
    }*/
    $('#read-more').click(function (e){
        e.preventDefault();
        $('#read-more-text').toggleClass('d-none');
    });

    function onTabClick(item) {
        item.addEventListener("click", function() {
            let currentBtn = item;
            let tabId = currentBtn.getAttribute("data-tab");
            let currentTab = document.querySelector(tabId);

            if( ! currentBtn.classList.contains('active') ) {
                tabsBtn.forEach(function(item) {
                    item.classList.remove('active');
                });

                tabsItems.forEach(function(item) {
                    item.classList.remove('active');
                });

                currentBtn.classList.add('active');
                currentTab.classList.add('active');
            }
        });
    }

    window.addEventListener('scroll', e => {
        if(window.pageYOffset > 1410 && onOff){
            outNum(16, '#infoNum1')
            outNum(27, '#infoNum2')
            outNum(1000, '#infoNum3')
            outNum(1200, '#infoNum4')
            onOff = false
        }
    })

    function outNum(num, elem) {
        let number = document.querySelector(elem);
        let n = 0;
        let interval = setInterval(() => {
                n = n + 5;
                if(n >= num) {
                    number.innerHTML = num;
                    clearInterval(interval);
                }else {
                    number.innerHTML = n;
                }
            },
            .1);
    }



    function accordionOnClick(item){
        $(this).find('.opportunities-nav__text').toggle(500);
        $(this).find('.opportunities-nav__title').toggleClass("open", 1500);
    }

    /* slick */
    if (window.innerWidth > 600){
        $('.welcome-slick').slick({
            vertical: true,
            variableWidth: false,
            slidesToShow: 1,
            autoplay: true,
            infinite: false,
            autoplaySpeed: 3000,
            dots: true,
        });
    }

    $('.part-slick').slick({
        slidesToShow: 6,
        slidesToScroll: 3,
        autoplay: true,
        autoplaySpeed: 2000,
    });

    setInterval(changeSlider,5000);
    function changeSlider(){
        let child = $('#nomad-slick').find('.show');
        $(child).fadeOut('fast', function (){
            $(this).removeClass('show');
            let next = $(this).next();
            if (next.length === 0){
                next = $('#nomad-slick').find('.nomad-slick__item:first-child');
            }
            $(next).fadeIn('fast');
            $(next).addClass('show');
        });
    }




    if(document.documentElement.clientWidth < 992){
        numImgSlick = 2
    }
    if(document.documentElement.clientWidth < 576){
        numImgSlick = 1
    }
    $('.landing-slick').slick({
        slidesToShow: numImgSlick,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        prevArrow: '<button class="slide-arrow slick-prev"><img src="/img/slick-arrow-left-black.svg" alt=""></button>',
        nextArrow: '<button class="slide-arrow slick-next"><img src="/img/slick-arrow-left.svg" alt=""></button>'
    });

    function welcomeBg(){

        const canvas = document.querySelector('.canvas')
        const ctx = canvas.getContext('2d')
        const w = canvas.width = innerWidth
        const h = canvas.height = innerHeight
        const particles = []
        const properties = {
            bgColor             : 'rgba(1,33,45,0.95)',
            particleColor       : 'rgba(25, 125, 159, 0.85)',
            particleRadius      : 3,
            particleCount       : window.innerWidth > 600 ? 60 : 20,
            particleMaxVelocity : 0.5,
            lineLength          : 150,
            particleLife        : 6,
        };

        document.querySelector('body').appendChild(canvas);

        class Particle{
            constructor(){
                this.x = Math.random()*w;
                this.y = Math.random()*h;
                this.velocityX = Math.random()*(properties.particleMaxVelocity*2)-properties.particleMaxVelocity;
                this.velocityY = Math.random()*(properties.particleMaxVelocity*2)-properties.particleMaxVelocity;
                this.life = Math.random()*properties.particleLife*60;
            }
            position(){
                this.x + this.velocityX > w && this.velocityX > 0 || this.x + this.velocityX < 0 && this.velocityX < 0? this.velocityX*=-1 : this.velocityX;
                this.y + this.velocityY > h && this.velocityY > 0 || this.y + this.velocityY < 0 && this.velocityY < 0? this.velocityY*=-1 : this.velocityY;
                this.x += this.velocityX;
                this.y += this.velocityY;
            }
            reDraw(){
                ctx.beginPath();
                ctx.arc(this.x, this.y, properties.particleRadius, 0, Math.PI*2);
                ctx.closePath();
                ctx.fillStyle = properties.particleColor;
                ctx.fill();
            }
            reCalculateLife(){
                if(this.life < 1){
                    this.x = Math.random()*w;
                    this.y = Math.random()*h;
                    this.velocityX = Math.random()*(properties.particleMaxVelocity*2)-properties.particleMaxVelocity;
                    this.velocityY = Math.random()*(properties.particleMaxVelocity*2)-properties.particleMaxVelocity;
                    this.life = Math.random()*properties.particleLife*60;
                }
                this.life--;
            }
        }

        function reDrawBackground(){
            ctx.fillStyle = properties.bgColor;
            ctx.fillRect(0, 0, w, h);
        }

        function drawLines(){
            var x1, y1, x2, y2, length, opacity;
            for(var i in particles){
                for(var j in particles){
                    x1 = particles[i].x;
                    y1 = particles[i].y;
                    x2 = particles[j].x;
                    y2 = particles[j].y;
                    length = Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2));
                    if(length < properties.lineLength){
                        opacity = 1-length/properties.lineLength;
                        ctx.lineWidth = '0.5';
                        ctx.strokeStyle = 'rgba(25, 125, 159, '+opacity+')';
                        ctx.beginPath();
                        ctx.moveTo(x1, y1);
                        ctx.lineTo(x2, y2);
                        ctx.closePath();
                        ctx.stroke();
                    }
                }
            }
        }

        function reDrawParticles(){
            for(var i in particles){
                particles[i].reCalculateLife();
                particles[i].position();
                particles[i].reDraw();
            }
        }

        function loop(){
            reDrawBackground();
            reDrawParticles();
            drawLines();
            requestAnimationFrame(loop);
        }

        function init(){
            for(var i = 0 ; i < properties.particleCount ; i++){
                particles.push(new Particle);
            }
            loop();
        }

        init();

    }

    welcomeBg()
});