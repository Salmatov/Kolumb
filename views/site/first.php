<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>


<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    h1 {
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
    }

    .dataContainer {
        width: 80%;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

    .dataItem {
        border: 1px solid #ddd;
        padding: 10px;
        margin: 10px 0;
        background-color: #f9f9f9;
    }

    .dataItem p {
        margin: 5px 0;
    }

    hr {
        border: none;
        border-top: 1px solid #ddd;
        margin: 10px 0;
    }
</style>


<form id="myForm">
    <div class="form-group">
        <label for="partnerName">Name</label>
        <input type="text" class="form-control" name='name' id="partnerName" aria-describedby="NameHelp" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label for="partnerAddress">Address</label>
        <input type="text" class="form-control" name='address' id="partnerAddress" aria-describedby="AddressHelp" placeholder="Enter Address">
    </div>
    <div class="form-group">
        <label for="partnerPhone">Phone</label>
        <input type="text" class="form-control" name='phone' id="partnerPhone" aria-describedby="PhoneHelp" placeholder="Enter Phone">
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
</form>

    <br><br>
<div id="dataContainer">
    <!-- Data will be displayed here -->
</div>



<script>
    // Function to handle form submission
    function handleSubmit(event) {
        event.preventDefault(); // Prevent the form from submitting the traditional way

        // Get form data
        const formData = new FormData(event.target);

        // Create a POST request
        fetch('/form/add', {
            method: 'POST',
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                console.log('Response from server:', data);
                const dataContainer = document.getElementById('dataContainer');


                // Iterate through the array and create HTML elements for each item
                data.forEach(item => {
                    const div = document.createElement('div');
                    div.classList.add('dataItem'); // Add a CSS class for styling
                    div.innerHTML = `
                <p>ID: ${item.id}</p>
                <p>Name: ${item.name}</p>
                <p>Address: ${item.address}</p>
                <p>Phone: ${item.phone}</p>
                <hr>
            `;
                    dataContainer.appendChild(div);
                });

                dataContainer.classList.add("dataContainer");

                // You can handle the response from the server here
            })
            .catch(error => {
                console.error('Error:', error);
                // Handle any errors that occur during the fetch
            });
    }

    // Add an event listener to the form
    const form = document.getElementById('myForm');
    form.addEventListener('submit', handleSubmit);
</script>