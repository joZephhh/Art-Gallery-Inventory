let inventory = {}
inventory.el = {}

inventory.el.body = document.querySelector(".container.panel");
inventory.el.container = inventory.el.body.querySelector(".container-content");
inventory.el.products = inventory.el.container.querySelectorAll(".product");
inventory.el.actions = inventory.el.container.querySelector(".product_actions");
inventory.el.actions.edit = inventory.el.actions.querySelector(".edit");
inventory.el.actions.delete = inventory.el.actions.querySelector(".delete");
inventory.el.actions.valid = inventory.el.actions.querySelector(".valid");

inventory.el.actions.edit.addEventListener("click", function(e) {
    e.preventDefault();
    this.classList.add("hide");
    inventory.el.actions.valid.classList.remove("hide");
    for (let i = 0; i < inventory.el.products.length; i++) {
        let fields = inventory.el.products[i].querySelectorAll(".fields");
        for (let j = 0; j < fields.length; j++) {
            fields[j].classList.add("editable");
            let _field = fields[j].querySelector("input,textarea");
            _field.removeAttribute("disabled");

        }
    }

})

inventory.el.actions.valid.addEventListener("click", function(e) {
    e.preventDefault();
    this.classList.add("hide");
    let parent = this.parentElement.parentElement.parentElement;
    parent.submit();
    inventory.el.actions.edit.classList.remove("hide");
    for (let i = 0; i < inventory.el.products.length; i++) {
        let fields = inventory.el.products[i].querySelectorAll(".fields");
        for (let j = 0; j < fields.length; j++) {
            fields[j].classList.remove("editable");
            let _field = fields[j].querySelector("input,textarea");
            _field.setAttribute("disabled", "");

        }
    }

})
