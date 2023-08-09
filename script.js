// JavaScript functions for the modal
function showModal(title, imageSrc, description, courtDetailsURL) {
  var modalTitle = document.getElementById('modal-title');
  var modalImage = document.getElementById('modal-image');
  var modalDescription = document.getElementById('modal-description');

  modalTitle.innerText = title;
  modalImage.src = imageSrc;
  modalDescription.innerText = description;

  var modal = document.getElementById('modal');
  modal.style.opacity = 0; // Set initial opacity to 0

  // Show the modal and animate the fade-in
  modal.style.display = 'block';
  fadeIn(modal, 500); // Adjust the duration (in milliseconds) as needed
}

function hideModal() {
  var modal = document.getElementById('modal');
  modal.style.display = 'none';
  modal.style.opacity = 0; // Set opacity to 0
}

function openViewBookings(type) {
  if (type === 'all') {
    window.location.href = "viewBookings.php?type=all"; // Pass 'all' as the type
  } else {
      window.location.href = "viewBookings.php?type=" + encodeURIComponent(type);
  }
}

function showBookingForm(type) {
  var bookingModal = document.getElementById('booking-modal');
  bookingModal.style.display = 'block';

  // Set the default value of the "type" dropdown based on the selected value
  var typeDropdown = document.getElementById('type');
  typeDropdown.value = type;
}

function hideBookingModal() {
  var bookingModal = document.getElementById('booking-modal');
  bookingModal.style.display = 'none';

  // Reset the form fields when hiding the booking modal
  document.getElementById('name').value = '';
  document.getElementById('phone_number').value = '';
  document.getElementById('organization').value = '';
  document.getElementById('notes').value = '';
  document.getElementById('type').value = '';
  document.getElementById('booking_date').value = '';
  document.getElementById('time_start').value = '';
  document.getElementById('time_end').value = '';
  document.getElementById('upload').value = '';
}

function submitBookingForm(event) {
  console.log("Form submission triggered!"); // Add this line to check if the function is called
  event.preventDefault();

  var name = document.getElementById('name').value;
  var phone_number = document.getElementById('phone_number').value;
  var organization = document.getElementById('organization').value;
  var notes = document.getElementById('notes').value;
  var type = document.getElementById('type').value;
  var booking_date = document.getElementById('booking_date').value;
  var time_start = document.getElementById('time_start').value;
  var time_end = document.getElementById('time_end').value;
  var uploadInput = document.getElementById('upload');
  var uploadFile = uploadInput.files[0]; // Get the selected file

  // Create a new FormData object and append the form data
  var formData = new FormData();
  formData.append('name', name);
  formData.append('phone_number', phone_number);
  formData.append('organization', organization);
  formData.append('notes', notes);
  formData.append('type', type);
  formData.append('booking_date', booking_date);
  formData.append('time_start', time_start);
  formData.append('time_end', time_end);
  formData.append('upload', uploadFile); // Append the file

  // Perform the AJAX request to insert.php
  fetch('insert.php', {
    method: 'POST',
    body: formData
  })
    .then(response => {
      // Check if the response was successful (status code in the range 200-299)
      if (response.ok) {
        // Booking successful, display success message
        return response.text(); // Parse the text response
      } else {
        // Booking failed, display error message
        return response.text().then(error => {
          console.error('Error submitting booking data:', error);
          var errorMessage = "Booking failed. Please try again.";

          // Handle specific error cases and update errorMessage accordingly
          if (error.includes("Time Start and Time End cannot be the same.")) {
            errorMessage = "Masa Mula dan Masa Tamat tidak boleh sama";
          } else if (error.includes("There must be at least a 1-hour gap between Time Start and Time End.")) {
            errorMessage = "Sewaan minimum adalah 1 jam";
          } else if (error.includes("Slot is too close to an existing booking.")) {
            errorMessage = "Slot tersebut sudah ditempah";
          } else if (error.includes("Time end must be later than time start")) {
            errorMessage = "Masa Mula mestilah sebelum masa Tamat";
          }

          alert(errorMessage); // Show the appropriate error message
          exit(); // Exit to stop further processing
        });
      }
    })
    .then(data => {
      // Handle the response
      if (data && data.includes("Booking successful!")) {
        // Booking successful, display success message
        console.log('Booking data submitted successfully:', data);

        // Show the success message in an alert
        alert("Booking successful!");

        // Reset the form
        document.getElementById('name').value = '';
        document.getElementById('phone_number').value = '';
        document.getElementById('organization').value = '';
        document.getElementById('notes').value = '';       
        document.getElementById('type').value = '';
        document.getElementById('booking_date').value = '';
        document.getElementById('time_start').value = '';
        document.getElementById('time_end').value = '';
        document.getElementById('upload').value = '';
        
        // Reload the page to display the updated table (optional, if needed)
        location.reload(true);
      }
    })
    .catch(error => {
      // Catch any other errors that might occur
      console.error('Error submitting booking data:', error);
    });
}




