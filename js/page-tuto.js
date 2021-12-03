console.log('tuto-page-js ok')

let play = false;

document.querySelector('#play').addEventListener('click', () => {
    console.log('click play/pause')

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