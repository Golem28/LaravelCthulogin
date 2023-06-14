function confirmSubmit(event, text) {
    event.preventDefault(); // Prevent the default form submission

    // Display a confirmation dialog
    if (confirm(text)) {
      // trigger the event
      window.location.href = event.target.href;
    } else {
      // If the user cancels, do nothing
      return false;
    }
  }