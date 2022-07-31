function init() {
  $("#stateForm").on("submit", function (e) {
    Save_Edit(e);
  });
}

function Save_Edit(e) {
  e.preventDefault();

  var stateFormData = new FormData($("#stateForm")[0]);

  $.ajax({
    url: "../../controller/StatesController.php?op=insert_state",
    type: "POST",
    data: stateFormData,
    contentType: false,
    processData: false,
    success: function (datas) {
      $("#rol").val("");
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Estado registrado correctamente",
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        willClose: () => {
          window.location.href = "../../view/HomeStates/";
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
  $("#stateForm").validate({
    rules: {
      state: {
        required: true,
        minlength: 1,
      },
    },
    messages: {
      state: {
        required: "Porfavor ingrese el nombre del estado.",
        minlength: "El nombre del estado debe ser mayor de 1 caracter.",
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
