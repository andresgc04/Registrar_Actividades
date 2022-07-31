$(document).ready(function () {
  $(".select2").select2();

  $(".select2bs4").select2({
    theme: "bootstrap4",
  });

  $.post(
    "../../controller/MunicipalitiesController.php?op=get_municipalities_comboBox",
    function (data, status) {
      $("#municipalityID").html(data);
    }
  );
});

function init() {
  $("#sectorsForm").on("submit", function (e) {
    Save_Edit(e);
  });
}

function Save_Edit(e) {
  e.preventDefault();

  var sectorsFormData = new FormData($("#sectorsForm")[0]);

  $.ajax({
    url: "../../controller/SectorsController.php?op=insert_sector",
    type: "POST",
    data: sectorsFormData,
    contentType: false,
    processData: false,
    success: function (datas) {
      $("#sectorName").val("");
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Sector registrado correctamente",
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        willClose: () => {
          window.location.href = "../../view/HomeSectors/";
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
  $("#sectorsForm").validate({
    rules: {
      municipalityID: {
        required: true,
      },
      sectorName: {
        required: true,
        minlength: 1,
      },
    },
    messages: {
      municipalityID: {
        required:
          "Porfavor seleccione el municipio al que pertenece el sector.",
      },
      sectorName: {
        required: "Porfavor ingrese el nombre del sector.",
        minlength: "El nombre del sector debe ser mayor de 1 caracter.",
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
