jQuery(document).ready(function() {
    //When the start button is clicked, begin Hexed game
    $('#clickMe').click(function(){
        $('body').hexed();
    });
});

//Begin Plugin
$.fn.hexed = function() {
    //Begin reading for changes on the slider, randomize the color to be guessed, and begin to read for a click on the answer button
    var start;
    var difficulty = 0;
    var total_score = 0;
    var rounds = 0;    
    var letters = '0123456789ABCDEF';
    var colors = '#';
    var user_red;
    var user_blue;
    var user_green;
    //Randomizing the color, then setting it
    for (var i = 0; i < 6; i++){
        colors += letters[Math.floor(Math.random()*16)];
    }
    $('#sample').css('background-color', colors);

    //Begin tracking time
    start = new Date();
    difficulty = $('select#difficulty').val();
    rounds = $('select#rounds').val();
    $('#turns').html(rounds);

    //Every time the slider changes, update the color via the slider vals
    $('#match').each(function() {
        var th = $(this);
        hex = th.css('backgroundColor');
        rgb = hex.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
        user_red = rgb[1];
        user_green = rgb[2];
        user_blue = rgb[3];

        th.find('.r').val(user_red);
        th.find('.r').parent('span').siblings('input').val(user_red);
        th.find('.g').val(user_green);
        th.find('.g').parent('span').siblings('input').val(user_green);
        th.find('.b').val(user_blue);
        th.find('.b').parent('span').siblings('input').val(user_blue);

        $('input').bind('change keyup click', function() {

            if ($(this).hasClass('ch')) {

                $(this).parent('span').siblings('input').val($(this).val());

            }
            else {
                if ($(this).val() > 255) $(this).val(255);
                if ($(this).val() < 0) $(this).val(0);
                $(this).siblings('span').find('input').val($(this).val());
            }
            r = parseInt(th.find('.r').val()).toString(16);
            if (r.length == 1) r = '0' + r;

            g = parseInt(th.find('.g').val()).toString(16);
            if (g.length == 1) g = '0' + g;

            b = parseInt(th.find('.b').val()).toString(16);
            if (b.length == 1) b = '0' + b;

            x = r + g + b;

            th.find('.result').html(x);
            th.css('backgroundColor', '#' + x);

        });
    });

    //Every time the answer button is clicked, update scores using the formula given
    $("#answer").click(function(){
        rounds--;
        $('#turns').html(rounds);
        var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(colors);
        var original_red = parseInt(result[1], 16);
        var original_blue = parseInt(result[2], 16);
        var original_green = parseInt(result[3], 16);

        //do the math here
        var red_percentage_off = ((Math.abs(original_red - user_red)/255)*100);
        var blue_percentage_off = ((Math.abs(original_blue - user_blue)/255)*100);
        var green_percentage_off = ((Math.abs(original_green - user_green)/255)*100);
        var total_percentage_off = ((red_percentage_off+ blue_percentage_off + green_percentage_off)/3).toFixed(2);
        var difficulty_percent_off = difficulty-total_percentage_off;
        var score = ((15-difficulty_percent_off) / (15 - difficulty))*(15000 - (new Date() - start));
        if(score < 0){
            score = 0;
        }
        //add score to total score
        total_score += score;
        $('#percentage').html(total_score.toFixed(2));
        //display the score as a running tally
        //check to see if used all turns and display final score with an alert
        if(rounds == 0){
            alert("Game over. Final score: " + total_score.toFixed(2));
        }
    });
}