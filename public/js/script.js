const replyButton = document.querySelector('#replyButton');
const replyInput = document.querySelector('#replyInput');
const upButton = document.querySelector('#upButton');

replyButton.addEventListener('click', () => {
    window.scrollTo(0, window.innerHeight);
    replyInput.focus();
});

upButton.addEventListener('click', ()=>{
    window.scrollTo(0, 0);
});