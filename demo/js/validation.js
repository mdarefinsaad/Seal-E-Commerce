function check()
{
      //parseInt() ....is a function that converts -> String - Int
      var name = document.getElementsByName("name")[0].value;
      var email = document.getElementsByName("email")[0].value;
      var uname = document.getElementsByName("username")[0].value;
      var pass = document.getElementsByName("password")[0].value;
      var cno = document.getElementsByName("ccno")[0].value;
      var cpin = document.getElementsByName("ccpin")[0].value;
      var mob = document.getElementsByName("mobile")[0].value;
      var add = document.getElementsByName("address")[0].value;
      var city = document.getElementsByName("city")[0].value;
      var gender = document.getElementsByName("gender")[0].value;
      var uType = document.getElementsByName("userType")[0].value;
      var file = document.getElementsByName("fileToUpload")[0].value;


      function valName(name)
      {
            var str = name.trim();
            var namePattern = /^[a-zA-Z ]+$/;
            var res = namePattern.test(str);

            if(!res)
            {
                  return false;
            }
            return true;
      }
      function valEmail(email)
      {
            var str = email.trim();
            var emailPattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
            var res = emailPattern.test(str);

            if(!res)
            {
                  return false;
            }
            return true;
      }
      function valUsername(uname)
      {
            var str = uname.trim();
            var usernamePattern = /^[a-zA-Z0-9]+$/;
            var res = usernamePattern.test(str);

            if(!res)
            {
                  return false;
            }
            return true;
      }
      function valPass(pass)
      {
            var str = pass.trim();
            var passwordPattern = /^([a-z0-9.@_#]{5,})$/;
            var res = passwordPattern.test(str);

            if(!res)
            {
                  return false;
            }
            return true;
      }
      function valCardno(cno)
      {
            var str = cno.trim();
            var cardnoPattern = /^([0-9]{10,14})$/;
            var res = cardnoPattern.test(str);

            if(!res)
            {
                  return false;
            }
            return true;
      }
      function valCardpin(cpin)
      {
            var str = cpin.trim();
            var cardpinPattern = /^([0-9]{4,})$/;
            var res = cardpinPattern.test(str);

            if(!res)
            {
                  return false;
            }
            return true;
      }
      function valMobile(mob)
      {
            var str = mob.trim();
            var mobilePattern = /(017|016|018|019|015)\s?\d{2}\s?\d{6}/;
            var res = mobilePattern.test(str);

            if(!res)
            {
                  return false;
            }
            return true;
      }
      function valAdd(add)
      {
            var str = add.trim();
            var addPattern = /^[a-zA-Z0-9, ]+$/;
            var res = addPattern.test(str);

            if(!res)
            {
                  return false;
            }
            return true;
      }
      function valCity(city)
      {
            var str = city.trim();
            if(str == '')
            {
                  return false;
            }
            return true;
      }
      function valgender(gender)
      {
            var str = gender.trim();
            if(str == '')
            {
                  return false;
            }
            return true;
      }
      function valType(uType)
      {
            var str = uType.trim();
            if(str == '')
            {
                  return false;
            }
            return true;
      }

      //checks 
      if(valName(name))
      {
            if(valEmail(email))
            {
                  if(valUsername(uname))
                  {
                        if(valPass(pass))
                        {
                              if(valCardno(cno))
                              {
                                    if(valCardpin(cpin))
                                    {
                                          if(valMobile(mob))
                                          {
                                                if(valAdd(add))
                                                {
                                                      if(valCity(city))
                                                      {
                                                            if(valgender(gender))
                                                            {
                                                                  if(valType(uType))
                                                                  {
                                                                        alert("Registration Done");
                                                                        return true;
                                                                  }
                                                                  else
                                                                  {
                                                                        alert(" Invalid User Type !!");
                                                                        return false;                      
                                                                  }
                                                            }
                                                            else
                                                            {
                                                                  alert(" Invalid Gender !!");
                                                                  return false;           
                                                            }
                                                      }
                                                      else
                                                      {
                                                           alert(" Invalid City !!");
                                                            return false;            
                                                      }
                                                }
                                                else
                                                {
                                                      alert(" Invalid Address !!");
                                                      return false;           
                                                }
                                          }
                                          else
                                          {
                                                alert(" Invalid Mobile Number !!");
                                                return false;
                                          }
                                    }
                                    else
                                    {
                                          alert(" Invalid Credit Card Pin !!");
                                          return false;
                                    }
                              }
                              else
                              {
                                    alert(" Invalid Credit Card Number !!");
                                    return false;
                              }
                        }
                        else
                        {
                              alert(" Invalid Password !!");
                              return false;
                        }
                    }
                  else
                  {
                        alert(" Invalid Username !!");
                        return false;
                  }
            }
            else
            {
                  alert(" Invalid Email !!");
                  return false;
            }
      }
      else
      {
            alert(" Invalid Name ! !");
            return false;
      }
}