import { deleteProduct } from "./product-service";

const deleteModal = document.getElementById('deleteModal');
const deleteButton = document.getElementById("delete-product");

let currentProductId = 0;
let currentProductName = "";

if(deleteModal) {
    deleteModal.addEventListener('show.bs.modal', (event) => {
        const deleteButton = (event as MouseEvent).relatedTarget as HTMLButtonElement;
        currentProductId = parseInt(deleteButton.getAttribute('data-bs-product-id') ?? "");
        currentProductName = deleteButton.getAttribute('data-bs-product-name') ?? "";
    })
}

if(deleteButton) {
    deleteButton.addEventListener("click", () => {
        if(currentProductId) {
            deleteProduct(currentProductId);
        }
    })
}
