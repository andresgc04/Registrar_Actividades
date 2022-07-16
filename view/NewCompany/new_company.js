function init() {
  $("#companyForm").on("submit", function (e) {
    Save_Edit(e);
  });
}

function Save_Edit(e) {
  e.preventDefault();

  var companyFormData = new FormData($("#companyForm")[0]);

  $.ajax({
    url: "../../controller/CompaniesController.php?op=insert_company",
    type: "POST",
    data: companyFormData,
    contentType: false,
    processData: false,
    success: function (datas) {
      $("#companyName").val("");
      $("#abbreviationCompany").val("");
      console.log(datas);
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Compañia registrada correctamente",
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        willClose: () => {
          window.location.href = "../../view/HomeCompanies/";
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
  $("#companyForm").validate({
    rules: {
      companyName: {
        required: true,
        minlength: 1,
      },
      abbreviationCompany: {
        required: true,
        minlength: 1,
      },
    },
    messages: {
      companyName: {
        required: "Porfavor ingrese el nombre de la compañia",
        minlength: "El nombre de la compañia debe ser mayor de 1 caracter.",
      },
      abbreviationCompany: {
        required: "Porfavor ingrese la abreviatura del nombre de la compañia",
        minlength:
          "La abreviatura del nombre de la compañia debe ser mayor de 1 caracter.",
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
