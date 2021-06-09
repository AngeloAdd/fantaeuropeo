const asideBtn = document.getElementById('asideBtn');
const sideBar = document.getElementById('sideBar');
const asideCloseBtn = document.getElementById('asideCloseBtn');
asideBtn.addEventListener('click', () => {
    sideBar.classList.remove('d-none');
    sideBar.classList.add('custom-position')
})
asideCloseBtn.addEventListener('click', ()=> {
    sideBar.classList.add('d-none');
    sideBar.classList.remove('custom-position')
})