$(".draggable").draggable();

$('#drop1').droppable({
    drop: function(event, ui) {
        console.log(ui.draggable.data);
        $("#q1").val(ui.draggable.data('product'));
       $("#q1").attr('checked',true);
        return false;
    }
});


 $('#drop2').droppable({
    drop: function(event, ui) {
        console.log(ui.draggable.data);
        $("#q2").val(ui.draggable.data('product'));
       $("#q2").attr('checked',true);
        return false;
    }
});

$('#drop3').droppable({
    drop: function(event, ui) {
        console.log(ui.draggable.data);
        $("#q3").val(ui.draggable.data('product'));
       $("#q3").attr('checked',true);
        return false;
        $(this).addClass("ui-state-highlight");
    }
});

$('#drop4').droppable({
    drop: function(event, ui) {
        $("#q4").val(ui.draggable.data('product'));
       $("#q4").attr('checked',true);
        return false;
         $(this).addClass("ui-state-highlight")
    }
});

$('#drop5').droppable({
    drop: function(event, ui) {
        $("#q5").val(ui.draggable.data('product'));
       $("#q5").attr('checked',true);
        return false;
         $(this).addClass("ui-state-highlight")
    }
});

$('#drop6').droppable({
    drop: function(event, ui) {
        $("#q6").val(ui.draggable.data('product'));
       $("#q6").attr('checked',true);
        return false;
         $(this).addClass("ui-state-highlight")
    }
});

