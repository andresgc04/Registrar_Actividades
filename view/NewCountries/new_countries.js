function init() {
  $("#countriesForm").on("submit", function (e) {
    Save_Edit(e);
  });
}

function Save_Edit(e) {
  e.preventDefault();

  var countryFormData = new FormData($("#countriesForm")[0]);

  $.ajax({
    url: "../../controller/CountriesController.php?op=insert_country",
    type: "POST",
    data: countryFormData,
    contentType: false,
    processData: false,
    success: function (datas) {
      $("#country").val("");
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Pais registrado correctamente",
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        willClose: () => {
          window.location.href = "../../view/HomeCountries/";
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
  $("#countriesForm").validate({
    rules: {
      country: {
        required: true,
        minlength: 1,
      },
    },
    messages: {
      country: {
        required: "Porfavor ingrese el nombre del pais.",
        minlength: "El nombre del pais debe ser mayor de 1 caracter.",
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
