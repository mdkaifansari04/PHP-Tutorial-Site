let deleteBtn = document.getElementsByClassName("deleteBtn");

Array.from(deleteBtn).forEach((element) => {
  element.addEventListener("click", () => {
    let id = element.id;
    window.location = "/php_tutorial/dashboard/concern.php?delete=" + id;
  });
});

const showBtn = document.getElementsByClassName("modalBtn");
const myModal = new bootstrap.Modal(document.getElementById("myModal"));
const modalMessageBox = document.getElementById("modalMessage");

Array.from(showBtn).forEach((element) => {
  element.addEventListener("click", () => {
    myModal.toggle();
    let hr = element.parentNode;
    modalMessageBox.innerText = hr.childNodes[3].innerText;
  });
});
