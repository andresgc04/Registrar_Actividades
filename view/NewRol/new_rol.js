function init() {
  $("#rolForm").on("submit", function (e) {
    Save_Edit(e);
  });
}

function Save_Edit(e) {
  e.preventDefault();

  var rolFormData = new FormData($("#rolForm")[0]);

  $.ajax({
    url: "../../controller/RolesController.php?op=insert_rol",
    type: "POST",
    data: rolFormData,
    contentType: false,
    processData: false,
    success: function (datas) {
      $("#rol").val("");
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Rol registrado correctamente",
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        willClose: () => {
          window.location.href = "../../view/HomeRoles/";
        },
      });
    },
    error: function (datos) {
      console.log(datos);
    },
  });
}

$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      init();
    },
  });
  $("#rolForm").validate({
    rules: {
      rol: {
        required: true,
        minlength: 1,
      },
    },
    messages: {
      rol: {
        required: "Porfavor ingrese el nombre del rol.",
        minlength: "El nombre del rol debe ser mayor de 1 caracter.",
      },
    },
    errorElement: "span",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".form-group").append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass("is-invalid");
    },
  });
});
