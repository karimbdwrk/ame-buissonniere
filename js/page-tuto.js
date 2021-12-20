if (document.querySelector('body.page-id-1301')) {
    let play = false;

    document.querySelector('#play').addEventListener('click', () => {
        if (play == false) {
            document.querySelector('.d-sm-flex video').play()
            document.querySelector('#play').innerHTML = '<i class="fas fa-pause"></i>'
            play = true
        } else {
            document.querySelector('.d-sm-flex video').pause()
            document.querySelector('#play').innerHTML = '<i class="fas fa-play"></i>'
            play = false
        }
    })
}

// For HOMEPAGE 

if (document.querySelector('body.home')) {
    let play = false;

    document.querySelector('#play').addEventListener('click', () => {
        if (play == false) {
            document.querySelector('#promenade .d-sm-flex video').play()
            document.querySelector('#play').innerHTML = '<i class="fas fa-pause"></i>'
            play = true
        } else {
            document.querySelector('#promenade .d-sm-flex video').pause()
            document.querySelector('#play').innerHTML = '<i class="fas fa-play"></i>'
            play = false
        }
    })
}