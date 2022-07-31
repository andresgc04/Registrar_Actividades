$(document).ready(function () {
  $(".select2").select2();

  $(".select2bs4").select2({
    theme: "bootstrap4",
  });

  $.post(
    "../../controller/ProvincesController.php?op=get_provinces_comboBox",
    function (data, status) {
      $("#provinceID").html(data);
    }
  );
});

function init() {
  $("#municipalitiesForm").on("submit", function (e) {
    Save_Edit(e);
  });
}

function Save_Edit(e) {
  e.preventDefault();

  var municipalitiesFormData = new FormData($("#municipalitiesForm")[0]);

  $.ajax({
    url: "../../controller/MunicipalitiesController.php?op=insert_municipalities",
    type: "POST",
    data: municipalitiesFormData,
    contentType: false,
    processData: false,
    success: function (datas) {
      $("#municipalityName").val("");
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Municipio registrado correctamente",
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        willClose: () => {
          window.location.href = "../../view/HomeMunicipalities/";
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
  $("#municipalitiesForm").validate({
    rules: {
      ProvinceID: {
        required: true,
      },
      municipalityName: {
        required: true,
        minlength: 1,
      },
    },
    messages: {
      ProvinceID: {
        required:
          "Porfavor seleccione la provincia a la que pertenece el municipio.",
      },
      municipalityName: {
        required: "Porfavor ingrese el nombre del municipio.",
        minlength: "El nombre del municipio debe ser mayor de 1 caracter.",
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
