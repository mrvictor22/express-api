(()=>{document.querySelectorAll("form .auth-pass-inputgroup").forEach((function(s){s.querySelectorAll(".password-addon").forEach((function(e){e.addEventListener("click",(function(e){var t=s.querySelector(".password-input");"password"===t.type?t.type="text":t.type="password"}))}))}));var s=document.getElementById("password-input"),e=document.getElementById("confirm-password-input");s.onchange=function(){s.value!=e.value?e.setCustomValidity("Passwords Don't Match"):e.setCustomValidity("")};var t=document.getElementById("password-input"),a=document.getElementById("pass-lower"),d=document.getElementById("pass-upper"),l=document.getElementById("pass-number"),n=document.getElementById("pass-length");t.onfocus=function(){document.getElementById("password-contain").style.display="block"},t.onblur=function(){document.getElementById("password-contain").style.display="none"},t.onkeyup=function(){t.value.match(/[a-z]/g)?(a.classList.remove("invalid"),a.classList.add("valid")):(a.classList.remove("valid"),a.classList.add("invalid"));t.value.match(/[A-Z]/g)?(d.classList.remove("invalid"),d.classList.add("valid")):(d.classList.remove("valid"),d.classList.add("invalid"));t.value.match(/[0-9]/g)?(l.classList.remove("invalid"),l.classList.add("valid")):(l.classList.remove("valid"),l.classList.add("invalid")),t.value.length>=8?(n.classList.remove("invalid"),n.classList.add("valid")):(n.classList.remove("valid"),n.classList.add("invalid"))}})();