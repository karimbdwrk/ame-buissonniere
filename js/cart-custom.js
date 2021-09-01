const cartBtn = document.getElementById('cartBtn')
cartBtn.addEventListener('click', () => {
    console.log('click cart')
    document.querySelector('.xoo-wsc-basket').click()
})