$(document).ready(function () {
  var user_href;
  var user_href_splitted;
  var user_id;
  var image_src;
  var image_href_splitted;
  var image_name;
  var photo_id;

  $(".modal_thumbnails").click(function () {
    $("#set_user_image").prop("disabled", false);

    $(this).addClass("selected");
    user_href = $("#user-id").prop("href");
    user_href_splitted = user_href.split("=");
    user_id = user_href_splitted[user_href_splitted.length - 1];

    image_src = $(this).prop("src");
    image_href_splitted = image_src.split("/");
    image_name = image_href_splitted[image_href_splitted.length - 1];

    // alert(image_name);

    photo_id = $(this).attr("data");

    $.ajax({
      type: "post",
      url: "includes/ajax_code.php",
      data: { photo_id: photo_id },
      success: function (data) {
        if (!data.error) {
          $("#modal_sidebar").html(data);
        }
      },
    });
  });

  $("#set_user_image").click(function () {
    $.ajax({
      type: "post",
      url: "includes/ajax_code.php",
      data: { image_name: image_name, user_id: user_id },
      // dataType: "dataType",
      success: function (data) {
        if (!data.error) {
          // location.reload(true);
          $(".user_image_box a img").prop("src", data);
        }
      },
    });
  });

  // TinyMCE code below
  tinymce.init({ selector: "#textarea" });

  // Edit photo side bar js code

  $(".info-box-header").click(function () {
    $(".inside").toggle();
    $("#toggle").toggleClass(
      "glyphicon glyphicon-menu-down  , glyphicon glyphicon-menu-up "
    );
  });

  //photo alert delete
  $(".delete_link").click(function () { 
    
    confirm("Are you sure!");
    
  });
});
