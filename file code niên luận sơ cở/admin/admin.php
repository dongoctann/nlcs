<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Thêm thư viện Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="#" class="active">Dashboard</a></li>
            <li><a href="#">Sản phẩm <i class="fas fa-box"></i></a></li>
            <li><a href="#">Đơn hàng <i class="fas fa-shopping-cart"></i></a></li>
            <li><a href="#">Khách hàng <i class="fas fa-users"></i></a></li>
            < Add more menu items here -->
    <!-- </ul> -->
    <!-- </div> -->

    <div class="content">
        <div class="summary">
            <div class="summary-item sp">
                <h3>Số sản phẩm <i class="fas fa-cube"></i></h3>
                <p id="productCount">9</p>
            </div>
            <div class="summary-item dh">
                <h3>Số đơn hàng <i class="fas fa-file-invoice"></i></h3>
                <p id="orderCount">15</p>
            </div>
            <div class="summary-item kh">
                <h3>Số khách hàng <i class="fas fa-user-friends"></i></h3>
                <p id="customerCount">9</p>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>

<style>
    /* Reset CSS */
    .sp {
        color: black;
        background-color: antiquewhite;
    }

    .dh {
        color: black;
        background-color: aquamarine;

    }

    .kh {
        color: black;
        background-color: aqua;

    }

    body {
        font-family: Arial, sans-serif;
    }

    /* Sidebar */
    .sidebar {

        background-color: #333;
        color: #fff;
        width: 250px;
        height: 327px;
        padding-top: 20px;
        position: fixed;
    }

    .sidebar h2 {
        text-align: center;
    }

    .sidebar ul {
        list-style-type: none;
        padding: 0;
    }

    .sidebar ul li {
        padding: 10px 0;
    }

    .sidebar ul li a {
        color: #fff;
        text-decoration: none;
        display: block;
        padding: 10px;
    }

    .sidebar ul li a:hover {
        background-color: #555;
    }

    .sidebar ul li a.active {
        background-color: #555;
    }

    /* Content */
    .content {
        margin-top: 20px;
        margin-left: 150px;
        height: 327px;
        padding: 20px;
    }

    /* Summary */
    .summary {
        width: 90%;
        /* Set width of the summary */
        margin: 0 auto;
        /* Center the summary */
        display: flex;
        justify-content: space-around;
        margin-top: 50px;
        /* Add some space between summary and content */
    }

    .summary .summary-item {
        text-align: center;
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 5px;
        width: calc(33.33% - 20px);
        /* Set width of each summary item */
        margin: 0 10px;
        /* Add some space between summary items */

        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .summary .summary-item h3 {
        margin-bottom: 10px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }

        .content {
            margin-left: 0;
        }

        .summary {
            flex-wrap: wrap;
            /* Wrap summary items in smaller screens */
        }

        .summary .summary-item {
            width: calc(50% - 20px);
            /* Set width of summary items for smaller screens */
            margin: 0 0 20px;
            /* Adjust margin for smaller screens */
        }
    }
</style>