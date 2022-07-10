function setDateRangePicker(input1, input2){
    $(input1).datepicker({
      autoclose: true,
      format: "yyyy-mm-dd",
    }).on("change", function(){
      $(input2).val("").datepicker('setStartDate', $(this).val());
    }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
    $(input2).datepicker({
      autoclose: true,
      format: "yyyy-mm-dd",
      orientation: "bottom right"
    }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
  }