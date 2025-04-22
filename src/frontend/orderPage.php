<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History - Car Dealership</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://images.unsplash.com/photo-1541140134513-85a161dc4a00?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Z3JleSUyMHRleHR1cmV8ZW58MHx8MHx8fDA%3D');
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
        }

        /* Title Styling */
        h1 {
            color: black;
            text-align: center;
            padding-top: 30px;
        }

        /* Filter Section */
        .filters {
            margin-bottom: 20px;
            text-align: center;
        }

        .filter-button {
            padding: 8px 15px;
            margin-right: 10px;
            cursor: pointer;
            border: 1px solid #ddd;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 12px;
        }

        .filter-button:hover {
            background-color: rgba(200, 200, 200, 0.7);
        }

        .filter-container {
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
        }

        .filter-container select {
            padding: 8px;
            margin-left: 10px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 12px;
        }

        /* Table Styling */
        table {
            width: 66%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 12px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            background-color: #fff;
        }
    </style>
</head>
<body>

    <h1>Order History</h1>

    <!-- Filter Section -->
    <div class="filters">
        <div class="filter-container">
            <button class="filter-button" onclick="filterOrdersByStatus('All')">All Statuses</button>
            <button class="filter-button" onclick="filterOrdersByStatus('Pending')">Pending</button>
            <button class="filter-button" onclick="filterOrdersByStatus('Completed')">Completed</button>
            <button class="filter-button" onclick="filterOrdersByStatus('Canceled')">Canceled</button>

            <select id="timePeriod" onchange="filterOrdersByTimePeriod()">
                <option value="all">Select Time Period</option>
                <option value="pastMonth">Past Month</option>
                <option value="pastYear">Past Year</option>
            </select>
        </div>
    </div>

    <!-- Order History Table -->
    <table id="orderHistoryTable">
        <thead>
            <tr>
                <th>Order Number</th>
                <th>Description</th>
                <th>Date</th>
                <th>Status</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>12345</td>
                <td>SUV Model A</td>
                <td>2025-02-15</td>
                <td>Completed</td>
                <td>$30,000</td>
            </tr>
            <tr>
                <td>12346</td>
                <td>Sedan Model B</td>
                <td>2025-03-01</td>
                <td>Pending</td>
                <td>$25,000</td>
            </tr>
            <tr>
                <td>12347</td>
                <td>Truck Model C</td>
                <td>2024-12-05</td>
                <td>Canceled</td>
                <td>$40,000</td>
            </tr>
            <tr>
                <td>12348</td>
                <td>Coupe Model D</td>
                <td>2024-11-10</td>
                <td>Completed</td>
                <td>$35,000</td>
            </tr>
        </tbody>
    </table>

    <script>
        const orders = [
            { orderNumber: '12345', description: '2019 Volvo V60 T6 AWD', date: '2025-02-15', status: 'Completed', price:  37599},
            { orderNumber: '12346', description: '2000 Ferrari 550 Maranello', date: '2025-03-01', status: 'Pending', price: 170799 },
            { orderNumber: '12347', description: '2015 Tesla Model S 60', date: '2024-12-05', status: 'Canceled', price: 10899 },
            { orderNumber: '12348', description: '2022 Kia Stinger GT2', date: '2024-11-10', status: 'Completed', price: 35000 },
        ];

        // Function to display orders in the table
        function displayOrders(filteredOrders) {
            const tbody = document.querySelector('#orderHistoryTable tbody');
            tbody.innerHTML = ''; // Clear the table body first

            filteredOrders.forEach(order => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${order.orderNumber}</td>
                    <td>${order.description}</td>
                    <td>${order.date}</td>
                    <td>${order.status}</td>
                    <td>$${order.price.toLocaleString()}</td>
                `;
                tbody.appendChild(row);
            });
        }

        // Function to filter orders by status
        function filterOrdersByStatus(status) {
            let filteredOrders = orders;

            if (status !== 'All') {
                filteredOrders = orders.filter(order => order.status === status);
            }

            // Apply time period filter if selected
            const timePeriod = document.getElementById('timePeriod').value;
            if (timePeriod !== 'all') {
                const currentDate = new Date();
                filteredOrders = filteredOrders.filter(order => {
                    const orderDate = new Date(order.date);
                    
                    if (timePeriod === 'pastMonth') {
                        return currentDate - orderDate <= 30 * 24 * 60 * 60 * 1000; // Past month filter
                    } else if (timePeriod === 'pastYear') {
                        return currentDate - orderDate <= 365 * 24 * 60 * 60 * 1000; // Past year filter
                    }
                });
            }

            displayOrders(filteredOrders);
        }

        // Function to filter orders by selected time period
        function filterOrdersByTimePeriod() {
            const status = document.querySelector('button.active')?.textContent || 'All';
            const timePeriod = document.getElementById('timePeriod').value;
            let filteredOrders = orders;

            if (status !== 'All') {
                filteredOrders = filteredOrders.filter(order => order.status === status);
            }

            if (timePeriod !== 'all') {
                const currentDate = new Date();
                filteredOrders = filteredOrders.filter(order => {
                    const orderDate = new Date(order.date);
                    if (timePeriod === 'pastMonth') {
                        return currentDate - orderDate <= 30 * 24 * 60 * 60 * 1000;
                    } else if (timePeriod === 'pastYear') {
                        return currentDate - orderDate <= 365 * 24 * 60 * 60 * 1000;
                    }
                });
            }

            displayOrders(filteredOrders);
        }

        // Initial display of all orders
        displayOrders(orders);
    </script>

</body>
</html>
