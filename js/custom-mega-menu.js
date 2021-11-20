console.log('custom mega menu ok :)')

function customMegaMenu() {
    const menuImagesTable = document.querySelectorAll('#tablepress-menuImages > tbody > tr') 
    console.log(menuImagesTable)
    menuImagesTable.forEach(image => {
        let src = image.querySelector('.column-1').innerHTML
        let img = image.querySelector('.column-2 > img').getAttribute('src')
        console.log(src, img)
        let newImage = document.createElement('img')
        newImage.setAttribute('src', img)
        document.getElementById(src).prepend(newImage)
    })
}


function clickImg() {
    document.getElementById('mega-menu-121-0-1').addEventListener('click', () => {
        console.log('click menu')
        document.querySelector('#mega-menu-121-0-1 .mega-sub-menu .mega-menu-link').click()
    })
    document.getElementById('mega-menu-121-0-2').addEventListener('click', () => {
        console.log('click menu')
        document.querySelector('#mega-menu-121-0-2 .mega-sub-menu .mega-menu-link').click()
    })
    document.getElementById('mega-menu-121-0-3').addEventListener('click', () => {
        console.log('click menu')
        document.querySelector('#mega-menu-121-0-3 .mega-sub-menu .mega-menu-link').click()
    })

    document.getElementById('mega-menu-167-0-1').addEventListener('click', () => {
        console.log('click menu')
        document.querySelector('#mega-menu-167-0-1 .mega-sub-menu .mega-menu-link').click()
    })
    document.getElementById('mega-menu-167-0-2').addEventListener('click', () => {
        console.log('click menu')
        document.querySelector('#mega-menu-167-0-2 .mega-sub-menu .mega-menu-link').click()
    })
    document.getElementById('mega-menu-167-0-3').addEventListener('click', () => {
        console.log('click menu')
        document.querySelector('#mega-menu-167-0-3 .mega-sub-menu .mega-menu-link').click()
    })
}


if (document.getElementById('mega-menu-wrap-primary') != null) {
    customMegaMenu()
    clickImg()
}

// function scrollBg() {
//     if (window.pageYOffset > 1) {
//         document.getElementById('masthead').classList.add('scrolled')
//     }
// }

window.addEventListener("scroll", function scrollBg() {
    console.log('scrolled')
    if (window.pageYOffset > 1) {
        document.getElementById('masthead').classList.add('scrolled')
    } else {
        document.getElementById('masthead').classList.remove('scrolled')
    }
});