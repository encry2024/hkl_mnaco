$(window).on('load', function() {
   var numberOfRequestedItem = document.getElementById("total_requested_item");

   numberOfRequestedItem.value = 1;
});

$(document).ready(function() {
   var numberOfRequestedItem = document.getElementById("total_requested_item"),
   additionalRequestedItem = 0;

   $("#add_request_button").on('click', function() {
      $("#request-field").append(
         '<tr id="request-container">' +
            '<td class="text-center">' +
               '<input type="text" id="amount_field" class="form-control" name="amount[]">' +
            '</td>' +
            '<td class=" text-center">' +
               '<input type="text" id="purpose_field" class="form-control" name="purpose[]">' +
            '</td>' +
            '<td class=" text-center">' +
               '<select id="receipt_field" class="form-control" name="receipt[]">' +
                  '<option value="1">Yes</option>' +
                  '<option value="0">No</option>' +
               '</select>'+
            '</td>' +
            '<td class=" text-center">' +
               '<a class="btn btn-danger btn-sm" id="remove_request_button"><i class="fa fa-remove"></i></a>' +
            '</td>' +
         '</tr>'
      );

      numberOfRequestedItem.value = parseInt(numberOfRequestedItem.value) + 1;
   });

   $("#request-field").on('click', '#remove_request_button', function() {
      $(this).closest("tr").remove();

      numberOfRequestedItem.value -= 1;
   });
});