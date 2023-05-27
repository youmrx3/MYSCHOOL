let currentPanelIndex = 0;

document.addEventListener("DOMContentLoaded", function () {
  let navButtons = document.querySelectorAll(
    ".admin-panel .admin-sidebar .sidebar-button"
  );

  navButtons.forEach((button, key) => {
    button.onclick = () => {
      navButtons.item(currentPanelIndex).classList.remove("active");
      button.classList.add("active");
      currentPanelIndex = key;

      updateAdminContent();
    };
  });

  updateAdminContent();

});

function updateAdminContent() {
  let xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let content = document.querySelectorAll(".admin-content").item(0);

      content.innerHTML = this.responseText;

      if (currentPanelIndex === 0) {
        setupAdmissionManager();
        return;
      }

      setupSchoolManager();
    }
  };

  xmlhttp.open("GET", "/api/admin.php?panelId=" + currentPanelIndex, true);
  xmlhttp.send();
}

function setupSchoolManager() {
  const items = document.querySelectorAll(".school-item .school-action");

  items.forEach((item, key) => {
    item.onclick = () => {
      let schoolId = item.getAttribute("id");

      let xmlhttp = new XMLHttpRequest();

      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            item.parentNode.remove();
        }
      };

      xmlhttp.open("GET", "/api/admin.php?deleteSchoolId=" + schoolId, true);
      xmlhttp.send();
    };
  });

  const addSchoolButton = document.querySelector("#add-school-button");

  addSchoolButton.onclick = () => {
    const editorPanelId = 2;

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        let content = document.querySelector(".admin-content");
        content.innerHTML = this.responseText;
      }
    };

    xmlhttp.open("GET", "/api/admin.php?panelId=" + editorPanelId, true);
    xmlhttp.send();
  };
}

function setupAdmissionManager() {}
