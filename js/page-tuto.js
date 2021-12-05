if (document.querySelector('body.page-id-1301')) {
    let play = false;

    document.querySelector('#play').addEventListener('click', () => {
        if (play == false) {
            document.querySelector('video').play()
            document.querySelector('#play').innerHTML = '<i class="fas fa-pause"></i>'
            play = true
        } else {
            document.querySelector('video').pause()
            document.querySelector('#play').innerHTML = '<i class="fas fa-play"></i>'
            play = false
        }
    })
}