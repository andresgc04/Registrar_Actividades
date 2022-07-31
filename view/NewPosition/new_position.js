function init() {
  $("#positionForm").on("submit", function (e) {
    Save_Edit(e);
  });
}

function Save_Edit(e) {
  e.preventDefault();

  var positionFormData = new FormData($("#positionForm")[0]);

  $.ajax({
    url: "../../controller/PositionsController.php?op=insert_position",
    type: "POST",
    data: positionFormData,
    contentType: false,
    processData: false,
    success: function (datas) {
      $("#profession").val("");
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Posicion registrada correctamente",
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        willClose: () => {
          window.location.href = "../../view/HomePositions/";
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
  $("#positionForm").validate({
    rules: {
      position: {
        required: true,
        minlength: 1,
      },
    },
    messages: {
      position: {
        required: "Porfavor ingrese el nombre de la posicion.",
        minlength: "El nombre de la posicion debe ser mayor de 1 caracter.",
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
