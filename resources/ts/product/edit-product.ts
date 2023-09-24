import { isFormValid, updateProduct } from './product-service';

const editProductForm = document.getElementById("edit-product-form") as HTMLFormElement;

editProductForm!.addEventListener("submit", (event: SubmitEvent) => {

    if(!editProductForm.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
    }

    if(!isFormValid()) {
        editProductForm.classList.add("was-validated");
        return;
    }

    if(editProductForm.classList.contains("was-validated")) {
        editProductForm.classList.remove("was-validated");
    }

    const productId = parseInt((document.getElementById("id") as HTMLInputElement).value);
    updateProduct(productId);
});
