$(function () {
  $("form[name='contactForm']").validate({
      rules: {
          name: "required",
          email: "required",
          phone: "required",
          subject: "required",
          message: "required",
          name: {
              required: true
          },
          email: {
              required: true,
              email: true
          },
          phone: {
              required: true,
              minlength: 10,
              maxlength: 10,
              number: true
          },
          subject: {
              required: true
          },
          message: {
              required: true
          }
      },
      messages: {
          name: "Introduceti un nume valid",
          email: {
              required: "Introduceti un e-mail",
              email: "Introduceti un e-mail valid"
          },
          phone: {
              required: "Introduceti un nr. de telefon",
              minlength: "Nr. de telefon trebuie sa aiba cel putin 10 cifre",
              maxlength: "Nr. de telefon trebuie sa nu fie mai mare 10 cifre"
          },
          subject: "Introduceti subiectul",
          message: "Introduceti mesajul"
      },
      submitHandler: function (form) {
          form.submit();
      },
      errorPlacement: function(error, element) {
        error.css('color','red');
        error.insertAfter(element);
     }
  });
}); 