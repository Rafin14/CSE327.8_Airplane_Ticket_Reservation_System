/**
 * This function sets up an event listener to handle form submission for flight search.
 *
 * @function
 */
document.addEventListener("DOMContentLoaded", function () {
  const searchForm = document.getElementById("search-form");
  const flightList = document.getElementById("flight-list");

  /**
   * Event handler for form submission.
   *
   * @param {Event} event - The submit event object.
   */
  searchForm.addEventListener("submit", function (event) {
    event.preventDefault();

    // Get form input values
    const origin = document.getElementById("origin").value;
    const destination = document.getElementById("destination").value;
    const departureDate = document.getElementById("departureDate").value;
    const returnDate = document.getElementById("returnDate").value;
    const adultSeats = document.getElementById("adultSeats").value;
    const childSeats = document.getElementById("childSeats").value;
    const travelClass = document.getElementById("class").value;
    const roundTrip = document.getElementById("roundTrip").checked;

    // Create a query string with URLSearchParams
    const params = new URLSearchParams({
      origin,
      destination,
      departureDate,
      returnDate,
      adultSeats,
      childSeats,
      travelClass,
      roundTrip,
    });

    // Construct the URL with query parameters
    const apiUrl = `./api/flights/?${params.toString()}`;

    fetch(apiUrl)
      .then(response => {
        if (!response.ok) {
          throw new Error(`Network response was not ok: ${response.status}`);
        }
        return response.json();
      })
      .then(data => {
        flightList.innerHTML = "";
        data.forEach(flight => {
          const listItem = document.createElement("li");
          listItem.textContent = `Flight ID: ${flight.flight_id}, Price: $${flight.price}`;
          flightList.appendChild(listItem);
        });
      })
      .catch(error => {
        console.error("Error:", error);
      });
  });
});
