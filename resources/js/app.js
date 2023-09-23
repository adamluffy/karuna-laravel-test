import axios from 'axios';
import './bootstrap';

document.getElementById("edit-product-form").addEventListener("submit", (event) => {
    event.preventDefault();
    updateProduct();
});

document.getElementById("add-product-form", (event) => {
    event.preventDefault();
    insertProduct();
})

function updateProduct() {

    const id = document.getElementById("id").value 
    const name = document.getElementById("name").value;
    const details = document.getElementById("details").value;
    const price   = document.getElementById("price").value;
    const publish = document.querySelector("input[name='publish']:checked").value;

    axios.put(`${location.origin}/product/${id}`, {
        name,
        details,
        price,
        publish
    })
    .then((res) => res.data)
    .then((res) => {
        if(res.success) {
            window.location.href = location.origin;
        }
    });
}


function insertProduct() {

     const name = document.getElementById("name").value;
     const details = document.getElementById("details").value;
     const price = document.getElementById("price").value;
     const publish = document.querySelector(
         "input[name='publish']:checked"
     ).value;

     axios.post(`${location.origin}/product`, {
             name,
             details,
             price,
             publish,
         })
         .then((res) => res.data)
         .then((res) => {
             if (res.success) {
                 window.location.href = location.origin;
             }
         });
}