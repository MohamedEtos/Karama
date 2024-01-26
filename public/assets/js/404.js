function randomNum()
{
    "use strict";
    return Math.floor(Math.random() * 9)+1;
}
var errorCode=document.querySelector('.errorCode').textContent;

var text = errorCode;
var words = text.split(" ");
var firstChar = words[0].charAt(0);
var secondChar = words[0].charAt(1);
var thirdChar = words[0].charAt(2);



    var loop1,loop2,loop3,time=10, i=0, number, selector3 = document.querySelector('.thirdDigit'), selector2 = document.querySelector('.secondDigit'),
        selector1 = document.querySelector('.firstDigit');
    loop3 = setInterval(function()
    {
      "use strict";
        if(i > 40)
        {
            clearInterval(loop3);
            selector3.textContent = firstChar;
        }else
        {
            selector3.textContent = randomNum();
            i++;
        }
    }, time);
    loop2 = setInterval(function()
    {
      "use strict";
        if(i > 80)
        {
            clearInterval(loop2);
            selector2.textContent = secondChar;
        }else
        {
            selector2.textContent = randomNum();
            i++;
        }
    }, time);
    loop1 = setInterval(function()
    {
      "use strict";
        if(i > 100)
        {
            clearInterval(loop1);
            selector1.textContent = thirdChar;
        }else
        {
            selector1.textContent = randomNum();
            i++;
        }
    }, time);



