const deleteForm = document.getElementById("deleteForm");

let mainHeading = document.getElementById("mainHeading");
let id = document.getElementById("id");
let heading = document.getElementById("heading");
let description = document.getElementById("description");
let note = document.getElementById("note");
let type = document.getElementById("type");
let methods = document.getElementById("methods");
let publishTrue = document.getElementById("flexRadioDefault1");
let publishFalse = document.getElementById("flexRadioDefault2");
let example = document.getElementById("example");

const confirmModal = new bootstrap.Modal(
  document.getElementById("confirmModal")
);
const descModal = new bootstrap.Modal(document.getElementById("descModal"));

const editModal = new bootstrap.Modal(document.getElementById("editModal"));

let cardDeleteBtn = document.getElementsByClassName("cardBtn");
let modalDeleteBtn = document.getElementById("modalDeleteButton");
let editBtn = document.getElementsByClassName("editBtn");
let pText = document.getElementsByClassName("p-clamped-text");

Array.from(cardDeleteBtn).forEach((element) => {
  element.addEventListener("click", () => {
    confirmModal.toggle();
    let id = element.id;
    let deleteButton = deleteForm.childNodes[1];
    deleteButton.id = id;

    modalDeleteBtn.addEventListener("click", () => {
      window.location = "/php_tutorial/dashboard/dashboard.php?delete=" + id;
    });
  });
});

Array.from(editBtn).forEach((element) => {
  element.addEventListener("click", (e) => {
    editModal.toggle();
    let headRef =
      e.target.parentNode.parentNode.parentNode.childNodes[1].innerText;
    let cardBody = e.target.parentNode.parentNode;
    if (cardBody.children.length > 0) {
      id.value = String(element.id);
      heading.value = String(headRef);
      mainHeading.value = String(
        cardBody.children[0].innerText.split(":")[1].trim()
      );
      description.value = String(
        cardBody.children[1].innerText.split(":")[1].trim()
      );
      note.value = String(cardBody.children[2].innerText.split(":")[1].trim());
      type.value = String(cardBody.children[3].innerText.split(":")[1].trim());
      methods.value = String(
        cardBody.children[5].innerText.split(":")[1].trim()
      );
      example.value = String(
        cardBody.children[6].innerText.split(":")[1].trim()
      );
    } else {
      console.log("cardBody has no children or is undefined.");
    }
  });
});

const modalBody = document.getElementById("desc-body");
Array.from(pText).forEach((element) => {
  element.addEventListener("click", () => {
    descModal.toggle();
    modalBody.innerText = element.innerText;
  });
});
