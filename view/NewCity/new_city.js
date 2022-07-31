$(document).ready(function () {
  $(".select2").select2();

  $(".select2bs4").select2({
    theme: "bootstrap4",
  });

  $.post(
    "../../controller/CountriesController.php?op=get_countries_comboBox",
    function (data, status) {
      $("#countryID").html(data);
    }
  );
});

function init() {
  $("#cityForm").on("submit", function (e) {
    Save_Edit(e);
  });
}

function Save_Edit(e) {
  e.preventDefault();

  var cityFormData = new FormData($("#cityForm")[0]);

  $.ajax({
    url: "../../controller/CitiesController.php?op=insert_city",
    type: "POST",
    data: cityFormData,
    contentType: false,
    processData: false,
    success: function (datas) {
      $("#city").val("");
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Ciudad registrada correctamente",
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        willClose: () => {
          window.location.href = "../../view/HomeCities/";
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
  $("#cityForm").validate({
    rules: {
      city: {
        required: true,
        minlength: 1,
      },
    },
    messages: {
      city: {
        required: "Porfavor ingrese el nombre de la ciudad.",
        minlength: "El nombre de la ciudad debe ser mayor de 1 caracter.",
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
