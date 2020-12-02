function validateDate(){
    let date = new Date($('#reserve-date').val());
    let lastDate = new Date();
    lastDate.setDate(lastDate.getDate() -1); // ayer

    if (date < lastDate){
        $('#reserve-date-error').html('La fecha debe ser posterior al dia de ayer');
    } else {
        $('#reserve-date-error').empty();
    }
}