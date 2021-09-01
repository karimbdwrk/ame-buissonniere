console.log('custom mega menu ok :)')

function customMegaMenu() {
    const menuImagesTable = document.querySelectorAll('#tablepress-menuImages > tbody > tr') 
    console.log(menuImagesTable)
    menuImagesTable.forEach(image => {
        let link = image.querySelector('.column-1').innerHTML
        let img = image.querySelector('.column-2 > img').getAttribute('src')
        console.log(link, img)
        let newImage = document.createElement('img')
        newImage.setAttribute('src', img)
        document.getElementById(link).prepend(newImage)
    })
}
customMegaMenu()

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