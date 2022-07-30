function init() {
  $("#professionForm").on("submit", function (e) {
    Save_Edit(e);
  });
}

function Save_Edit(e) {
  e.preventDefault();

  var professionFormData = new FormData($("#professionForm")[0]);

  $.ajax({
    url: "../../controller/ProfessionsController.php?op=insert_profession",
    type: "POST",
    data: professionFormData,
    contentType: false,
    processData: false,
    success: function (datas) {
      $("#profession").val("");
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Profesion registrada correctamente",
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        willClose: () => {
          window.location.href = "../../view/HomeProfessions/";
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
  $("#professionForm").validate({
    rules: {
      profession: {
        required: true,
        minlength: 1,
      },
    },
    messages: {
      profession: {
        required: "Porfavor ingrese el nombre de la profesion.",
        minlength: "El nombre de la profesion debe ser mayor de 1 caracter.",
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
