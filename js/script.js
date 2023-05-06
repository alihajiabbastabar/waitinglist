$(document).ready(function() {

  // Add player to waiting list when add button is clicked 
  $("#add-player").click(function() {
    if (confirm("Are you sure you want to perform this action?")) {
    var name = $("#name").val();
    if (name.trim() == "") {
      $("#message").html("Error: Please enter a name");
      return;
    }
    $.ajax({
      type: "POST",
      url: "add_player.php",
      data: {name: name},
      success: function(response) {
        if (response == "Success") {
          $("#message").html("");
          $("#name").val("");
          refreshWaitingList();
        } else {
          $("#message").html("Error: " + response);
        }
      }
    });
    }
  });

  // Remove player from waiting list when remove button is clicked
  $("#remove-player").click(function() {
    if (confirm("Are you sure you want to perform this action?")) {
    var name2 = $("#name").val();
    if (name2.trim() == "") {
      $("#message").html("Error: Please enter a name");
      return;
    }
    $.ajax({
      type: "POST",
      url: "remove_player.php",
      data: {name: name2},
      success: function(response) {
        if (response == "Success") {
          $("#message").html("");
          $("#name").val("");
          refreshWaitingList();
        } else {
          $("#message").html("Error: " + response);
        }
      }
    });
    }
  });

  // Refresh waiting list when page loads
  refreshWaitingList();
});

function refreshWaitingList() {
  $.ajax({
    type: "GET",
    url: "get_waiting_list.php",
    success: function(response) {
      $("#waiting-list").html(response);
    }
  });

}

