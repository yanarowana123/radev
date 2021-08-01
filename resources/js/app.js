require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.querySelectorAll('.delete-product__btn').forEach(btn => {
    btn.addEventListener('click', event => {
        let url = `/schools/${event.target.dataset.id}`;
        axios.delete(url).then(response => window.location.reload());
    })
})

document.querySelectorAll('.delete-employee__btn').forEach(btn => {
    btn.addEventListener('click', event => {
        let url = `/employees/${event.target.dataset.id}`;
        axios.delete(url).then(response => window.location.reload());
    })
})
