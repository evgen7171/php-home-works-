'use strict';

const products = [
    {
        'id': '1',
        'image': 'bike.jpg',
        'title': 'Велотренажер',
        'desc': 'Велосипед для дома',
        'price': '100'
    },
    {
        'id': '2',
        'image': 'elliptic.jpg',
        'title': 'Эллепитческий тренажер',
        'desc': 'Ходьба дома',
        'price': '200'
    },
    {
        'id': '3',
        'image': 'ems.jpg',
        'title': 'EMS-тренажер',
        'desc': 'Прокачка групп мышц эл.током',
        'price': '150'
    },
    {
        'id': '4',
        'image': 'plane_with_barbell.jpg',
        'title': 'Скамья со штангой',
        'desc': 'Прокачай все группы мышц',
        'price': '280'
    },
    {
        'id': '5',
        'image': 'trampoline.jpg',
        'title': 'Батут',
        'desc': 'Укрпеите ноги весело',
        'price': '170'
    },
    {
        'id': '6',
        'image': 'wall.jpg',
        'title': 'Шведская стенка',
        'desc': 'Дети буду довольны',
        'price': '50'
    }
];

function findProduct(products, id) {
    for (let i = 0; i < products.length; i++) {
        if (+id === +products[i].id) {
            return products[i];
        }
    }
}

function handleMyBtn(btn, modal, products, productId) {
    let product = findProduct(products, productId);
    document.getElementById('product_image').src = "public/img/products/" + product['image'];
    document.getElementById('product_title').textContent = product['title'];
    document.getElementById('product_desc').textContent = product['desc'];
    document.getElementById('product_price').textContent = product['price'];
    modal.style.display = "block";
    handleBtn(productId);
}

function handleBtn(id) {
    document.getElementById('btn_buy').addEventListener('click', () => {
        location.href = '/cart.php?id_' + id + '=Купить';
    })
}

function handleClose(container) {
    span.addEventListener('click', () => {
            container.style.display = "none";
        }
    )
    ;
    window.onclick = function (event) {
        if (event.target === container) {
            container.style.display = "none";
        }
    };
}

const modalContainer = document.getElementById('my_modal_container');
const span = document.getElementsByClassName("close")[0];
let btns = document.querySelectorAll(".myBtn");
btns.forEach(btn => {
        btn.addEventListener('click', () => {
            handleMyBtn(btn, modalContainer, products, btn.dataset['id']);
        });
        handleClose(modalContainer);
    }
)
;
