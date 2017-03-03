let inventory = {}
inventory.el = {}

inventory.el.body = document.querySelector(".container.panel");
inventory.el.container = inventory.el.body.querySelector(".container-content");

inventory.el.modal = inventory.el.container.querySelector(".modal");
inventory.el.modal_close = inventory.el.modal.querySelector(".modal_button");
inventory.el.products = inventory.el.container.querySelectorAll(".product");
inventory.el.edit = inventory.el.container.querySelectorAll(".edit");
inventory.el.valid = inventory.el.container.querySelectorAll(".valid");
inventory.el.delete = inventory.el.container.querySelectorAll(".delete");



inventory.props  = {};
inventory.props.isEditing = false;


//edit
for (let i = 0; i < inventory.el.edit.length; i++) {
    inventory.el.edit[i].addEventListener("click", function(e) {
        e.preventDefault();
        if (!inventory.props.isEditing) {
        inventory.props.isEditing = true;
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
}
else {
inventory.el.modal.classList.add("active");
}
    })
}

// valid modifications
for (let u = 0; u < inventory.el.valid.length; u++) {
        inventory.el.valid[u].addEventListener("click", function(e) {
            e.preventDefault();

            let self = this.parentElement.parentElement.parentElement;
            self.submit();

        })
}


for (var d = 0; d < inventory.el.delete.length; d++) {
    inventory.el.delete[d].addEventListener("click", function(e) {
        e.preventDefault();
        if (!inventory.props.isEditing) {
        let self = this.parentElement.parentElement.parentElement;
        self.querySelector(".send_type").setAttribute("value","delete")
        self.submit();
    }
    else {
    inventory.el.modal.classList.add("active");
    }
    })
}


inventory.el.modal_close.addEventListener("click", function(e) {
    e.preventDefault();
    inventory.el.modal.classList.remove("active");
})
