$( "#coverart" ).click(function(){ //Click on the cover art to activate the function
  $.ajax({
    type: "GET",//grab tha json from the url
    url: "lab4.json",
    dataType: "json",
    success: function(result){ //if load is successfull go into the each function that adds accordingly
      $.each(result.songs, function(i,song){
      		$("#site").append("<li class = 'site'>"+song.site+"</li>")
      		$("#title").append("<li class = 'title'> "+song.title+"</li>")
      		$("#artist").append("<li class = 'artist'>"+song.artist+"</li>")
          $("#album").append("<li class = 'album_image'> <img src=" +song.album_cover+"></li>")//add img for images
      		$("#album").append("<li class = 'album'> <a href=" +song.site+">"+song.album+"</a></li>")//add hrefs for links
      		$("#date").append("<li class = 'date'>"+song.date+"</li>")
      	  $("#genres").append("<li class = 'generes'>"+song.generes+"</li>")


      });
$("#site").remove()//take out picture
    },
    error: function(result){//return an error if cant read the json
      alert("JSON not read");
    }
  })
});