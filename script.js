   document.addEventListener('DOMContentLoaded', function () {
      const rsvpForm = document.getElementById('rsvpForm');
      const nameInput = document.getElementById('name');

      rsvpForm.addEventListener('submit', function (e) {
        e.preventDefault();

        // Get the entered name
        const name = nameInput.value;

        // Store the name in localStorage
        localStorage.setItem('rsvpName', name);

        // Redirect to popup.html
        window.location.href = 'popup.html';
      });
    });

      document.addEventListener('DOMContentLoaded', function () {
      // Retrieve the name from localStorage
      const storedName = localStorage.getItem('rsvpName');

      // Display the name in the popup
      const popupName = document.getElementById('popupName');
      if (storedName) {
        popupName.textContent = `You have RSVPed as: ${storedName}`;
      } else {
        popupName.textContent = 'No RSVP name found.';
      }
    });