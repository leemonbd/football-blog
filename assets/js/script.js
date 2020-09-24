
function checkName(){
    var nameValue=$('#name').val();
    var number = /^[0-9]+$/;
    var numberTest=number.test(nameValue);

    if(nameValue==''){
        $('#nameError').text('নাম টাইপ করুন');
        return false;
    }
    else if(numberTest){
        $('#nameError').text('নাম শুধুমাত্র সংখ্যা হতে পারবে না');
        return false;
    }

    else if(nameValue.length>=6 && nameValue.length<16) {
        $('#nameError').text('');
        return true;
    }
    else {
        $('#nameError').text('নাম ৬ থেকে ১৫ অক্ষেরর মধ্যে হতে হবে');
        return false;
    }

}

$('#sign-up-btn').click(function () {
    checkName();
});

$('#name').keyup(function () {
    checkName();
});

$('#name').blur(function () {
    checkName();
});

function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function checkEmail(){
    var emailValue=$('#email').val();
    if(emailValue==''){
        $('#emailError').text('ইমেইল টাইপ করুন');
        return false;
    }

    else if(validateEmail(emailValue)) {
        $('#emailError').text('');
        return true;
    }
    else {
        $('#emailError').text('ইমেইল টি সঠিক নয়');
        return false;
    }

}

$('#sign-up-btn').click(function () {
    checkEmail();
});

$('#email').keyup(function () {
    checkEmail();
});

$('#email').blur(function () {
    checkEmail();
});

function checkPassword(){
    var passwordValue=$('#password').val();
    if(passwordValue==''){
        $('#passwordError').text('পাসওয়ার্ড টাইপ করুন');
        return false;
    }

    else if(passwordValue.length>7) {
        $('#passwordError').text('');
        return true;
    }
    else {
        $('#passwordError').text('পাসওয়ার্ড  সর্বনিম্ন ৮ অক্ষেরর হতে হবে');
        return false;
    }

}

$('#sign-up-btn').click(function () {
    checkPassword();
});

$('#password').keyup(function () {
    checkPassword();
});

$('#password').blur(function () {
    checkPassword();
});

function checkreTypePassword(){
    var passwordValue=$('#password').val();
    var reTypePasswordValue=$('#reTypePassword').val();

    if(reTypePasswordValue==''){
        $('#reTypePasswordError').text('আবার পাসওয়ার্ড টাইপ করুন');
        return false;
    }
    else if(reTypePasswordValue==passwordValue){
        $('#reTypePasswordError').text('');
        return true;
    }
    else {
        $('#reTypePasswordError').text('পাসওয়ার্ড ম্যাচ করেনি');
        return false;
    }

}

$('#sign-up-btn').click(function () {
    checkreTypePassword();
});

$('#reTypePassword').keyup(function () {
    checkreTypePassword();
});

$('#reTypePassword').blur(function () {
    checkreTypePassword();
});

function checkMobile(){
    var mobileValue=$('#mobile').val();
    if(mobileValue==''){
        $('#mobileError').text('মোবাইল নাম্বার টাইপ করুন');
        return false;
    }

    else if(mobileValue.length>15) {
        $('#mobileError').text('মোবাইল নাম্বার ১৫ সংখ্যার মধ্যে হতে হবে');
        return false;
    }
    else {
        $('#mobileError').text('');
        return true;
    }

}

$('#sign-up-btn').click(function () {
    checkMobile();
});

$('#mobile').keyup(function () {
    checkMobile();
});

$('#mobile').blur(function () {
    checkMobile();
});


function checkGender(){
    var genderValue=$('input[type="radio"]:checked').val();
    if(genderValue=='1' ){
        $('#genderError').text('');
        return true;
    }else if(genderValue=='0'){
        $('#genderError').text('');
        return true;
    }
    else {
        $('#genderError').text( 'লিঙ্গ নির্বাচন করুন');
        return false;
    }

}

$('#sign-up-btn').click(function () {
    checkGender();
});

function checkaddress(){
    var addressValue=$('#address').val();
    if(addressValue==''){
        $('#addressError').text('ঠিকানা টাইপ করুন');
        return false;
    }
    else {
        $('#addressError').text('');
        return true;
    }

}

$('#sign-up-btn').click(function () {
    checkaddress();
});

$('#address').keyup(function () {
    checkaddress();
});

$('#address').blur(function () {
    checkaddress();
});

$('#signUpForm').submit(function () {
    if(checkName()==true && checkEmail()==true && checkPassword()==true && checkreTypePassword()==true && checkMobile()==true && checkGender()==true && checkaddress()==true){
        return true;
    }else {
        return false;
    }

});


function checkfullNameValue(){
    var fullNameValue=$('#fullName').val();
    if(fullNameValue==''){
        return false;
    }
    else {
        return true;
    }

}

function checkmobileValue(){
    var mobileValue=$('#mobile').val();
    if(mobileValue==''){
        return false;
    }
    else {
        return true;
    }

}

function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function checkemailValue(){
    var emailValues=$('#email').val();
    if(emailValues==''){
        return false;
    }

    else if(validateEmail(emailValues)) {
        $('#emailErrorMessage').text('');
        return true;
    }
    else {
        $('#emailErrorMessage').text('ইমেইল টি সঠিক নয়');
        return false;
    }

}

function checkmessageValue(){
    var messageValue=$('#message').val();
    if(fullNameValue==''){
        return false;
    }
    else {
        return true;
    }

}

$('#contactForm').submit(function () {
    if(checkfullNameValue()==true && checkmobileValue()==true && checkemailValue()==true && checkmessageValue()==true){
        return true;

    }else {
        $('#contactFormError').text('পুরো ফর্ম পুরন করুন');
        return false;
    }

});



   /* $(document).ready(function() {
        $('#comment-btn').focus();
        $('#comment-btn').click(function(event) {
            var key = (event.keyCode ? event.keyCode : event.which);
            if (key == 13) {
                var info = $('#comment-btn').val();
                $.ajax({
                    method: "POST",
                    url: "",
                    data: {name: info},
                    success: function(status) {
                        $('#result').append(status);
                        $('#comment-btn').val('');
                    }
                });
            };

        });

    });
*/




/*function checkBlank(){
    var categoryNameValue=$('#categoryName').val();
    var sc1Value=$('#sc1').val();
    var categoryImageValue=$('#categoryImage').val();
    if(categoryNameValue==""){
        return false;
        $('#mobileErrorr').text('মোবাইল নাম্বার টাইপ করুন');
        return false;

    }else {
        return true;
    }

}

$('#save-category-btn').click(function () {
    checkBlank();
})



$('#addCategoryForm').submit(function () {
    return false;
});*/
