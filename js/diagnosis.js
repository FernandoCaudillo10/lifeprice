$(document).ready(() => {
    $.ajax({
        type:"GET",
        url:"../diagnosis/api/getDiagnosis.php",
        dataType:"json",
        data:{},
        success: function (data,status){
            console.log(data);
        },
        error: function(error){
            console.log(error);
        },
    });
});