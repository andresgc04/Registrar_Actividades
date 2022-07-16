$(document).ready(function () {
  $(".select2").select2();

  $(".select2bs4").select2({
    theme: "bootstrap4",
  });

  $.post(
    "../../controller/CompaniesController.php?op=get_comapanies",
    function (data, status) {
      $("#companyID").html(data);
    }
  );
});

function init() {
  $("#facilityForm").on("submit", function (e) {
    Save_Edit(e);
  });
}

function Save_Edit(e) {
  e.preventDefault();

  var facilityFormData = new FormData($("#facilityForm")[0]);

  $.ajax({
    url: "../../controller/FacilitiesController.php?op=insert_facility",
    type: "POST",
    data: facilityFormData,
    contentType: false,
    processData: false,
    success: function (datas) {
      $("#facilityName").val("");
      $("#abbreviationFacility").val("");
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Sub-Compañia registrada correctamente",
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        willClose: () => {
          window.location.href = "../../view/HomeFacilities/";
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
  $("#facilityForm").validate({
    rules: {
      companyID: {
        required: true,
      },
      facilityName: {
        required: true,
        minlength: 1,
      },
      abbreviationFacility: {
        required: true,
        minlength: 1,
      },
    },
    messages: {
      companyID: {
        required: "Porfavor seleccione una compañia.",
      },
      facilityName: {
        required: "Porfavor ingrese el nombre de la sub-compañia",
        minlength: "El nombre de la sub-compañia debe ser mayor de 1 caracter.",
      },
      abbreviationFacility: {
        required:
          "Porfavor ingrese la abreviatura del nombre de la sub-compañia",
        minlength:
          "La abreviatura del nombre de la sub-compañia debe ser mayor de 1 caracter.",
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
