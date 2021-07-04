const upButton = document.querySelector('#upButton');
const replyButton = document.querySelector('#replyButton');
const replyInput = document.querySelector('#replyInput');
const viewReplyButton = document.getElementsByClassName('viewReply');
const hideReplyButton = document.getElementsByClassName('hideReply');
const replyInReply = document.getElementsByClassName('replyInReply');
const tagInput = document.querySelector('#tagInput');
const tagDisplay = document.querySelector('#tagDisplay');
const footer = document.querySelector('.footer');
const copyright = document.querySelector('#copyright');
let totalReplyInReply = replyInReply.length;

window.onscroll = () => {
    let scrollTop = document.documentElement.scrollTop;

    if (scrollTop > 50) {
        upButton.style.display = 'block';
    } else {
        upButton.style.display = 'none';
    }
};

for (let i = 0; i < totalReplyInReply; i++) {
    if (viewReplyButton[i]) {
        viewReplyButton[i].addEventListener('click', () => {
            replyInReply[i].style.display = 'block';
            viewReplyButton[i].style.display = 'none';
            hideReplyButton[i].style.display = 'block';
        });
    }

    if (hideReplyButton[i]) {
        hideReplyButton[i].addEventListener('click', () => {
            replyInReply[i].style.display = 'none';
            viewReplyButton[i].style.display = 'block';
            hideReplyButton[i].style.display = 'none';
        });
    }
}

upButton.addEventListener('click', () => {
    window.scrollTo(0, 0);
});

if (replyButton) {
    replyButton.addEventListener('click', () => {
        window.scrollTo(0, window.innerHeight);
        replyInput.focus();
    });
}

copyright.innerHTML = `Copyright &copy; ${new Date().getFullYear()} Discode. All rights reserved.`;

if (document.body.offsetHeight < 700) {
    footer.style.position = 'fixed';
    footer.style.bottom = '0';
}

$(document).ready(function() {
    $(".mul-select").select2({
        placeholder: "Tag",
        tags: true,
        tokenSeparators: ['/',',',';'," "] 
    });
})

// Parallax
$(window).on('load', function() {
    if ($('.photo').length) $('.photo').addClass('show');
    if ($('.tagline').length) $('.tagline').addClass('show');
    if ($('.hr').length) $('.hr').addClass('show');
    if ($('.desc').length) $('.desc').addClass('show');
    if ($('.btn-see').length) $('.btn-see').addClass('show');

    // Built With
    if ($('.built-with').length) {
        $('.built-with-photo').addClass('show');
        $('.built-with-title').addClass('show');

        $('.built-with-desc').each(function(i) {
            setTimeout(function() {
                $('.built-with-desc').eq(i).addClass('show');
            }, 50 * i);
        });
    }
});

$(window).scroll(function() {
    let wScroll = $(this).scrollTop();
    
    // Why Us
    if ($('.why-us').length) {
        if (wScroll > $('.why-us').offset().top - 100) {
            $('.why-us-title').addClass('show');
    
            $('.why-us-photo').each(function(i) {
                setTimeout(function() {
                    $('.why-us-photo').eq(i).addClass('show');
                }, 200 * i);
            });
    
            $('.why-us-desc').each(function(i) {
                setTimeout(function() {
                    $('.why-us-desc').eq(i).addClass('show');
                }, 200 * i);
            });
        }
    
        if (wScroll < $('.why-us').offset().top - 100) {
            $('.why-us-title').removeClass('show');
    
            $('.why-us-photo').each(function(i) {
                setTimeout(function() {
                    $('.why-us-photo').eq(i).removeClass('show');
                }, 200 * i);
            });
    
            $('.why-us-desc').each(function(i) {
                setTimeout(function() {
                    $('.why-us-desc').eq(i).removeClass('show');
                }, 200 * i);
            });
        }
    }

    // Project Details
    if ($('.project-details').length) {
        if (wScroll > $('.project-details').offset().top - 100) {
            $('.project-details-photo').addClass('show');
            $('.project-details-title').addClass('show');
    
            $('.project-details-desc').each(function(i) {
                setTimeout(function() {
                    $('.project-details-desc').eq(i).addClass('show');
                }, 100 * i);
            });
        }
    
        if (wScroll < $('.project-details').offset().top - 100) {
            $('.project-details-photo').removeClass('show');
            $('.project-details-title').removeClass('show');
    
            $('.project-details-desc').each(function(i) {
                setTimeout(function() {
                    $('.project-details-desc').eq(i).removeClass('show');
                }, 100 * i);
            });
        }
    }

    // Our Developer
    if ($('.our-dev').length) {
        if (wScroll > $('.our-dev').offset().top - 100) {
            $('.our-dev-photo-left').addClass('show');
            $('.our-dev-photo-right').addClass('show');
            $('.our-dev-title').addClass('show');
    
            $('.our-dev-desc-left').each(function(i) {
                setTimeout(function() {
                    $('.our-dev-desc-left').eq(i).addClass('show');
                    $('.our-dev-desc-right').eq(i).addClass('show');
                }, 100 * i);
            });
        }
    
        if (wScroll < $('.our-dev').offset().top - 100) {
            $('.our-dev-photo-left').removeClass('show');
            $('.our-dev-photo-right').removeClass('show');
            $('.our-dev-title').removeClass('show');
    
            $('.our-dev-desc-left').each(function(i) {
                setTimeout(function() {
                    $('.our-dev-desc-left').eq(i).removeClass('show');
                    $('.our-dev-desc-right').eq(i).removeClass('show');
                }, 100 * i);
            });
        }
    }
});