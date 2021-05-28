const replyButton = document.querySelector('#replyButton');
const replyInput = document.querySelector('#replyInput');

replyButton.addEventListener('click', () => {
    window.scrollTo(0, window.innerHeight);
    replyInput.focus();
});
