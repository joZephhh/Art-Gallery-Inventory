var inventory = {}
inventory.el = {}

inventory.el.body_store = document.querySelector(".container.panel.store");
inventory.el.body_logs = document.querySelector(".container.panel.logs");
inventory.el.body_users = document.querySelector(".container.panel.users");
if (inventory.el.body_store) { // if the location is : store
    inventory.el.container = inventory.el.body_store.querySelector(".container-content.panel");
    inventory.el.modal = inventory.el.container.querySelector(".modal");
    inventory.el.modal_close = inventory.el.modal.querySelector(".modal_button");
    inventory.el.add_form = inventory.el.container.querySelector(".add_form");
    inventory.el.add_form_background = inventory.el.add_form.querySelector(".product_mask");
    inventory.el.add_form_cta = inventory.el.add_form_background.querySelector("a");
    inventory.el.products = inventory.el.container.querySelectorAll(".product");
    inventory.el.edit = inventory.el.container.querySelectorAll(".edit");
    inventory.el.valid = inventory.el.container.querySelectorAll(".valid");
    inventory.el.delete = inventory.el.container.querySelectorAll(".delete");

    inventory.props = {};
    inventory.props.isEditing = false;

    //add a product
    inventory.el.add_form_cta.addEventListener("click", function(e) {
        inventory.props.isEditing = true; // avoid other actions
        e.preventDefault();
        inventory.el.add_form_background.classList.add("hide");
        var self = this.parentElement.parentElement.parentElement; // retrive relative form
        var valid_cta = self.querySelector(".product_actions .valid").classList.remove("hide") // show validate button
        valid_cta.addEventListener("click", function(e) {
            e.preventDefault();
            self.submit(); // submit relative form
        })
    })

    //edit a product
    for (var i = 0; i < inventory.el.edit.length; i++) {
        inventory.el.edit[i].addEventListener("click", function(e) {
            e.preventDefault();
            if (!inventory.props.isEditing) { // avoid other actions
                inventory.props.isEditing = true;
                this.classList.add("hide");
                this.parentElement.querySelector(".valid").classList.remove("hide");
                var self = this.parentElement.parentElement.parentElement; // retrive relative form
                var fields = self.querySelectorAll(".fields");
                var content = self.querySelector(".product_content");
                content.classList.add("editable")
                for (var j = 0; j < fields.length; j++) {
                    var _field = fields[j].querySelector("input,textarea");
                    _field.removeAttribute("disabled") // can edit fields;
                }
            } else {
                inventory.el.modal.classList.add("active"); // if currently doing something show a modal
            }
        })
    }

    // valid modifications
    for (var u = 0; u < inventory.el.valid.length; u++) {
        inventory.el.valid[u].addEventListener("click", function(e) {
            e.preventDefault();
            var self = this.parentElement.parentElement.parentElement; // retrieve relative form
            self.submit(); // submit relative form
        })
    }

    // delete products
    for (var d = 0; d < inventory.el.delete.length; d++) {
        inventory.el.delete[d].addEventListener("click", function(e) {
            e.preventDefault();
            if (!inventory.props.isEditing) { // avoid multiple actions
                var self = this.parentElement.parentElement.parentElement; // retrieve relative form
                self.querySelector(".send_type").setAttribute("value", "delete") // change type of form for $_POST in php
                self.querySelector(".product_title.fields input").removeAttribute("disabled"); // remove disabled of name ofrm he can appear in the logs page
                self.submit(); // submit relative form;
            } else {
                inventory.el.modal.classList.add("active"); // if not show a modal
            }
        })
    }

    // close modal
    inventory.el.modal_close.addEventListener("click", function(e) {
        e.preventDefault();
        inventory.el.modal.classList.remove("active");
    })// if the location is : logs

} else if (inventory.el.body_logs) {
    moment.locale("fr") // set momentjs to fr values
    inventory.el.dates = inventory.el.body_logs.querySelectorAll(".dates_to_convert"); // retrieve all data to convert
    for (var i = 0; i < inventory.el.dates.length; i++) {
        inventory.el.dates[i].innerText = moment(inventory.el.dates[i].innerText).fromNow(); // convert to relative time
    }

} else if (inventory.el.body_users) {
    inventory.el.add_user_form = inventory.el.body_users.querySelector(".user.user_add");
    inventory.el.add_user_picture = inventory.el.add_user_form.querySelector(".user_picture");
    inventory.el.add_user_picture_field = inventory.el.add_user_form.querySelector(".user_picture_field");

    inventory.el.add_user_picture_field.addEventListener("change", function(e) {
        var reader = new FileReader();
        reader.addEventListener("load", function() {
            inventory.el.add_user_picture.style.backgroundImage="url('"+reader.result+"')"
        }, false);
        if (e.target.files[0]) {
            reader.readAsDataURL(e.target.files[0]);
        }
        inventory.el.add_user_picture.querySelector("i").style.display = "none";
    })

    inventory.el.add_user_picture.addEventListener("click", function() {
        inventory.el.add_user_picture_field.click();
    })

}
