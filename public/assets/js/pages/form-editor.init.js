(()=>{var e=document.querySelectorAll(".ckeditor-classic");e&&Array.from(e).forEach((function(){ClassicEditor.create(document.querySelector(".ckeditor-classic")).then((function(e){e.ui.view.editable.element.style.height="200px"})).catch((function(e){console.error(e)}))}));var o=document.querySelectorAll(".snow-editor");o&&Array.from(o).forEach((function(e){var o={};1==e.classList.contains("snow-editor")&&(o.theme="snow",o.modules={toolbar:[[{font:[]},{size:[]}],["bold","italic","underline","strike"],[{color:[]},{background:[]}],[{script:"super"},{script:"sub"}],[{header:[!1,1,2,3,4,5,6]},"blockquote","code-block"],[{list:"ordered"},{list:"bullet"},{indent:"-1"},{indent:"+1"}],["direction",{align:[]}],["link","image","video"],["clean"]]}),new Quill(e,o)}));var r=document.querySelectorAll(".bubble-editor");r&&Array.from(r).forEach((function(e){var o={};1==e.classList.contains("bubble-editor")&&(o.theme="bubble"),new Quill(e,o)}))})();