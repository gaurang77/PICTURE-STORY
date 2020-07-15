console.log("in delete");
let del = document.querySelectorAll(".delete");
del.forEach((de) => {
  de.addEventListener("click", (e) => {
    var selected = e.currentTarget;
    let next = selected.nextElementSibling;
    next.style.visibility = "visible";
    selected.style.visibility = "hidden";
    //selected.nextElementSibling.classList.remove("delete-box");
    //console.log(selected.nextElementSibling.classList);
    //console.log(next.children);

    next.children[0].addEventListener("click", (e) => {
      //console.log(selected.id);
      delStory(selected.id).then((data) => {
        let check = data.trim();
        if (check == "DELETED") {
          selected.parentElement.parentElement.remove();
        } else {
          alert("unable to delete the file contact your admin");
        }
      });
    });

    next.children[1].addEventListener("click", (e) => {
      next.style.visibility = "hidden";
      selected.style.visibility = "visible";
    });
  });

  async function delStory(id) {
    let url = "include/deleteData.php";

    let form = new FormData();
    form.append("deleteId", id);

    return fetch(url, {
      method: "POST",
      body: form,
    })
      .then((Response) => Response.text())
      .catch((error) => console.log(error));
  }
});
