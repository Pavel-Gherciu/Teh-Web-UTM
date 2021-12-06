$('#contactform').validate({
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
  }
}); 

$('input').on('input', function(){
  $('.msg').css('display', 'none');
  $('input').removeClass('error-1');
})

$('#contact-btn').click(function(e){
  e.preventDefault();
  if($('#contactform').valid()){
      sent_cont(e);
  }
})

var sent_cont = function(e){
  let name = $('input[name="name"]').val();
  let email = $('input[name="email"]').val();
  let phone = $('input[name="phone"]').val();
  let subject = $('input[name="subject"]').val();
  let message = $('textarea[name="message"]').val();
  
  let formData = new FormData();
  
  formData.append('name', name);
  formData.append('email', email);
  formData.append('phone', phone);
  formData.append('subject', subject);
  formData.append('message', message);
  
  $.ajax({
    url: 'contact_form.php',
    type: 'POST',
    dataType: 'json',
    cache: false,
    processData: false,
    contentType: false,
    data: formData,
    success(data){
      if(data.status === true){
        $('.msg_success').css('display', 'block').text(data.message);
      }else{
        if(data.type === 1){
          data.fields.forEach(function(f){
            $('input[name='+f.field).addClass('error-1');
            $('.msg-'+f.field).css("display", "block").text(f.message);
          });
        }else if(data.type === 2){
          $('.msg_fail').css('display', 'block').text(data.message);
        }
      }
    }
  });
};