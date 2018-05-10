window.$ = document.querySelector.bind(document);
let auth2 = null;
app ={
    askLogin: {
        html: "LOGIN TO CONTINUE",
        displayLength: 3000
    },
};
function signInFaisal() {
    gapi.load("auth2", function() {
        auth2 = gapi.auth2.init({
            client_id: "1096754148019-1n3pevhraur73fcr11ea1un5f0sag28n.apps.googleusercontent.com"
        });
        auth2.then(function() {
            issi = auth2.isSignedIn.get();
            if(issi){
                let user = auth2.currentUser.get();
                setDataUser(user.getBasicProfile());
            }
            else{
                //alert("no one");
                setTimeout(function(){M.toast(app.askLogin);}, 3000);
            }
        },function() {
            //alert("error");
        });
        auth2.attachClickHandler(document.getElementById("loginGoogle"), {},
            function(googleUser) {
                setDataUser(googleUser.getBasicProfile());
            }, function(error) {
                alert(JSON.stringify(error, undefined, 2));
            });
    });
}
function setDataUser2(u) {
    $("#userName").innerText = u.getName();
    $("#userEmail").innerText = u.getEmail();
    $("#userDp").src = u.getImageUrl();


}
function setDataUser(u) {
    $("#userName").innerText = u.ig;
    $("#userEmail").innerText = u.U3;
    $("#userDp").src = u.Paa;
    $("#formUserName").value = u.ig;
    $("#formUserEmail").value = u.U3;
    $("#formUserDp").value = u.Paa;
    $("#loginGoogle").classList.toggle("hide");
    $("#user").classList.toggle("hide");
}
function signOut() {
    let auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        $("#loginGoogle").classList.toggle("hide");
        $("#user").classList.toggle("hide");
        $("#formUserName").value = "";
        $("#formUserEmail").value = "";
        $("#formUserDp").value = "";
        console.log('User signed out.');
    });
}

window.onload = function () {
    $("#signOut").addEventListener("click", signOut);
    let elem = document.querySelector('select');
    let instance = M.FormSelect.init(elem);

};