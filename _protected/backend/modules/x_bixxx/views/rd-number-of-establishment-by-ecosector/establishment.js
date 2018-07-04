var temp_array= regions.map(function(item){
  return item.total;
});

var highest_value = Math.max.apply(Math, temp_array);

$(function() {

  for(i = 0; i < regions.length; i++) {

      $('#'+ regions[i].region_code)
      .css({'fill': 'rgba(50,205,50,' + regions[i].total / highest_value  +')'})
      .data('region', regions[i])
      //.label('region',region[i].region_name);
  }

$('.map g').mouseover(function (e) {
    var region_data=$(this).data('region');
    $('<div class="info_panel">'+
        region_data.region_name + '<br>' +
        'Number of employer: ' + region_data.total.toLocaleString("en-UK") + '<br>' +
        'Number of female employee: ' + region_data.numberOfFemaleEmployee.toLocaleString("en-UK") + '<br>' +
        'Number of male employee: ' + region_data.numberOfMaleEmployee.toLocaleString("en-UK") + '<br>' +
      '</div>'
     )
    .appendTo('body');
})
.mouseleave(function () {
    $('.info_panel').remove();
})
.mousemove(function(e) {
    var mouseX = e.pageX, //X coordinates of mouse
        mouseY = e.pageY; //Y coordinates of mouse

    $('.info_panel').css({
        top: mouseY-150,
        left: mouseX - ($('.info_panel').width()/2)
    });
});

});