function submitEditBookingForm() {
  console.log("Submit Edit Booking Form called");
  event.preventDefault();

  var formData = new FormData();

  // Get the form data
  var bookingId = document.getElementById('edit-booking-id').value;
  var name = document.getElementById('edit-name').value;
  var phone_number = document.getElementById('edit-phone_number').value;
  var organization = document.getElementById('edit-organization').value;
  var notes = document.getElementById('edit-notes').value; 
  var type = document.getElementById('edit-type').value;
  var booking_date = document.getElementById('edit-booking_date').value;
  var time_start = document.getElementById('edit-time_start').value;
  var time_end = document.getElementById('edit-time_end').value;
  var status = document.getElementById('edit-status').value;
  var upload = document.getElementById('edit-upload').value;

  // Log the data to check if it's correct
  console.log("Booking ID:", bookingId);
  console.log("Name:", name);
  console.log("Phone Number:", phone_number);
  console.log("Organization:", organization);
  console.log("notes:", notes);
  console.log("Type:", type);
  console.log("Booking Date:", booking_date);
  console.log("Time Start:", time_start);
  console.log("Time End:", time_end);
  console.log("Status:", status);
  console.log("Upload:", upload);

  // Perform any necessary validation and processing of the form data

  // Submit the form using AJAX to update the booking
  // Assuming you have a separate PHP script to update the booking details
  formData.append('id', bookingId);
  formData.append('name', name);
  formData.append('phone_number', phone_number);
  formData.append('organization', organization);
  formData.append('notes', notes);
  formData.append('type', type);
  formData.append('booking_date', booking_date);
  formData.append('time_start', time_start);
  formData.append('time_end', time_end);
  formData.append('status', status);
  formData.append('upload', upload);

  
  fetch('updateBookings.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.text())
  .then(data => {
    // Display a success message or handle errors if needed
    console.log('Booking updated successfully:', data);
  
    // Close the "Edit Booking" modal
    closeEditBookingModal();
  
    // Display a prompt indicating successful booking update
    alert('Booking updated successfully!');
  
    // Reload the page to display the updated table
    location.reload();
  })
  .catch(error => {
    console.error('Error updating booking:', error);
  });
}




// Helper function for fade-in animation
function fadeIn(element, duration) {
  var increment = 1 / (duration / 10);
  var op = 0;

  var timer = setInterval(function () {
    if (op >= 1) {
      clearInterval(timer);
    }

    element.style.opacity = op;
    element.style.filter = 'alpha(opacity=' + op * 100 + ')';
    op += increment;
  }, 10);
}

// JavaScript for the responsive navigation bar
const navSlide = () => {
  const burger = document.querySelector('.burger');
  const nav = document.querySelector('.nav-links');
  const navLinks = document.querySelectorAll('.nav-links li');

  if (burger) {
    burger.addEventListener('click', () => {
      // Toggle nav
      nav.classList.toggle('nav-active');

      // Animate nav links
      navLinks.forEach((link, index) => {
        if (link.style.animation) {
          link.style.animation = '';
        } else {
          link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3}s`;
        }
      });

      // Burger animation
      burger.classList.toggle('toggle');
    });
  }
};

navSlide();

function showModalWithAdditionalImages(title, imageSrc, description, additionalImages, type) {
  showModal(title, imageSrc, description);

  var additionalImagesContainer = document.getElementById('additional-images-container');

  if (!additionalImagesContainer) {
    additionalImagesContainer = document.createElement('div');
    additionalImagesContainer.id = 'additional-images-container';
    document.querySelector('.modal-content').appendChild(additionalImagesContainer);
  } else {
    additionalImagesContainer.innerHTML = '';
  }

  additionalImages.forEach(function (image) {
    var img = document.createElement('img');
    img.src = image;
    additionalImagesContainer.appendChild(img);
  });

  var modalButton = document.getElementById('modal-button');
  modalButton.innerHTML = "Book Now";
  modalButton.setAttribute("onclick", "showBookingFormModal('" + type + "')");

  var viewBookingsButton = document.createElement('button');
  viewBookingsButton.innerHTML = "View Bookings";
  viewBookingsButton.setAttribute("onclick", "openViewBookings('" + type + "')");
  additionalImagesContainer.appendChild(viewBookingsButton);

  // Set the default value of the "type" input
  var typeInput = document.getElementById('type');
  typeInput.value = type;
  typeInput.setAttribute('readonly', true);
}

// Updated showBookingForm function to accept type parameter
function showBookingFormModal(type) {
  var bookingModal = document.getElementById('booking-modal');
  bookingModal.style.display = 'block';

  // Set the default value of the "type" dropdown based on the selected value
  var typeDropdown = document.getElementById('type');

  // Loop through the options and select the correct one
  for (var i = 0; i < typeDropdown.options.length; i++) {
    if (typeDropdown.options[i].value === type) {
      typeDropdown.selectedIndex = i;
      break;
    }
  }
}

function showAdminLoginModal() {
  var adminLoginModal = document.getElementById('admin-login-modal');
  adminLoginModal.style.display = 'block';
}

function hideAdminLoginModal() {
  var adminLoginModal = document.getElementById('admin-login-modal');
  adminLoginModal.style.display = 'none';
}

function testAdminLoginModal() {
  showAdminLoginModal();
}

function openEditBookingModal(bookingId) {
  // Fetch the booking details using AJAX
  // Assuming you have a separate PHP script to fetch booking details based on the ID
  // Replace 'fetch_booking_details.php' with the actual PHP script that retrieves booking details
  fetch('fetchBookingDetails.php?id=' + bookingId)
    .then(response => response.json())
    .then(data => {
      // Populate the form fields with the retrieved booking details
      document.getElementById('edit-booking-id').value = bookingId; // Set the bookingId in the hidden input field
      document.getElementById('edit-name').value = data.name;
      document.getElementById('edit-phone_number').value = data.phone_number;
      document.getElementById('edit-organization').value = data.organization;
      document.getElementById('edit-notes').value = data.notes;
      document.getElementById('edit-type').value = data.type;
      document.getElementById('edit-booking_date').value = data.booking_date;
      document.getElementById('edit-time_start').value = data.time_start;
      document.getElementById('edit-time_end').value = data.time_end;
      document.getElementById('edit-status').value = data.status;
      document.getElementById('edit-upload').value = data.upload;


      document.getElementById('upload').value = '';

      var formData = new FormData();

      // Show the "Edit Booking" modal
      document.getElementById('edit-booking-modal').style.display = 'block';

      // Remove the booking ID entry from the formData
      formData.delete('id');
    })
    .catch(error => {
      console.error('Error fetching booking details:', error);
    });
}

  function closeEditBookingModal() {
    document.getElementById('edit-booking-modal').style.display = 'none';
  }

  // // Function to handle form submission for editing the booking
  // function submitEditBookingForm() {

  //   console.log("Submit Edit Booking Form called"); // Add this line to check if the function is called
  //   event.preventDefault(); 

  //   // Get the form data
  //   var bookingId = document.getElementById('edit-booking-id').value;
  //   var name = document.getElementById('edit-name').value;
  //   var phone_number = document.getElementById('edit-phone_number').value;
  //   var notes = document.getElementById('edit-notes').value;
  //   var type = document.getElementById('edit-type').value;
  //   var booking_date = document.getElementById('edit-booking_date').value;
  //   var time_start = document.getElementById('edit-time_start').value;
  //   var time_end = document.getElementById('edit-time_end').value;
  
  //   // Log the data to check if it's correct
  //   console.log("Booking ID:", bookingId);
  //   console.log("Name:", name);
  //   console.log("Phone Number:", phone_number);
  //   console.log("notes:", notes);
  //   console.log("Type:", type);
  //   console.log("Booking Date:", booking_date);
  //   console.log("Time Start:", time_start);
  //   console.log("Time Start:", time_end);
  

  //   // Perform any necessary validation and processing of the form data

  //   // Submit the form using AJAX to update the booking
  //   // Assuming you have a separate PHP script to update the booking details
  //   // Submit the form using AJAX to update the booking
  //   fetch('updateBookings.php', {
  //     method: 'POST',
  //     body: new URLSearchParams({
  //       id: bookingId,
  //       name: name,
  //       phone_number: phone_number,
  //       notes: notes,
  //       type: type,
  //       booking_date: booking_date,
  //       time_start: time_start,
  //       time_end: time_end
        
  //     })
  //   })
  //     .then(response => response.text())
  //     .then(data => {
  //       // Display a success message or handle errors if needed
  //       console.log('Booking updated successfully:', data);
  
  //       // Close the "Edit Booking" modal
  //       closeEditBookingModal();
  
  //       // Display a prompt indicating successful booking update
  //       alert('Booking updated successfully!');
  
  //       // Reload the page to display the updated table
  //       location.reload();
  //     })
  //     .catch(error => {
  //       console.error('Error updating booking:', error);
  //     });
  // }

  
function updateTableData(bookingId) {
  // Fetch the updated booking data from the server
  fetch('fetchBookingDetails.php?id=' + bookingId)
    .then(response => response.json())
    .then(data => {
      // Update the table data with the retrieved booking details
      var tableRow = document.getElementById('row-' + bookingId);
      if (tableRow) {
        tableRow.cells[0].innerText = data.name;
        tableRow.cells[1].innerText = data.phone_number;
        tableRow.cells[2].innerText = data.notes;
        tableRow.cells[3].innerText = data.type;
        tableRow.cells[4].innerText = data.booking_date;
        tableRow.cells[4].innerText = data.time_start;
        tableRow.cells[5].innerText = data.time_end;
      }
    })
    .catch(error => {
      console.error('Error fetching updated booking details:', error);
    });
}

function deleteBooking(bookingId) {

  console.log('Deleting booking with ID:', bookingId);

  // Show a confirmation prompt before deleting the booking
  var isConfirmed = confirm("Are you sure you want to delete this booking?");

  if (isConfirmed) {
    // Submit the form using AJAX to delete the booking
    fetch('deleteAndResetIDs.php', {
      method: 'POST',
      body: new URLSearchParams({
        id: bookingId,
      })
    })
      .then(response => response.text())
      .then(data => {
        // Display a success message or handle errors if needed
        console.log(data);

        // Display a prompt indicating successful booking deletion
        alert('Booking deleted successfully!');

        // Reload the page to display the updated table with reset IDs
        location.reload();
      })
      .catch(error => {
        console.error('Error deleting booking:', error);
      });
  }
}

function goBack() {
  // Go back to the previous page in the browser's history
  history.back();
}

// function approveBooking(button, bookingId) {
//   console.log('Booking ID:', bookingId); // Check if the correct bookingId is received
//   console.log('Type of Booking ID:', typeof bookingId); // Check the data type of bookingId

  

//   // Find the parent row element of the button (the <tr> element)
//   const row = button.closest('tr');

//   // Check if the row is found before proceeding
//   if (row) {
//     row.classList.add('approved-row');

//     // Perform other actions related to approving the booking (e.g., updating in the database)
//     // ...

//     // You can display a success message here if needed
//     alert('Booking approved successfully!');
//   } else {
//     // If the row is not found, display an error message
//     alert('Error: Booking ID not found!');
//   }
// }


function approveBooking(button, bookingId) {
  // Disable the button to prevent multiple clicks during processing
  button.disabled = true;

  // Send an AJAX request to update the booking status to "approve"
  fetch('updateStatus.php', {
    method: 'POST',
    body: new URLSearchParams({ id: bookingId, status: 'Approved' }),
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    }
  })
  .then(response => response.text())
  .then(data => {
    // Display a success message or handle errors if needed
    console.log('Booking approved:', data);

    // Update the status column in the table to "Approved"
    var row = button.closest('tr');
    var statusCell = row.querySelector('.status-cell');
    // statusCell.textContent = 'Approved';
  })

  .catch(error => {
    console.error('Error approving booking:', error);
  })
  .finally(() => {
    // Re-enable the button after the request is completed
    button.disabled = false;
  });
  // Reload the page to display the updated table
  location.reload(true)
}


function highlightApprovedRows() {
  const rows = document.querySelectorAll('tr.approved-row');
  rows.forEach((row) => {
    row.classList.add('approved-row');
  });
}

// Call the function when the page loads
window.addEventListener('load', highlightApprovedRows);

