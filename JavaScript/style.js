const Audio = new
Audio("/Users/JElect/Desktop/HYRYZ3R/Web Elements/657948__matrixxx__family-friendly-inspect-sound-ui-or-in-game-notification.wav");

const button = document.querySelectorAll('.button');
button.forEach(button => {
    button.addEventListener("click", () => {
        Audio.play();
    });
});
