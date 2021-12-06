$.validator.addMethod('strong', function(value, el){
  return this.optional(el) || /\d/.test(value) && /[a-z]/i.test(value);
}, 'Parola trebuie sa conțină măcar o cifră și un caracter!');

$.validator.addMethod("noSpace", function(value, el) { 
  return value == ' ' || value.trim().length != 0;  
}, "Spațiile nu se permit!");

$.validator.addMethod("alphanumeric", function(value, el) {
return this.optional(el) || /^\w+$/i.test(value);
}, "Doar litere și numere se permit!");

$('#regform').validate({
  rules:{
      username:{
          required: true,
          minlength: 3,
          noSpace: true,
          alphanumeric: true
      },
      email:{
          required: true,
          email: true
      },
      password_1:{
          required: true,
          minlength: 8,
          strong: true
      }, 
      password_2:{
          equalTo: "#password",
          required: true,
          minlength: 8
      }  
  },
  messages:{
      username:{
          required: 'Introduceti un username!',
          minlength: 'Username trebuie să fie mai lung de 3 caractere'
      },
      email:{
          required: 'Introduceti un email',
          email: 'Introduceti un email valid'
      },
      password_1:{
          required: 'Introduceti o parola',
          minlength: 'Parola este prea scurta'
      },
      password_2:{
          required: 'Introduceti aceeasi parola',
          minlength: 'Parola este prea scurta',
          equalTo: "Parolele nu se potrivesc"
      }  
  }
})

$('input').on('input', function(){
  $('.msg').css('display', 'none');
  $('input').removeClass('error-1');
})

$('#register_btn').click(function(e){
  e.preventDefault();
  if($('#regform').valid()){
     sent_reg(e);
  }
})

var sent_reg = function(e){
  let username = $('input[name="username"]').val();
  let email = $('input[name="email"]').val();
  let password_1 = $('input[name="password_1"]').val();
  let password_2 = $('input[name="password_2"]').val();
  
  let formData = new FormData();
  
  formData.append('username', username);
  formData.append('email', email);
  formData.append('password_1', password_1);
  formData.append('password_2', password_2);
  
  $.ajax({
      url: 'register_handler.php',
      type: 'POST',
      dataType: 'json',
      cache: false,
      processData: false,
      contentType: false,
      data: formData,
      success(data){
          if(data.status === true){
              document.location.href = 'login.php';
          }else{
              if(data.type === 1){
                  data.fields.forEach(function(f){
                      $('input[name='+f.field).addClass('error-1');
                      $('.msg-'+f.field).css("display", "block").text(f.message);
                  });
              }
          }
      }
  });
};


//login

$('#logform').validate({
    rules:{
        username:{
            required: true,
            minlength: 3
        },
        password:{
            required: true,
            minlength: 8
        } 
    },
    messages:{
        username:{
            required: 'Introduceti un username',
            minlength: 'Username nu poate fi mai mic decât 3 caractere'
        },
        password:{
            required: 'Introduceti o parola',
            minlength: 'Parola este prea scurta'
        }
    }
})

$('#login-btn').click(function(e){
    e.preventDefault();
      
    if($('#logform').valid()){
        sent_log(e);
    }
    
})

var sent_log = function(e){
    let username = $('input[name="username"]').val();
    let password = $('input[name="password"]').val();
    
    $.ajax({
        url: 'login_handler.php',
        type: 'POST',
        dataType: 'json',
        data: {
            username: username,
            password: password
        },
        success(data){
            if(data.status === true){
                document.location.href = 'index.php';
            }else{
                if(data.type === 1){
                    data.fields.forEach(function(f){
                        $('input[name='+f.field).addClass('error-1');
                        $('.msg-'+f.field).css("display", "block").text(f.message);
                    });
                }else if(data.type === 2){
                    $('.login-msg').css('display', 'block').text(data.message);
                }
            }
        }
    });
};