$(document).ready( function() {

  $("#usersId").validate({
    rules: {
      "fname" : {
          required: true,
          minlength: 5,
      },
      "lname" : {
          required: true,
          minlength: 5,
      },
      "password" : {
          required: true,
          minlength: 8,
      },
      "conPassword" : {
          required: true,
          equalTo: '#passwordId',
      },
      "gender" : {
          required: true,
      },
      "dob" : {
          required: true,
          dateISO:true
      },
      "email" : {
          required: true,
          email:true
      },
      "phone" : {
          required: true,
          number:true,
          maxlength:10,
          minlength:10
      },
      "address" : {
          required: true,
          minlength:10
      },
      "country" : {
          required: true,
      },
      "lang[]" : {
        required: true,
        minlength:2
      },
      "hobbies[]" : {
        required: true,
        minlength:3
      },
      "resume" : {
        required: true,
        accept:'doc|pdf|rtf|docx'
      },
      "avatar" : {
        required: true,
        accept:'jpg|jpeg|gif|png'
      },
    },
    'messages':{
      "gender" : {
        required: 'Please check any gender',
      },
      "hobbies[]" : {
        required: 'Hobbies are required',
        minlength:$.format('Please check at least {0} hobbies')
        
      },
      "avatar" : {
        required: 'Please upload avatar',
        accept:$.format('Please upload file witth {0}')
      },
    },
    success: function(label) {
      label.next().remove();
            var name = label.attr('for');
            label.text(name+ ' is ok!');
            label.removeClass('error').addClass('success');
        }
  });

});// ready close
