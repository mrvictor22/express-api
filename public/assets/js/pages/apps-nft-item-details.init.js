(()=>{try{var t=function(t){return new Date(t).getTime()},e=function(t,e){var n=t-(new Date).getTime(),o=Math.floor(n/864e5),i=Math.floor(n%864e5/36e5),c=Math.floor(n%36e5/6e4),a=Math.floor(n%6e4/1e3);o=o<10?"0"+o:o,i=i<10?"0"+i:i,c=c<10?"0"+c:c,a=a<10?"0"+a:a,document.querySelector("#"+e).textContent=o+" : "+i+" : "+c+" : "+a,n<0&&(document.querySelector("#"+e).textContent="00 : 00 : 00 : 00")},n=t("March 19, 2024 6:0:0"),o=t("April 16, 2023 5:3:1"),i=t("Dec 01, 2023 1:0:1"),c=t("Nov 26, 2024 1:2:1"),a=t("May 27, 2023 1:6:6"),u=t("May 20, 2023 2:5:5"),l=t("June 10, 2023 5:1:4"),r=t("June 25, 2023 1:6:3"),m=t("July 08, 2023 1:5:2");document.getElementById("auction-time-1")&&setInterval((function(){e(n,"auction-time-1")}),1e3),document.getElementById("auction-time-2")&&setInterval((function(){e(o,"auction-time-2")}),1e3),document.getElementById("auction-time-3")&&setInterval((function(){e(i,"auction-time-3")}),1e3),document.getElementById("auction-time-4")&&setInterval((function(){e(c,"auction-time-4")}),1e3),document.getElementById("auction-time-5")&&setInterval((function(){e(a,"auction-time-5")}),1e3),document.getElementById("auction-time-6")&&setInterval((function(){e(u,"auction-time-6")}),1e3),document.getElementById("auction-time-7")&&setInterval((function(){e(l,"auction-time-7")}),1e3),document.getElementById("auction-time-8")&&setInterval((function(){e(r,"auction-time-8")}),1e3),document.getElementById("auction-time-9")&&setInterval((function(){e(m,"auction-time-9")}),1e3)}catch(t){}var d=document.querySelectorAll(".filter-btns .nav-link"),s=document.querySelectorAll(".product-item");Array.from(d).forEach((function(t){t.addEventListener("click",(function(t){t.preventDefault();for(var e=0;e<d.length;e++)d[e].classList.remove("active");this.classList.add("active");var n=t.target.dataset.filter;Array.from(s).forEach((function(t){"all"===n||t.classList.contains(n)?t.style.display="block":t.style.display="none"}))}))}))})();