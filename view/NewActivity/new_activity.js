$(document).ready(function () {
  $(".select2").select2();

  $(".select2bs4").select2({
    theme: "bootstrap4",
  });

  //Date picker
  $("#startDate").datetimepicker({
    format: "L",
  });

  $("#endDate").datetimepicker({
    format: "L",
  });

  //Timepicker
  $("#startTime").datetimepicker({
    format: "LT",
  });

  $("#endTime").datetimepicker({
    format: "LT",
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
  $("#activityForm").on("submit", function (e) {
    Save_Edit(e);
  });
}

function Save_Edit(e) {
  e.preventDefault();

  var activityFormData = new FormData($("#activityForm")[0]);

  $.ajax({
    url: "../../controller/ActivitiesController.php?op=insert_activity",
    type: "POST",
    data: activityFormData,
    contentType: false,
    processData: false,
    success: function (datas) {
      $("#activityName").val("");
      $("#startDate").val("");
      $("#endDate").val("");
      $("#numberHours").val("");
      $("#startTime").val("");
      $("#endTime").val("");
      $("#purpose").val("");
      $("#responsible").val("");
      $("#cost").val("");
      $("#locationActivity").val("");
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Actividad registrada correctamente",
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        willClose: () => {
          window.location.href = "../../view/HomeActivities/";
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
  $("#activityForm").validate({
    rules: {
      activityName: {
        required: true,
        minlength: 1,
      },
      startDate: {
        required: true,
      },
      endDate: {
        required: true,
      },
      numberHours: {
        required: true,
      },
      startTime: {
        required: true,
      },
      endTime: {
        required: true,
      },
      purpose: {
        required: true,
        minlength: 1,
      },
      responsible: {
        required: true,
        minlength: 1,
      },
      cost: {
        required: true,
      },
      locationActivity: {
        required: true,
        minlength: 1,
      },
    },
    messages: {
      activityName: {
        required: "Porfavor ingrese el nombre de la actividad.",
        minlength: "El nombre de la actividad debe ser mayor de 1 caracter.",
      },
      startDate: {
        required: "Porfavor seleccione la fecha de inicio.",
      },
      endDate: {
        required: "Porfavor seleccione la fecha de finalización.",
      },
      numberHours: {
        required: "Porfavor ingrese la cantidad de horas de la actividad.",
      },
      startTime: {
        required: "Porfavor ingrese la hora de inicio de la actividad.",
      },
      endTime: {
        required: "Porfavor ingrese la hora de finalización de la actividad.",
      },
      purpose: {
        required: "Porfavor ingrese el propósito de la actividad.",
        minlength: "El propósito de la actividad debe ser mayor de 1 caracter.",
      },
      responsible: {
        required: "Porfavor ingrese el responsable de la actividad.",
        minlength:
          "El nombre del responsable de la actividad debe ser mayor de 1 caracter.",
      },
      cost: {
        required: "Porfavor ingrese el costo de la actividad.",
      },
      locationActivity: {
        required: "Porfavor ingrese la ubicación de la actividad.",
        minlength: "La ubicación de la actividad debe ser mayor de 1 caracter.",
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
