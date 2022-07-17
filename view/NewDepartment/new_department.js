$(document).ready(function () {
  $(".select2").select2();

  $(".select2bs4").select2({
    theme: "bootstrap4",
  });

  $.post(
    "../../controller/CompaniesController.php?op=get_companies",
    function (data, status) {
      $("#companyID").html(data);
    }
  );

  $.post(
    "../../controller/FacilitiesController.php?op=get_facilities_comboBox",
    function (data, status) {
      $("#facilityID").html(data);
    }
  );
});

function init() {
  $("#departmentForm").on("submit", function (e) {
    Save_Edit(e);
  });
}

function Save_Edit(e) {
  e.preventDefault();

  var departmentFormData = new FormData($("#departmentForm")[0]);

  $.ajax({
    url: "../../controller/DepartmentsController.php?op=insert_department",
    type: "POST",
    data: departmentFormData,
    contentType: false,
    processData: false,
    success: function (datas) {
      $("#departmentName").val("");
      $("#abbreviationDepartment").val("");
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Departamento registrado correctamente",
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        willClose: () => {
          window.location.href = "../../view/HomeDepartments/";
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
  $("#departmentForm").validate({
    rules: {
      companyID: {
        required: true,
      },
      facilityID: {
        required: true,
      },
      departmentName: {
        required: true,
        minlength: 1,
      },
      abbreviationDepartment: {
        required: true,
        minlength: 1,
      },
    },
    messages: {
      companyID: {
        required: "Porfavor seleccione una compañia.",
      },
      facilityID: {
        required: "Porfavor seleccione una sub-compañia.",
      },
      departmentName: {
        required: "Porfavor ingrese el nombre del departamento",
        minlength: "El nombre del departamento debe ser mayor de 1 caracter.",
      },
      abbreviationDepartment: {
        required:
          "Porfavor ingrese la abreviatura del nombre del departamento",
        minlength:
          "La abreviatura del nombre del departamento debe ser mayor de 1 caracter.",
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
