(()=>{var e=document.getElementById("varyingcontentModal");e&&e.addEventListener("show.bs.modal",(function(t){var a=t.relatedTarget.getAttribute("data-bs-whatever"),o=e.querySelector(".modal-title"),n=e.querySelector(".modal-body input");o.textContent="New message to "+a,n.value=a}))})();