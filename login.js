  $("#password").keyup(function() {
    var number = /([0-9])/;
    var lowerCase = /([a-z])/;
    var uperCase = /([A-Z])/;
    var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
    if ($("#password").val().length < 8) {
        $('#password-strength-status').removeClass();
        $('#password-strength-status').addClass('weak-pass');
        $('#password-strength-status').html("Weak (should be atleast 8 characters.)");
    } else {
        if ($('#password').val().match(number) && $('#password').val().match(lowerCase) && $('#password').val().match(special_characters) && $('#password').val().match(uperCase)) {
            $('#password-strength-status').removeClass();
            $('#password-strength-status').addClass('strong-pass');
            $('#password-strength-status').html("Strong");
        } else {
            $('#password-strength-status').removeClass();
            $('#password-strength-status').addClass('medium-pass');
            $('#password-strength-status').html("Medium (should include lowerCase, numbers and special characters.)");
        }
    }
  })