(()=>{var e=[document.getElementById("kanbanboard"),document.getElementById("unassigned-task"),document.getElementById("todo-task"),document.getElementById("inprogress-task"),document.getElementById("reviews-task"),document.getElementById("completed-task"),document.getElementById("new-task")];if(e){var t=function(){Array.from(document.querySelectorAll("#kanbanboard .tasks-list")).forEach((function(e){e.querySelectorAll(".tasks-box").length>0?e.querySelector(".tasks").classList.remove("noTask"):e.querySelector(".tasks").classList.add("noTask")}))},a=function(){task_lists=document.querySelectorAll("#kanbanboard .tasks-list"),task_lists&&Array.from(task_lists).forEach((function(e){tasks=e.getElementsByClassName("tasks"),Array.from(tasks).forEach((function(e){task_box=e.getElementsByClassName("tasks-box"),task_counted=task_box.length})),badge=e.querySelector(".totaltask-badge").innerText="",badge=e.querySelector(".totaltask-badge").innerText=task_counted}))},d=document.getElementById("deleteRecordModal");if(d&&d.addEventListener("show.bs.modal",(function(e){document.getElementById("delete-record").addEventListener("click",(function(){e.relatedTarget.closest(".tasks-box").remove(),document.getElementById("delete-btn-close").click(),a()}))})),drake=dragula(e).on("drag",(function(e){e.className=e.className.replace("ex-moved","")})).on("drop",(function(e){e.className+=" ex-moved"})).on("over",(function(e,t){t.className+=" ex-over"})).on("out",(function(e,d){d.className=d.className.replace("ex-over",""),t(),a()})),document.querySelectorAll("#kanbanboard"))autoScroll([document.querySelector("#kanbanboard")],{margin:20,maxSpeed:100,scrollWhenOutside:!0,autoScroll:function(){return this.down&&drake.dragging}});if(document.getElementById("addNewBoard")){document.getElementById("addNewBoard").addEventListener("click",(function(){var d=document.getElementById("boardName").value,n=Math.floor(100*Math.random()),s="review_task_"+n;kanbanlisthtml='<div class="tasks-list" id='+("remove_item_"+n)+'><div class="d-flex mb-3"><div class="flex-grow-1"><h6 class="fs-14 text-uppercase fw-semibold mb-0">'+d+'<small class="badge bg-success align-bottom ms-1 totaltask-badge">0</small></h6></div><div class="flex-shrink-0"><div class="dropdown card-header-dropdown"><a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fw-medium text-muted fs-12">Priority<i class="mdi mdi-chevron-down ms-1"></i></span></a><div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Priority</a><a class="dropdown-item" href="#">Date Added</a></div></div></div></div><div data-simplebar class="tasks-wrapper px-3 mx-n3"><div class="tasks" id="'+s+'" ></div></div><div class="my-3"><button class="btn btn-soft-info w-100" data-bs-toggle="modal" data-bs-target="#creatertaskModal">Add More</button></div></div>',document.getElementById("kanbanboard").insertAdjacentHTML("beforeend",kanbanlisthtml),document.getElementById("addBoardBtn-close").click(),t(),a(),drake.destroy(),e.push(document.getElementById(s)),drake=dragula(e).on("out",(function(e,d){t(),a()})),document.getElementById("boardName").value=""}))}if(document.getElementById("addMember")){document.getElementById("addMember").addEventListener("click",(function(){var e=document.getElementById("firstnameInput").value,t=localStorage.getItem("kanbanboard-member");newMembar='<a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="'+e+'">'+t+"</a>",document.getElementById("newMembar").insertAdjacentHTML("afterbegin",newMembar),document.getElementById("btn-close-member").click()}));var n=document.getElementById("profileimgInput"),s=new FileReader;n.addEventListener("change",(function(e){s.readAsDataURL(n.files[0]),s.onload=function(){var e='<img src="'+s.result+'" alt="profile" class="rounded-circle avatar-xs">';localStorage.setItem("kanbanboard-member",e)}}))}}})();