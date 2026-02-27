<div class="modal fade" id="liquidationFormModal" tabindex="-1" role="dialog" aria-labelledby="liquidationFormModal" Label
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">Liquidation Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group d-flex align-items-center justify-content-center">
                                <h5>Activity Information</h5>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="liquidationTitle">Title of the Activity</label>
                                        <input type="text" class="form-control" id="liquidationTitle"
                                            name="liquidationTitle" placeholder="Enter title">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="liquidationDate">Date</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="liquidationDate" class="form-control datetimepicker-input"
                                                data-target="#reservationdate" id="liquidationDate"
                                                name="liquidationDate" placeholder="MM/DD/YYYY" />
                                            <div class="input-group-append" data-target="#reservationdate"
                                                data-toggle="datetimepicker">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="liquidationVenue">Venue</label>
                                        <input type="text" class="form-control" id="liquidationVenue"
                                            name="liquidationVenue" placeholder="Enter Venue">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="liquidationBudget">Allocated Budget</label>
                                        <input type="text" class="form-control" id="liquidationBudget"
                                            name="liquidationBudget" placeholder="Enter Budget">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="liquidationExpenses">Total Expenses</label>

                                        <input type="text" class="form-control" id="liquidationExpenses"
                                            name="liquidationExpenses" placeholder="Enter Expenses">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="liquidationBalance">Remaining Balance</label>

                                        <input type="text" class="form-control" id="liquidationBalance"
                                            name="liquidationBalance" placeholder="Enter Balance">
                                    </div>
                                </div>

                            </div>

                            <hr>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center justify-content-center mt-2">
                                        <h5>List of Valid Receipts</h5>
                                    </div>
                                    <div class="card" style="margin-top: -10px">
                                        <div class="card-header">
                                           <button type="button" name="addField" id="addField"
                                                    class="btn btn-success float-right"><i class="fa fa-plus"></i></button>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-hover text-nowrap" id="table">
                                                <thead>
                                                    <tr>
                                                        <th>Receipt Number</th>
                                                        <th>Particular</th>
                                                        <th>Amount</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="inputs[0][receipt]"
                                                                placeholder="Enter valid receipt" class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="inputs[0][particular]"
                                                                placeholder="Enter particular" class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="inputs[0][amount]"
                                                                placeholder="Enter amount" class="form-control">
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <button type="submit" class="btn btn-block btn-success btn-lg">Submit</button>
                            <button type="button" class="btn btn-block btn-default btn-lg"
                                data-dismiss="modal">Cancel</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<script>
    var i = 0;

    $('#addField').click(function() {
        ++i;
        $('#table').append(
            `<tr>
                <td>
                    <input type="text" name="inputs[` + i + `][receipt]" placeholder="Enter valid receipt" class="form-control" />
                </td>
                <td>
                    <input type="text" name="inputs[` + i + `][particular]" placeholder="Enter particular" class="form-control" />
                </td>
                <td>
                    <input type="text" name="inputs[` + i + `][amount]" placeholder="Enter amount" class="form-control" />
                </td>
                <td>
                    <button type="button" class="btn btn-danger remove-table-row"><i class="fa fa-minus"></i></button>
                </td>
            </tr>`
        );
    });

    // Handle removal of dynamically added rows
    $('#table').on('click', '.remove-table-row', function() {
        $(this).closest('tr').remove();
    });
</script>
