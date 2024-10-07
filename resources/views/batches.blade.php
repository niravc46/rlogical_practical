<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batches Management Header</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <!-- Header with Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Logo / Branding -->
            <a class="navbar-brand" href="/">
                Batch Management
            </a>

            <!-- Mobile Menu Button (Hamburger) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto">

                    <!-- Batch Management Links -->
                    <li class="nav-item">
                        <a class="nav-link" href="/">View Batches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/batches/create">Create Batch</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div>
            <h2 class="mb-4">Batches List</h2>
            <a href="/batches/create" class="btn btn-primary">Create New Batch</a>
        </div>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Batch Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="dataList">
                <!-- Example batch row -->
                {{-- <tr id="dataList">
                    <td>1</td>
                    <td>Batch 1</td>
                    <td>
                        <a href="/batches/1/edit" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr> --}}
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
   <!-- Include jQuery -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <!-- Include jQuery UI -->
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
   <!-- Include Bootstrap JS and Datepicker JS -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(document).ready(function() {
            $.ajax({
            url: '/batches/list',
            type: 'GET',
            success: function(response) {
                console.log(response);
                response.forEach((item, index) => {
                    console.log(item.batch_name);

                    $('#dataList').append(
                    `<tr>
                    <td>${index + 1}</td>
                    <td>${item.batch_name}</td>
                    <td>
                        <a href="/batches/${item.id}/edit" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>`);
                });
            },
            error: function(xhr) {
                console.error('Error fetching data:', xhr);
                alert('An error occurred while fetching data.');
            }
        });
        });
    </script>
</body>

</html>
