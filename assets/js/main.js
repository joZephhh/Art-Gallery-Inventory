let inventory = {}
inventory.el = {}

inventory.el.body = document.querySelector(".container.panel");
inventory.el.container = inventory.el.body.querySelector(".container-content");
inventory.el.products = inventory.el.container.querySelectorAll(".product");
inventory.el.edit = inventory.el.container.querySelectorAll(".edit");
inventory.el.valid = inventory.el.container.querySelectorAll(".valid");


console.log(inventory.el.edit);

for (let i = 0; i < inventory.el.edit.length; i++) {
    inventory.el.edit[i].addEventListener("click", function(e) {
        e.preventDefault();
        this.classList.add("hide");
        this.parentElement.querySelector(".valid").classList.remove("hide");
        let self = this.parentElement.parentElement.parentElement;
        let fields = self.querySelectorAll(".fields");
        let content = self.querySelector(".product_content");
        content.classList.add("editable")
        console.log(fields);
        for (let j = 0; j < fields.length; j++) {
            let _field = fields[j].querySelector("input,textarea");
            _field.removeAttribute("disabled")
        }

    })
}

for (let u = 0; u < inventory.el.valid.length; u++) {
        inventory.el.valid[u].addEventListener("click", function(e) {
            e.preventDefault();
            let self = this.parentElement.parentElement.parentElement;
            self.submit();

        })
}
// inventory.el.actions.edit.addEventListener("click", function(e) {
//     e.preventDefault();
//     this.classList.add("hide");
//     inventory.el.actions.valid.classList.remove("hide");
//     for (let i = 0; i < inventory.el.products.length; i++) {
//         let fields = inventory.el.products[i].querySelectorAll(".fields");
//         for (let j = 0; j < fields.length; j++) {
//             fields[j].classList.add("editable");
//             let _field = fields[j].querySelector("input,textarea");
//             _field.removeAttribute("disabled");
//
//         }
//     }
//
// })
//
// inventory.el.actions.valid.addEventListener("click", function(e) {
//     e.preventDefault();
//     this.classList.add("hide");
//     let parent = this.parentElement.parentElement.parentElement;
//     parent.submit();
//     inventory.el.actions.edit.classList.remove("hide");
//     for (let i = 0; i < inventory.el.products.length; i++) {
//         let fields = inventory.el.products[i].querySelectorAll(".fields");
//         for (let j = 0; j < fields.length; j++) {
//             fields[j].classList.remove("editable");
//             let _field = fields[j].querySelector("input,textarea");
//             _field.setAttribute("disabled", "");
//
//         }
//     }
//
// })
