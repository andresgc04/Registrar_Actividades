$(document).ready(function () {
  $(".select2").select2();

  $(".select2bs4").select2({
    theme: "bootstrap4",
  });

  $.post(
    "../../controller/CitiesController.php?op=get_cities_comboBox",
    function (data, status) {
      $("#cityID").html(data);
    }
  );
});

function init() {
  $("#provincesForm").on("submit", function (e) {
    Save_Edit(e);
  });
}

function Save_Edit(e) {
  e.preventDefault();

  var provincesFormData = new FormData($("#provincesForm")[0]);

  $.ajax({
    url: "../../controller/ProvincesController.php?op=insert_provinces",
    type: "POST",
    data: provincesFormData,
    contentType: false,
    processData: false,
    success: function (datas) {
      $("#city").val("");
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Provincia registrada correctamente",
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        willClose: () => {
          window.location.href = "../../view/HomeProvinces/";
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
  $("#provincesForm").validate({
    rules: {
      cityID: {
        required: true,
      },
      provinceName: {
        required: true,
        minlength: 1,
      },
    },
    messages: {
      cityID: {
        required:
          "Porfavor seleccione la ciudad a la que pertenece la provincia.",
      },
      provinceName: {
        required: "Porfavor ingrese el nombre de la provincia.",
        minlength: "El nombre de la provincia debe ser mayor de 1 caracter.",
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
