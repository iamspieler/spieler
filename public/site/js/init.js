$(function(){

        var r = Raphael('map', 720, 435),
                attributes = {
            fill: '#fff',
            stroke: '#FFFFFF',
            'stroke-width': 2,
            'stroke-linejoin': 'round',
            'country':  'treterter'
        },
                arr = new Array();

        for (var country in paths) {
            

            

     
     arr["id_el"] = country;

                var obj = r.path(paths[country].path);
           
 
                obj.attr(attributes);

                arr[obj.id] = country;
                
     

                obj
                .click(function(){
                        this.animate({
                                fill: '#eEE'
                        }, 100),
                        this.css({
                                'cursor': 'pointer'
                        }, 100);;
                }, function(){
                        this.animate({
                                fill: attributes.fill
                        }, 100);
                })
                

                
                .click(function(){
                    
                        document.location.hash = arr[this.id];

                        var point = this.getBBox(0);

                        $('#map').next('.point').remove();

                        $('#map').after($('<div />').addClass('point'));
                                 

                        $('.point')
                        .html("<a href='"+paths[arr[this.id]].url+"'>" + paths[arr[this.id]].name + "</a>")
                        .prepend($('<a />').attr('href', '#').addClass('close').text('Закрыть'))
                        .css({
                                left: point.x+(point.width/2)-20,
                                top: point.y+(point.height/2)-10
                        })
                        .fadeIn();

                });
                

                $('#smap').click(function(){
                       paths[arr[this.id_el]].animate({
                                fill: '#000'
                        }, 100);
    });
                
                

                $('.point').find('.close').live('click', function(){
                        var t = $(this),
                                parent = t.parent('.point');

                        parent.fadeOut(function(){
                                parent.remove();
                        });
                        return false;
                });
                
                if(document.location.hash != '')
                {
                  var sfd = document.location.hash;


                        $(country).animate({
                                fill: '#000'
                        });
                }
                
              
               
               
               for (var country in paths) {
                
                (function (co, country) {
                    
                    co[0].style.cursor = "pointer";
                      alert(country);
                                    if (country == "#zarina") {
                        co[0].onmouseover();
                        
                       
                    }
                });


               }
        


        }








});

function print_r(taV)
{
   alert(getProps(taV));
}

function getProps(toObj, tcSplit)
{
   if (!tcSplit) tcSplit = '\n';
   var lcRet = '';
   var lcTab = '    ';

     for (var i in toObj) // обращение к свойствам объекта по индексу
       lcRet += lcTab + i + " : " + toObj[i] + tcSplit;

     lcRet = '{' + tcSplit + lcRet + '}';

   return lcRet;
}

