$(function() {
  $("form[name='regform']").validate({
    rules: {
      username: "required",
      email: "required",
      password_1: "required",
      password_2: "required",
      username: {
        required: true
      },
      email: {
        required: true,
        email: true
      },          
      password_1: {
        required: true,
        minlength: 3,
        pwcheck: true,
      },
      password_2: {
        required: true,
        minlength: 3,
        equalTo: "#password_1",
        pwcheck: true,
      },
    },
    messages: {
      username: "Introduceti un username.",
      email: {
        required: "Introduceti un email",
        email: "Introduceti un email valid",
        minlength: "Introduceti un email valid"
      },
      password_1: {
        required: "Introduceti o parola",
        minlength: "Parola este prea scurta",
        pwcheck: "Parola este prea simpla"
      },
      password_2: {
        required: "Introduceti aceeasi parola",
        minlength: "Parola este prea scurta",
        equalTo: "Parolele nu se potrivesc",
      },
    },
    submitHandler: function(form) {
      form.submit();
    },
    errorPlacement: function(error, element) {
      error.css('color','red');
      error.insertAfter(element);
   }
  });

  $("form[name='logform']").validate({
    rules: {
      username: "required",
      password: "required",
      username: {
        required: true
      },         
      password: {
        required: true,
        minlength: 3
      },
    },
    messages: {
      username: "Introduceti un username.",
      password: {
        required: "Introduceti o parola",
        minlength: "Parola este prea scurta",
      },
    },
    submitHandler: function(form) {
      form.submit();
    },
    errorPlacement: function(error, element) {
      error.css('color','red');
      error.insertAfter(element);
   }
  });

  $.validator.addMethod("pwcheck",
    function(value, element) {
        return /^(?=.*[a-z])[A-Za-z0-9\d=!\-@._*]+$/.test(value);
  });
});    