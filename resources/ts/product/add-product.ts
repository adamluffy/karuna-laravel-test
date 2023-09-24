import { insertProduct, isFormValid } from './product-service';

const addProductForm = document.getElementById("add-product-form") as HTMLFormElement;

addProductForm!.addEventListener("submit", (event: SubmitEvent) => {

    if(!addProductForm.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
    }

    if(!isFormValid()) {
        addProductForm.classList.add("was-validated");
        return;
    }

    if(addProductForm.classList.contains("was-validated")) {
        addProductForm.classList.remove("was-validated");
    }

    insertProduct();
});


