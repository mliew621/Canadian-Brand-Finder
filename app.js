document.addEventListener('DOMContentLoaded', () => {
    const addBtn = document.getElementById('addBtn');
    const popUp = document.getElementById('popUp');
    const closeBtn = document.getElementById('closeBtn');
    const form = document.querySelector('form'); // Select the form element

    // Show pop-up when "Add" button is clicked
    addBtn.addEventListener('click', () => {
        popUp.style.display = 'flex';
    });

    // Hide pop-up when "Close" button is clicked
    closeBtn.addEventListener('click', () => {
        popUp.style.display = 'none';
    });

    // Handle form submission
    form.addEventListener('submit', async function (e) {
        alert('Business added!');
        
    });

    const foodDiv = document.getElementById('foodSection');
    const electronicsDiv = document.getElementById('electronicsSection');
    const clothesDiv = document.getElementById('clothesSection');

    // Fetch data from PHP
    fetch('fetchdata.php')
        .then(response => response.json())
        .then(data => {
            displayData(data);
        })
        .catch(error => console.error('Error fetching data:', error));

    // Function to display the data on the page
    function displayData(data) {
        // Clear the previous content (if any)
        foodDiv.innerHTML = '';
        electronicsDiv.innerHTML = '';
        clothesDiv.innerHTML = '';

        // Loop through the data and display each business in the appropriate category
        data.forEach(business => {
            const businessItem = document.createElement('div');
            businessItem.classList.add('business-item');
            businessItem.innerHTML = `<a href="${business.urls}" target="_blank">${business.business_name}</a>`;

            // Sort into categories based on the category field
            if (business.category === 'Food') {
                foodDiv.appendChild(businessItem);
            } else if (business.category === 'Electronics') {
                electronicsDiv.appendChild(businessItem);
            } else if (business.category === 'Clothes') {
                clothesDiv.appendChild(businessItem);
            }
        });
    }
});
