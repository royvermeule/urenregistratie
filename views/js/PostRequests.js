function handleVerwijderSubmission() {
  var form = document.getElementById("verwijderTaak");
  form.addEventListener("submit", function (event) {
    event.preventDefault();

    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "handlers/verwijdertaak.php", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          console.log("Verwijder form submitted successfully.");
        } else {
          console.error("Error in handleVerwijderSubmission xhr.status: " + xhr.status);
        }
      }
    };
    xhr.send(formData);
    window.location.reload()
  });
}

function handleBewerkSubmission() {
  var form = document.getElementById("taakBewerkSave");
  form.addEventListener("submit", function (event) {
    event.preventDefault();

    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "handlers/bewerktaak.php", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          console.log("Bewerk form submitted succesfully.");
        } else {
          console.log("Error in handleBewerkSubmission xhr.status: " + xhr.status);
        }
      }
    };
    xhr.send(formData);
    window.location.reload();
  });
  var annuleerButton = document.querySelector(".annuleer");
  annuleerButton.addEventListener("click", function (event) {
    event.preventDefault();
  });
}

function handleCreateSubmission() {
  var form = document.getElementById("taakCreateSave");
  form.addEventListener("submit", function (event) {
    event.preventDefault();

    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "handlers/createtaak.php", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          console.log("Create taak form submitted successfully.");

          // Get the response text
          var response = xhr.responseText;

          // Split the response into separate error messages
          var errorMessages = response.split("\n");
          var taakNaam = errorMessages[0];
          var taakbeschrijving = errorMessages[1];

          // Bind error messages to the respective elements
          var taaknaamError = document.getElementById('taaknaamError');
          taaknaamError.innerHTML = taakNaam;

          var taakbeschrijvingError = document.getElementById('taakbeschrijvingError');
          taakbeschrijvingError.innerHTML = taakbeschrijving;

          if (taakNaam === '' && taakbeschrijving === '') {
            window.location.reload();
          }
        } else {
          console.log("Error in handleCreateSubmission xhr.status: " + xhr.status);
        }
      }
    };
    xhr.send(formData);
  });

  var annuleerButton = document.querySelector(".annuleer");
  annuleerButton.addEventListener("click", function (event) {
    event.preventDefault();
  });
}

