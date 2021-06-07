const upButton = document.querySelector('#upButton');
const replyButton = document.querySelector('#replyButton');
const replyInput = document.querySelector('#replyInput');
const viewReplyButton = document.getElementsByClassName('viewReply');
const hideReplyButton = document.getElementsByClassName('hideReply');
const replyInReply = document.getElementsByClassName('replyInReply');
const tagInput = document.querySelector('#tagInput');
const tagDisplay = document.querySelector('#tagDisplay');
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

if (tagInput) {
    tagInput.addEventListener('keyup', () => {
        let tag = '';
        let text = tagInput.value;
        let inputLength = text.length;

        tagDisplay.innerHTML = '';
        
        for (let i = 0; i < inputLength; i++) {
            if (i > 0 && text[i] === ' ' && text[i - 1] != ' ') {
                tagDisplay.innerHTML += `<p class="badge badge-warning bg-warning text-primary">#${tag}</p>`;
                tag = '';
            } else if (text[i] != ' ') {
                tag += text[i];
            }
        }

        tagDisplay.innerHTML += `<p class="badge badge-warning bg-warning text-primary">#${tag}</p>`;

        if (text === '') {
            tagDisplay.innerHTML = '';
        }
    });
}