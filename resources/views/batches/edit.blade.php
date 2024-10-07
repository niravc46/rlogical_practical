<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Batch</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons (Optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Datepicker CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Include Bootstrap JS and Datepicker JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


    <style>
        body {
            background-color: #f7f9fc;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .form-heading {
            background-color: #007bff;
            padding: 15px;
            color: #ffffff;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 1.5rem;
            text-align: center;
        }

        .module-block {
            border: 1px solid #e2e2e2;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .module-title {
            font-weight: bold;
            cursor: pointer;
        }

        .toggle-icon {
            float: right;
            transition: transform 0.3s;
        }

        .collapse.show .toggle-icon {
            transform: rotate(90deg);
        }

        .form-label {
            font-weight: bold;
        }

        .btn-custom {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="form-container">
            <h3 class="form-heading">Create Batch</h3>
            <ul id="errorList" class="alert alert-danger" style="display:none;"></ul>
            <form action="{{ route('batches.update', $batch->id) }}" method="POST" id="batchForm">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="batchName" class="form-label">Batch Name</label>
                    <input type="text" class="form-control" id="batchName" name="batch_name"
                        value="{{ $batch->batch_name }}" required>
                </div>

                <div class="module-block">
                    <div class="row ">
                        <div class="col-md-2">
                            <span>Module 1</span>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control datepicker" id="module1Start" name="module1_start"
                                required>
                        </div>
                        <div class="col-md-4">
                            <input readonly type="text" class="form-control" id="module1End" name="module1_end"
                                value="{{ $batch->module1_end }}">

                        </div>
                        <div class="module-title col-md-2" data-bs-toggle="collapse" data-bs-target="#module1"
                            aria-expanded="false" aria-controls="module1">
                            <i class="toggle-icon fas fa-chevron-right"></i>
                        </div>
                    </div>

                    <div id="module1" class="collapse">
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <label for="day6" class="form-label">Day 1</label>
                                <input type="text" class="form-control" id="module1_day1" readonly>
                            </div>
                            <div class="col-md-2">
                                <label for="day7" class="form-label">Day 2</label>
                                <input type="text" class="form-control" id="module1_day2" readonly>
                            </div>
                            <div class="col-md-2">
                                <label for="day8" class="form-label">Day 3</label>
                                <input type="text" class="form-control" id="module1_day3" readonly>
                            </div>
                            <div class="col-md-2">
                                <label for="day9" class="form-label">Day 4</label>
                                <input type="text" class="form-control" id="module1_day4" readonly>
                            </div>
                            <div class="col-md-2">
                                <label for="day10" class="form-label">Day 5</label>
                                <input type="text" class="form-control" id="module1_day5" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="module-block">

                    <div class="row ">
                        <div class="col-md-2">
                            <span>Module 2</span>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control datepicker" id="module2Start" name="module2_start"
                                value="{{ $batch->module2_start }}" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="module2End" name="module2_end"
                                value="{{ $batch->module2_end }}" readonly>
                        </div>
                        <div class="module-title col-md-2" data-bs-toggle="collapse" data-bs-target="#module2"
                            aria-expanded="false" aria-controls="module2">
                            <i class="toggle-icon fas fa-chevron-right"></i>
                        </div>
                    </div>

                    <div id="module2" class="collapse">
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <label for="day6" class="form-label">Day 1</label>
                                <input type="text" class="form-control" id="module2_day1" value="07/08/2023"
                                    readonly>
                            </div>
                            <div class="col-md-2">
                                <label for="day7" class="form-label">Day 2</label>
                                <input type="text" class="form-control" id="module2_day2" value="08/08/2023"
                                    readonly>
                            </div>
                            <div class="col-md-2">
                                <label for="day8" class="form-label">Day 3</label>
                                <input type="text" class="form-control" id="module2_day3" value="09/08/2023"
                                    readonly>
                            </div>
                            <div class="col-md-2">
                                <label for="day9" class="form-label">Day 4</label>
                                <input type="text" class="form-control" id="module2_day4" value="10/08/2023"
                                    readonly>
                            </div>
                            <div class="col-md-2">
                                <label for="day10" class="form-label">Day 5</label>
                                <input type="text" class="form-control" id="module2_day5" value="11/08/2023"
                                    readonly>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="module-block">

                    <div class="row ">
                        <div class="col-md-2">
                            <span>Module 3</span>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control datepicker" id="module3Start"
                                name="module3_start" value="{{ $batch->module3_start }}" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="module3End"
                                value="{{ $batch->module3_end }}" name="module3_end" readonly>
                        </div>
                        <div class="module-title col-md-2" data-bs-toggle="collapse" data-bs-target="#module3"
                            aria-expanded="false" aria-controls="module3">
                            <i class="toggle-icon fas fa-chevron-right"></i>
                        </div>
                    </div>

                    <div id="module3" class="collapse">
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <label for="day6" class="form-label">Day 1</label>
                                <input type="text" class="form-control" id="module3_day1" readonly>
                            </div>
                            <div class="col-md-2">
                                <label for="day7" class="form-label">Day 2</label>
                                <input type="text" class="form-control" id="module3_day2" readonly>
                            </div>
                            <div class="col-md-2">
                                <label for="day8" class="form-label">Day 3</label>
                                <input type="text" class="form-control" id="module3_day3" readonly>
                            </div>
                            <div class="col-md-2">
                                <label for="day9" class="form-label">Day 4</label>
                                <input type="text" class="form-control" id="module3_day4" readonly>
                            </div>
                            <div class="col-md-2">
                                <label for="day10" class="form-label">Day 5</label>
                                <input type="text" class="form-control" id="module3_day5" readonly>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="module-block">

                    <div class="row ">
                        <div class="col-md-2">
                            <span>Module 4</span>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control datepicker" id="module4Start"
                                name="module4_start" value="{{ $batch->module4_start }}" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="module4End" name="module4_end"
                                value="{{ $batch->module5_start }}" readonly>
                        </div>
                        <div class="module-title col-md-2" data-bs-toggle="collapse" data-bs-target="#module4"
                            aria-expanded="false" aria-controls="module4">
                            <i class="toggle-icon fas fa-chevron-right"></i>
                        </div>
                    </div>

                    <div id="module4" class="collapse">
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <label for="day6" class="form-label">Day 1</label>
                                <input type="text" class="form-control" id="module4_day1" readonly>
                            </div>
                            <div class="col-md-2">
                                <label for="day7" class="form-label">Day 2</label>
                                <input type="text" class="form-control" id="module4_day2" readonly>
                            </div>
                            <div class="col-md-2">
                                <label for="day8" class="form-label">Day 3</label>
                                <input type="text" class="form-control" id="module4_day3" readonly>
                            </div>
                            <div class="col-md-2">
                                <label for="day9" class="form-label">Day 4</label>
                                <input type="text" class="form-control" id="module4_day4" readonly>
                            </div>
                            <div class="col-md-2">
                                <label for="day10" class="form-label">Day 5</label>
                                <input type="text" class="form-control" id="module4_day5" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="/batches" class="btn btn-danger btn-custom">Cancel</a>
                    <button type="submit" class="btn btn-success btn-custom">Save & Continue</button>
                </div>
            </form>
        </div>

        <script>
            $(document).ready(function() {
                $('.datepicker').datepicker({
                    format: 'dd/mm/yyyy',
                    autoclose: true
                });

                var today = new Date();
                var formattedDate = ('0' + today.getDate()).slice(-2) + '/' + ('0' + (today.getMonth() + 1)).slice(-2) +
                    '/' + today.getFullYear();

                $('#module1Start').datepicker('setDate', today);
                $('#module2Start').datepicker('setDate', today);
                $('#module3Start').datepicker('setDate', today);
                $('#module4Start').datepicker('setDate', today);

                function updateEndDate(startDateInputId, endDateInputId, moduleNumber) {
                    var startDate = $(startDateInputId).datepicker('getDate');
                    var endDate = new Date(startDate);
                    endDate.setDate(startDate.getDate() + 4);
                    $(endDateInputId).datepicker('setDate', endDate);
                    $('#module1End').datepicker('destroy');
                    $('#module2End').datepicker('destroy');
                    $('#module3End').datepicker('destroy');
                    $('#module4End').datepicker('destroy');

                    for (let i = 1; i <= 5; i++) {
                        var dayDate = new Date(startDate);

                        dayDate.setDate(startDate.getDate() + (i - 1));

                        $(`#module${moduleNumber}_day${i}`).val($.datepicker.formatDate('dd/mm/yy',
                            dayDate));
                    }

                }

                function setStartDateLimit(moduleStartId, previousModuleEndId) {
                    $(moduleStartId).datepicker('setStartDate', $(previousModuleEndId).datepicker('getDate'));
                }

                // Update end dates when start date changes
                $('#module1Start').on('changeDate', function() {
                    updateEndDate('#module1Start', '#module1End', 1);
                    // Set the start date for the next module
                    setStartDateLimit('#module2Start', '#module1End');
                    setStartDateLimit('#module3Start', '#module2End');
                    setStartDateLimit('#module4Start', '#module3End');
                    $('#module1End').datepicker('destroy');
                });

                $('#module2Start').on('changeDate', function() {
                    updateEndDate('#module2Start', '#module2End', 2);
                    setStartDateLimit('#module3Start', '#module2End');
                    setStartDateLimit('#module4Start', '#module3End');
                    $('#module2End').datepicker('destroy');
                });

                $('#module3Start').on('changeDate', function() {
                    updateEndDate('#module3Start', '#module3End', 3);
                    setStartDateLimit('#module4Start', '#module3End');
                    $('#module3End').datepicker('destroy');
                });

                $('#module4Start').on('changeDate', function() {
                    updateEndDate('#module4Start', '#module4End', 4);
                    $('#module4End').datepicker('destroy');
                });

                // Initializing end dates for all modules
                updateEndDate('#module1Start', '#module1End', 1);
                updateEndDate('#module2Start', '#module2End', 2);
                updateEndDate('#module3Start', '#module3End', 3);
                updateEndDate('#module4Start', '#module4End', 4);


                $('#batchForm').on('submit', function(event) {
                    event.preventDefault();
                    $('.is-invalid').removeClass('is-invalid');
                    $('#errorList').empty();

                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        data: $(this).serialize(),
                        success: function(response) {
                            console.log('response.success', response);
                            window.location.href = response.redirect;
                            alert(response.message);

                        },
                        error: function(xhr) {

                            let errors = xhr.responseJSON.errors;

                            $.each(errors, function(key, value) {

                                $('#' + key).addClass('is-invalid');
                                $('#errorList').append('<li>' + value[0] + '</li>');
                            });
                            $('#errorList').show();

                        }
                    });
                });
            });
        </script>
    </div>
</body>

</html>
