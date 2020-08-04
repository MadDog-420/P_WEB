$( document ).ready(function(){
    $('#editD').click(function(e){
        let parent=$(this).parentsUntil("form");

        if($("#name").prop("disabled")){
            parent.addClass("enable").siblings().addClass("enable");
            $("#name").prop("disabled",false);
            $("#address").prop("disabled",false);
        } else {
            parent.removeClass("enable").siblings().removeClass("enable");
            $("#name").prop("disabled",true);
            $("#address").prop("disabled",true);
        }
        //
    });

    $('#save').click(function(e){
        $("#name").prop("disabled",false);
        $("#address").prop("disabled",false);
    })

    $("#fileInput").change(function () {
        filePreview(this);
      });

    function filePreview(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.readAsDataURL(input.files[0]);
          reader.onload = function (e) {
            $('#upload + img').remove();
            $('#upload').after('<img src="'+e.target.result+'" class="avatar"/>');
          }
        }
    }
})

