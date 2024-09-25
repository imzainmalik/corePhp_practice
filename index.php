<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.1/dist/sweetalert2.min.css " rel="stylesheet">

</head>

<body>
     <div class="container py-4">
          <div class="card">
               <div class="card-header">
                    <h4>Form</h4>
               </div>
               <div class="card-body">
                    <form method="post" id="form">
                         <div class="mb-3">
                              <label for="inputName" class="form-label">Date</label>
                              <input type="date" class="form-control" name="date" id="date">
                         </div>
                         <div class="mb-3">
                              <label for="inputEmail" class="form-label">Select Items</label>
                              <select name="item" id="item" class="form-control">
                                   <option value="">Select Items</option>
                                   <?php
                                   include('mysqlcon.php');
                                   $query = "SELECT * FROM items";
                                   $result = mysqli_query($con, $query);
                                   while ($row = mysqli_fetch_assoc($result)) {
                                   ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['item_name']; ?></option>
                                   <?php } ?> <!-- end of while loop -->
                              </select>

                         </div>
                         <div class="mb-3">
                              <label for="inputPassword" class="form-label">Payment type</label>
                              <input type="text" class="form-control" name="pay_type" id="pay_type" placeholder="Enter Payment type">
                         </div>
                         <div class="mb-3">
                              <label for="inputPassword" class="form-label">Phone</label>
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone">
                         </div>
                         <div class="mb-3">
                              <label for="inputPassword" class="form-label">Title</label>
                              <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
                         </div>
                         <div class="mb-3">
                              <label for="inputPassword" class="form-label">Amount</label>
                              <input type="number" class="form-control" name="amount" id="amount" placeholder="Enter Amount">
                         </div>
                         <div class="mb-3">
                              <label for="inputPassword" class="form-label">Transaction ID</label>
                              <input type="text" class="form-control" id="transaction_id" placeholder="Enter Transaction ID">
                         </div>
               </div>
               <div class="card-footer">
                    <div class="row">
                         <div class="col-2">
                              <button class="btn btn-secondary" id="print_only">Print Only</button>
                         </div>
                         <div class="col-2">
                              <input class="btn btn-primary" type="submit" id="save_print" name="save_print" value="Save & Print">
                         </div>
                         <div class="col-2">
                              <button class="btn btn-warning" id="save_only">Save Only</button>
                         </div>

                         <div class="col-2">
                              <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#register_new_item" onclick="$('#register_new_item').modal('show');">Register New Itenm</button>
                         </div>
                         <div class="col-2">
                              <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#trans_history" onclick="$('#trans_history').modal('show');">Transaction History</button>
                         </div>

                         <div class="col-2">
                              <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#item_list" onclick="$('#item_list').modal('show');">All items</button>
                         </div>

                    </div>
               </div>
               </form>
          </div>
     </div>
     <!-- Modal -->
     <div class="modal fade" id="register_new_item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Register New Item</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <div class="modal-body">
                         <form method="post">
                              <div class="mb-3">
                                   <label for="inputName" class="form-label">Item name</label>
                                   <input type="text" class="form-control" name="item_item" id="item_item">
                              </div>
                              <div class="mb-3">
                                   <label for="inputName" class="form-label">Price</label>
                                   <input type="number" class="form-control" name="item_price" id="item_price">
                              </div>
                         </form>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="button" id="save_item_btn" class="btn btn-primary">Save changes</button>
                    </div>
               </div>
          </div>
     </div>



     <div class="modal fade" id="item_list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">All items</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <div class="modal-body">
                         <table class="table">
                              <thead>
                                   <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Item</th>
                                        <th scope="col">Price</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php
                                   include('mysqlcon.php');
                                   $query = "SELECT * FROM items";
                                   $result = mysqli_query($con, $query);
                                   while ($row = mysqli_fetch_assoc($result)) {
                                   ?>
                                        <tr>
                                             <th scope="row"><?php echo $row['id']; ?></th>
                                             <td><?php echo $row['item_name']; ?></td>
                                             <td>PKR <?php echo $row['item_price']; ?>.00</td>
                                        </tr>
                                   <?php } ?> <!-- end of while loop -->
                              </tbody>
                         </table>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
               </div>
          </div>
     </div>

     <div class="modal fade bd-example-modal-lg" id="trans_history" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">All Transaction History</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <div class="modal-body">
                         <table class="table">
                              <thead>
                                   <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Item</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Trans-ID</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Payment Method</th>
                                        <th scope="col">Phone</th>

                                   </tr>
                              </thead>
                              <tbody>
                                   <?php
                                   include('mysqlcon.php');
                                   $query = "SELECT * FROM transactions";
                                   $result = mysqli_query($con, $query);
                                   $count = mysqli_num_rows($result);
                                   while ($row = mysqli_fetch_assoc($result)) {

                                        // get item name using item id
                                        $item_query = "SELECT item_name FROM items WHERE id = " . $row['item_id'];
                                        $item_result = mysqli_query($con, $item_query);
                                        $item_row = mysqli_fetch_assoc($item_result);
                                   ?>
                                        <tr>
                                             <th scope="row"><?php echo $row['id']; ?></th>
                                             <td><?php echo $item_row['item_name']; ?></td>
                                             <td>PKR <?php echo $row['amount']; ?>.00</td>
                                             <td><?php echo $row['transaction']; ?></td>
                                             <td><?php echo $row['date']; ?></td>
                                             <td><?php echo $row['title']; ?></td>
                                             <td><?php echo $row['pay_type']; ?></td>
                                             <td><?php echo $row['phone']; ?></td>
                                        </tr>
                                   <?php } ?> <!-- end of while loop -->
                              </tbody>
                         </table>
                    </div>

                    <div class="modal-footer">
                         <div class="col-md-6">
                              <div class="alert alert-success">Total transaction: <?php echo $count; ?></div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <!-- Hidden receipt section for printing -->
     <div id="printArea" style="display: none;">
          <style>
               @media print {
                    body {
                         width: 4in;
                         margin: 0;
                         padding: 0;
                    }

                    .receipt {
                         width: 4in;
                         padding: 10px;
                         font-size: 12px;
                    }

                    .receipt h1,
                    .receipt h2,
                    .receipt h3 {
                         font-size: 18px;
                         text-align: center;
                    }

                    .receipt table {
                         width: 100%;
                         margin-bottom: 10px;
                    }

                    .receipt td,
                    .receipt th {
                         text-align: left;
                         padding: 5px 0;
                    }

                    .receipt .total {
                         text-align: right;
                         font-weight: bold;
                    }

                    .receipt hr {
                         border: 1px solid black;
                    }

                    .no-print {
                         display: none;
                    }
               }
          </style>
          <div class="receipt">
               <h1>Receipt</h1>
               <hr>
               <p><strong>Date:</strong> <span id="print_date"></span></p>
               <p><strong>Items:</strong> <span id="print_item"></span></p>
               <p><strong>Title:</strong> <span id="print_title"></span></p>
               <p><strong>Amount:</strong> PKR<span id="print_amount"></span></p>
               <p><strong>Transaction ID:</strong> <span id="print_transaction_id"></span></p>
               <p><strong>Phone:</strong> <span id="print_phone"></span></p>
               <p><strong>Pay type:</strong> <span id="print_paytype"></span></p>
               <hr>
               <h3>Thank you!</h3>
          </div>
     </div>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

     <script>
          $(document).ready(function() {
                 // Get form data
              

               $("#print_only").click(function() {
                    var date = $("#date").val();
                    var item = $("#item").val();
                    var title = $("#title").val();
                    var amount = $("#amount").val();
                    var transactionId = $("#transaction_id").val();
                    var pay_type = $("#transaction_id").val();
                    var phone = $("#phone").val();  
                    // Validate form
                    if (date === "" || item === "" || title === "" || amount === "" || transactionId === "" || phone === "" || pay_type === "") {
                         Swal.fire({
                              icon: "error",
                              title: "Error",
                              text: "Please fill all fields",
                              // footer: '<a href="#">Why do I have this issue?</a>'
                         });
                         return false;
                    }
                    // Populate receipt
                    $("#print_date").text(date);
                    $("#print_item").text(item);
                    $("#print_title").text(title);
                    $("#print_amount").text(amount);
                    $("#print_transaction_id").text(transactionId);

                    $("#print_phone").text(phone);
                    $("#print_paytype").text(pay_type);
                    
                    // Show receipt and print
                    var printContents = document.getElementById('printArea').innerHTML;
                    var originalContents = document.body.innerHTML;
                    document.body.innerHTML = printContents;
                    window.print();
                    document.body.innerHTML = originalContents;
                    window.location.reload(); // Reload the page to reset the form
               });
               // SAVE & PRINT
               $('#save_print').click(function(e) {
                    e.preventDefault();
                    var date = $("#date").val();
                    var item = $("#item").val();
                    var title = $("#title").val();
                    var amount = $("#amount").val();
                    var transactionId = $("#transaction_id").val();
                    var pay_type = $("#transaction_id").val();
                    var phone = $("#phone").val();  
                    if (date === "" || item === "" || title === "" || amount === "" || transactionId === "" || phone === "" || pay_type === "") {
                         Swal.fire({
                              icon: "error",
                              title: "Error",
                              text: "Please fill all fields",
                              // footer: '<a href="#">Why do I have this issue?</a>'
                         });
                         return false;
                    }
                    $.ajax({
                         url: 'backend.php?save_print=save_print',
                         type: 'POST',
                         data: {
                              date: $("#date").val(),
                              item: $("#item").val(),
                              title: $("#title").val(),
                              amount: $("#amount").val(),
                              transaction_id: $("#transaction_id").val(), 
                              phone: $("#phone").val(),
                              pay_type: $("#pay_type").val()
                         },
                         success: function(response) {
                              Swal.fire({
                                   icon: "success",
                                   title: "Success",
                                   text: "Data saved & Ready to Print",
                                   // footer: '<a href="#">Why do I have this issue?</a>'
                              }).then((result) => {
                                   if (result.isConfirmed) {
                                        $("#print_only").click();
                                   }
                              });
                         },
                         error: function(xhr, status, error) {
                              // Handle error or show an error message
                         }
                    })
               })

               $('#save_only').click(function(e) {
                    e.preventDefault();
                    var date = $("#date").val();
                    var item = $("#item").val();
                    var title = $("#title").val();
                    var amount = $("#amount").val();
                    var transactionId = $("#transaction_id").val();
                    var pay_type = $("#transaction_id").val();
                    var phone = $("#phone").val();  
                    if (date === "" || item === "" || title === "" || amount === "" || transactionId === "" || phone === "" || pay_type === "") {
                         Swal.fire({
                              icon: "error",
                              title: "Error",
                              text: "Please fill all fields",
                              // footer: '<a href="#">Why do I have this issue?</a>'
                         });
                         return false;
                    }
                    $.ajax({
                         url: 'backend.php?save_print=save_print',
                         type: 'POST',
                         data: {
                              date: $("#date").val(),
                              item: $("#item").val(),
                              title: $("#title").val(),
                              amount: $("#amount").val(),
                              transaction_id: $("#transaction_id").val(),
                              phone: $("#phone").val(),
                              pay_type: $("#pay_type").val()
                         },
                         success: function(response) {
                              Swal.fire({
                                   icon: "success",
                                   title: "Success",
                                   text: "Data saved",
                                   // footer: '<a href="#">Why do I have this issue?</a>'
                              });
                         },
                         error: function(xhr, status, error) {
                              // Handle error or show an error message
                         }
                    })
               })

               $('#save_item_btn').click(function(e) {
                    e.preventDefault();
                    if ($("#item_item").val() === "" || $("#item_price").val() === "") {
                         Swal.fire({
                              icon: "error",
                              title: "Error",
                              text: "Please fill all fields",
                              // footer: '<a href="#">Why do I have this issue?</a>'
                         });
                         return false;
                    }
                    $.ajax({
                         url: 'backend.php?save_item_btn=save_item_btn',
                         type: 'POST',
                         data: {
                              item_item: $("#item_item").val(),
                              item_price: $("#item_price").val()
                         },
                         success: function(response) {
                              console.log(response);
                              Swal.fire({
                                   icon: "success",
                                   title: "Success",
                                   text: "Item saved",
                              });
                              $("#register_new_item").modal('hide');
                              // location.reload();
                         },
                         error: function(xhr, status, error) {
                              // Handle error or show an error message
                         }
                    })
               })
          });
     </script>

</body>

</html>