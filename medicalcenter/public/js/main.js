//Profile image
$imgIconCounter = 0;
$(document).ready(function () {
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    $("#btnShowImgForm").click(function () {
        if ($imgIconCounter === 0) {
            $(".ImgForm").css("display", "block");
            $imgIconCounter++;
        } else {
            $(".ImgForm").css("display", "none");
            $imgIconCounter--;
        }
    })
    $("#saveImg").click(function () {
        $(".ImgForm").css("display", "none");
    })

    $('#connectedServices').click(function() {
      if($('#connectedServices').text() == "Edit"){
        $('#connectedServices').text("Save");
        $('#dage').attr( "class", "form-control" );
        $('#yoe').attr( "class", "form-control" );
        $('#biography').attr( "class", "form-control" );
      }else {
        $('#profileForm').submit();
      }
    })
})
