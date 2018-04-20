$(document).ready(function()
{


  $("#Mobile").click(function(){$.cookie("searchBy","mobile",{expires : 1});});
  $("#Tablet").click(function(){$.cookie("searchBy","tablet",{expires : 1});});
  $("#Laptop").click(function(){$.cookie("searchBy","laptop",{expires : 1});});
  $("#Desktop").click(function(){$.cookie("searchBy","desktop",{expires : 1});});
  $("#Tv").click(function(){$.cookie("searchBy","Tv",{expires : 1});});

  $("#Apple").click(function(){$.cookie("searchBy","apple",{expires : 1});});
  $("#Asus").click(function(){$.cookie("searchBy","asus",{expires : 1});});
  $("#Samsung").click(function(){$.cookie("searchBy","samsung",{expires : 1});});
  $("#Microsoft").click(function(){$.cookie("searchBy","microsoft",{expires : 1});});
  $("#Google").click(function(){$.cookie("searchBy","google",{expires : 1});});
  $("#Dell").click(function(){$.cookie("searchBy","dell",{expires : 1});});
  $("#HTC").click(function(){$.cookie("searchBy","htc",{expires : 1});});
  $("#LG").click(function(){$.cookie("searchBy","lg",{expires : 1});});
  $("#Nokia").click(function(){$.cookie("searchBy","nokia",{expires : 1});});
  $("#Sony").click(function(){$.cookie("searchBy","sony",{expires : 1});});


  $("#shop").click(function(){$.cookie("searchBy","",{expires : 1});});
  $("#inventory").click(function(){$.cookie("searchBy","",{expires : 1});});
  $("#all").click(function(){$.cookie("searchBy","",{expires : 1});});



  // $("#fg").change(function(){$.cookie("quantity",$("#fg option:selected").text(),{expires : 1});});

  if(typeof $.cookie('searchBy') === 'undefined')
  {
    $.cookie("searchBy",'',{expires : 1});
  }
});




var cart = [];
var getCookie = $.cookie('cart');
if(getCookie)
{
  var str =  getCookie.split(",");
  for(var j = 0;j < str.length;j++)
  {
    cart.push(str[j]);
  }

}

var wish = [];
var getCookieWish = $.cookie('wish');
if(getCookieWish)
{
  var strWish =  getCookieWish.split(",");
  for(var j = 0;j < strWish.length;j++)
  {
    wish.push(strWish[j]);
  }

}


// function delPro()
// {
//   // document.cookie = "deletePro="+proid;
//   // document.cookie = "page=inventory";
//   alert("Clicked");
// }


function ToCart(id)
{
  // This loop actually check that the given value exists in that cart or not
  var flag =  false;
  for(var i = 0;i < cart.length;i++)
  {
    if(cart[i] == id)
    {
      flag = true;
      alert("Item Already Added To Cart");
      break;
    }
  }
  
  if(!flag)
  {
    cart.push(id);
    alert('Item Added');
    $.cookie("cart",cart,{expires:7});
  }
}

function ToWish(id)
{
  // This loop actually check that the given value exists in that cart or not
  var flag =  false;
  for(var i = 0;i < wish.length;i++)
  {
    if(wish[i] == id)
    {
      flag = true;
      alert("Item Already Added To Wish");
      break;
    }

  }
  if(!flag)
  {
    wish.push(id);
    alert('Item Added');
    $.cookie("wish",wish,{expires:356});
  }
}


function DeleteFromCart(id)
{
  // This loop actually check that the given value exists in that cart or not
      var i = cart.length;
      var index;
      //findout the index
      for(var j= 0; j < cart.length;j++)
      {
        if(id == cart[j])
        {
          index = j;
          cart.splice(index,1);
          $.cookie("cart",cart,{expires:7});
          break;
        }
      }
}

function DeleteFromWish(id)
{
  // This loop actually check that the given value exists in that cart or not
      var i = wish.length;
      var index;
      //findout the index
      for(var j= 0; j < wish.length;j++)
      {
        if(id == wish[j])
        {
          index = j;
          wish.splice(index,1);
          $.cookie("wish",wish,{expires:7});
          break;
        }
      }
}


function getProId(id)
{
    document.cookie = "ProId="+id;
    // document.cookie = "page=product";
    
}




function getUserId(id)
{
    document.cookie = "UserId="+id;  
}
function getAdminId(id)
{
  alert(id);
  document.cookie = "adminId="+id;

}






function delUser(id)
{
  alert(id);
  document.cookie = "deleteUser="+id;
}
function delAdmin(id)
{
  alert(id);
  document.cookie = "deleteAdmin="+id;
}



function delPro(id)
{
  alert(id);
  document.cookie = "deletePro="+id;
}

// $().click(function()
// {
//   cart.push();
// });
